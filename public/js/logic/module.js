$(document).ready(function(){
  var table =  $('#modTable').DataTable();
  var urlCode = '';
  var tempID = '';

  $("#btnAddModule").click(function(){
    $("#mod_form").find('.has-error').removeClass("has-error");
    $("#mod_form").find('.has-success').removeClass("has-success");
    $('#mod_form').find('.form-control-feedback').remove();
    // $("#modDept").val(null).change();
    document.getElementById("mod_form").reset();
    document.getElementById('mod_form').action = "{{URL::to('/maintenance/module-add')}}";
    urlCode =  '/maintenance/module-add';
  });

  $("#btnEditModule").click(function(){
    // CHANGE TABLE DATANAME
    $("#mod_form").find('.has-error').removeClass("has-error");
    $("#mod_form").find('.has-success').removeClass("has-success");
    $('#mod_form').find('.form-control-feedback').remove()
    document.getElementById("mod_form").reset();
    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/module-edit',
        type: 'POST',
        data: {
          mod_id: id
        },
        success: function(data)
        {
          // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
          $('#modDept').val(data[0].strDepartmentID).change();
          $('#modDesc').val(data[0].strModuleDesc);
          $('#modName').val(data[0].strModuleName);
          // URL OF EDIT
          tempID = data[0].strModuleID;
          document.getElementById('mod_form').action = "{{URL::to('/maintenance/module-update')}}";
          urlCode =  '/maintenance/module-update';
        },
        error: function(result) {
          alert('No ID found!');
        }
    });
  })



  $(document).on('submit', '#mod_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            dept_id: $('#modDept').val(),
            mod_desc: $('#modDesc').val(),
            mod_name: $('#modName').val(),
            mod_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/module-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Module successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Module successfully added!</center></h4>',
            });
          }


          table.row.add([
            result[0].strModuleID,
            result[0].strModuleName,
            result[0].strModuleDesc,
            result[0].strDepartmentName,
            result[0].strStatus,
            ]
          ).draw(false);

          $('#add_module_modal').modal('toggle');
          $('#modDept').val('').change();
          $('#btnEditModule').hide()
          $('#btnDeleteModules').hide()
          $('#btnAddModule').show()


        },
        error: function(result){
          $.ajax({
              url: '/maintenance/module-status',
              type: 'POST',
              data: {
                  mod_name: $('#modName').val()
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
                        text: '<h4><center>Module name already exist!</center></h4>',
                      });
                    }
                    else if(data[0].strStatus == 'Inactive'){
                      $('#ModuleReactivateModal').modal();
                    }
                  }
              }
          });
        }
      });
  })

  $('#btnDeleteModule').click(function(){
    var tblname = $('#modTable').DataTable();
    var selected = tblname.rows('tr.active').data();
    var selectedArr = [];

    for(var i = 0; i < selected.length; i++)
      {
        selectedArr[i] = selected[i][0];
      }

    $.ajax({
      type: "POST",
      url: "/maintenance/module-delete",
      data: {
          mod_id: selectedArr
      },
      success: function(result) {
        tblname.rows('tr.active').remove().draw();
        $('#ModuleDeleteModal').modal('toggle');
        $('#btnAddModule').show();
        $('#btnEditModule').hide();
        $('#btnDeleteModules').hide();

        noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Module(s) successfully deactivated!</center></h4>',
        });

      },
      error: function(result) {
          alert('error');
      }
    });
  });

  $('#btnReactivateModule').click(function(){
    $.ajax({
      url: '/maintenance/module-active',
      type: 'POST',
      data: {
          mod_name: $('#modName').val()
      },
      success: function(result) {
        $('#add_module_modal').modal('toggle');
        $('#ModuleReactivateModal').modal('toggle');
        noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Module successfully reactivated!</center></h4>',
          });
          table.row.add([
            result.strModuleID,
            result.strModuleName,
            result.strModuleDesc,
            result.strDepartmentName,
            result.strStatus,
            ]
          ).draw(false);
      },
      error: function(result) {
          alert('error');
      }
    });
  });
});
