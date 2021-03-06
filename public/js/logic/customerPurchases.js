$(document).ready(function(){
  var table = $('#custTransTable').DataTable({
     "searching": false,
      "ordering": false,
      "paging": false,
  });

  $.ajax({
      url: '/transaction/customerPurchases-view',
      type: 'GET',
      success: function(data)
      {
        console.log(data)



        for (var i = 0; i < data.length; i++) {
          var btn1 = '<button type="button" id="'+data[i].strCustPurchaseID+'" onclick="viewPurchaseInfo(this.id)" class="btn btn-default"><i class="fa fa-eye"></i></button>';
          var btn2 = '<button type="button" id="'+data[i].strCustPurchaseID+'" class="btn btn-primary btn-flat" onclick="htmltopdf(this.id)"><i class="fa fa-print"></i> </button>';
          // var btn3 = '<a type="button" href="/transaction/joborder-new" class="btn btn-success">Generate JO</a>';
          var btn = btn1 + btn2;
          var x='';
            for (var index = 0; index < data[i].quotation.quoteprodvariant.length; index++) {
              var element = data[i].quotation.quoteprodvariant[index].details4.strProductName;
              x += '<li style="list-style-type:circle">'+element+'</li>'
            }
            var y = 0;
            for (var index = 0; index < data[i].quotation.quoteprodvariant.length; index++) {
              var element = data[i].quotation.quoteprodvariant[index].dblRequestCost;
              y += parseInt(y) + parseInt(element)
            }

          table.row.add([
            data[i].strCustPurchaseID,
            data[i].customer.strCompanyName,
            x,
            y,
            data[i].dtDeliveryDate,
            btn
          ]).draw(true);
        }
      }
  });

});

function viewPurchaseInfo(id){
  $('#purchaseID').val(id)
  $('#viewPO').modal('show')
}
