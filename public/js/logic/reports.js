$(document).ready(function(){
  var table1 = $('#sales').DataTable();

  var table2 = $('#inventoryRpt').DataTable();

  var table3 = $('#monitoringTable').DataTable();

  // var table4 = $('#prodInspection').DataTable();
  //
  // var table5 = $('#overallRejectPerStage').DataTable();

  $('#searchDate').prop('disabled',true);

  $('#StartDate').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true
  });

  $('#EndDate').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true
  });

  $('#EndDate').change(function(){
    var fromm = $('#StartDate').val()
    var too = $('#EndDate').val()
    if (fromm > too) {
      $('#EndDate').val(fromm)
      $('#searchDate').prop('disabled',true);
    }
    else{
      $('#searchDate').prop('disabled',false);
    }
  });

  $('#searchDate').click(function(){
    var searchReport = $('#reportDropdown').val()
    if (searchReport == 'table1') {
      $.ajax({
          url: '/transaction/reports-table1-infoDate',
          type: 'POST',
          data :{
            from : $('#StartDate').val(),
            to : $('#EndDate').val(),
          },
          success: function(data)
          {
            table1.clear().draw()
            console.log(data)
            for (var i = 0; i < data.customer.length; i++) {
              table1.row.add([
                data.customer[i][0],
                data.count[i],
                ''
              ]).draw(true);
            }
            var options = {
               labels : data.customer,
               datasets : [
                 {
                   fillColor : "rgba(172,194,132,0.4)",
                   strokeColor : "#ACC26D",
                   pointColor : "#fff",
                   pointStrokeColor : "#9DB86D",
                   data : data.count
                 }
               ]
             }

            var ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx).Bar(options);
          }
      });
      $('#table1').show()
      $('#table2').hide()
      $('#table3').hide()
    }// END TABLE1

    else if (searchReport =='table2') {
      $.ajax({
          url: '/transaction/reports-table2-infoDate',
          type: 'POST',
          data :{
            from : $('#StartDate').val(),
            to : $('#EndDate').val(),
          },
          success: function(data)
          {
            table2.clear().draw()
            console.log(data)
            for (var i = 0; i < data.material.length; i++) {
              table2.row.add([
                data.material[i][0],
                data.deliveredDate[i],
                data.returnedDate[i],
                data.totqty[i][0],
                data.reorder[i][0],
              ]).draw(true);
            }
            var delivered = {
               labels : data.material,
               datasets : [
                 {
                   label : "Delivered",
                   fillColor : "rgba(172,194,132,0.4)",
                   strokeColor : "#ACC26D",
                   pointColor : "#fff",
                   pointStrokeColor : "#9DB86D",
                   data : data.deliveredDate
                 }
               ]
             }

            var ctx = document.getElementById('deliveredChart').getContext('2d');
            new Chart(ctx).Bar(delivered);

            var returned = {
               labels : data.material,
               datasets : [
                 {
                   label : 'Returns',
                   fillColor : "rgba(172,194,132,0.4)",
                   strokeColor : "#ACC26D",
                   pointColor : "#fff",
                   pointStrokeColor : "#9DB86D",
                   data : data.returnedDate
                 }
               ]
             }

            var rt = document.getElementById('returnedChart').getContext('2d');
            new Chart(rt).Bar(returned);
          }
      });
      $('#table1').hide()
      $('#table3').hide()
      $('#table2').show()
    }//END TABLE2

  });//END SEARCH BY DATE

//SEARCH BY DROPDOWN
  $('#reportDropdown').change(function(){
    $('#StartDate').val('')
    $('#EndDate').val('')
    var reportVal = $('#reportDropdown').val()
    if (reportVal == 'table1') {
      $.ajax({
          url: '/transaction/reports-table1-info',
          type: 'GET',
          success: function(data)
          {
            table1.clear().draw()
            console.log(data)
            for (var i = 0; i < data.customer.length; i++) {
              table1.row.add([
                data.customer[i][0],
                data.count[i],
                ''
              ]).draw(true);
            }
            var options = {
               labels : data.customer,
               datasets : [
                 {
                   fillColor : "rgba(172,194,132,0.4)",
                   strokeColor : "#ACC26D",
                   pointColor : "#fff",
                   pointStrokeColor : "#9DB86D",
                   data : data.count
                 }
               ]
             }

            var ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx).Bar(options);
          }
      });
      $('#table1').show()
      $('#table2').hide()
      $('#table3').hide()
    } //END IF TABLE 1

    else if (reportVal == 'table2') {
      $.ajax({
          url: '/transaction/reports-table2-info',
          type: 'GET',
          success: function(data)
          {
            table2.clear().draw()
            console.log(data)
            for (var i = 0; i < data.material.length; i++) {
              table2.row.add([
                data.material[i][0],
                data.delivered[i],
                data.returned[i],
                data.totqty[i][0],
                data.reorder[i][0],
              ]).draw(true);
            }
            var delivered = {
               labels : data.material,
               datasets : [
                 {
                   label : "Delivered",
                   fillColor : "rgba(172,194,132,0.4)",
                   strokeColor : "#ACC26D",
                   pointColor : "#fff",
                   pointStrokeColor : "#9DB86D",
                   data : data.delivered
                 }
               ]
             }

            var ctx = document.getElementById('deliveredChart').getContext('2d');
            new Chart(ctx).Bar(delivered);

            var returned = {
               labels : data.material,
               datasets : [
                 {
                   label : 'Returns',
                   fillColor : "rgba(172,194,132,0.4)",
                   strokeColor : "#ACC26D",
                   pointColor : "#fff",
                   pointStrokeColor : "#9DB86D",
                   data : data.returned
                 }
               ]
             }

            var rt = document.getElementById('returnedChart').getContext('2d');
            new Chart(rt).Bar(returned);
          }
      });
      $('#table1').hide()
      $('#table2').show()
      $('#table3').hide()
    } //END OF table2

    else if (reportVal == 'table3') {
      $('#table1').hide()
      $('#table2').hide()
      $('#table3').show()
    }
  });
  //END SEARCH BY DROPDOWN

});
