@extends('master')
@section('pageTitle', 'Product Costing')
@section('content')

<section class="content">
  <div class="row">
  <div class="col-md-12">
    <a href="/transaction/order-costing" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Costing</a>
  </div>
</div>
<br>

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
                                <td> {{date('Y-m-d')}}</td>
                                <td>
                                  <button type="button" id="{{$vc->strCostingID}}" onclick="approveModal(this.id)" class="btn btn-success"><i class="fa fa-check"></i></button>
                                  <button type="button" id="{{$vc->strCostingID}}" onclick="disapproveModal(this.id)" class="btn btn-danger"><i class="fa fa-close"></i></button>
																	<button type="button" id="{{$vc->strCostingID}}" onclick="viewCosting(this.id)" class="btn btn-primary"><i class="fa fa-eye"></i></button>
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
                                <td> {{date('Y-m-d')}}</td>
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
// var companyName = data[0].strCompanyName;
// var custStreet = data.custpurchase.customer.strCustStreet;
// var custCity = data.custpurchase.customer.strCustCity;
// var contactPerson = data.custpurchase.customer.contact[0].strContactPersonName;

var frame1 = $('<iframe />');
frame1[0].name = "frame1";
frame1.css({ "position": "absolute", "top": "-1000000px"});
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
frameDoc.document.write('</head><body>');
frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%" align="left"><p align="left" style="text-decoration: underline; font-weight:bold;">INVESTMENT CASTED PARTS COSTING</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%" align="left">PART NAME: '+ data[0].strProductName +' </td>');
frameDoc.document.write('<td width="17%"></td>');
frameDoc.document.write('<td width="30%"><p align="left">Date: </p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%"><p align="left">CUSTOMER: '+ data[0].strCompanyName +' </p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('</table>');
frameDoc.document.write('<table align="left" width="70%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="40%">Material:</td>');
frameDoc.document.write('<td width="%"><p align="right">Sp. Gravity of Metal: </p></td>');
frameDoc.document.write('<td width="%"><p align="right" style="border:1px solid;">'+ data[0].dblSpecificGravity +'</p></td>');
frameDoc.document.write('<td width="%"><p align="left"> = Steel</p></td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="%"><p align="left">PART SPECIFICATION:</p></td>');
frameDoc.document.write('</tr></table>');

frameDoc.document.write('<table align="left" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Surface Area = </td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0]. dblSurfaceArea +'</td>');
frameDoc.document.write('<td width=""><p align="left">sq. cm.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr ><td width="30%"><p align="left" style="margin-left:12px">Weight: </td></tr>');
frameDoc.document.write('<tr ><td width="30%"><p align="left" style="margin-left:60px">as Wax: </td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:80px">NonFilled = </p></td>');
frameDoc.document.write('<td width="" align="right" >'+ data[0].dblWeightNonFilled +' </td>');
frameDoc.document.write('<td width=""><p align="left"> gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:80px">Filled = </p></td>');
frameDoc.document.write('<td width="" align="right" >'+ data[0].dblWeightFilled +' </td>');
frameDoc.document.write('<td width=""><p align="left"> gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:80px">Soluble = </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblWeightSoluble +' </td>');
frameDoc.document.write('<td width=""><p align="left"> gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:80px">Reclaimed = </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblWeightReclaimed +' </td>');
frameDoc.document.write('<td width=""><p align="left"> gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:60px">as Metal = </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblWeightAsMetal +' </td>');
frameDoc.document.write('<td width="10%"><p align="left"> gms.</td>');
frameDoc.document.write('<td width=""><p align="left">'+ "data" +' gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Volume = </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblMainVolume +' </td>');
frameDoc.document.write('<td width="10%"><p align="left"> gms.</td>');
frameDoc.document.write('<td width=""><p align="left">'+ "data" +' gms.</td>');
frameDoc.document.write('</tr></table>');
frameDoc.document.write('<br>');

frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" >PRODUCTION DATA: </td>');
frameDoc.document.write('<td width="" align=""><p style="margin-left:60px">Single runner-BIG</p></td>');
frameDoc.document.write('</tr></table>');
frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr ><td width="30%"><p align="left" style="margin-left:12px">Runner type = </td>');
frameDoc.document.write('<td width="26%" align="center" style="border:1px solid;">'+ data[0].dblRunnerType +'</td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">Area = </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblArea +' </td>');
frameDoc.document.write('<td width=""><p align="left">sq. cm.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">Volume = </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblSideVolume +' </td>');
frameDoc.document.write('<td width=""><p align="left">cu. cm.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">Weight = </p></td>');
frameDoc.document.write('<td width="" align="right">'+ data[0].dblWeight +' </td>');
frameDoc.document.write('<td width=""><p align="left">sq. cm.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Sprue type = </td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblSprueType +'</td>');
frameDoc.document.write('<td width=""><p align="left">sq. cm.</td>');
// frameDoc.document.write('<td width="" align="center" style="border:1px solid;">'+ "data" +'</td>');
// frameDoc.document.write('<td width=""><p align="left">gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Cluster Area = </td>');
frameDoc.document.write('<td width="" align="right" >'+ data[0].dblClusterArea +'</td>');
frameDoc.document.write('<td width=""><p align="left">sq. cm.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr><td width="30%"><p align="left" style="margin-left:12px">Cluster Weight: </td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">as Wax: </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblClusterWeightAsWax +' </td>');
frameDoc.document.write('<td width=""><p align="left">gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">as Metal: </p></td>');
frameDoc.document.write('<td width="" align="right" style="border:1px solid;">'+ data[0].dblClusterWeightAsMetal +' </td>');
frameDoc.document.write('<td width=""><p align="left">gms.</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:12px">Pcs per Cluster = </td>');
frameDoc.document.write('<td width="" align="center" style="border:1px solid;">'+ data[0].intPcsPerCluster +'</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr><td width="30%"><p align="left" style="margin-left:12px">Prod. Efficiency: </td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">at Injection = </p></td>');
frameDoc.document.write('<td width="" align="center" style="border:1px solid;">'+ data[0].dblEfficiencyAtInjection +' </td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">at Assembly = </p></td>');
frameDoc.document.write('<td width="" align="center" style="border:1px solid;">'+ data[0].dblEfficiencyAtAssembly +' </td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">at Coating = </p></td>');
frameDoc.document.write('<td width="" align="center" style="border:1px solid;">'+ data[0].dblEfficiencyAtCoating +' </td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"><p align="left" style="margin-left:30px">at Casting = </p></td>');
frameDoc.document.write('<td width="" align="center" style="border:1px solid;">'+ data[0].dblEfficiencyAtCasting +' </td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('</table>');
frameDoc.document.write('<br>');

frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr><td width="30%"><p align="left" >COST COMPUTATION: </td></tr></table>');

frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="30%"></td>');
frameDoc.document.write('<td width="7%" align="center"></td>');
frameDoc.document.write('<td width="13%" align="center"><font color="blue">Modified</font></td>');
frameDoc.document.write('<td width="13%" align="center" style="text-decoration:underline;">UNIT COST</td>');
frameDoc.document.write('<td width="10%" align="center" style="text-decoration:underline;">USAGE</td>');
frameDoc.document.write('<td width="10%" align="center" style="text-decoration:underline;">COST</td>');
frameDoc.document.write('</tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="%"><p style="margin-left:12px">A. Materials</p></td>');
frameDoc.document.write('<td align="center"></td>');
frameDoc.document.write('<td align="center" style="text-decoration:underline;"><font color="blue">'+ data[0].updated_at +'</font></td>');
frameDoc.document.write('</tr>');

var total = 0;
for(var i = 0; i < data.length; i++){
  frameDoc.document.write('<tr>');
  frameDoc.document.write('<td width="30%"><p style="margin-left:25px;">'+ data[i].strMaterialName +' =</p></td>');
  frameDoc.document.write('<td width="7%" align="center">(per kg)</td>');
  frameDoc.document.write('<td width="13%" align="center"><font color="blue">' + data[i].dblMatCost + '</font></td>');
  frameDoc.document.write('<td width="13%" align="right">' + data[i].dblMatCost + '</td>');
  frameDoc.document.write('<td width="10%" align="right">' + data[i].dblUsage + '</td>');
  total = total + data[i].dblFinalCost;
  frameDoc.document.write('<td width="10%" align="right">' + data[i].dblFinalCost + '</td>');
  frameDoc.document.write('</tr>');
}


frameDoc.document.write('</table>');
frameDoc.document.write('<table align="center" width="100%">');
frameDoc.document.write('<tr><td width="90%"></td><td width="10%" align="right"><p style="margin-left:25px;">________</p></td></tr>');
frameDoc.document.write('<tr>');
frameDoc.document.write('<td width="90%" align="right">Total Material -Wax / Mold Shop:</td>');
frameDoc.document.write('<td width="10%" align="right"><p style="margin-left:25px;">' + total + '</p></td>');
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



</script>
@endpush

@stop
