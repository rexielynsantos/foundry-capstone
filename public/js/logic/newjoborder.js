var tbl = $('#custTransTable').DataTable({
    "searching": false,
    "ordering": false,
    "paging": false,
  });

$(document).ready(function(){
  var table = $('#jobDescTable').DataTable({
    "ordering": false,
    "paging": false,
  });
  

  $('#dateReceived').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true
     });
  $('#dateDelivery').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  $('#date').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  var radioRpt = 0;
  var radioNew = 0;

  $.ajax({
    type: "GET",
    url: '/transaction/joborders-get',
    success: function(data){
      for(var i = 0; i < data.length; i++){
        var btn1 = '<button class="btn btn-default"> <i class="fa fa-eye"></i> </button>';
        var btn2 = '<button type="button" id="pdfjo" class="btn btn-primary btn-flat" ><i class="fa fa-print"></i> </button>';
        var btn = btn1 + btn2;
        var classification = "";
        if(data[i].boolIsNewProduct == 1){
          classification = "New Product";
        }
        else{
          classification = "Repeat Order";
        }
        console.log(data);
        tbl.row.add([
          data[i].strJobOrdID,
          data[i].strCustPurchaseID,
          data[i].custpurchase.customer.strCompanyName,
          data[i].custpurchase.dtOrderDate,
          data[i].custpurchase.dtDeliveryDate,
          classification,
          data[i].strJobOrdStatus,
          btn
        ]).draw(true);
      }
    },
    error: function(data){
      alert('ERROR IN DATATABLE');
    }
  });

  $.ajax({
    type: 'GET',
    url: '/transaction/joborder-max',
    success: function(data){
        console.log(data);
      $('#max').text(data);
    },
    error: function(data){
        alert('ERROR IN MAX ID');
    }
  });

  $('#refPO').change(function(){
    table.clear().draw();
    var val = $('#refPO').val();
    $.ajax({
       url: "/transaction/joborder-refpo",
       type: "POST",
       data: {
         refpo : val
       },
       success: function(data) {
         console.log(data);
         $('#customerName').val(data.customer.strCompanyName)
         $('#dateReceived').val(data.dtOrderDate)
         $('#dateDelivery').val(data.dtDeliveryDate)
         for(var i = 0; i < data.quotation.quoteprodvariant.length; i++){
          table.row.add([
            data.quotation.quoteprodvariant[i].details4.strProductName,
            "pcs",
            data.quotation.quoteprodvariant[i].intOrderQty,
          ]).draw(true);
         }
       },
       error: function(data){
        console.log(data);
       }
     });
  });

  $('#radioRepeat').change(function(){
    $('#radioNew').prop('checked', false);
    radioRpt = 1;
    radioNew = 0;
  });

  $('#radioNew').change(function(){
    $('#radioRepeat').prop('checked', false);
    radioRpt = 0;
    radioNew = 1;
  });

  $(document).on('submit', '#jonew_form', function(e){
    e.preventDefault();
    $.ajax({
      type: 'GET',
      url: '/transaction/joborder-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: 'POST',
          url: '/transaction/joborder-add',
          data: {
            id: data,
            created_at: today,
            custpurid: $('#refPO').val(),
            np: radioNew,
            ro: radioRpt,
            remarks: $('#remarks').val()
          },
          success: function(result){

          },
          error: function(result){
            noty({
            type: 'error',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Error in adding Job Order!</center></h4>',
          });
          }
        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    });
  });

});

$('#custTransTable tbody').on('click', '#pdfjo', function () {

var tbldata = tbl.row( $(this).closest('tr') ).data();
// alert(data[0]);

$.ajax({
  type: "POST",
  url: '/transaction/joborders-pdf',
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
