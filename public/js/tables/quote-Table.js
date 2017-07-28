var tblquot = $('#quoteTable').DataTable(
  {
    "select":true,
     "searching": false,
    "ordering": false,
    "paging": false,
  });

$('#quoteTable tbody').on('click', 'tr', function()
    {
      if(!$(this).hasClass('active') && tblquot.rows().data().length > 0)
      {
          $(this).addClass('active');
      }
      else
      {
          $(this).removeClass('active');
    }
});
