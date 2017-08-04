$(document).ready(function(){
  var supplierArr = [];
  var variantArr = [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#materialTable').DataTable();
  var table1 = $('#matCostTable').DataTable(
      {
         "searching": false,
     "ordering": false,
     "paging": false,
     "bInfo" : false,
      });

  var variantSelect = `<select id="depVariant" class="form-control select2" required>
                            </select>`;

function getSupplier(){
    $.ajax({
        url: '/maintenance/supplier-all',
        type: 'GET',
        success: function(data)
        {
          $("#matSupplier").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strSupplierID+`>`+data[i].strSupplierName+`</option>`).appendTo("#matSupplier");
          }
        }
    });
  }

  function getVariant(){
    $.ajax({
        url: '/maintenance/variant-alls',
        type: 'GET',
        success: function(data)
        {
          $("#matVariant").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option>`+ data[i].intVariantQty  + ' ' + data[i].unit.strUOMName + `</option>`).appendTo("#matVariant");
          }
        }
    });
  }



$("#btnAddMaterial").click(function(){
   getVariant();
  getSupplier();
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove();
  document.getElementById("material_form").reset();
  document.getElementById('material_form').action = "{{URL::to('/maintenance/material-add')}}";
  urlCode =  '/maintenance/material-add';
});


  $('#matVariant').change(function(){
    // if(clear == 0){
      $("#depVariant").empty();
      var matselect = $('#matVariant').val();
      console.log(matselect);
      for (var i = 0; i < matselect.length; i++) {
        var getDropdown = document.getElementById("depVariant");
        var opt = document.createElement("option");
        opt.text = matselect[i];
        getDropdown.add(opt);
      }
  });


  $("#addCart").click(function(){

    var matSup = $('#matSupplier').val();
    // alert(matSup);
    var inptCost = "<input type='number' placeholder='0'>";

    for (var j = 0; j < matSup.length; j++) {
      $.ajax({
          url: "/transaction/materialCart",
          type: "POST",
          data: {
            supplier_data : matSup[j]
          },
          success: function(data) {
              console.log(data);
            // $('#hiddenDiv').show();
            var btnn = "<button type='button' name='"+data[0].strSupplierID+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
            $('#matSupplier option:selected').remove();
              table1.row.add([
                data[0].strSupplierName,
                variantSelect,
                inptCost,
                btnn

              ]).draw(true);
          }
    });
  }
  });

$("#btnEditMaterial").click(function(){
  getSupplier();
  getVariant();
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove()
  document.getElementById("material_form").reset();

  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/material-edit',
      type: 'POST',
      data: {
        material_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        console.log(data);
        $('#materialName').val(data.strMaterialName);
        $('#reorderLevel').val(data.intReorderLevel);
        $('#reorderQty').val(data.intReorderQty);
        $('#uomSelect').val(data.strUOMID).change();
        $('#material_desc').val(data.strMaterialDesc);

        $("#matSupplier option").each(function()
              {
                for(var i = 0; i < data.supplier.length; i++)
                {
                  if($(this).val() == data.supplier[i].strSupplierID){
                      $(`#matSupplier option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#matSupplier').change();
                  }
                }
              });
         $("#matVariant option").each(function()
              {
                for(var i = 0; i < data.materialvariant.length; i++)
                {
                  if($(this).val() == data.materialvariant[i].strMaterialVariantID){
                      $(`#matVariant option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#matVariant').change();
                  }
                }
              });

        // URL OF EDIT
        tempID = data.strMaterialID;
        // console.log(data.strMaterialID);
        document.getElementById('material_form').action = "{{URL::to('/maintenance/material-update')}}";
        urlCode =  '/maintenance/material-update';
      },
      error: function(result) {
        alert('EDIT ERROR');
      }
  });
})





$('#btnDeleteMaterial').click(function(){
  var tblname = $('#materialTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/material-delete",
    data: {
        material_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#MaterDeleteModal').modal('toggle');
      $('#btnAddMaterial').show();
      $('#btnEditMaterial').hide();
      $('#btnDeleteMaterials').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Material(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});

// $('#btnReactivateMaterial').click(function(){
//   $.ajax({
//     url: '/maintenance/material-active',
//     type: 'POST',
//     data: {
//         material_name: $('#materialName').val()
//     },
//     success: function(result) {
//       $('#add_material_modal').modal('toggle');
//       $('#MaterialReactivateModal').modal('toggle');
//       noty({
//           type: 'success',
//           layout: 'bottomRight',
//           timeout: 3000,
//           text: '<h4><center>Material successfully reactivated!</center></h4>',
//         });
//         // LIST
//       var x='';
//       for (var index = 0; index < result.supplier.length; index++) {
//         var element = result.supplier[index].details2.strSupplierName;
//         x += '<li style="list-style-type:circle">'+element+'</li>'
//       }
//         table.row.add([
//           result.strMaterialID,
//           result.strMaterialName,
//           x,
//           result.intReorderLevel,
//           result.intReorderQty+" "+result.unit.strUOMName,
//           result.strMaterialDesc,
//           ]
//         ).draw(false);

//     },
//     error: function(result) {
//         alert('error');
//     }
//   });
// });

$('#btnClear').click(function(){
  getSupplier();
  getVariant();
});
});
