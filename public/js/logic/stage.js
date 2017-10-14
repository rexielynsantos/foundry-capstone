$(document).ready(function(){
  var substageArr= [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#stageTable').DataTable();

  function getSubstage(){
    $.ajax({
        url: '/maintenance/substage-all',
        type: 'GET',
        success: function(data)
        {
          $("#stageSubstage").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strSubStageID+`>`+data[i].strSubStageName+`</option>`).appendTo("#stageSubstage");
          }
        }
    });
  }

  $("#btnAddStage").click(function(){
    getSubstage();
    $("#stage_form").find('.has-error').removeClass("has-error");
    $("#stage_form").find('.has-success').removeClass("has-success");
    $('#stage_form').find('.form-control-feedback').remove();
    document.getElementById("stage_form").reset();
    document.getElementById('stage_form').action = "{{URL::to('/maintenance/stage-add')}}";
    urlCode =  '/maintenance/stage-add';
  });

  $("#btnEditStage").click(function(){
    getSubstage();
    // CHANGE TABLE DATANAME
    $("#stage_form").find('.has-error').removeClass("has-error");
    $("#stage_form").find('.has-success').removeClass("has-success");
    $('#stage_form').find('.form-control-feedback').remove()
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
          console.log(data);
          $('#stageName').val(data.strStageName);
          $('#timeRequired').val(data[0].dbltimeRequired)
          $('#stageDesc').val(data.strStageDesc);

            $("#stageSubstage option").each(function()
              {
                for(var i = 0; i < data.substage.length; i++)
                {
                  if($(this).val() == data.substage[i].strSubStageID){
                      $(`#stageSubstage option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#stageSubstage').change();
                  }
                }
              });


          // URL OF EDIT
          tempID = data.strStageID;
          document.getElementById('stage_form').action = "{{URL::to('/maintenance/stage-update')}}";
          urlCode =  '/maintenance/stage-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#stage_form', function(e){
    table.column(0).visible(false);
    $('#stageSubstage :selected').each(function(i, selected){
      substageArr[i] = $(selected).val();
    });
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/maintenance/stage-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: urlCode,
          data: {
              id: data,
              substage_data: substageArr,
              stage_name: $('#stageName').val(),
              stage_desc: $('#stageDesc').val(),
              created_at: today,
              stage_id: tempID,
              process_time: $('#timeRequired').val(),
          },
          success: function(result) {
            console.log(result);
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

            //para mag fit sa data table
            var x='';
            for (var index = 0; index < result.substage.length; index++) {
              var element = result.substage[index].details1.strSubStageName;
              x += '<li style="list-style-type:circle">'+element+'</li>'
            }


            table.row.add([
              result.strStageID,
              result.strStageName,
              x,
              result.dbltimeRequired,
              result.strStageDesc,
              ]
            ).draw(false);

            substageArr = [];

            $('#Stagemodal').modal('toggle');
            $('#btnEditStage').hide()
            $('#btnDeleteStages').hide()
            $('#btnAddStage').show()

          },
          error: function(result){
            $.ajax({
                url: '/maintenance/stage-status',
                type: 'POST',
                data: {
                    stage_name: $('#stageName').val()
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
                          text: '<h4><center>Stage name already exist!</center></h4>',
                        });
                      }
                      else if(data[0].strStatus == 'Inactive'){
                        $('#StageReactivateModal').modal();
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
  });



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
      $('#btnAddStage').show();
      $('#btnEditStage').hide();
      $('#btnDeleteStages').hide();
      $('#StageDeleteModal').modal('toggle');
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Stage(s) successfully deactivated!</center></h4>',
        });

    },
    error: function(result) {
        alert('May mali');
    }
  });
});

$('#btnReactivateStage').click(function(){
  $.ajax({
    url: '/maintenance/stage-active',
    type: 'POST',
    data: {
        stage_name: $('#stageName').val()
    },
    success: function(result) {
      $('#Stagemodal').modal('toggle');
      $('#StageReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Stage successfully reactivated!</center></h4>',
        });
      var x='';
      for (var index = 0; index < result.substage.length; index++) {
        var element = result.substage[index].details1.strSubStageName;
        x += '<li style="list-style-type:circle">'+element+'</li>'
      }

      table.row.add([
        result.strStageID,
        result.strStageName,
        x,
        result.strStageDesc,
        ]
      ).draw(false);
    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnClear').click(function(){
  getSubstage();
});

});
