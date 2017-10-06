$(document).ready(function(){
  var table =  $('#uomTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAdduom").click(function(){
  $("#uom_form").find('.has-error').removeClass("has-error");
  $("#uom_form").find('.has-success').removeClass("has-success");
  $('#uom_form').find('.form-control-feedback').remove();
  // $("#modDept").val(null).change();
  document.getElementById("uom_form").reset();
  document.getElementById('uom_form').action = "{{URL::to('/maintenance/uom-add')}}";
  urlCode =  '/maintenance/uom-add';
})

$("#btnEdituom").click(function(){
  $("#uom_form").find('.has-error').removeClass("has-error");
  $("#uom_form").find('.has-success').removeClass("has-success");
  $('#uom_form').find('.form-control-feedback').remove()
  document.getElementById("uom_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/uom-edit',
      type: 'POST',
      data: {
        uom_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#uomName').val(data[0].strUOMName);
        $('#uomDesc').val(data[0].strUOMDesc);
        // $('#uomTypeSelect').val(data[0].strUOMTypeID).change();
        // URL OF EDIT
        tempID = data[0].strUOMID;
        document.getElementById('uom_form').action = "{{URL::to('/maintenance/uom-update')}}";
        urlCode =  '/maintenance/uom-update';
      },
      error: function(result) {
        alert('No ID found!');
      }
  });
})

  $(document).on('submit', '#uom_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/maintenance/uom-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: urlCode,
          data: {
              id: data,
              uom_name: $('#uomName').val(),
              uom_desc: $('#uomDesc').val(),
              created_at: today,
              // uomtype_id: $('#uomTypeSelect').val(),
              uom_id: tempID
          },
          success: function(result) {
            if(urlCode == '/maintenance/uom-update'){
              table.rows('tr.active').remove().draw();
              noty({
                  type: 'success',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>Unit of Measurement successfully updated!</center></h4>',
                });
            }else{
                noty({
                  type: 'success',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>Unit of Measurement successfully added!</center></h4>',
                });
              }
              console.log(result);
            table.row.add([
              result[0].strUOMID,
              result[0].strUOMName,
              result[0].strUOMDesc,
              // result[0].unittype.strUOMTypeName,
              ]
            ).draw(false);

            $('#uomName').val('')
            $('#uomDesc').val('')
            // $('#uomTypeSelect').val('')
            $('#add_uom_modal').modal('toggle');
            $('#btnEdituom').hide()
            $('#btnDeleteuoms').hide()
            $('#btnAdduom').show()
          },
          error: function(result){
            $.ajax({
                url: '/maintenance/uom-status',
                type: 'POST',
                data: {
                    uom_name: $('#uomName').val(),
                },
                success: function(dataa)
                {
                  var errors = result.responseJSON;
                    if(errors == undefined){
                      if(dataa[0].strStatus == 'Active'){
                        noty({
                          type: 'error',
                          layout: 'bottomRight',
                          timeout: 3000,
                          text: '<h4><center>Unit name already exist!</center></h4>',
                        });
                      }
                      else if(dataa[0].strStatus == 'Inactive'){
                        $('#UOMReactivateModal').modal();
                      }
                    }
                }
            });
          }
        });
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })

  })


$('#btnDeleteuom').click(function(){
  var tblname = $('#uomTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/uom-delete",
    data: {
        uom_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#uomDeleteModal').modal('toggle');
      $('#btnAdduom').show();
      $('#btnEdituom').hide();
      $('#btnDeleteuoms').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Unit of Measurement(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});
 
$('#btnReactivateUOM').click(function(){
  $.ajax({
    url: '/maintenance/uom-active',
    type: 'POST',
    data: {
        uom_name: $('#uomName').val(),
    },
    success: function(result) {
      $('#add_uom_modal').modal('toggle');
      $('#UOMReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Unit successfully reactivated!</center></h4>',
        });
      table.row.add([
        result.strUOMID,
        result.strUOMName,
        result.strUOMDesc,
        // result.unittype.strUOMTypeName,
        ]
      ).draw(false);
    },
    error: function(result) {
        alert('error');
    }
  });
});

});
