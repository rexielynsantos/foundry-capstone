$(document).ready(function(){

  var table1 = $('#MostProducts').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
  "bInfo": false
  });

  var table2 = $('#MostSupplies').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
  "bInfo": false
  });

  var table3 = $('#MostJobs').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
  "bInfo": false
  });

  var table4 = $('#MostActiveCustomer').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
  "bInfo": false
  });

  $('#querySearch').change(function(){
     $('#table1').hide();
     $('#table2').hide();
     $('#table3').hide();
     $('#table4').hide();

     var tableID = $('#querySearch').val()
     $('#'+tableID).show()

     if (tableID == 'table1') {
       $.ajax({
           url: '/transaction/query-table1-info',
           type: 'GET',
           success: function(data)
           {
            //  console.log(data)
             table1.row.add([
               data.strProductName,
               data.strProductDesc,
               data.strProductName
             ]).draw(true);
           }
       });
     }
  });

});
