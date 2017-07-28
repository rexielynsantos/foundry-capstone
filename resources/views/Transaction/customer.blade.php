@extends('master')
@section('content')
<!-- <div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 250%;"> <i class="fa  fa-spinner"></i>&nbsp;&nbsp;&nbsp;Add New Customer </h3><br><br>
</div> -->

<div class="box box-primary col-md-8">
	<div class="box-header with-border">
	 <center> <h3 class="box-title"><i class="glyphicon glyphicon-user"></i> Add Customer</h3></center>
	</div>

	<div class="box-body">
		<div class="row">
		    <div class="col-md-4">
			  <div class="form-group has-feedback">
			    <div class="form-group">
			      <label for="compName" class="control-label">Company Name</label>
			      <input type="text" class="form-control validate letter" id ="custName" required
			      data-error="Customer name is required."
			      data-minlength-error="Minimum length 6."
			      data-minlength="2"
			      maxlength="35">
			      <div class="help-block with-errors"></div>
			      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			    </div>
		      </div>
	        </div>

	        <div class="col-md-4">
			  <div class="form-group has-feedback">
			    <div class="form-group">
			      <label for="custcontactPerson" class="control-label">Contact Person</label>
			      <input type="text" class="form-control validate letter" id ="contactPerson" required
			      data-error="Contact person name is required."
			      data-minlength-error="Minimum length 6."
			      data-minlength="2"
			      maxlength="35">
			      <div class="help-block with-errors"></div>
			      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			    </div>
		      </div>
	        </div>
	    </div>

	    <div class="row">
   			
	    	<div class="col-md-4">
			  <div class="form-group has-feedback">
			    <div class="form-group">
			      <label for="custContactNo" class="control-label">Contact Number</label>
			      	<input type="number" class="form-control" id ="custContactNo" required>
			      	<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			    </div>
		      </div>
	        </div>

	        <div class="col-md-4">
    			<label> Email Address </label>
    			<div class="input-group">
    				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						  <input type="email" class="form-control" placeholder="Email">
    			</div>
    		</div>
        </div> 
        
	  
	    <div class="box-footer">
	      <a href="/transaction/quoteRequest"> <button type="submit" class="btn btn-primary pull-right">Proceed to Orders &nbsp;<i class="fa fa-arrow-right"></i></button> </a>
      	</div>


	   
	</div>

</div>

		@push('scripts')
			<script type="text/javascript" src="{{URL::asset('js/logic/customer.js')}}"></script>
    	<script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script>
		@endpush

@stop