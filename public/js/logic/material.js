$(document).ready(function(){
  var supplierArr = [];
  var variantArr = [];
  var variantArrText = [];
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
            $(`<option value=`+data[i].strMaterialVariantID+`>`+data[i].intVariantQty  + ' ' + data[i].unit.strUOMName +`</option>`).appendTo("#matVariant");
          }
        }
    });
  }

function getUOM(){
  $.ajax({
      url: '/maintenance/uom-alls',
      type: 'GET',
      success: function(data)
      {
        $("#uomSelect").empty();
        $(`<option value=first>Select Unit</option>`).appendTo("#uomSelect");
        for(var i = 0; i < data.length; i++)
        {
          $(`<option value=`+data[i].strUOMID+`>`+data[i].strUOMName +`</option>`).appendTo("#uomSelect");
        }
      }
  });
}

$("#btnAddMaterial").click(function(){
  $('#hidee').hide();
  getUOM();
  getSupplier();
  getVariant();
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove();
  document.getElementById("material_form").reset();
  document.getElementById('material_form').action = "{{URL::to('/maintenance/material-add')}}";
  urlCode =  '/maintenance/material-add';
});

// $('#matVariant').change(function(){
//   // if(clear == 0){
//     var matselect = $('#matVariant').val();
    // var table = document.getElementById('matCostTable');
    // var total = table.rows.length;
    // for(var i=0; i<total; i++){
    //     if(i > 0){
    //         var drpdwnId= table.rows[i].cells[0].innerHTML;
    //         $("#"+drpdwnId.replace(/ /g,'')).empty();
    //         for (var k = 0; k < matselect.length; k++) {
    //           var getDropdown = document.getElementById(drpdwnId.replace(/ /g,''));
    //           var opt = document.createElement("option");
    //           opt.text = matselect[k];
    //           getDropdown.add(opt);
    //             // getDropdown.add(matselect[k]);
    //         }
    //     }
//     }
// });

$('#matVariant').on('change', function(){
  putVariant();
});

function putVariant(){
  var getDataTable = $('#matCostTable').dataTable();
  var tblrows = getDataTable.fnGetData().length;
  for (var y = 0; y < tblrows; y++) {
    var cntt = y+1;
    $('#vs'+cntt).empty();
  }
  $('#matVariant :selected').each(function(i, selected){
    variantArr[i] = $(selected).val();
    variantArrText[i] = $(selected).text();
  });
  for (var k = 0; k < tblrows; k++) {
    for(var x = 0; x < variantArr.length; x++){
      var cnt = k+1;
      $(`<option value=`+variantArr[x]+`>`+variantArrText[x]+`</option>`).appendTo("#vs"+cnt);
    }
  }
}

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
              var tblrows = getDataTable.fnGetData().length;
              var row = tblrows+1;
              console.log(data);
              variantSelect = '<select id="vs'+row+'" class="form-control select2" multiple = "multiple" data-placeholder = "Select Variant(s)" required></select>';
              var btnn = "<button type='button' id = 'btnTrash' class='deleteRow btn btn-danger' name='"+data[0].strSupplierID+"'><i class='fa fa-trash'></i></button>";
              $('#matSupplier option:selected').remove();
              table1.row.add([
                data[0].strSupplierID,
                data[0].strSupplierName,
                variantSelect,
                '<input type="number" min=1 id="costt'+row+'" class="form-control number" placeholder="0" required>',
                btnn
              ]).draw(true);
              putVariant();
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
  getUOM();
  getSupplier();
  getVariant();
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove()
  document.getElementById("material_form").reset();
  table1.column(0).visible(false);
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
        $('#hidee').show();
        $("#matSupplier option").each(function(){
          for(var i = 0; i < data.materialvariant.length; i++)
          {
            if($(this).val() == data.materialvariant[i].supplier.strSupplierID){

              // alert($(this).val());
                $('#matSupplier option[value='+$(this).val()+']').remove();

                $(`#matSupplier option[value=`+$(this).val()+`]`).attr('selected', true);

                $('#matSupplier').change();
            }
          }
        });
        $("#matVariant option").each(function(){
          for(var i = 0; i < data.materialvariant.length; i++)
          {
            if($(this).val() == data.materialvariant[i].details.strMaterialVariantID){
                $(`#matVariant option[value=`+$(this).val()+`]`).attr('selected', true);
                $('#matVariant').change();
            }
          }
        });

        var getDataTable = $('#matCostTable').dataTable();
        getDataTable.fnClearTable();
        getDataTable.fnDraw();
        var tblrows = getDataTable.fnGetData().length;
        var row = tblrows+1;
        for(var i = 0; i < data.materialvariant.length; i++){
          variantSelect = '<select id="vs'+row+'" class="form-control select2" multiple = "multiple" data-placeholder = "Select Variant(s)" required></select>';
          var btnn = "<button type='button' id = 'btnTrash' class='deleteRow btn btn-danger' name='"+data.materialvariant[i].supplier.strSupplierID+"'><i class='fa fa-trash'></i></button>";
          table1.row.add([
            data.materialvariant[i].supplier.strSupplierID,
            data.materialvariant[i].supplier.strSupplierName,
            variantSelect,
            '<input type="number" min=1 id="costt'+row+'" value="'+data.materialvariant[i].dblMaterialCost+'" class="form-control number" placeholder="0" required>',
            btnn
          ]).draw(true);
          row = row + 1;
          putVariant();
        }

        // var ctrrr = 0;
        // // var  va = [];
        // // $('#matVariant :selected').each(function(i, selected){
        // //   va[i] = $(selected).val();
        // // });
        // // alert(va[0]);
        // // alert('l'+data.materialvariant.length);
        // for(var j = 0; j < data.materialvariant.length; j++){
        //   alert('a');
        //   ctrrr = j+1;
        //   // $("#vs"+ctrrr+" option").each(function(){
        //     // alert('b');
        //       // for(var i = 0; i < data.materialvariant.length; i++){
        //         // alert($(this).val());
        //         alert(vsArr[j]);
        //         if(vsArr[j] == data.materialvariant[j].strMaterialVariantID){
        //           alert('c');
        //           $('#vs'+ctrrr+' option[value='+vsArr[j]+']').attr('selected', true);
        //
        //           // $('#vs'+j+1).val(data.materialvariant[i].strMaterialVariantID).change();
        //       }
        //       // }
        //
        //
        //   // });
        // }

        putVariant();
        var ctrrr = 0;
        alert(row);
        for(var j = 0; j < row; j++){
          $("#vs"+ctrrr+" option").each(function(){
              if($(this).val() == data.materialvariant.strMaterialVariantID){
                alert($(this).val());
                ctrrr = j+1;
                $('#vs'+ctrrr).val($(this).val()).change();
            }
          });
        }


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
      variant[i] = $('#vs'+x).val();
      alert(variant[i]);
      cost[i] = $("#costt"+x).val();
      alert(cost[i]);
    }
    alert(variant);
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            supplier_data: supplierArr,
            cost_data: cost,
            variant_data: variant,
            material_name: $('#materialName').val(),
            // mtype_id: $('#materialTypeSelect').val(),
            reorder_level: $('#reorderLevel').val(),
            reorder_qty: $('#reorderQty').val(),
            // uom_id: $('#materialUOMSelect').val(),
            uom_id: $('#uomSelect').val(),
            material_desc: $('#material_desc').val(),
            material_id: tempID
        },
        success: function(result) {
          console.log(result);
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
          var suppl = "";
          var varr = "";
          for (var index = 0; index < result.materialvariant.length; index++) {
            suppl += '<li style="list-style-type:circle">'+result.materialvariant[index].supplier.strSupplierName+'</li>';
            varr += '<li style="list-style-type:circle">'+result.materialvariant[index].details.intVariantQty+" "+result.materialvariant[index].details.unit.strUOMName+'</li>';
          }
          table.row.add([
            result.strMaterialID,
            result.strMaterialName,
            suppl,
            varr,
            result.intReorderLevel,
            result.intReorderQty +" "+ result.unit.strUOMName,
            result.strMaterialDesc,
            ]
          ).draw(false);

          $('#materialName').val('')
          $('#measurementQty').val('')
          // $('#materialUOMSelect').val('')
          $('#material_desc').val('')
          $('#materialTypeSelect').val('')
          $('#reorderLevel').val('')
          $('#matSupplier').val('')
          $('#matVariant').val('')
          $('#uomSelect').val('')
          getDataTable.fnClearTable();
          getDataTable.fnDraw();
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
