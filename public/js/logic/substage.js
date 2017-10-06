$(document).ready(function(){
  var table =  $('#substgTable').DataTable();
  var urlCode = '';
  var tempID = '';

  $("#btnAddSubstg").click(function(){
    // URL OF ADD
    $("#substg_form").find('.has-error').removeClass("has-error");
    $("#substg_form").find('.has-success').removeClass("has-success");
    $('#substg_form').find('.form-control-feedback').remove();
    document.getElementById("substg_form").reset();
    document.getElementById('substg_form').action = "{{URL::to('/maintenance/substage-add')}}";
    urlCode =  '/maintenance/substage-add';
  });

$("#btnEditSubstg").click(function(){
  // CHANGE TABLE DATANAME
  $("#substg_form").find('.has-error').removeClass("has-error");
  $("#substg_form").find('.has-success').removeClass("has-success");
  $('#substg_form').find('.form-control-feedback').remove()
  document.getElementById("substg_form").reset();

  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/substage-edit',
      type: 'POST',
      data: {
        substage_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#substgName').val(data[0].strSubStageName);
        $('#timeRequired').val(data[0].dbltimeRequired)
        $('#substgDesc').val(data[0].strSubStageDesc);
        // console.log(data);
        // URL OF EDIT
        tempID = data[0].strSubStageID;
        document.getElementById('substg_form').action = "{{URL::to('/maintenance/substage-update')}}";
        urlCode =  '/maintenance/substage-update';
      },
      error: function(result) {
        alert('EDIT_ERROR');
      }
  });
})

  $(document).on('submit', '#substg_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/maintenance/substage-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            id: data,
            substage_name: $('#substgName').val(),
            substage_desc: $('#substgDesc').val(),
            created_at: today,
            substage_id: tempID,
            process_time: $('#timeRequired').val()
        },
        success: function(result) {
          console.log(result);
          if(urlCode == '/maintenance/substage-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Substage successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Substage successfully added!</center></h4>',
            });
          }
          table.row.add([
            result[0].strSubStageID,
            result[0].strSubStageName,
            result[0].dbltimeRequired,
            result[0].strSubStageDesc,
            ]
          ).draw(false);

          $('#substgName').val('')
          $('#add_substg_modal').modal('toggle');
          $('#btnEditSubstg').hide()
          $('#btnDeleteSubstge').hide()
          $('#btnAddSubstg').show()
        },
        error: function(result){
          $.ajax({
              url: '/maintenance/substage-status',
              type: 'POST',
              data: {
                  substage_name: $('#substgName').val()
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
                      text: '<h4><center>Substage already exist!</center></h4>',
                    });
                  }
                  else if(data[0].strStatus == 'Inactive'){
                    $('#SubstageReactivateModal').modal();
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


  $('#btnDeleteSubstg').click(function(){
    var tblname = $('#substgTable').DataTable();
    var selected = tblname.rows('tr.active').data();
    var selectedArr = [];

    for(var i = 0; i < selected.length; i++)
      {
        selectedArr[i] = selected[i][0];
      }

    $.ajax({
      type: "POST",
      url: "/maintenance/substage-delete",
      data: {
          substage_id: selectedArr
      },
      success: function(result) {
        tblname.rows('tr.active').remove().draw();
        $('#delete_substg_modal').modal('toggle');
        $('#btnAddSubstg').show();
        $('#btnEditSubstg').hide();
        $('#btnDeleteSubstge').hide();

        noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Substage(s) successfully deactivated!</center></h4>',
        });

      },
      error: function(result) {
          alert('error');
      }
    });
  });

  $('#btnReactivateSubstage').click(function(){
    $.ajax({
      url: '/maintenance/substage-active',
      type: 'POST',
      data: {
          substage_name: $('#substgName').val()
      },
      success: function(result) {
        $('#add_substg_modal').modal('toggle');
        $('#SubstageReactivateModal').modal('toggle');
        noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Substage successfully reactivated!</center></h4>',
          });
        table.row.add([
          result.strSubStageID,
          result.strSubStageName,
          result.strSubStageDesc,
          ]
        ).draw(false);
      },
      error: function(result) {
          alert('error');
      }
    });
  });

});
