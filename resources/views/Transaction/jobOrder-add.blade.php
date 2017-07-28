@extends('master')
@section('pageTitle', 'Job Order')
@section('content')
	
<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->

	<div class="box box-danger">
		<div class="box-header with-border">
	          <h3 class="box-title">JOB ORDER REQUESTS</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div>
	    </div>

		<div class="box-body"> 
			<div class="row">
				<div class="col-md-12">
			      <table  id="jobTable" name="jobTable" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>QR No.</th>
			                <th>JO No.</th>
			                <th>Job Description</th>
			                <th>Quantity</th>
			                <th>U/M</th>
			                <th> Start Date </th>
			                <th> Actions </th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td>QR00001</td>
			                <td>JO00001</td>
			                <td>Baril</td>
			                <td width=" 5%"><input type="number"></td>
			                <td width="5%">
                	         <select class="form-control select2" id = "uomSelect" style="width: 100%;border:1px solid #A9A9A9"">
                      			<!-- <option value="" selected disabled>Select Unit</option> -->
		                        <option> pcs</option>
                      		 </select>
			                </td>
			                <td> 12/01/2017 </td>
			                <td> 
			                	<button> Approve </button>
			                	<button> Request for Revision </button> 
			                	<button> Request for Review </button> 
			                	<button> Disapprove </button>
			                </td>
			            </tr>
			        </tbody>
			    </table>
    		</div>
		</div>

		<hr>
		<div class="row">
		<div class="box-header with-border">
	          <h3 class="box-title">JOB ORDER IN PROGRESS</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div>
	    </div>
			<div class="col-md-12">
			      <table  id="jobTable2" name="jobTable2" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>QR No.</th>
			                <th>JO No.</th>
			                <th>Job Description</th>
			                <th>Quantity</th>
			                <th>U/M</th>
			                <th>Target Release</th>
			      
			                <th> Actions </th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td>QR00001</td>
			                <td>JO00001</td>
			                <td>Nagpapagawa ng Baril</td>
			                <td width=" 5%">250</td>
			                <td width="5%">
                	         pcs
			                </td>
			               <td> 12/30/17 </td>
			                <td> 
			                	<button id="btnMonitor"> Monitor Production </button>

			                </td>
			            </tr>
			        </tbody>
			    </table>
    		</div>
		</div>
	</div>
</div>


@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/joborder.js')}}"></script>
<script>

@endpush
@stop
