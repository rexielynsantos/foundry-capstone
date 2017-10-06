$(document).ready(function(){
var table = $('#estimateFinalTable').DataTable();


var quoteID = $('#testval').val();
// alert(quoteID)
  $.ajax({
    type: "POST",
    url: "/transaction/estimate-read",
    data: {
        quote_id : quoteID
    },
    success: function(data) {
      // console.log(data)

      for (var i = 0; i < data.length; i++) {
        table.row.add([
          data[i].strProductName,
          data[i].strVarianceCode,
          data[i].intOrderQty+"pcs"
        ]).draw(true);
      }

    }
  });

});
