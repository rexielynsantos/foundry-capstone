$(document).ready(function(){
  var typeArr = [];
  var urlCode = '';
  var tempID = '';
  var table = $('#prodVariantTable').DataTable();

  function getType(){
    $.ajax({
        url: '/maintenance/type-all',
        type: 'GET',
        success: function(data)
        {
          $("#variantType").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strProductTypeID+`>`+data[i].strProductTypeName+`</option>`).appendTo("#variantType");
          }
        }
    });
  }

  $('#btnAddProductVariant').click(function(){
      getType();
      $("#variant_form").find('.has-error').removeClass("has-error");
      $("#variant_form").find('.has-success').removeClass("has-success");
      $('#variant_form').find('.form-control-feedback').remove();
      document.getElementById("variant_form").reset();
      document.getElementById('variant_form').action = "{{URL::to('/maintenance/productVariant-add')}}";
      urlCode =  '/maintenance/productVariant-add';
  });

  $('#btnEditProductVariant').click(function(){
    getType();
    $("#variant_form").find('.has-error').removeClass("has-error");
    $("#variant_form").find('.has-success').removeClass("has-success");
    $('#variant_form').find('.form-control-feedback').remove()
    document.getElementById("variant_form").reset();

    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
      url: '/maintenance/productVariant-edit',
      type: 'POST',
      data: {
        variant_id: id
      },
      success: function(data){
        console.log(data);
        $('#variantQty').val(data.variant.intVariantQty);
        $('#variantDesc').val(data.variant.strProductVariantDesc);
        $('#variantUnit').val(data.variant.strUOMID).change();
        $('#variantType option').each(function(){
          for(var i = 0; i < data.type.length; i++){
            if($(this).val() == data.type[i].strProductTypeID){
              $(`#variantType option [value = ]` + $(this).val() + `]`).attr('selected', true);
              $('#variantType').change();
            }
          }
        });

        tempID = data.variant.strProductVariantID;
        document.getElementById('variant_form').action = "{{URL::to('/maintenance/productVariant-update')}}";
        urlCode = '/maintenance/productVariant-update';
      },
      error: function(result){
        alert('EDIT_ERROR');
      }
    });
  });

  $(document).on('submit', '#variant_form', function(){
    table.column(0).visible(false);
    $('#variantType :selected').each(function(i, selected){
      typeArr[i] = $(selected).val();
    });
    e.preventDefault();
    $.ajax({
      typeL 'POST',
      url: urlCode,
      data: {
        type_data: typeArr,
        variant_qty: $('#variantQty').val(),
        variant_uomid: $('#variantUnit').val(),
        variant_desc: $('#variantDesc').val(),
        variant_id = tempID
      },
      success: function(result){
        if(urlCode == '/maintenance/productVariant-update'){
          table.rows('tr.active').remove().draw();
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Product Variant successfully updated!</center></h4>',
          });
        }
        else{
          noty({
            ype: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Product Variant successfully added!</center></h4>',
          });
        }

        table.row.add([
          result.strProductVariantID,
          result.intVariantQty+result.strUOMName,
          result.strProductVariantDesc,
        ]).draw(false);

        typeArr = [];
        $('#add_variant_modal').modal('toggle');
        $('#btnEditProductVariant').hide()
        $('#btnDeleteProductVariants').hide()
        $('#btnAddProductVariant').show()
      },

      error: function(result){
        var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product Variant already exist!</center></h4>',
            });
          }
      }
    });
  });

  $('#btnDeleteProductVariant').click(function(){
    var tblname = $('#prodVariantTable').DataTable();
    var selected = tblname.rows('tr.active').data();
    var selectedArr = [];

    for(var i = 0; i < selected.length; i++){
      selectedArr[i] = selected[i][0];
    }

    $.ajax({
      type: "POST",
      url: "/maintenance/productVariant-delete",
      data: {
        variant_id: selectedArr
      },
      success: function(result){
        tblname.rows('tr.active').remove().draw();
        $('#btnAddProductVariant').show();
        $('#btnEditProductVariant').hide();
        $('#btnDeleteProductVariants').hide();
        $('#add_variant_modal').modal('toggle');
        noty({
            type: 'error',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Product Variant(s) successfully deleted!</center></h4>',
          });
      },
      error: function(result){
        alert('DELETE_ERROR');
      }
    });
  });

  $('#btnClear').click(function(){
    getType();
  });

});
