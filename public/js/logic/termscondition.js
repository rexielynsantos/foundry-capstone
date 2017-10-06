$(document).ready(function(){
  var table =  $('#termsTable').DataTable();
  var urlCode = '';
  var tempID = '';



  $("#term_form").find('.has-error').removeClass("has-error");
  $("#term_form").find('.has-success').removeClass("has-success");
  $('#term_form').find('.form-control-feedback').remove();



  $(document).on('submit', '#term_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/utilities/terms-condition-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: '/utilities/terms-condition-add',
          data: {
              id: data,
              module_id: $('#modSelect').val(),
              term_note: $('#termNote').val(),
              created_at: today,
              term_id: tempID
          },
          success: function(result) {
            // alert("Z");
            console.log(result);
            var btn = "<button type='button' class='btn btn-danger' name='"+result[0].strTermID+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
            table.row.add([
              result[0].strTermID,
              result[0].strModuleName,
              result[0].strNote,
              btn,
              ]
            ).draw(true);

          },
          error: function(result){

            alert("R");

          }

        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
      
  })


});
