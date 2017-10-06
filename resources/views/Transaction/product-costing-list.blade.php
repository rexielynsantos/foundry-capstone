@extends('master')
@section('pageTitle', 'Product Costing')
@section('content')

<section class="content">

	<div class="row">
		<div class="col-md-12">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
               <img src="../images/mainlogo.png" alt="User Avatar">
              </div>

              <h3 class="widget-user-username">Product Costings</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p></h5>
            </div>

            <div class="box-footer">
              <div class="row">
                <div class="col-md-12">
                  <div class="nav-tabs-custom">
                      <ul id="mytabs" class="nav nav-tabs">
                        <li class="active"><a style="color:#f56954" href="#tab_1" data-toggle="tab"><i class="fa fa-circle"></i>&nbsp;&nbsp;Pending</a></li>
                        <li><a style="color:#f56954" href="#tab_2" data-toggle="tab"><i class="fa fa-circle"></i>&nbsp;&nbsp;Approved</a></li>

                      </ul>

                   <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
                          <table id="costingListTable" border="0" class="table table-bordered" style="color:black;">
                            <thead>
                              <th width="20%">No.</th>
                              <th width="20%">Customer Name</th>
                              <th width="20%">Product</th>
                              <th width="20%">Date</th>
                              <th width="%">Action</th>
                            </thead>
                            <tbody>
															@foreach ($viewCost as $vc)
                              <tr>
                                <td> {{$vc->strCostingID}} </td>
                                <td> {{$vc->strCompanyName}} </td>
                                <td> {{$vc->strProductName}} </td>
                                <td></td>
                                <td>
                                  <button type="button" id="{{$vc->strCostingID}}" onclick="approveModal(this.id)" class="btn btn-success"><i class="fa fa-check"></i></button>
                                  <button type="button" id="{{$vc->strCostingID}}" onclick="disapproveModal(this.id)" class="btn btn-danger"><i class="fa fa-close"></i></button>
																	<button type="button" id="{{$vc->strCostingID}}" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                </td>
                              </tr>
															@endforeach

                            </tbody>
                          </table>
                      </div>
                      <div class="tab-pane" id="tab_2">
                          <table id="approvedCostingListTable" border="0" class="table table-bordered" style="color:black;">
                            <thead>
                              <th width="20%">No.</th>
                              <th width="20%">Customer Name</th>
                              <th width="20%">Product</th>
                              <th width="20%">Date</th>
                              <th width="20%">Action</th>



                            </thead>
                            <tbody>
															@foreach ($approvedViewCost as $avc)
                              <tr>
                                <td> {{$avc->strCostingID}} </td>
                                <td> {{$avc->strCompanyName}} </td>
                                <td> {{$avc->strProductName}} </td>
                                <td></td>
                                <td>
                                  <button type="button" id="pdfCosting" class="btn btn-primary"><i class="fa fa-print"></i></button>
																	<button type="button" id="{{$avc->strCostingID}}" onclick="viewCosting(this.id)" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                </td>
                              </tr>
															@endforeach
                            </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
	</div>



  <div class="modal fade" id="approveCostingModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

              </div>
              <div class="modal-body" align="center">
                  <h4 style="text-align:center" class="modal-title">Approve <input type="text" id="approveQuestion" style="border:none;" readonly></h4>
              </div>
              <div class="modal-footer">
                 <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                 <button type="button" id="aprroveCosting" class="btn bg-blue btn-flat pull-right">Yes</button>
             </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="discardCostingModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

              </div>
              <div class="modal-body" align="center">
                  <h4 style="text-align:center" class="modal-title">Discard <input type="text" id="disapproveQuestion" style="border:none;" readonly></h4>
              </div>
              <div class="modal-footer">
                 <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                 <button type="button" id="disaprroveCosting" class="btn bg-blue btn-flat pull-right">Yes</button>
             </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>


</section>
@push('scripts')
	<script type="text/javascript" src="{{URL::asset('js/logic/product-costing.js')}}"></script>
<!-- <script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script> -->
<script>
$('#costingListTable').DataTable();
var tbl = $('#approvedCostingListTable').DataTable();

$('#approvedCostingListTable tbody').on('click', '#pdfCosting', function () {
var tbldata = tbl.row( $(this).closest('tr') ).data();
// alert(tbldata[0]);

$.ajax({
  type: "POST",
  url: '/transaction/product-costing-list-pdf',
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

frameDoc.document.write('<section class="content">');
frameDoc.document.write('<div class="box box-default">');
frameDoc.document.write('<div class="box-body">');
frameDoc.document.write('<div class="row">');
// frameDoc.document.write('<div class="col-md-6">');
// frameDoc.document.write('<img src="../images/mainlogo.png" width="70" height="70" style="margin-left: 30px;">');
// frameDoc.document.write('</div>');
frameDoc.document.write('<div class="col-md-6">');
// frameDoc.document.write('<h2 align="center">Precision Foundry of the Philippines Inc.</h2>');
// frameDoc.document.write('<h3 align="center">#86 Fortune Avenue, Brgy. Fortune, Marikina City, Philippines</h3>');
// frameDoc.document.write('<h3 align="center">Tel No. 998-2581</h3>');
// frameDoc.document.write('<p align="left" style="text-decoration: underline; font-weight:bold;">INVESTMENT CASTED PARTS COSTING</p>');
frameDoc.document.write('</head><body>');
frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%" align="left"><p align="left" style="text-decoration: underline; font-weight:bold;">INVESTMENT CASTED PARTS COSTING</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%" align="left">PART NAME: </td>');
frameDoc.document.write('<td width="17%"></td>');
frameDoc.document.write('<td width="30%"><p align="left">Date: </p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%"><p align="left">CUSTOMER: </p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%"><p align="left">Material: </p></td>');
frameDoc.document.write('<td width="10%"><p align="left">Sp. Gravity of Metal: </p></td>');
frameDoc.document.write('<td width="30%"><p align="left" style="border:1px solid;">'+ "data" +'</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%"><p align="left">PART SPECIFICATION:</p></td>');
frameDoc.document.write('</tr></table>');

frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr >');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Surface Area = </td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ "data" +'</td>');
frameDoc.document.write('<td width=""><p align="left">sq. cm.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr >');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Weight: </td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('</table>');
// frameDoc.document.write('</div></div></div></section>');
// frameDoc.document.write('<br><br><table style="width: 100%;" align="center">');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<th> JOB DESCRIPTIONS </th>');
// frameDoc.document.write('<th> QTY </th>');
// frameDoc.document.write('<th> U/M </th>');
// frameDoc.document.write('</tr>');
// for(var i = 0; i < data.custpurchase.quotation.quoteprodvariant.length; i++){
//   frameDoc.document.write('<tr>');
//   frameDoc.document.write('<td align="center">'+ data.custpurchase.quotation.quoteprodvariant[i].details4.strProductName +' </td>');
//   frameDoc.document.write('<td align="center"> pcs </td>');
//   frameDoc.document.write('<td align="center">'+ data.custpurchase.quotation.quoteprodvariant[i].intOrderQty +  '</td>');
//   frameDoc.document.write('</tr>');
// }
// frameDoc.document.write('</table>');
// frameDoc.document.write('<br><br>');
// frameDoc.document.write('<table width="100%" align="center">');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="40%">Remarks: </td>');
// frameDoc.document.write('<td width="60%" align="left">'+data.strJobRemarks+'</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('</table>');
// frameDoc.document.write('<br>');
// frameDoc.document.write('<table width="100%" align="center">');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="30%">Prepared By: </td>');
// frameDoc.document.write('<td width="40%" align="center">__________________</td>');
// frameDoc.document.write('<td width="30%" align="center" style="text-decoration: underline;">'+data.created_at+'</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="30%"></td>');
// frameDoc.document.write('<td width="40%"></td>');
// frameDoc.document.write('<td width="30%" align="center">Date</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr><td></td></tr>');
// frameDoc.document.write('<tr><td></td></tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="30%">Approved By: </td>');
// frameDoc.document.write('<td width="40%" align="center">___________________</td>');
// frameDoc.document.write('<td width="30%" align="center">___________________</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="30%"></td>');
// frameDoc.document.write('<td width="40%" align="center">Mr. Veronico F. Reyes</td>');
// frameDoc.document.write('<td width="30%" align="center">Date</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="30%"></td>');
// frameDoc.document.write('<td width="40%" align="center">EVP & General Manager</td>');
// frameDoc.document.write('<td></td>');
// frameDoc.document.write('</tr>');
// // frameDoc.document.write('<tr><td></td></tr>');
// // frameDoc.document.write('<tr><td></td></tr>');
// frameDoc.document.write('</table>');
// frameDoc.document.write('<br><br>');
// frameDoc.document.write('<table width="100%" align="center">');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="20%" align="left">Job Received By: </td>');
// frameDoc.document.write('<td width="30%" align="center">Date</td>');
// frameDoc.document.write('<td width="20%"></td>');
// frameDoc.document.write('<td width="30%" align="center">Date</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="20%" align="left">Wax Shop: </td>');
// frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
// frameDoc.document.write('<td width="20%" align="left">Fettling Shop: </td>');
// frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="20%" align="left">Mold Shop: </td>');
// frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
// frameDoc.document.write('<td width="20%" align="left">QA/QC: </td>');
// frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
// frameDoc.document.write('</tr>');
// frameDoc.document.write('<tr>');
// frameDoc.document.write('<td width="20%" align="left">Melting Dept.: </td>');
// frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
// frameDoc.document.write('<td width="20%" align="left">Admin. Dept.: </td>');
// frameDoc.document.write('<td width="30%" align="center">______________________________</td>');
// frameDoc.document.write('</tr>');

// frameDoc.document.write('</table>');

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



</script>
@endpush

@stop
