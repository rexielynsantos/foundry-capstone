@extends('master')
@section('pageTitle', 'Job Order')
@section('content')

<div class="box box-info">
	<div class="row">
		<div class="col-md-4">
			<b> <h4 style="color:;black;"> &nbsp; Job Orders </h4></b>
		</div>
	</div><hr>
	<div class="row">
	  <div class="box-body">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/turn-down.png">
			<div class="btn-group">
	            <button type="button" class="btn btn-default">Bulk Action</button>
	            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		            <span class="caret"></span>
		            <span class="sr-only">Toggle Dropdown</span>              
		        </button>
            		<ul class="dropdown-menu" role="menu">
				        <li><a href="#">Confirm Job</a></li>
				        <li><a href="#">Cancel Job</a></li>
				        <li class="divider"></li>
				        <li><a href="#">Import Job Orders</a></li>
				        <li><a href="#">Export Job Orders</a></li>
		            </ul>
        	</div>

	        <div class="btn-group">
                <button type="button" class="btn btn-default">Print</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	                <span class="caret"></span>
	                <span class="sr-only">Toggle Dropdown</span>
	            </button>
	                <ul class="dropdown-menu" role="menu">
		                <li><a href="#">Customer Job Order</a></li>
		                <li><a href="#">Job Summary</a></li>
	                </ul>
	        </div>

	        <button id="btnAddJob" class="btn bg-blue btn-flat margin"><i class="fa fa-plus"> <a style="color:white" href="../transaction/jobOrder-add"> </i>  Add New Job Order&nbsp; </a></button> 
   		</div>
	</div>

 	<div class="box-body">
  		 <table id="jobs" class="display select" cellspacing="0" width="100%">
   			<thead>
			      <tr height="10px">
			         <th><input type="checkbox" name="select_all" value="1" id="jobs-select-all"></th>
			         <th>JO No.</th>
			         <th>Customer</th>
			         <th>Order Details</th>
			         <th>Current Stage</th>
			         <th>Status</th>
			      </tr>
   			</thead>
   			<tbody>
   				<tr>
	   				<td> <input type="checkbox" name="select-first" value="1" id="quote-select-first"> </td> 
	   				<td> JO-00001</td>
	   				<td> Rexielyn Santos </td>
	   				<td> PROD </td>
	   				<td> VAR HERE </td>
	   				<td> 
	   					<span class="pull-right-container">
	  						<small class="label bg-green">CONFIRMED</small>
						</span>
					</td> 
   				</tr>
   				<tr>
	   				<td> <input type="checkbox" name="select-first" value="1" id="order-select-first"> </td> 
	   				<td> JO-00001 </td>
	   				<td> Polene Afable </td>
	   				<td> PROD </td>
	   				<td> VAR HERE </td>
	   				<td> 
	   					<span class="pull-right-container">
	  						<small class="label bg-green"> CONFIRMED</small>
						</span>
					</td> 
   				</tr>
   			</tbody>
   		</table>
	</div>
</div>
	   
	
@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/joborder.js')}}"></script>
@endpush
@stop