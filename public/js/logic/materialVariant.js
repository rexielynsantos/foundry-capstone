$(document).ready(function(){
  var urlCode = '';
  var tempID = '';
  var table =  $('#matVariantTable').DataTable();

  $("#btnAddMaterialVariant").click(function(){
    $("#mvariant_form").find('.has-error').removeClass("has-error");
    $("#mvariant_form").find('.has-success').removeClass("has-success");
    $('#mvariant_form').find('.form-control-feedback').remove();
    document.getElementById("mvariant_form").reset();
    document.getElementById('mvariant_form').action = "{{URL::to('/maintenance/materialVariant-add')}}";
    urlCode =  '/maintenance/materialVariant-add';
  });

  $("#btnEditMaterialVariant").click(function(){

    $("#mvariant_form").find('.has-error').removeClass("has-error");
    $("#mvariant_form").find('.has-success').removeClass("has-success");
    $('#mvariant_form').find('.form-control-feedback').remove()
    document.getElementById("mvariant_form").reset();

    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/materialVariant-edit',
        type: 'POST',
        data: {
          variant_id: id
        },
        success: function(data)
        {
          console.log(data);
          $('#variantQty').val(data.variant.intVariantQty);
          $('#variantUnit').val(data.variant.strUOMID).change();
          $('#variantDesc').val(data.variant.strMaterialVariantDesc);
          // URL OF EDIT
          tempID = data.variant.strMaterialVariantID;

          document.getElementById('mvariant_form').action = "{{URL::to('/maintenance/materialVariant-update')}}";
          urlCode =  '/maintenance/materialVariant-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#mvariant_form', function(e){
    table.column(0).visible(false);
    // $('#variantType :selected').each(function(i, selected){
    //   typeArr[i] = $(selected).val();
    //   console.log(typeArr[i]);
    // });
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          // type_data: typeArr,
          variant_qty: $('#variantQty').val(),
          variant_uomid: $('#variantUnit').val(),
          variant_desc: $('#variantDesc').val(),
          variant_id: tempID
      },
      success: function(result) {
        console.log(result);
        if(urlCode == '/maintenance/materialVariant-update'){
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

       // var x='';
       //  for (var index = 0; index < result.producttype.length; index++) {
       //    var element = result.producttype[index].details.strProductTypeName;
       //    x += '<li style="list-style-type:circle">'+element+'</li>'
       //  }

        table.row.add([
          result.strMaterialVariantID,
          result.intVariantQty +" "+ result.unit.strUOMName,
          // x,
          result.strMaterialVariantDesc,
          ]
        ).draw(false);

        $('#varModal').modal('toggle');
        $('#btnEditMaterialVariant').hide()
        $('#btnDeleteMaterialVariants').hide()
        $('#btnAddMaterialVariant').show()
        // typeArr = [];

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
    });
  });



$('#btnDeleteMaterialVariant').click(function(){
  var tblname = $('#matVariantTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/materialVariant-delete",
    data: {
        variant_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#btnAddMaterialVariant').show();
      $('#btnEditMaterialVariant').hide();
      $('#btnDeleteMaterialVariants').hide();
      $('#MatVariantDeleteModal').modal('toggle');
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
  $('#variantUnit :selected').each(function(i, selected){
    $(selected).attr('selected', false);
    $('#variantUnit').change();
  });
});

});
