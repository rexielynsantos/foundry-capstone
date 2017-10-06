$(document).ready(function(){
  var table =  $('#jobTitleTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddJob").click(function(){
  $("#JobTitle_form").find('.has-error').removeClass("has-error");
  $("#JobTitle_form").find('.has-success').removeClass("has-success");
  $('#JobTitle_form').find('.form-control-feedback').remove();
  // $("#modDept").val(null).change();
  document.getElementById("JobTitle_form").reset();
  document.getElementById('JobTitle_form').action = "{{URL::to('/maintenance/jobTitle-add')}}";
  urlCode =  '/maintenance/jobTitle-add';
})

$("#btnEditJob").click(function(){
  $("#JobTitle_form").find('.has-error').removeClass("has-error");
  $("#JobTitle_form").find('.has-success').removeClass("has-success");
  $('#JobTitle_form').find('.form-control-feedback').remove()
  document.getElementById("JobTitle_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/jobTitle-edit',
      type: 'POST',
      data: {
        jobtitle_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
       $('#JobTitleDesc').val(data.strJobTitleDesc);
        $('#JobTitleName').val(data.strJobTitleName);
        // URL OF EDIT
        tempID = data.strJobTitleID;
        document.getElementById('JobTitle_form').action = "{{URL::to('/maintenance/jobTitle-update')}}";
        urlCode =  '/maintenance/jobTitle-update';
      },
      error: function(result) {
        alert('No ID found!');
      }
  });
})


  $(document).on('submit', '#JobTitle_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/maintenance/jobTitle-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: urlCode,
          data: {
              id: data,
              jobtitle_desc: $('#JobTitleDesc').val(),
              jobtitle_name: $('#JobTitleName').val(),
              created_at: today,
              jobtitle_id: tempID
          },
          success: function(result) {
            if(urlCode == '/maintenance/jobTitle-update'){
              table.rows('tr.active').remove().draw();
              noty({
                type: 'success',
                layout: 'bottomRight',
                timeout: 3000,
                text: '<h4><center>Job Title successfully updated!</center></h4>',
              });
            }
            else{
              noty({
                type: 'success',
                layout: 'bottomRight',
                timeout: 3000,
                text: '<h4><center>Job Title successfully added!</center></h4>',
              });
            }
            table.row.add([
              result.strJobTitleID,
              result.strJobTitleName,
              result.strJobTitleDesc,
              ]
            ).draw(false);

            $('#JobTitleName').val('')
            $('#JobTitleDesc').val('')
            $('#JobTitleModal').modal('toggle');
            $('#btnEditJob').hide()
            $('#btnDeleteJo').hide()
            $('#btnAddJob').show()
          },
          error: function(result){
            $.ajax({
                url: '/maintenance/jobTitle-status',
                type: 'POST',
                data: {
                    jobtitle_name: $('#JobTitleName').val()
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
                          text: '<h4><center>Job Title already exist!</center></h4>',
                        });
                      }
                      else if(data[0].strStatus == 'Inactive'){
                        $('#JobTitleReactivateModal').modal();
                      }
                    }
                }
            });
          }
        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
  })


$('#btnDeleteJob').click(function(){
  var tblname = $('#jobTitleTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/jobTitle-delete",
    data: {
        jobtitle_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#JobTitleDeleteModal').modal('toggle');
      $('#btnAddJob').show();
      $('#btnEditJob').hide();
      $('#btnDeleteJo').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Job Title(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnReactivateJobTitle').click(function(){
  $.ajax({
    url: '/maintenance/jobTitle-active',
    type: 'POST',
    data: {
        jobtitle_name: $('#JobTitleName').val()
    },
    success: function(result) {
      $('#JobTitleModal').modal('toggle');
      $('#JobTitleReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Job Title successfully reactivated!</center></h4>',
        });
        table.row.add([
          result.strJobTitleID,
          result.strJobTitleName,
          result.strJobTitleDesc,
          ]
        ).draw(false);
    },
    error: function(result) {
        alert('error');
    }
  });
});

});
