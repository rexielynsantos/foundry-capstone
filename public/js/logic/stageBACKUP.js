$(document).ready(function(){
  var table =  $('#stageTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddStage").click(function(){
  $("#stage_form").find('.has-error').removeClass("has-error");
  $("#stage_form").find('.has-success').removeClass("has-success");
  $('#stage_form').find('.form-control-feedback').remove();

  document.getElementById("stage_form").reset();
  document.getElementById('stage_form').action = "{{URL::to('/maintenance/stage-add')}}";
  urlCode =  '/maintenance/stage-add';
})

$("#btnEditStage").click(function(){
  // CHANGE TABLE DATANAME
  $("#stage_form").find('.has-error').removeClass("has-error");
  $("#stage_form").find('.has-success').removeClass("has-success");
  $('#stage_form').find('.form-control-feedback').remove();
  document.getElementById("stage_form").reset();

  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/stage-edit',
      type: 'POST',
      data: {
        stage_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#stageName').val(data[0].strStageName);
        $('#stageDesc').val(data[0].strStageDesc);
        // URL OF EDIT
        tempID = data[0].strStageID;
        document.getElementById('stage_form').action = "{{URL::to('/maintenance/stage-update')}}";
        urlCode =  '/maintenance/stage-update';
      },
      error: function(result) {
        alert('EDIT_ERROR');
      }
  });
})

  $(document).on('submit', '#stage_form', function(e){
    var table =  $('#stageTable').DataTable();
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          stage_name: $('#stageName').val(),
          stage_desc: $('#stageDesc').val(),
          stage_id: tempID
      },
      success: function(result) {
        if(urlCode == '/maintenance/stage-update'){
          table.rows('tr.active').remove().draw();
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Stage successfully updated!</center></h4>',
            });
        }else{
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Stage successfully added!</center></h4>',
            });
        }
        table.row.add([
          result[0].strStageID,
          result[0].strStageName,
          result[0].strStageDesc,
          ]
        ).draw(false);

        $('#stageName').val('')
        $('#stageDesc').val('')
        $('#Stagemodal').modal('toggle');
        $('#btnEditStage').hide()
        $('#btnDeleteStages').hide()
        $('#btnAddStage').show()

      },
      error: function(result){
        var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Stage already exist!</center></h4>',
            });
          }
      }
    });
  })


$('#btnDeleteStage').click(function(){
  var tblname = $('#stageTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/stage-delete",
    data: {
        stage_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#StageDeleteModal').modal('toggle');
      $('#btnAddStage').show();
      $('#btnEditStage').hide();
      $('#btnDeleteStages').hide();
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Stage(s) successfully deleted!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});

});
