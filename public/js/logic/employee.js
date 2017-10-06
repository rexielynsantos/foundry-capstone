$(document).ready(function(){
  var table =  $('#empTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddEmp").click(function(){
  $("#Emp_form").find('.has-error').removeClass("has-error");
  $("#Emp_form").find('.has-success').removeClass("has-success");
  $('#Emp_form').find('.form-control-feedback').remove();
  // $("#modDept").val(null).change();
  document.getElementById("Emp_form").reset();
  $.ajax({
      type: "GET",
      url: '/maintenance/employee-max',
      success: function(data){
        console.log(data);
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $('#emp_id').val(data);
        $('#created_at').val(today);
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
  document.getElementById('Emp_form').action = "{{URL::to('/maintenance/employee-add')}}";
  urlCode =  '/maintenance/employee-add';
})

$("#btnEditEmp").click(function(){
  // CHANGE TABLE DATANAME
  $("#Emp_form").find('.has-error').removeClass("has-error");
  $("#Emp_form").find('.has-success').removeClass("has-success");
  $('#Emp_form').find('.form-control-feedback').remove();
  document.getElementById("Emp_form").reset();

  var tblData = table.row('tr.active').data();
  var id = tblData[1];
  $.ajax({
      url: '/maintenance/employee-edit',
      type: 'POST',
      data: {
        emp_id: id
      },
      success: function(data)
      {
        // console.log(data);

        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#emp_id').val(data.strEmployeeID);
        $('#emp_first').val(data.strEmployeeFirst);
        $("#emp_middle").val(data.strEmployeeMiddle);
        $("#emp_last").val(data.strEmployeeLast);
        $("#jobtitle_id").val(data.strJobTitleID).change();
        $("#dept_id").val(data.strDepartmentID).change();
        $("#emp_contact").val(data.strEmployeeContact);
        $("#emp_email").val(data.strEmployeeEmail);
        // $("#emp_hiring").val(data[0].datHiringDate);

        tempID = data.strEmployeeID;
        document.getElementById('Emp_form').action = "{{URL::to('/maintenance/employee-update')}}";
        urlCode =  '/maintenance/employee-update';
      },
      error: function(result) {
        alert('EDIT_ERROR');
      }
  });
})


  $(document).on('submit', '#Emp_form', function(e){
    e.preventDefault();
    var form = $(this);
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }

    var formAction = form.attr('action');
    $.ajax({
      type    : "POST",
      url     : urlCode,
      data        : formdata ? formdata : form.serialize(),
      cache       : false,
      contentType : false,
      processData : false,
      success : function(result) {
        if(urlCode == '/maintenance/employee-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Employee successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Employee successfully added!</center></h4>',
            });
          }
        console.log(result);
        table.row.add([
          `<image src="/storage/employee/`+result.strTempImage+`" style="width:50px;height:50px;" alt="No image"/>`,
          result.strEmployeeID,//EXAMPLE FOR VAR CONST
          result.strEmployeeLast+","+result.strEmployeeFirst+" "+result.strEmployeeMiddle,
          result.strEmployeeContact,
          result.strEmployeeEmail,
          result.jobtitle.strJobTitleName,//NAME ANG DIDISPLAY NOT ID
          result.department.strDepartmentName,
          ]
        ).draw(false);
        // RESET NA LNG UNG FORM PARA MAWALA UNG VALUE SA INPUT FIELDS
        document.getElementById("Emp_form").reset();
        $('#EmpModal').modal('toggle');
        $('#btnEditEmp').hide()
        $('#btnDeleteEmpl').hide()
        $('#btnAddEmp').show()

      },
      error: function(result){
        var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Employee name already exist!</center></h4>',
            });
          }
      }
    });
  })



  $('#btnDeleteEmp').click(function(){
    var tblname = $('#empTable').DataTable();
    var selected = tblname.rows('tr.active').data();
    var selectedArr = [];

    for(var i = 0; i < selected.length; i++)
      {
        selectedArr[i] = selected[i][1];
      }

    $.ajax({
      type: "POST",
      url: "/maintenance/employee-delete",
      data: {
          emp_id: selectedArr
      },
      success: function(result) {
        tblname.rows('tr.active').remove().draw();
        $('#EmpDeleteModal').modal('toggle');
        $('#btnAddEmp').show();
        $('#btnEditEmp').hide();
        $('#btnDeleteEmpl').hide();

        noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Employee(s) successfully deactivated!</center></h4>',
        });

      },
      error: function(result) {
          alert('error');
      }
    });
  });

});
