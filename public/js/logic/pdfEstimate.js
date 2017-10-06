$('#tblApprovedQuotes tbody').on('click', '#pdfestimate', function () {
var tbl = $('#tblApprovedQuotes').DataTable();
var tbldata = tbl.row( $(this).closest('tr') ).data();
// alert(data[0]);

$.ajax({
  type: "POST",
  url: '/transaction/estimate-pdf',
  data: {
    id: tbldata[0]
  }, 
  success: function(data){
    // alert(data.custpurchase.customer.strCompanyName);
console.log(data);
var companyName = data.custpurchase.customer.strCompanyName;
var custStreet = data.custpurchase.customer.strCustStreet;
var custCity = data.custpurchase.customer.strCustCity;
var contactPerson = data.custpurchase.customer.contact[0].strContactPersonName;

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
frameDoc.document.write('<p align="center" style="text-decoration: underline; font-weight:bold;">CUSTOMER JOB ORDER</p>');
frameDoc.document.write('</head><body>');
frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td></td>');
frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">Job Order No.: '+tbldata[0]+'</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td><p align="left" style="font-size: 16px; font-family: arial;">CUSTOMER: '+companyName+'</p></td>');
frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">P.O. #: '+data.strCustPurchaseID+'</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td><p style="font-size: 16px; font-family: arial;">Date Received: '+data.custpurchase.dtOrderDate+'</p></td>');
frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">Delivery Date: ' +data.custpurchase.dtDeliveryDate+'</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr><td></td></tr>');
frameDoc.document.write('<tr><td></td></tr>');
frameDoc.document.write('<tr><td></td></tr>');
if(data.boolIsRepeatOrder == 1){
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td></td>');
  frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">Repeat Order: x</p></td>');
  frameDoc.document.write('</tr>');
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td></td>');
  frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">New Product: </p></td>');
  frameDoc.document.write('</tr>');
}
else{
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td></td>');
  frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">Repeat Order: </p></td>');
  frameDoc.document.write('</tr>');
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td></td>');
  frameDoc.document.write('<td><p align="right" style="font-size: 16px; font-family: arial;">New Product: x</p></td>');
  frameDoc.document.write('</tr>');
}
frameDoc.document.write('</table>');
frameDoc.document.write('</div></div></div></section>');
frameDoc.document.write('<br><br><table style="width: 100%;" align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<th> JOB DESCRIPTIONS </th>');
frameDoc.document.write('<th> QTY </th>');
frameDoc.document.write('<th> U/M </th>');
frameDoc.document.write('</tr>');
for(var i = 0; i < data.custpurchase.quotation.quoteprodvariant.length; i++){
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td align="center">'+ data.custpurchase.quotation.quoteprodvariant[i].details4.strProductName +' </td>');
  frameDoc.document.write('<td align="center"> pcs </td>');
  frameDoc.document.write('<td align="center">'+ data.custpurchase.quotation.quoteprodvariant[i].intOrderQty +  '</td>');
  frameDoc.document.write('</tr>');
}
frameDoc.document.write('</table>');
frameDoc.document.write('<br><br>');
frameDoc.document.write('<table width="100%" align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%">Remarks: </td>');
frameDoc.document.write('<td width="60%" align="left">'+data.strJobRemarks+'</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('</table>');
frameDoc.document.write('<br>');
frameDoc.document.write('<table width="100%" align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%">Prepared By: </td>');
frameDoc.document.write('<td width="40%" align="center">__________________</td>');
frameDoc.document.write('<td width="30%" align="center" style="text-decoration: underline;">'+data.created_at+'</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"></td>');
frameDoc.document.write('<td width="40%"></td>');
frameDoc.document.write('<td width="30%" align="center">Date</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr><td></td></tr>');
frameDoc.document.write('<tr><td></td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%">Approved By: </td>');
frameDoc.document.write('<td width="40%" align="center">___________________</td>');
frameDoc.document.write('<td width="30%" align="center">___________________</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"></td>');
frameDoc.document.write('<td width="40%" align="center">Mr. Veronico F. Reyes</td>');
frameDoc.document.write('<td width="30%" align="center">Date</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"></td>');
frameDoc.document.write('<td width="40%" align="center">EVP & General Manager</td>');
frameDoc.document.write('<td></td>');
frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr><td></td></tr>');
// frameDoc.document.write('<tr><td></td></tr>');
frameDoc.document.write('</table>');
frameDoc.document.write('<br><br>');
frameDoc.document.write('<table width="100%" align="center">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="20%" align="left">Job Received By: </td>');
frameDoc.document.write('<td width="30%" align="center">Date</td>');
frameDoc.document.write('<td width="20%"></td>');
frameDoc.document.write('<td width="30%" align="center">Date</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="20%" align="left">Wax Shop: </td>');
frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
frameDoc.document.write('<td width="20%" align="left">Fettling Shop: </td>');
frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="20%" align="left">Mold Shop: </td>');
frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
frameDoc.document.write('<td width="20%" align="left">QA/QC: </td>');
frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="20%" align="left">Melting Dept.: </td>');
frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
frameDoc.document.write('<td width="20%" align="left">Admin. Dept.: </td>');
frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
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