$(document).ready(function(){
$('#activateUOMType').click(function(){
  var tblname = $('#uomTypeReactivateTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
      selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/uomType-activate",
    data: {
        uomtype_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#uomTypeReactivateModal').modal('toggle');
      noty({
        type: 'error',
        layout: 'bottomRight',
        timeout: 3000,
        text: '<h4><center>Unit of Measurement Type(s) successfully reactivated!</center></h4>',
      });

    },
    error: function(result) {
        alert('error');
    }
  });
});

});
