$(document).ready(function(){
  var table =  $('#productionTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddMat").click(function(){
  $("#matspec_form").find('.has-error').removeClass("has-error");
  $("#matspec_form").find('.has-success').removeClass("has-success");
  $('#matspec_form').find('.form-control-feedback').remove();
  document.getElementById("matspec_form").reset();
  document.getElementById('matspec_form').action = "{{URL::to('/transaction')}}";
  urlCode =  '/transaction';
});


$("#productSelection").change(function(){
    var val = $('#productSelection').val();
    // alert (val);
    $.ajax({
        url: "/Specification/ProductType",
        type: "POST",
        // dataType: "HTML",
        data: {
          prod_name : val
        },
        // async: false,
        success: function(data) {
          
             $("#productTypeName").val(data[0].strProductTypeID);
             console.log(data);
             $("#productTypeName").val(data[0].strProductTypeName);

        }
  });
});

$(document).on('submit', '#matspec_form', function(e){
  table.column(0).visible(false);
  e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {

      },
      success: function(result) {
        if(urlCode == '/transaction'){
          table.rows('tr.active').remove().draw();
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center> successfully updated!</center></h4>',
          });
        }else{
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center> successfully added!</center></h4>',
          });
        }
        table.row.add([

          ]
        ).draw(false);

        $('#matModal').modal('toggle');
      },
      error: function(result){
        $.ajax({
            url: '/transaction',
            type: 'POST',
            data: {

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
                      text: '<h4><center>Already exist!</center></h4>',
                    });
                  }
                  else if(data[0].strStatus == 'Inactive'){
                    $('#matModal').modal();
                  }
                }
            }
        });
      }
    });
})

});
