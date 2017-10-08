$(document).ready(function(){
var tbl = $('#tblApprovedQuotes').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
});
$('#tblApprovedQuotes tbody').on('click', '#pdfestimate', function () {

var tbldata = tbl.row( $(this).closest('tr') ).data();
// alert(tbldata[0]);

$.ajax({
  type: "POST",
  url: '/transaction/estimate-pdf',
  data: {
    id: tbldata[0]
  }, 
  success: function(data){
    // alert(data.custpurchase.customer.strCompanyName);
console.log(data);
// var companyName = data.custpurchase.customer.strCompanyName;
// var custStreet = data.custpurchase.customer.strCustStreet;
// var custCity = data.custpurchase.customer.strCustCity;
// var contactPerson = data.custpurchase.customer.contact[0].strContactPersonName;

var frame1 = $('<iframe />');
frame1[0].name = "frame1";
frame1.css({ "position": "absolute", "top": "-1000000px" });
$("body").append(frame1);
var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
frameDoc.document.open();
//Create a new HTML document.
frameDoc.document.write('<html><head>');

var current = new Date();
var mo = current.getMonth()+1;
var dd = current.getDate();
var mon = ["A", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
// if(mo < 10){ mo = '0' + mo; }
// if(dd < 10){ dd = '0' + dd; }
var today = mon[mo] + ' ' + dd + ', ' + current.getFullYear();
frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td rowspan=3><img src="../images/mainlogo.png" width="130" height="130" style="margin-left: 30px;"></td>');
frameDoc.document.write('<td><p style="font-weight:bold;font-size:30px;" align="center">Precision Foundry of the Philippines Inc.</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr><td><p style="font-weight:bold;font-size:20px;" align="center">ISO 9001 2008</p></td></tr>');
frameDoc.document.write('<tr><td><p style="font-weight:bold;font-size:15px;" align="center">'+ today +'</p></td></tr>');
frameDoc.document.write('</table>');
frameDoc.document.write('</head><body>');
frameDoc.document.write('<br>');
frameDoc.document.write('<label style="margin-left:60px;">'+ data[0].strCompanyName +'</label><br>');
frameDoc.document.write('<label style="margin-left:60px;">'+ data[0].strCustStreet+" "+data[0].strCustBrgy +'</label><br>');
frameDoc.document.write('<label style="margin-left:60px;">'+ data[0].strCustCity +'</label><br>');
frameDoc.document.write('<br>');

frameDoc.document.write('<table>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td><p style="margin-left:60px;">Attention: </p></td>');
frameDoc.document.write('<td>'+ data[0].strContactPersonName +' </td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td><p style="margin-left:60px;"></p></td>');
frameDoc.document.write('<td>Purchasing Officer</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('</table>');
frameDoc.document.write('<br>');

frameDoc.document.write('<p style="margin-left:60px;">Dear '+ data[0].strContactPersonName +',</p>');
frameDoc.document.write('<p style="margin-left:60px;margin-right:60px;">We are pleased to submit our quotation for the supply of labor and materials in the investment casting and rubber mold for the following part/s:</p>');

frameDoc.document.write('<table width="80%" align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td align="center" style="font-weight:bold;"><p>DESCRIPTION</p></td>')
frameDoc.document.write('<td align="center" style="font-weight:bold;">MATERIALS</td>')
frameDoc.document.write('<td align="center" style="font-weight:bold;"><p>UNIT COST</p></td>')
frameDoc.document.write('</tr>');
for(var i = 0; i < data.length; i++){
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td align="center" style="font-weight:bold;">'+ data[i].strProductName +'</td>')
  frameDoc.document.write('<td align="center" style="font-weight:bold;">'+ data[i].strVarianceCode +'</td>')
  frameDoc.document.write('<td align="center" style="font-weight:bold;">'+ data[i].dblRequestCost +'</td>')
  frameDoc.document.write('</tr>');
}
frameDoc.document.write('</table>');

frameDoc.document.write('<br>');
frameDoc.document.write('<p style="margin-left:90px;margin-right:60px;">Note: We will send you the tooling cost for Net and Tray once the fabricator responded to our quote request.</p>');
frameDoc.document.write('<p style="margin-left:60px;margin-right:60px;">The following are our terms and conditions in conjunction with the order:</p>');

frameDoc.document.write('<p style="margin-left:90px;margin-right:60px;">'+ data[0].strNote +'</p>');

frameDoc.document.write('<p style="margin-left:60px;margin-right:60px;">Thank you for giving us the opportunity to provide you with this quotation. We hope you find the above price acceptable.</p>');

frameDoc.document.write('<table width="100%" align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="65%"></td>');
frameDoc.document.write('<td align="left">Very truly yours,</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="65%"></td>');
frameDoc.document.write('<td align="left">Veronica F. Reyes</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="65%"></td>');
frameDoc.document.write('<td align="left">EVP & General Manager</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('</table>');

frameDoc.document.write('<br><br><br>');

frameDoc.document.write('<table align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td style="font-weight:bold;">FACTORY:</td>');
frameDoc.document.write('<td style="font-weight:bold;">#86 Fortune Avenue, Brgy. Fortune, Marikina City</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td style="font-weight:bold;"></td>');
frameDoc.document.write('<td style="font-weight:bold;">Telefax: 998-2582</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td style="font-weight:bold;"></td>');
frameDoc.document.write('<td style="font-weight:bold;">Tel. No.: 998-2581</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td style="font-weight:bold;"></td>');
frameDoc.document.write('<td style="font-weight:bold;">www.precisionfoundry.org</td>');
frameDoc.document.write('</tr>');
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


  },
  error: function(data){
    alert('Error in generating PDF!');
  }
});


});
})