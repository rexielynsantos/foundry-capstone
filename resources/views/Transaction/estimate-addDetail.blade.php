@extends('master')
@section('pageTitle', 'Quote Request')
@section('content')
	
<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="estimate_form" role="form" data-toggle="validator">
	<div class="box box-danger">
		<div class="box-header with-border">
	          <h3 class="box-title">ORDER INFORMATION</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
	          </div>
	    </div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
				      <table  id="orderDetailTable" name="orderDetailTable" class="display" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th class="hidden">ID</th>
				                <th>Customer Name</th>
				                <th class="col-md-5">Order Description</th>
				                <th>Quantity</th>
				                <th>Remarks</th>

				            </tr>
				        </thead>
				        <tbody>
				            <tr>
				                <td class="hidden">QR00001</td>
				                <td>Rexielyn Santos</td>
				                <td>
				                	PV-025 B 
				                	<a> <span class="pull-right-container">
						              <i class="fa fa-angle-left pull-left"></i>
						            </span> </a>
				                </td>
				                <td> 350pcs </td>
				                <td> <input type="number" id="orderCost">  </td>
				            </tr>
				        </tbody>
				       </table>
  					 </div>
			</div>	
		</div>
	</div>
</form>

@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/estimate.js')}}"></script>
<script>
$(document).ready(function() {
            $('#orderDetailTable').DataTable();
        });

function displayProduct(prd)
{
	var e = document.getElementById("prodSelect");
	var strUser = e.options[e.selectedIndex],value;
	var products = new Array();
	products.push(strUser);
	console.log(products);

}
</script>
@endpush
@stop
