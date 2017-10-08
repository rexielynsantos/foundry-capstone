@extends('master')
@section('pageTitle', 'Customer')
@section('content')

<section class="content">
<div class="col-md-12">
          <input type="text" id="checkCustomerID" value="{{ Session::get('editstrCustomerID') }}" hidden>
          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">New Customer</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
              	 
            </div>
            <div class="box-footer">
              <div class="col-md-12">
				<div class="box-body">
					  <h4 style="text-align: center"> Customer Information </h4>
            <form id="cust_form" role="form" data-toggle="validator">

					<div class="row">
					    <div class="col-md-6">
						  <div class="form-group has-feedback">
						    <div class="form-group">
						      <label for="compName" class="control-label">Company Name<span style="color:red">*</span></label>
						      <input type="text" class="form-control validate letter" id ="custName" required
						      data-error="Customer name is required."
						      data-minlength-error="Minimum length 6."
						      data-minlength="2"
						      maxlength="35"
                  value="{{ Session::get('editstrCompanyName') }}">
						      <div class="help-block with-errors"></div>
						      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						    </div>
					      </div>
				        </div>
				    </div>
				    <div class="row">
				    	<div class="col-md-12">
				    		 <label> Address<span style="color:red">*</span> </label>
				    	</div>
				    </div>
				     <div class="row">
                <div class="col-md-4">

                  <div class="form-group">
                    <input type="text" id="streetNum" class="form-control validate" placeholder="Street/Bldg. "required value="{{ Session::get('editstrCustStreet') }}">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" id="brgy" class="form-control validate letter" placeholder="Brgy/Subd " required value="{{ Session::get('editstrCustBrgy') }}">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" id="city" class="form-control validate letter" placeholder="City " required value="{{ Session::get('editstrCustCity') }}">
                  </div>
                </div>
              </div>

				</div>
			  </div>
			  <hr>
			  <h4 style="text-align: center"> Contact Information </h4>
		   <div class="col-md-12">

				<div class="box-body">

					    <hr>

					 <div class="row">
				    	<div class="col-md-9">
		               	 <label> Company Telehone Number </label>
		                  	<div class="form-group">
		                    	<input class="form-control number" type="text" id="telNo"
                           placeholder="ex. 999-99-99"
                           data-error="Telephone number is required."
         						       data-minlength-error="Minimum length 7."
                           minlength="7"
                           maxlength="7"
                           required
                           value="{{ Session::get('editstrCustTelNo') }}">
                 		 	</div>
                	    </div>
				    </div>

				    <label for="compName" class="control-label">Contact Person<span style="color:red">*</span></label>
				      <div class="row">
					    <div class="col-md-12">
						  <div class="form-group has-feedback">
						    <div class="form-group">

						      <input type="text" class="form-control validate letter" placeholder="Name" id ="contactName" required
						      data-error="Contact name is required."
						      data-minlength-error="Minimum length 6."
						      minlength="2"
						      maxlength="35">
						      <div class="help-block with-errors"></div>
						      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						      <small class="pull-right"> <a> <button type="button" id="addContactPerson"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Contact Person</a></button> </small>
						    </div>
					      </div>
				        </div>
				    </div>

				    <div class="row">

					   <div class="col-md-12">
					   <label for="compName" class="control-label">Contact Person(s)</label>
                        <table id="contactPersonTable" border="0" class="table table-bordered" style="color:black;">
                          <thead>
                            <!-- <th class="hidden">ID</th> -->
                            <th width="50%">Name</th>
                            <th width="50%">Contact Number</th>
                            <th>Action</th>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                      </div>
				    </div>
            <br>
				    <div class="row">
				    	<div class="col-md-9">
		               	 <label> Company Email Address </label>
		                  	<div class="form-group">
		                    	<input type="email" class="form-control" id="custEmail" placeholder="Email " required value="{{ Session::get('editstrCustEmail') }}">
                 		 	</div>
                	    </div>
				    </div>
				    <div class="modal-footer">
		                <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
		                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
		            </div>

          </form>
				</div>


		   </div>


          </div>
        </div>
   </div>



		<div class="modal fade" id="modalAdded" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!--   <span aria-hidden="true">&times;</span></button> -->
                <h4 style="text-align:center" class="modal-title">Successfully added New Customer!</h4>
              </div>
              <div class="modal-body" align="center">
                <input type="text" id="addedCustomer" style="background-color:white; border:none; font-size:150%;" disabled><br>
                <input type="text" id="addedCustomerID" style="background-color:white; border:none; font-size:100%;" disabled>
              </div>
              <div class="modal-footer">

                <button type="button" id="addAnother" class="btn btn-success">Add Another Customer</button>
 				        <button type="button" id="viewProfileID" class="btn btn-primary">View Profile</button>
 				</div>
            </div>
          </div>
        </div>


</section>


		@push('scripts')
			<script type="text/javascript" src="{{URL::asset('js/logic/customer.js')}}"></script>

		@endpush

@stop
