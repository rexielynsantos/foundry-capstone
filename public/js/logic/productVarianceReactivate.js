$(document).ready(function(){
$('#activateProductVariance').click(function(){
  var tblname = $('#prodVarianceReactTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
      selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/productVariance-activate",
    data: {
        variance_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#productVarianceReactivateModal').modal('toggle');
      noty({
        type: 'error',
        layout: 'bottomRight',
        timeout: 3000,
        text: '<h4><center>Product Variance(s) successfully reactivated!</center></h4>',
      });

    },
    error: function(result) {
        alert('error');
    }
  });
});

});
