$(document).ready(function(){
  var productsArr= [];
  var urlCode = '';
  // var tempID = '';
  var clear = 0;
  var table =  $('#jobtixTable').DataTable(
    {
    "searching": false,
    "ordering": false,
    "paging": false,
    });

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
    if(clear == 0){
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
    }
  });

  function removeProd(id){
    // alert(id);
    var getDropdown = document.getElementById("prodSelect");
    var opt = document.createElement("option");
    opt.text = id;
    getDropdown.add(opt);
    $("#jobtixTable").on('click', '.deleteRow', function(e){
      $(this).closest('tr').remove()
      var table = $('#jobtixTable').DataTable();
      table.clear();
    });
  }



  $('#productAdd').click(function(){
    var ctr = 0;
    var timep = `<div class="bootstrap-timepicker">
        <div class="form-group">
            <div class="input-group">
                <input type="time" id="timePicker" class="form-control"/>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
    </div>`;
    $('#prodSelect :selected').each(function(i, selected){
      ctr+=1;
    });
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
                var btn = "<button type='button' id = 'btnTrash'  class='deleteRow btn btn-danger' name='"+data[0].strProductName+"' onclick='removeProd('"+data[0].strProductName+"')'><i class='fa fa-trash-o'></i</button>";
                $('#prodSelect option:selected').remove();
                  table.row.add([
                    // j,
                    data[0].strProductName,
                    data[0].strProductTypeName,
                    timep,
                    btn
                  ]).draw(true);
              }
          });
        }
    }
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
