$(document).ready(function(){
  var pName = "";
  var prodArr = [];
  var productsArr = [];
  var urlCode = '';
  var btnTrash = '#btnTrash';
  // var tempID = '';

  var clear = 0;
  var table =  $('#jobtixTable').DataTable(
    {
    "searching": false,
    "ordering": false,
    "paging": false,
    });
  var jtable =  $('#jobTicketTable').DataTable();

  $("#btnAddTicket").click(function(){
    // getSubstage();
    btnclear();
    $("#jobTicket_form").find('.has-error').removeClass("has-error");
    $("#jobTicket_form").find('.has-success').removeClass("has-success");
    $('#jobTicket_form').find('.form-control-feedback').remove();
    document.getElementById("jobTicket_form").reset();
    document.getElementById('jobTicket_form').action = "{{URL::to('/transaction/jobtickets-add')}}";
    urlCode =  '/transaction/jobtickets-add';
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


  $('#stage').change(function(){
    $.ajax({
          url: '/transaction/jobtickets-stage',
          type: 'POST',
          data: {
            stage_id: $('#stage').val()
          },
          success: function(data)
          {
            $("#substage").empty();
            $(`<option value="first" selected disabled>Select a Sub-Stage</option>`).appendTo("#substage");
            for(var i = 0; i < data.length; i++)
            {
              $(`<option value=`+data[i].strSubStageID+`>`+data[i].strSubStageName+`</option>`).appendTo("#substage");
            }
          },
          error: function(result)
          {
            alert('getSubstageError');
          }
      });
  });
<<<<<<< HEAD
  // function getSubstage(){
  //   $.ajax({
  //       url: '/maintenance/substage-all',
  //       type: 'GET',
  //       success: function(data)
  //       {
  //         $("#stageSubstage").empty();
  //         for(var i = 0; i < data.length; i++)
  //         {
  //           $(`<option value=`+data[i].strSubStageID+`>`+data[i].strSubStageName+`</option>`).appendTo("#stageSubstage");
  //         }
  //       }
  //   });
  // }
  // $('#productAdd').click(function(){
  //     id = $('#prodVarianceMaterial option:selected').val();
  //     text = $('#prodVarianceMaterial option:selected').text();
  //     qty =  $('#prodVarianceMaterialQty').val();
  //
  //     if(id != null && qty != ''){
  //       $('#prodVarianceMaterial option:selected').remove();
  //       tblmaterial.row.add([id,text,qty,
  //         `
  //         <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
  //         `
  //         ]
  //       ).draw(false);
  //       $('#prodVarianceMaterialQty').val('');
  //       $("#prodVarianceMaterial").val(null).change();
  //     }
  //   });

=======
>>>>>>> dcfcb22208509d7bb1f6c72a1aebc9063e5b8f77

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
        alert(prodVal);
        for(var j = 0; j < prodVal.length; j++)
        {
          $.ajax({
              url: '/transaction/jobtickets-products',
              type: 'POST',
              data: {
                  prodct_data: prodVal[j]
              },
              success: function(data) {
                pName = data[0].strProductName;
                var btn = "<button type='button' id = 'btnTrash'  class='deleteRow btn btn-danger' name='"+data[0].strProductID+"'><i class='fa fa-trash-o'></i</button>";
                $('#prodSelect option:selected').remove();
                  table.row.add([
                    data[0].strProductID,
                    data[0].strProductName,
                    data[0].strProductTypeName,
                    '<div class="bootstrap-timepicker"><div class="form-group"><div class="input-group"><input type="time" id="timePicker'+ctr+'" class="form-control"/></div></div></div>',
                    btn
                  ]).draw(true);
              }
          });
        }
    }
  });

  $('#jobtixTable tbody').on( 'click', btnTrash, function () {
      var data = table.row( $(this).parents('tr') ).data();
      var row = $(this).parent().parents('tr');
      table.row(row).remove().draw();
      $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#prodSelect");
    });

  $(document).on('submit', '#jobTicket_form', function(e){
    table.column(0).visible(false);
    var oTable = $('#jobtixTable').dataTable();
    var tblrows = oTable.fnGetData().length;
    alert(tblrows);
    prodArr =  oTable.fnGetData();
    alert(prodArr);
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          prod_data: prodArr,
          emp_id: $('#personnel').val(),
          stage_id: $('#stage').val(),
          substage_id: $('#substage').val()
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
        var edit = '<button id = "btnendticket" data-toggle="modal" data-target="#endticketmodal"> <i class="fa fa-edit"></i></button>';
        // for (var index = 0; index < result.product.length; index++) {
        //   var element = result.product[index].details.strProductName;
        //   prodRow += '<li style="list-style-type:circle">'+element+'</li>'
        // }
        for (var index = 0; index < result.product.length; index++) {
          prodRow += '<li style="list-style-type:circle">'+result.product[index].details.strProductName+'</li>';
          fjobRow += '<li style="list-style-type:circle">'+result.product[index].dblJobFinished+'</li>';
          tStartedRow += '<li style="list-style-type:circle">'+result.product[index].timeStarted+'</li>';
          tFinishedRow += '<li style="list-style-type:circle">'+result.product[index].timeFinished+'</li>';
        }


        jtable.row.add([
          result.strJobTicketID,
          result.employee.strEmployeeFirst+" "+result.employee.strEmployeeLast,
          prodRow,
          result.stage.strStageName,
          result.substage.strStageName,
          fjobRow,
          tStartedRow,
          tFinishedRow,
          edit,
          ]
        ).draw(false);

        prodArr = [];

        $('#ticketmodal').modal('toggle');

      },
      error: function(result){
        alert('Error adding jobticket!');

      }
    });
  });

  // $("#btnendticket").click(function(){
  //   var data = table.row( $(this).parents('tr') ).data();
  //   $('#endjtid').val('data[0]');
  //   $('#endjtpersonnel').val('data[1]');
  //   $('#endjtstage').val(data[2]);
  //   $('#endjtsubstage').val(data[3]);
  // });

  $('#jobTicketTable tbody').on( 'click', btnendticket, function () {
      var data = table.row( $(this).parents('tr') ).data();
      // $('#endjtid').val(data[0]);
      $('#endjtpersonnel').val('data[1]');
      $('#endjtstage').val(data[2]);
      $('#endjtsubstage').val(data[3]);
    });


$('#btnClear').click(function(){
  btnclear();
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
