$(document).ready(function(){
  var substageArr= [];
  var urlCode = '';
  var tempID = '';
  var btnDelete = '#btnDelete';

  var table =  $('#stageTable').DataTable();
  var tblsubstage =  $('#substage_table').DataTable({"paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": true,"responsive": true,"cache": false,"scrollY": "150px"});

//Add material on table variance
  $('#stageSubstageAdd').click(function(){
    id = $('#stageSubstage option:selected').val();
    text = $('#stageSubstage option:selected').text();

    if(id != null){
      $('#stageSubstage option:selected').remove();
      tblsubstage.row.add([id,text,
        `
        <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
        `
        ]
      ).draw(false);
      $("#stageSubstage").val(null).change();
    }
  });


  $('#substage_table tbody').on( 'click', btnDelete, function () {
    var data = tblsubstage.row( $(this).parents('tr') ).data();
    var row = $(this).parent().parents('tr');
    tblsubstage.row(row).remove().draw();
    $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#stageSubstage");
  });

  $("#btnAddStage").click(function(){
    $.ajax({
        url: '/maintenance/substage-all',
        type: 'GET',
        success: function(data)
        {
          tblsubstage.clear().draw();
          $("#stageSubstage").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strSubStageID+`>`+data[i].strSubStageName+`</option>`).appendTo("#stageSubstage");
          }
        }
    });
    //
    $("#stage_form").find('.has-error').removeClass("has-error");
    $("#stage_form").find('.has-success').removeClass("has-success");
    $('#stage_form').find('.form-control-feedback').remove();
    // $("#modDept").val(null).change();
    document.getElementById("stage_form").reset();
    document.getElementById('stage_form').action = "{{URL::to('/maintenance/stage-add')}}";
    urlCode =  '/maintenance/stage-add';
  });

  $("#btnEditStage").click(function(){
    $.ajax({
        url: '/maintenance/substage-all',
        type: 'GET',
        success: function(data)
        {
          tblsubstage.clear().draw();
          $("#stageSubstage").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strSubStageID+`>`+data[i].strSubStageName+`</option>`).appendTo("#stageSubstage");
          }
        }
    });
    // CHANGE TABLE DATANAME
    tblsubstage.clear().draw();
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
          $('#stageName').val(data.stage.strStageName);
          $('#stageDesc').val(data.stage.strStageDesc);

          for(var i = 0; i < data.substage.length; i++)
            {
              tblsubstage.row.add([
                data.substage[i].strSubStageID,
                data.substage[i].strSubStageName,
                `
                <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                `
                ]
              ).draw(false);
            }

            $("#stageSubstage option").each(function()
              {
                for(var i = 0; i < data.substage.length; i++)
                {
                  if($(this).val() == data.substage[i].strSubStageID){
                      $(`#stageSubstage option[value=`+$(this).val()+`]`).remove();
                  }
                }
              });


          // URL OF EDIT
          tempID = data.stage.strStageID;
          document.getElementById('stage_form').action = "{{URL::to('/maintenance/stage-update')}}";
          urlCode =  '/maintenance/stage-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#stage_form', function(e){
    var oTable = $('#substage_table').dataTable();
    substageArr =  oTable.fnGetData()
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          substage_data: substageArr,
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
          result.strStageID,
          result.strStageName,
          result.strStageDesc,
          ]
        ).draw(false);

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
              text: '<h4><center>Stage name already exist!</center></h4>',
            });
          }
      }
    });
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
          text: '<h4><center>Stage(s) successfully deleted!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

$("#showDiv").click(function(){
    $('#hidee').show();
    $('#showDiv').hide();
  });
  $("#hideDiv").click(function(){
    $('#showDiv').show();
    $("#hidee").hide();
  });

});
