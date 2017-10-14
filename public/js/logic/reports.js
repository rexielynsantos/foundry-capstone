$(document).ready(function(){
  var table1 = $('#sales').DataTable();

  var table2 = $('#inventoryRpt').DataTable();

  var table3 = $('#monitoringTable').DataTable();

  var table4 = $('#prodInspection').DataTable();

  var table5 = $('#overallRejectPerStage').DataTable();


  $('#reportDropdown').change(function(){
    var reportVal = $('#reportDropdown').val()
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
              type: 'line',
              data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [
            	    {
            	      label: '# of Votes',
            	      data: [12, 19, 3, 5, 2, 3],
                  	borderWidth: 1
                	},
            			{
            				label: '# of Points',
            				data: [7, 11, 5, 8, 3, 7],
            				borderWidth: 1
            			}
            		]
              },
              options: {
              	scales: {
                	yAxes: [{
                    ticks: {
            					reverse: false
                    }
                  }]
                }
              }
            }
          var ctx = document.getElementById('myChart').getContext('2d');
          new Chart(ctx, options);
        }
    });
    $('#'+reportVal).show()
  });

});
