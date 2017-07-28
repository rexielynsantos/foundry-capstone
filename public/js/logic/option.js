$(document).ready(function(){
  var table =  $('#optionTable').DataTable();
  var urlCode = '';
  var tempID = '';

  $("#btnAddOption").click(function(){
    $("#Opt_form").find('.has-error').removeClass("has-error");
    $("#Opt_form").find('.has-success').removeClass("has-success");
    $('#Opt_form').find('.form-control-feedback').remove();
    document.getElementById("Opt_form").reset();
    document.getElementById("Opt_form").action = "{{URL::to('/maintenance/option-add')}}";
    urlCode =  '/maintenance/option-add';
  });

  $("#btnEditOption").click(function(){
    // CHANGE TABLE DATANAME
    $("#Opt_form").find('.has-error').removeClass("has-error");
    $("#Opt_form").find('.has-success').removeClass("has-success");
    $('#Opt_form').find('.form-control-feedback').remove()

    document.getElementById("Opt_form").reset();
    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/option-edit',
        type: 'POST',
        data: {
          option_id: id
        },
        success: function(data)
        {
          // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
          $('#optDesc').val(data[0].strOptionDesc);
          $('#optName').val(data[0].strOptionName);
          // URL OF EDIT
          tempID = data[0].strOptionID;
          document.getElementById('opt_form').action = "{{URL::to('/maintenance/option-update')}}";
          urlCode =  '/maintenance/option-update';
        },
        error: function(result) {
          alert('No ID found');
        }
    });
  })


  $(document).on('submit', '#opt_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            option_desc: $('#optDesc').val(),
            option_name: $('#optName').val(),
            option_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/option-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Option successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Option successfully added!</center></h4>',
            });
          }
          table.row.add([
            result[0].strOptionID,
            result[0].strOptionName,
            result[0].strOptionDesc,
            ]
          ).draw(false);

          $('#optName').val('');
          $('#optDesc').val('');
          $('#optionModal').modal('toggle');
          $('#btnEditOption').hide();
          $('#btnDeleteOption').hide();
          $('#btnAddOption').show();
        },
        error: function(result){
          var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Option name already exist!</center></h4>',
            });
          }
        }
      });
  })



$('#btnDeleteOptions').click(function(){
  var tblname = $('#optionTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/option-delete",
    data: {
        option_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#optionDeleteModal').modal('toggle');
      $('#btnAddOption').show();
      $('#btnEditOption').hide();
      $('#btnDeleteOption').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Option(s) successfully deleted!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});


});
