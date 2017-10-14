$(document).ready(function(){

  var table1 = $('#MostProducts').DataTable();

  var table2 = $('#MostSupplies').DataTable();

  var table3 = $('#MostJobs').DataTable();

  var table4 = $('#MostActiveCustomer').DataTable();

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
             table1.clear().draw()
             console.log(data)
             for (var i = 0; i < data.product.length; i++) {
               table1.row.add([
                 data.product[i][0],
                 data.productDesc[i][0],
                 data.count[i]
               ]).draw(true);
             }
           }
       });
     }
     else if (tableID == 'table2') {
       $.ajax({
           url: '/transaction/query-table2-info',
           type: 'GET',
           success: function(data)
           {
             table2.clear().draw()
             console.log(data)
             for (var i = 0; i < data.material.length; i++) {
               table2.row.add([
                 data.material[i][0],
                 data.materialDesc[i][0],
                 data.count[i]
               ]).draw(true);
             }
           }
       });
     }
     else if (tableID == 'table3') {
       alert('di ko alam ano kukunin dito hehe')
      //  $.ajax({
      //      url: '/transaction/query-table2-info',
      //      type: 'GET',
      //      success: function(data)
      //      {
      //        table3.clear().draw()
      //        console.log(data)
      //        table3.row.add([
      //          data.material.strMaterialName,
      //          data.material.strMaterialDesc,
      //          data.count
      //        ]).draw(true);
      //      }
      //  });
     }
     else if (tableID == 'table4') {
       $.ajax({
           url: '/transaction/query-table4-info',
           type: 'GET',
           success: function(data)
           {
             table4.clear().draw()
             console.log(data)
             for (var i = 0; i < data.customer.length; i++) {
               table4.row.add([
                 data.customer[i][0],
                 data.count[i]
               ]).draw(true);
             }
           }
       });
     }
  });

});
