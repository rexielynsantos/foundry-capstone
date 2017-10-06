$(document).ready(function(){
  var typeArr= [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#prodVariantTable').DataTable();

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

  $("#btnAddProductVariant").click(function(){
    getType();
    //
    $("#variant_form").find('.has-error').removeClass("has-error");
    $("#variant_form").find('.has-success').removeClass("has-success");
    $('#variant_form').find('.form-control-feedback').remove();
    document.getElementById("variant_form").reset();
    document.getElementById('variant_form').action = "{{URL::to('/maintenance/productVariant-add')}}";
    urlCode =  '/maintenance/productVariant-add';
  });

  $("#btnEditProductVariant").click(function(){
    getType();
    // CHANGE TABLE DATANAME
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
        success: function(data)
        {
          console.log(data);
          $('#variantQty').val(data.variant.intVariantQty);
          $('#variantDesc').val(data.variant.strProductVariantDesc);
          $('#variantUnit').val(data.variant.strUOMID).change();

            $("#variantType option").each(function()
              {
                for(var i = 0; i < data.type.length; i++)
                {
                  if($(this).val() == data.type[i].strProductTypeID){
                      $(`#variantType option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#variantType').change();
                  }
                }
              });


          // URL OF EDIT
          tempID = data.variant.strProductVariantID;

          document.getElementById('variant_form').action = "{{URL::to('/maintenance/productVariant-update')}}";
          urlCode =  '/maintenance/productVariant-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#variant_form', function(e){
    table.column(0).visible(false);
    $('#variantType :selected').each(function(i, selected){
      typeArr[i] = $(selected).val();
      console.log(typeArr[i]);
    });
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/maintenance/productVariant-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: urlCode,
          data: {
              id: data,
              type_data: typeArr,
              variant_qty: $('#variantQty').val(),
              variant_uomid: $('#variantUnit').val(),
              variant_desc: $('#variantDesc').val(),
              created_at: today,
              variant_id: tempID
          },
          success: function(result) {
            // console.log(result);
            if(urlCode == '/maintenance/productVariant-update'){
              table.rows('tr.active').remove().draw();
              noty({
                  type: 'success',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>Product Variant successfully updated!</center></h4>',
                });
            }else{
              noty({
                  type: 'success',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>Product Variant successfully added!</center></h4>',
                });
            }

           var x='';
            for (var index = 0; index < result.producttype.length; index++) {
              var element = result.producttype[index].details.strProductTypeName;
              x += '<li style="list-style-type:circle">'+element+'</li>'
            }

            table.row.add([
              result.strProductVariantID,
              result.intVariantQty +" "+ result.unit.strUOMName,
              x,
              result.strProductVariantDesc,
              ]
            ).draw(false);

            $('#varModal').modal('toggle');
            $('#btnEditProductVariant').hide()
            $('#btnDeleteProductVariants').hide()
            $('#btnAddProductVariant').show()
            typeArr = [];

          },
          error: function(result){
            var errors = result.responseJSON;
              if(errors == undefined){
                noty({
                  type: 'error',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>Variant already exists!</center></h4>',
                });
              }
          }
        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
    
  });



$('#btnDeleteProductVariant').click(function(){
  var tblname = $('#prodVariantTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/productVariant-delete",
    data: {
        variant_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#btnAddProductVariant').show();
      $('#btnEditProductVariant').hide();
      $('#btnDeleteProductVariants').hide();
      $('#ProdVariantDeleteModal').modal('toggle');
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Variant(s) successfully deactivated!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnClear').click(function(){
  getType();
  $('#variantUnit :selected').each(function(i, selected){
    $(selected).attr('selected', false);
    $('#variantUnit').change();
  });
});

});
