$(document).ready(function(){

  var tablee = $('#receiveingTablee').DataTable();

  $.ajax({
      url: "/transaction/receive-view",
      type: "GET",
      success: function(data)
       {
         console.log(data);
         tablee.clear().draw()
         for (var i = 0; i < data.length; i++) {
           var x = "";
           for(var j = 0; j < data[i].order.length; j++){
               x += '<li style="list-style-type:circle">'+data[i].order[j].details.strMaterialName+'</li>'
           }
           tablee.row.add([
             data[i].strPurchaseID,
             data[i].purchase.supplier.strSupplierName,
             x,
             data[i].dtDeliveryReceived
           ]).draw(true);
         }
      }
  });

});
