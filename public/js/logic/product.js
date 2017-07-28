$(document).ready(function(){
  var variantArr= [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#productTable').DataTable();

  function getVariant(){
    $.ajax({
        url: '/maintenance/variant-all',
        type: 'GET',
        success: function(data)
        {
          $("#variantSelect").empty();
          for(var i = 0; i < data.length; i++)
          {
             $(`<option value=`+data[i].strProductVariantID+`>`+data[i].intVariantQty+`</option>`).appendTo("#variantSelect");
          }
        }
    });
  }


  
  $("#btnAddProduct").click(function(){
    getVariant();
    //
    $("#product_form").find('.has-error').removeClass("has-error");
    $("#product_form").find('.has-success').removeClass("has-success");
    $('#product_form').find('.form-control-feedback').remove();
    document.getElementById("product_form").reset();
    document.getElementById('product_form').action = "{{URL::to('/maintenance/product-add')}}";
    urlCode =  '/maintenance/product-add';
  });

  $("#btnEditProduct").click(function(){
    getVariant();
    // CHANGE TABLE DATANAME
    $("#product_form").find('.has-error').removeClass("has-error");
    $("#product_form").find('.has-success').removeClass("has-success");
    $('#product_form').find('.form-control-feedback').remove()
    document.getElementById("product_form").reset();

    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/product-edit',
        type: 'POST',
        data: {
          product_id: id
        },
        success: function(data)
        {
          console.log(data);
          $('#productName').val(data.strProductName);
          $('#productTypeSelect').val(data.strProductTypeID).change();


            $("#variantSelect option").each(function()
              {
                for(var i = 0; i < data.productvariant.length; i++)
                {
                  if($(this).val() == data.productvariant[i].strProductVariantID){
                      $(`#variantSelect option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#variantSelect').change();
                  }
                }
              });
          $('#prodDesc').val(data.strProductDesc);

          // URL OF EDIT
          tempID = data.strProductID;
          // console.log(data.strProductID);
          document.getElementById('product_form').action = "{{URL::to('/maintenance/product-update')}}";
          urlCode =  '/maintenance/product-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#product_form', function(e){
    table.column(0).visible(false);
    $('#variantSelect :selected').each(function(i, selected){
      variantArr[i] = $(selected).val();
      // alert(stageArr[i]);
    });
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          variant_data: variantArr,
          product_name: $('#productName').val(),
          ptype_id: $('#productTypeSelect').val(),
          product_desc: $('#prodDesc').val(),
          product_id: tempID
      },
      success: function(result) {
        if(urlCode == '/maintenance/product-update'){
          table.rows('tr.active').remove().draw();
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product successfully updated!</center></h4>',
            });
        }else{
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product successfully added!</center></h4>',
            });
        }

        // LIST
        var x='';
        // console.log(result);
        // for (var index = 0; index < result.var.length; index++) {
        //   var element = result.var[index].details3.intVariantQty;
        //   x += '<li style="list-style-type:circle">'+element+'</li>'
        // }

        for (var index = 0; index < result.productvariant.length; index++) {
          var element = result.productvariant[index].details3.intVariantQty;
          x += '<li style="list-style-type:circle">'+element+'</li>'
        }


        console.log(result);
        table.row.add([
          result.strProductID,
          `<image src="/storage/product/`+result.strTempImage+`" style="width:50px;height:50px;" alt="No image"/>`,
          result.strProductName,
          result.producttype.strProductTypeName,
          x,
          result.strProductDesc
          ]
        ).draw(false);

        $('#ProdModal').modal('toggle');
        $('#hideDiv').trigger('click');
        $('#btnEditProduct').hide()
        $('#btnDeleteProducts').hide()
        $('#btnAddProduct').show()
        variantArr = [];

      },
      error: function(result){
        var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product name already exist!</center></h4>',
            });
          }
      }
    });
  });



$('#btnDeleteProduct').click(function(){
  var tblname = $('#productTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/product-delete",
    data: {
        product_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#btnAddProduct').show();
      $('#btnEditProduct').hide();
      $('#btnDeleteProducts').hide();
      $('#ProdDeleteModal').modal('toggle');
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Product(s) successfully deactivated!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnClear').click(function(){
  getVariant();
});

});
