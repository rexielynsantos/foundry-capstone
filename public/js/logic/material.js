$(document).ready(function(){
  var supplierArr = [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#materialTable').DataTable();

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

$("#btnAddMaterial").click(function(){
  getSupplier();
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove();
  document.getElementById("material_form").reset();
  document.getElementById('material_form').action = "{{URL::to('/maintenance/material-add')}}";
  urlCode =  '/maintenance/material-add';
});

$("#btnEditMaterial").click(function(){
  getSupplier();
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

// var table1 = $('#materialCostTable').DataTable(
//   {
//      "searching": false,
//      "ordering": false,
//      "paging": false,  
//      "bInfo" : false,
//   }
// );

// $("#addMat").click(function(){
//     var table1 = $('#materialCostTable').DataTable();
//     var matVal = $('#matSupplier').val();
//     alert(matVal);

//     var inptQty = "<input type='text' placeholder='0'>";

//     for (var j = 0; j < matVal.length; j++) {
//       $.ajax({
//           url: "/maintenance/materialCart",
//           type: "POST",
//           data: {
//             supplier_d : matVal[j]
//           },
//           success: function(data) {
//             var btnn = "<button type='button' name='"+data[0].strSupplierName+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
//             $('#matSelect option:selected').remove();
//               table.row.add([
//                 data[0].strSupplierName,
//                 inptQty,
//                 btnn
//               ]).draw(true);
//             console.log(data);
//           }
//     });
//   }
//   });


  $(document).on('submit', '#material_form', function(e){
    table.column(0).visible(false);
    $('#matSupplier :selected').each(function(i, selected){
      supplierArr[i] = $(selected).val();
      // alert(stageArr[i]);
    });
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
            supplier_data: supplierArr,
            material_name: $('#materialName').val(),
            reorder_level: $('#reorderLevel').val(),
            reorder_qty: $('#reorderQty').val(),
            uom_id: $('#uomSelect').val(),
            material_desc: $('#material_desc').val(),
            material_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/material-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Material successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Material successfully added!</center></h4>',
            });
          }

          // LIST
        var x='';
        for (var index = 0; index < result.supplier.length; index++) {
          var element = result.supplier[index].details2.strSupplierName;
          x += '<li style="list-style-type:circle">'+element+'</li>'
        }
          table.row.add([
            result.strMaterialID,
            result.strMaterialName,
            x,
            result.intReorderLevel,
            result.intReorderQty+" "+result.unit.strUOMName,
            result.strMaterialDesc,
            ]
          ).draw(false);


         // document.getElementById("material_form").reset();
          $('#add_material_modal').modal('toggle');
          $('#btnEditMaterial').hide()
          $('#btnDeleteMaterials').hide()
          $('#btnAddMaterial').show()
          supplierArr = [];
        },


        error: function(result){
          $.ajax({
              url: '/maintenance/material-status',
              type: 'POST',
              data: {
                  material_name: $('#materialName').val()
              },
              success: function(data)
              {
                var errors = result.responseJSON;
                  if(errors == undefined){
                    if(data[0].strStatus == 'Active'){
                      noty({
                        type: 'error',
                        layout: 'bottomRight',
                        timeout: 3000,
                        text: '<h4><center>Material already exist!</center></h4>',
                      });
                    }
                    else if(data[0].strStatus == 'Inactive'){
                      $('#MaterialReactivateModal').modal();
                    }
                  }
              }
          });
        }
      });
  });


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

$('#btnReactivateMaterial').click(function(){
  $.ajax({
    url: '/maintenance/material-active',
    type: 'POST',
    data: {
        material_name: $('#materialName').val()
    },
    success: function(result) {
      $('#add_material_modal').modal('toggle');
      $('#MaterialReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Material successfully reactivated!</center></h4>',
        });
        // LIST
      var x='';
      for (var index = 0; index < result.supplier.length; index++) {
        var element = result.supplier[index].details2.strSupplierName;
        x += '<li style="list-style-type:circle">'+element+'</li>'
      }
        table.row.add([
          result.strMaterialID,
          result.strMaterialName,
          x,
          result.intReorderLevel,
          result.intReorderQty+" "+result.unit.strUOMName,
          result.strMaterialDesc,
          ]
        ).draw(false);

    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnClear').click(function(){
  getSupplier();
});
});
