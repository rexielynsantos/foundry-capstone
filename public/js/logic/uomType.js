$(document).ready(function(){
  var table =  $('#uomTypeTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAdduomType").click(function(){
  $("#uomType_form").find('.has-error').removeClass("has-error");
  $("#uomType_form").find('.has-success').removeClass("has-success");
  $('#uomType_form').find('.form-control-feedback').remove();
  // $("#modDept").val(null).change();
  document.getElementById("uomType_form").reset();
  document.getElementById('uomType_form').action = "{{URL::to('/maintenance/uomType-add')}}";
  urlCode =  '/maintenance/uomType-add';
})

$("#btnEdituomType").click(function(){
  $("#uomType_form").find('.has-error').removeClass("has-error");
  $("#uomType_form").find('.has-success').removeClass("has-success");
  $('#uomType_form').find('.form-control-feedback').remove()
  document.getElementById("uomType_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/uomType-edit',
      type: 'POST',
      data: {
        uomtype_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#uomTypeDesc').val(data[0].strUOMTypeDesc);
        $('#uomTypeName').val(data[0].strUOMTypeName);
        // URL OF EDIT
        tempID = data[0].strUOMTypeID;
        document.getElementById('uomType_form').action = "{{URL::to('/maintenance/uomType-update')}}";
        urlCode =  '/maintenance/uomType-update';
      },
      error: function(result) {
        alert('No ID found!');
      }
  });
})

  $(document).on('submit', '#uomType_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          uomtype_desc: $('#uomTypeDesc').val(),
          uomtype_name: $('#uomTypeName').val(),
          uomtype_id: tempID
      },
      success: function(result) {
        if(urlCode == '/maintenance/uomType-update'){
          table.rows('tr.active').remove().draw();
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>UOM Type successfully updated!</center></h4>',
            });
        }
        else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>UOM Type successfully added!</center></h4>',
            });
          }
        table.row.add([
          result[0].strUOMTypeID,
          result[0].strUOMTypeName,
          result[0].strUOMTypeDesc,
          ]
        ).draw(false);

        $('#uomTypeName').val('')
        $('#add_uomType_modal').modal('toggle');
        $('#btnEdituomType').hide()
        $('#btnDeleteuomTypes').hide()
        $('#btnAdduomType').show()
      },
      error: function(result){
        $.ajax({
            url: '/maintenance/uomType-status',
            type: 'POST',
            data: {
                uomtype_name: $('#uomTypeName').val(),
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
                      text: '<h4><center>UOM Type name already exist!</center></h4>',
                    });
                  }
                  else if(data[0].strStatus == 'Inactive'){
                    $('#UOMTypeReactivateModal').modal();
                  }
                }
            }
        });
      }
    });
  })


$('#btnDeleteuomType').click(function(){
  var tblname = $('#uomTypeTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/uomType-delete",
    data: {
        uomtype_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#uomTypeDeleteModal').modal('toggle');
      $('#btnAdduomType').show();
      $('#btnEdituomType').hide();
      $('#btnDeleteuomTypes').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>UOM Type(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnReactivateUOMType').click(function(){
  $.ajax({
    url: '/maintenance/uomType-active',
    type: 'POST',
    data: {
        uomtype_name: $('#uomTypeName').val(),
    },
    success: function(result) {
      $('#add_uomType_modal').modal('toggle');
      $('#UOMTypeReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>UOM Type successfully reactivated!</center></h4>',
        });
      table.row.add([
        result.strUOMTypeID,
        result.strUOMTypeName,
        result.strUOMTypeDesc,
        ]
      ).draw(false);
    },
    error: function(result) {
        alert('error');
    }
  });
});

});
