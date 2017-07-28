$(document).ready(function(){
  var table =  $('#prodTypeTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddProductType").click(function(){
  $("#productType_form").find('.has-error').removeClass("has-error");
  $("#productType_form").find('.has-success').removeClass("has-success");
  $('#productType_form').find('.form-control-feedback').remove();
  document.getElementById("productType_form").reset();
  document.getElementById('productType_form').action = "{{URL::to('/maintenance/productType-add')}}";
  urlCode =  '/maintenance/productType-add';
})

$("#btnEditProductType").click(function(){
  $("#productType_form").find('.has-error').removeClass("has-error");
  $("#productType_form").find('.has-success').removeClass("has-success");
  $('#productType_form').find('.form-control-feedback').remove()

  document.getElementById("productType_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/productType-edit',
      type: 'POST',
      data: {
        ptype_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#prodTypeDesc').val(data[0].strProductTypeDesc);
        $('#prodTypeName').val(data[0].strProductTypeName);
        // URL OF EDIT
        tempID = data[0].strProductTypeID;
        document.getElementById('productType_form').action = "{{URL::to('/maintenance/productType-update')}}";
        urlCode =  '/maintenance/productType-update';
      },
      error: function(result) {
        alert('No ID found');
      }
  });
})

  $(document).on('submit', '#productType_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    if(loaded) return;
    // if ($('#prodTypeName').val().length > 0){
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            ptype_desc: $('#prodTypeDesc').val(),
            ptype_name: $('#prodTypeName').val(),
            ptype_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/productType-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product type successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product type successfully added!</center></h4>',
            });
          }
          table.row.add([
            result[0].strProductTypeID,
            result[0].strProductTypeName,
            result[0].strProductTypeDesc,
            ]
          ).draw(false);

          $('#prodTypeName').val('')
          $('#prodTypeDesc').val('')
          $('#add_productType_modal').modal('toggle');
          $('#btnEditProductType').hide()
          $('#btnDeleteproductTypes').hide()
          $('#btnAddProductType').show()
        },
        error: function(result){
          var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product type name already exist!</center></h4>',
            });
          }
        }
      });
    // }
  })


$('#btnDeleteproductType').click(function(){
  var tblname = $('#prodTypeTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/productType-delete",
    data: {
        ptype_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#ProdTypeDeleteModal').modal('toggle');
      $('#btnAddProductType').show();
      $('#btnEditProductType').hide();
      $('#btnDeleteproductTypes').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Product type(s) successfully deleted!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});
});
