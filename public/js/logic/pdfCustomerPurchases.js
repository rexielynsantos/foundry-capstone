function htmltopdf(id){

  $.ajax({
      url: '/transaction/customerPurchases-view-pdf',
      type: 'POST',
      data: {
        id : id
      },
      success: function(data)
      {
        console.log(data)
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
          //Create a new HTML document.
          frameDoc.document.write('<html><head>');

          frameDoc.document.write('<section class="content">');
          frameDoc.document.write('<div class="box box-default">');
          frameDoc.document.write('<div class="box-body">');
          frameDoc.document.write('<div class="row">');
          frameDoc.document.write('<div class="col-md-6">');
          frameDoc.document.write('<img src="../images/mainlogo.png" width="70" height="70" style="margin-left: 30px;">');
          frameDoc.document.write('</div>');
          frameDoc.document.write('<div class="col-md-6">');
          frameDoc.document.write('<h2 align="center">Precision Foundry of the Philippines Inc.</h2>');
          frameDoc.document.write('<h3 align="center">#86 Fortune Avenue, Brgy. Fortune, Marikina City, Philippines</h3>');
          frameDoc.document.write('<h3 align="center">Tel No. 998-2581</h3>');
          frameDoc.document.write('</head><body><br><br>');
          frameDoc.document.write('<p style="font-size: 16px; font-family: arial;">Customer name: '+data[0].customer.strCompanyName+'</p>');
          frameDoc.document.write('<p style="font-size: 16px; font-family: arial;">Address: '+data[0].customer.strCustStreet+' '+data[0].customer.strCustBrgy+' '+data[0].customer.strCustCity+'</p>');
          frameDoc.document.write('</div></div></div></section>');
          frameDoc.document.write('<br><br><table style="width: 800px;" align="center">');
          frameDoc.document.write('<tr>');
          frameDoc.document.write('<th> Description </th>');
          frameDoc.document.write('<th> Quantity </th>');
          frameDoc.document.write('<th> Amount </th>');
          frameDoc.document.write('</tr>');
          for (var i = 0; i < data.length; i++) {
            var x='';
              for (var index = 0; index < data[i].quotation.quoteprodvariant.length; index++) {
                var element = data[i].quotation.quoteprodvariant[index].details4.strProductName;
                var element2 = data[i].quotation.quoteprodvariant[index].intOrderQty;
                var element3 = data[i].quotation.quoteprodvariant[index].dblRequestCost;
                frameDoc.document.write('<tr>');
                frameDoc.document.write('<td align="center">'+element+'</td>');
                frameDoc.document.write('<td align="center">'+element2+'</td>');
                frameDoc.document.write('<td align="center"> PHP '+element3+'</td>');
                frameDoc.document.write('</tr>');
              }

          }
          frameDoc.document.write('</table>');
          frameDoc.document.write('</body></html>');
          frameDoc.document.close();
          setTimeout(function () {
              window.frames["frame1"].focus();
              window.frames["frame1"].print();
              frame1.remove();
              // alert(" processed!");
              // window.location.href = "transaction";

          }, 500);
      }
  });

}
