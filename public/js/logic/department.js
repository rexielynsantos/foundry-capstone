$(document).ready(function(){
  var table =  $('#deptTable').DataTable();
  var urlCode = '';
  var tempID = '';

  $("#btnAddDept").click(function(){
    $("#Dept_form").find('.has-error').removeClass("has-error");
    $("#Dept_form").find('.has-success').removeClass("has-success");
    $('#Dept_form').find('.form-control-feedback').remove();
    document.getElementById("Dept_form").reset();
    document.getElementById('Dept_form').action = "{{URL::to('/maintenance/department-add')}}";
    urlCode =  '/maintenance/department-add';
  });


  $("#btnEditDept").click(function(){
    // CHANGE TABLE DATANAME
    $("#Dept_form").find('.has-error').removeClass("has-error");
    $("#Dept_form").find('.has-success').removeClass("has-success");
    $('#Dept_form').find('.form-control-feedback').remove()

    document.getElementById("Dept_form").reset();
    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/department-edit',
        type: 'POST',
        data: {
          department_id: id
        },
        success: function(data)
        {
          // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
          $('#DeptDesc').val(data[0].strDepartmentDesc);
          $('#DeptName').val(data[0].strDepartmentName);
          // URL OF EDIT
          tempID = data[0].strDepartmentID;
          document.getElementById('Dept_form').action = "{{URL::to('/maintenance/department-update')}}";
          urlCode =  '/maintenance/department-update';
        },
        error: function(result) {
          alert('No ID found');
        }
    });
  })


  $(document).on('submit', '#Dept_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            department_desc: $('#DeptDesc').val(),
            department_name: $('#DeptName').val(),
            department_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/department-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Department successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Department successfully added!</center></h4>',
            });
          }
          table.row.add([
            result[0].strDepartmentID,
            result[0].strDepartmentName,
            result[0].strDepartmentDesc,
            ]
          ).draw(false);

          $('#DeptName').val('');
          $('#DeptModal').modal('toggle');
          $('#btnEditDept').hide();
          $('#btnDeleteDeprt').hide();
          $('#btnAddDept').show();
        },
        error: function(result){
          $.ajax({
              url: '/maintenance/department-status',
              type: 'POST',
              data: {
                  department_name: $('#DeptName').val()
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
                        text: '<h4><center>Department name already exist!</center></h4>',
                      });
                    }
                    else if(data[0].strStatus == 'Inactive'){
                      $('#DeptReactivateModal').modal();
                    }
                  }
              }
          });
        }
      });
  })



$('#btnDeleteDept').click(function(){
  var tblname = $('#deptTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/department-delete",
    data: {
        department_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#DeptDeleteModal').modal('toggle');
      $('#btnAddDept').show();
      $('#btnEditDept').hide();
      $('#btnDeleteDeprt').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Department(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnReactivateDept').click(function(){
  $.ajax({
    url: '/maintenance/department-active',
    type: 'POST',
    data: {
        department_name: $('#DeptName').val()
    },
    success: function(result) {
      $('#DeptModal').modal('toggle');
      $('#DeptReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Department successfully reactivated!</center></h4>',
        });
        table.row.add([
          result.strDepartmentID,
          result.strDepartmentName,
          result.strDepartmentDesc,
          ]
        ).draw(false);
    },
    error: function(result) {
        alert('error');
    }
  });
});


});
