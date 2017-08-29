$(document).ready(function(){
  var supplierArr = [];
  var variantArr = [];
  var urlCode = '';
  var variantSelect ='';
  var tempID = '';
  var btnTrash = '#btnTrash';
  var table =  $('#materialTable').DataTable();
  var table1 = $('#matCostTable').DataTable(
      {
         "searching": false,
     "ordering": false,
     "paging": false,
     "bInfo" : false,
      });

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
            $(`<option>`+data[i].intVariantQty  + ' ' + data[i].unit.strUOMName +`</option>`).appendTo("#matVariant");
          }
        }
    });
  }

$("#btnAddMaterial").click(function(){
  $('#hideVariant').hide();
  $('#hidee').hide();
  getSupplier();
  getVariant();

  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove();
  document.getElementById("material_form").reset();
  document.getElementById('material_form').action = "{{URL::to('/maintenance/material-add')}}";
  urlCode =  '/maintenance/material-add';
});

$('#matVariant').change(function(){
  // if(clear == 0){
    var matselect = $('#matVariant').val();
    var table = document.getElementById('matCostTable');
    var total = table.rows.length;
    for(var i=0; i<total; i++){
        if(i > 0){
            var drpdwnId= table.rows[i].cells[0].innerHTML;
            $("#"+drpdwnId.replace(/ /g,'')).empty();
            for (var k = 0; k < matselect.length; k++) {
              var getDropdown = document.getElementById(drpdwnId.replace(/ /g,''));
              var opt = document.createElement("option");
              opt.text = matselect[k];
              getDropdown.add(opt);
                // getDropdown.add(matselect[k]);
            }
        }
    }
});

$("#addCart").click(function(){
  table1.column(0).visible(false);
    var ctr = 0;
    $('#matSupplier :selected').each(function(i, selected){
      ctr+=1;
    });
    if(ctr == '0'){
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>You chose '+ctr+' Supplier(s)!</center></h4>',
        });
    }
    else{
      $('#hidee').show();
      $('#hideVariant').show();
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>You chose '+ctr+' Supplier(s)!</center></h4>',
        });

      var matSup = $('#matSupplier').val();
    // alert(matSup);
      for (var j = 0; j < matSup.length; j++) {
        $.ajax({
            url: "/transaction/materialCart",
            type: "POST",
            data: {
              supplier_data : matSup[j]
            },
            success: function(data) {
              var getDataTable = $('#matCostTable').dataTable();
              // var oTable = $('#matCostTable').dataTable();
              var tblrows = getDataTable.fnGetData().length;
              var row = tblrows+1;
              console.log(data);
              variantSelect = '<select id='+data[0].strSupplierName.replace(/ /g," ")+row+' class="form-control select2" required></select>';
              var btnn = "<button type='button' id = 'btnTrash' class='deleteRow btn btn-danger' name='"+data[0].strSupplierID+"'><i class='fa fa-trash'></i></button>";
              $('#matSupplier option:selected').remove();
              table1.row.add([
                data[0].strSupplierID,
                data[0].strSupplierName,
                variantSelect,
                '<input type="number" min=1 id="costt'+row+'" class="form-control" placeholder="0">',
                btnn
              ]).draw(true);

            }
      });
    }
  }
  });

$('#matCostTable tbody').on( 'click', btnTrash, function () {
  var data = table1.row( $(this).parents('tr') ).data();
  var row = $(this).parent().parents('tr');
  table1.row(row).remove().draw();
  $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#matSupplier");
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

$(document).on('submit', '#material_form', function(e){
    table.column(0).visible(false);
    var cost= [];
    var variant = [];
    var getDataTable = $('#matCostTable').dataTable();
    var tblrows = getDataTable.fnGetData().length;
    alert(tblrows);
    supplierArr =  getDataTable.fnGetData();
    alert(supplierArr);
    e.preventDefault();
    for(var i = 0; i<tblrows; i++){
      var x = i+1;

      variant[i] = $('#'+data[0].strSupplierName.replace(/ /g,'')+' option:selected').text();

      alert(variant[i]);

      cost[i] = $("#costt"+x).val();

      alert(cost[i]);
    }
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            supplier_data: supplierArr,
            cost_data: cost,
            variant_data: variant,
            material_name: $('#materialName').val(),
            mtype_id: $('#materialTypeSelect').val(),
            reorder_level: $('#reorderLevel').val(),
            uom_id: $('#materialUOMSelect').val(),
            material_qty: $('#measurementQty').val(),
            material_desc: $('#material_desc').val(),
            material_id: tempID
        },
        success: function(result) {
          console.log(data);
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
          table.row.add([
            result.strMaterialID,
            result.strMaterialName,
            result.strMaterialQty+" "+result.strUOMName,
            result.strMaterialTypeName,
            result.intMaterialReorderLevel,
            result.strMaterialDesc,
            ]
          ).draw(false);

          $('#materialName').val('')
          $('#measurementQty').val('')
          $('#materialUOMSelect').val('')
          $('#material_desc').val('')
          $('#materialTypeSelect').val('')
          $('#reorderLevel').val('')
          $('#add_material_modal').modal('toggle');
          $('#btnEditMaterial').hide()
          $('#btnDeleteMaterials').hide()
          $('#btnAddMaterial').show()
        },
        error: function(result){
          var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Material name already exist!</center></h4>',
            });
          }
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
