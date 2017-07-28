$(document).ready(function(){
  var table =  $('#userRoleTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddUserRole").click(function(){
  // URL OF ADD
  $("#userRole_form").find('.has-error').removeClass("has-error");
  $("#userRole_form").find('.has-success').removeClass("has-success");
  $('#userRole_form').find('.form-control-feedback').remove();

  document.getElementById("userRole_form").reset();
  document.getElementById('userRole_form').action = "{{URL::to('/maintenance/userRole-add')}}";
  urlCode =  '/maintenance/userRole-add';
})

$("#btnEditUserRole").click(function(){

  $("#userRole_form").find('.has-error').removeClass("has-error");
  $("#userRole_form").find('.has-success').removeClass("has-success");
  $('#userRole_form').find('.form-control-feedback').remove();
  document.getElementById("userRole_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/userRole-edit',
      type: 'POST',
      data: {
        role_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#userRoleDesc').val(data[0].strUserActionDesc);
        $('#userRoleName').val(data[0].strUserActionName);
        $('#modSelect').val(data[0].strModuleID).change();
        // URL OF EDIT
        tempID = data[0].strUserActionID;
        document.getElementById('userRole_form').action = "{{URL::to('/maintenance/userRole-update')}}";
        urlCode =  '/maintenance/userRole-update';
      },
      error: function(result) {
        alert('No ID found');
      }
  });
})


  $(document).on('submit', '#userRole_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          role_desc: $('#userRoleDesc').val(),
          role_name: $('#userRoleName').val(),
          mod_id: $('#modSelect').val(),
          role_id: tempID
      },
      success: function(result) {
        if(urlCode == '/maintenance/userRole-update'){
          table.rows('tr.active').remove().draw();
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Role successfully updated!</center></h4>',
          });
        }else{
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Role successfully added!</center></h4>',
          });
        }
        table.row.add([
          result[0].strUserActionID,
          result[0].strUserActionName,
          result[0].strModuleName,
          result[0].strUserActionDesc,
          ]
        ).draw(false);

        $('#userRoleName').val('')
        $('#userRoleDesc').val('')
        $('#modSelect').val(null).change();
        $('#add_userRole_modal').modal('toggle');
        $('#btnEditUserRole').hide()
        $('#btnDeleteRole').hide()
        $('#btnAddUserRole').show();
      },
      error: function(result){
        $.ajax({
            url: '/maintenance/userRole-status',
            type: 'POST',
            data: {
                role_name: $('#userRoleName').val()
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
                      text: '<h4><center>User Role already exist!</center></h4>',
                    });
                  }
                  else if(data[0].strStatus == 'Inactive'){
                    $('#UserRoleReactivateModal').modal();
                  }
                }
            }
        });
      }
    });

  });



$('#btnDeleteUserRole').click(function(){
  var tblname = $('#userRoleTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/userRole-delete",
    data: {
        role_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#RoleDeleteModal').modal('toggle');
      $('#btnAddUserRole').show();
      $('#btnEditUserRole').hide();
      $('#btnDeleteRole').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Role(s) successfully deactivated!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnReactivateUserRole').click(function(){
  $.ajax({
    url: '/maintenance/userRole-active',
    type: 'POST',
    data: {
        role_name: $('#userRoleName').val()
    },
    success: function(result) {
      $('#add_userRole_modal').modal('toggle');
      $('#UserRoleReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>User Role successfully reactivated!</center></h4>',
        });
        table.row.add([
          result.strUserActionID,
          result.strUserActionName,
          result.strModuleName,
          result.strUserActionDesc,
          ]
        ).draw(false);
    },
    error: function(result) {
        alert('error');
    }
  });
});

});
