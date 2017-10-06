$(document).ready(function(){
  var pName = "";
  var prodArr = [];
  var productsArr = [];
  var urlCode = '';
  var tempID = '';
  var job = [];
  var timeStart = [];
  var prodid = [];
  var prevJob = [];
  var addJob = [];
  var row = '';
  var timeEnded = '';
  var currentTime = new Date();

  var clear = 0;
  var jtable =  $('#jobTicketTable').DataTable({
    "searching": true,
    "ordering": false,
    "paging": true,
  });
  var table =  $('#jobtixTable').DataTable({
    "searching": false,
    "ordering": false,
    "paging": false,
  });
  var etable =  $('#editTable').DataTable(
    {
    "searching": false,
    "ordering": false,
    "paging": false,
    });


  function getProduct(){
    $.ajax({
        url: '/transaction/jobtickets-productGet',
        type: 'GET',
        success: function(data)
        {
          $("#prodSelect").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strProductID+`>`+data[i].strProductName+`</option>`).appendTo("#prodSelect");
          }
        }
    });
  }

  $("#btnAddTicket").click(function(){
    getProduct();
    btnclear();
    $("#jobTicket_form").find('.has-error').removeClass("has-error");
    $("#jobTicket_form").find('.has-success').removeClass("has-success");
    $('#jobTicket_form').find('.form-control-feedback').remove();
    document.getElementById("jobTicket_form").reset();
    document.getElementById('jobTicket_form').action = "{{URL::to('/transaction/jobtickets-add')}}";
    urlCode =  '/transaction/jobtickets-add';
  });

  $('#jobTicketTable tbody').on('click', '#btnendticket', function () {
    var data = jtable.row( $(this).closest('tr') ).data();
    row = $(this).parent().parents('tr');

    tempID = data[0];

    etable.column(0).visible(false);
    etable.column(2).visible(false);

    $.ajax({
      url: '/transaction/jobtickets-edit',
      type: 'POST',
      data: {
        jt_id: tempID
      },
      success: function(data){
          $('#endjtid').text(tempID);
          $('#endjtpersonnel').text(data.employee.strEmployeeFirst+" "+data.employee.strEmployeeLast);
          $('#endjtstage').text(data.stage.strStageName);
          if(data.strSubStageID != null){
            $('#endjtsubstage').text(data.substage.strSubStageName);
          }          
          etable.clear();
          etable.draw();

          var getDataTable = $('#editTable').dataTable();
          var tblrows = getDataTable.fnGetData().length;
          var row = tblrows+1;
          prodArr = [];
          timeStart = [];
          prodid = [];
          job = [];
          prevJob = [];
          timeEnded = currentTime.getHours() + ':' + currentTime.getMinutes() + ':' + currentTime.getSeconds();
          timeFormat = moment(timeEnded, 'HH:mm:ss').format('h:mm:ss A');
          for(var index = 0; index < data.product.length; index++){
            timeStart[index] = data.product[index].timeStarted;
            prodid[index] = data.product[index].details.strProductID;
            prevJob[index] = data.product[index].dblJobFinished;
            etable.row.add([
              '<label id="prodID'+index+'" name="prodID'+index+'">'+data.product[index].details.strProductID+'</label>',
              data.product[index].details.strProductName,
              '<label id="timeS'+index+'" name="timeS'+index+'">'+data.product[index].timeStarted+'</label>',
              '<input id="jobFinished'+index+'" type="number" min=1 class="form-control number" style="width:100%;">',
              '<label id="time'+index+'">'+timeFormat+'</label>',
              ]
            ).draw(false);
            row = row + 1;
            // $('#jobFinished'+index).val(data.product[index].dblJobFinished);
          }

          // URL OF EDIT
          // tempID = id;
          // console.log(data.strMaterialID);
          document.getElementById('jt_form').action = "URL::to('/transaction/jobtickets-update')";
          // urlCode =  '/transaction/jobtickets-update';
      },
      error: function(result){
        alert('EDIT_ERROR!');
      }
    });
  });

  $(document).on('submit', '#jt_form', function(e){
    jtable.column(0).visible(false);
    var dTable = $('#editTable').dataTable();
    var tblrows = dTable.fnGetData().length;
    for(var i = 0; i < tblrows; i++){
      prodArr[i] = dTable.fnGetData();
      job[i] = parseInt($('#jobFinished'+i).val()) + prevJob[i];
      addJob[i] = $('#jobFinished'+i).val();
    }
    // alert(prevJob);
    $.ajax({
      url: '/transaction/jobtickets-update',
      type: 'POST',
      data: {
        prod_data: prodArr,
        job_finished: job,
        time_end: timeEnded,
        time_start: timeStart,
        prod_id: prodid,
        prev_job: prevJob,
        add_job: addJob,
        jt_id: $('#endjtid').text()
      },
      success: function(result){
        noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Job Ticket successfully ended!</center></h4>',
          });
          var prodRow='';
          var fjobRow='';
          var tStartedRow='';
          var tFinishedRow='';
          var edit = '<button id = "btnendticket" name='+result.strJobTicketID+' onclick="end(this.name)" data-toggle="modal" data-target="#endticketmodal"> <i class="fa fa-edit"></i></button>';
          for (var index = 0; index < result.product.length; index++) {
            prodRow += '<li style="list-style-type:circle">'+result.product[index].details.strProductName+'</li>';
            fjobRow += '<li style="list-style-type:circle">'+result.product[index].dblJobFinished+'</li>';
            tStartedRow += '<li style="list-style-type:circle">'+result.product[index].timeStarted+'</li>';
            tFinishedRow += '<li style="list-style-type:circle">'+result.product[index].timeFinished+'</li>';
          }

          jtable.row(row).remove().draw();
          
          var sub = '';
          if(result.strSubStageID != null){
            sub = result.substage.strSubStageName;
          }
          var empname = '<a href="read-mail.html">'+ result.employee.strEmployeeFirst+" "+result.employee.strEmployeeLast +'</a>';
          jtable.row.add([
            result.strJobTicketID,
            empname,
            prodRow,
            result.stage.strStageName,
            sub,
            fjobRow,
            tStartedRow,
            tFinishedRow,
            edit,
            ]
          ).draw(false);
          
          
      },
      error: function(data){
        noty({
            type: 'error',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Error in ending Job Ticket!</center></h4>',
          });
      }
    });

    $('#endticketmodal').modal('toggle');
  });

  $('#stage').change(function(){
    // if(clear == 0){
      $.ajax({
            url: '/transaction/jobtickets-stage',
            type: 'POST',
            data: {
              stage_id: $('#stage').val()
            },
            success: function(data)
            {
              $("#substage").empty();
              if(data['substage'].length == 0){
                $(`<option value="first" selected disabled>No substage to be selected</option>`).appendTo("#substage");
              }
              else{
                $(`<option value="first" selected disabled>Select a Sub-Stage</option>`).appendTo("#substage");

                for(var i = 0; i < data['substage'].length; i++)
                {
                  $(`<option value=`+data['substage'][i].strSubStageID+`>`+data['substage'][i].strSubStageName+`</option>`).appendTo("#substage");
                }
              }

            },
            error: function(result)
            {
              alert('getSubstageError');
            }
        });
    // }
  });

  $('#productAdd').click(function(){
    table.column(0).visible(false);
    var ctr = 0;
    $('#prodSelect :selected').each(function(i, selected){
      ctr+=1;
    });
    // var timep = '<div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" id="timePicker'+ctr+'" class="form-control"/></div></div></div>';
    if(ctr == '0'){
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>You chose '+ctr+' product(s)!</center></h4>',
        });
    }
    else{
      $('#hidee').show();
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>You chose '+ctr+' product(s)!</center></h4>',
        });
        var prodVal = [];
        $('#prodSelect :selected').each(function(i, selected){
          prodVal[i] = $(selected).val();
        });
        // alert(prodVal);
        for(var j = 0; j < prodVal.length; j++)
        {
          $.ajax({
              url: '/transaction/jobtickets-products',
              type: 'POST',
              data: {
                  prodct_data: prodVal[j]
              },
              success: function(data) {
                var oTable = $('#jobtixTable').dataTable();
                var tblrows = oTable.fnGetData().length;
                var row = tblrows+1;
                pName = data[0].strProductName;
                var btn = "<button type='button' id = 'btnTrash'  class='deleteRow btn btn-danger' name='"+data[0].strProductID+"'><i class='fa fa-trash-o'></i</button>";
                $('#prodSelect option:selected').remove();
                  table.row.add([
                    data[0].strProductID,
                    data[0].strProductName,
                    data[0].strProductTypeName,
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    '<div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" id="'+data[0].strProductID+'" class="form-control"/></div></div></div>',
                    btn
                  ]).draw(true);
              }
          });
        }
    }
  });

  $('#jobtixTable tbody').on( 'click', '#btnTrash', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var row = $(this).parent().parents('tr');
      table.row(row).remove().draw();
      $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#prodSelect");
    });

  $(document).on('submit', '#jobTicket_form', function(e){
    jtable.column(0).visible(false);
    var times = [];
    // var ID = [];
    var oTable = $('#jobtixTable').dataTable();
    var tblrows = oTable.fnGetData().length;
    prodArr =  oTable.fnGetData();
    for(var i = 0; i<tblrows; i++){
      var x = i+1;
//////////////////////////////////////////////////////////////////////////////////////////
      // times[i] = $("#picktime"+x).val();
      times[i] = $("#"+prodArr[i][0]).val();
    }
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          prod_data: prodArr,
          time_data: times,
          emp_id: $('#personnel').val(),
          stage_id: $('#stage').val(),
          substage_id: $('#substage').val(),
          joborder_id: $('#joborderRef').val()
      },
      success: function(result) {
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Job Ticket successfully added!</center></h4>',
            });

        //para mag fit sa data table
        var prodRow='';
        var fjobRow='';
        var tStartedRow='';
        var tFinishedRow='';
        var edit = '<button id = "btnendticket" name='+result.strJobTicketID+' onclick="end(this.name)" data-toggle="modal" data-target="#endticketmodal"> <i class="fa fa-edit"></i></button>';
        for (var index = 0; index < result.product.length; index++) {
          prodRow += '<li style="list-style-type:circle">'+result.product[index].details.strProductName+'</li>';
          // fjobRow += '<li style="list-style-type:circle">'+result.product[index].dblJobFinished+'</li>';
          fjobRow += '<li style="list-style-type:circle"></li>';
          tStartedRow += '<li style="list-style-type:circle">'+result.product[index].timeStarted+'</li>';
          // tFinishedRow += '<li style="list-style-type:circle">'+result.product[index].timeFinished+'</li>';
          tFinishedRow += '<li style="list-style-type:circle"></li>';
        }
        var sub = '';
        if(result.strSubStageID != null){
          sub = result.substage.strSubStageName;
        }
        console.log(result);
        var empname = '<a href="read-mail.html">'+ result.employee.strEmployeeFirst+" "+result.employee.strEmployeeLast +'</a>'
        jtable.row.add([
          result.strJobTicketID,
          empname,
          prodRow,
          result.stage.strStageName,
          sub,
          fjobRow,
          tStartedRow,
          tFinishedRow,
          edit,
          ]
        ).draw(false);
        prodArr = [];
        times = [];
        $('#personnel').val('')
        $('#stage').val('')
        $('#substage').val('')
        $('#joborderRef').val('')
        oTable.fnClearTable();
        oTable.fnDraw();
        $('#ticketmodal').modal('toggle');

      },
      error: function(result){
        alert('Error adding jobticket!');

      }
    });
  });

function btnclear(){
  clear = 1;
  $('#hidee').hide();
  $(`#personnel option[value='first']`).attr('selected', true);
  $('#personnel').change();
  $(`#stage option[value='first']`).attr('selected', true);
  $('#stage').change();
  $(`#substage option[value='first']`).attr('selected', true);
  $('#substage').change();
  clear = 0;
}

});
