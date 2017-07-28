$(document).ready(function (){
  var urlCode = '';
  var tempID = '';
  var table =  $('#jobTable').DataTable();
  var table2 = $('#jobTable2').DataTable();
  var table3 = $('#jobs').DataTable();

  
  $('#btnAddJob').click(function(){
      location.href = './joborder-add';
 });
  $('#btnMonitor').click(function(){
      location.href = './jobOrder-monitoring';
  });
});

