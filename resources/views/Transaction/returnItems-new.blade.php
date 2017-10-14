@extends('master')
@section('pageTitle', 'New Record')
@section('content')

<section class="content">
  <div class="row">
      <!-- <div class="col-md-12">
          <a href="/transaction/returnItems" type="button" class="btn bg-primary btn-flat margin pull-right"><i class="fa fa-plus"> </i>&nbsp;&nbsp;Add New Record</a>
      </div> -->
  </div>
<form id="return_form" role="form">

	<div class="row">
		<div class="col-md-12">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">Return Items</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>

            </div>
            <div class="box-footer">
                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                  <label>Return Date:</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="orderDate">
                  </div>
                  <!-- /.input group -->
                </div>
                  </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <label>Supplier</label>
                      <select class="form-control select2" id="supplierselection" style="width: 100%;" required>
                        <option value="first" selected disabled>Select a Supplier</option>

                      </select>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label>Receiving ID:</label>
                    <select class="form-control select2" id="receivingID" style="width: 100%;" required>
                        <option value="first" selected disabled>Search..</option>
                   </select>
                </div>
                </div>
              </div>
              <hr>
              <div class="row">
                  <div class="col-md-12">
                    <table id="returnTable" border="0" class="table table-bordered" style="color:black;">
                      <thead>

                        <th class="hidden">sad</th>

                        <th width="10%">Delivered</th>
                        <th width="30%">Materials</th>
                        <th width="10%">Return Quantity</th>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button>
                    <button type="submit" class="btn bg-blue btn-flat pull-right">Submit</button>
                  </div>
                </div>
            </div>
          </div>
    </div>
	</div>
  </form>

  <div class="modal fade" id="viewPO" style="margin-top: 60px" role="dialog">
  <div class="col-md-6 col-md-offset-3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 style="text-align:center" class="modal-title">S.O. <input type="text" id="purchaseID" style="border:none;" readonly></h3>
        </div>
          <div class="modal-body" align="center">
            kwljeklwjkljkljkl
          </div>
          <div class="modal-footer">
           <!--  <button type="button" id="goBack" class="btn btn-success">Go Back</button> -->
          </div>
      </div>
    </div>
  </div>
</div>

</section>




@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/return.js')}}"></script>
<!-- <script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script> -->
@endpush

@stop
