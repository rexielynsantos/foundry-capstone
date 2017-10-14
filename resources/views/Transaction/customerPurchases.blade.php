@extends('master')
@section('pageTitle', 'Sales Order')
@section('content')

<section class="content">

	<div class="row">
		<div class="col-md-12">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">Sales Order</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
            </div>
            <div class="box-footer">
              <table id="custTransTable" border="0" class="table table-bordered" style="color:black;">
                <thead>
                  <th width="10%">S.O No.</th>
                  <th width="20%">Company Name</th>
                  <th width="20%">Ordered Products</th>
                  <th width="20%">Total Amount</th>
                  <th width="%">Target Delivery</th>
                  <th width="20%">Action</th>
                </thead>
                <tbody>
                   
                </tbody>
              </table>
            </div>
          </div>
    </div>
	</div>

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
  <script type="text/javascript" src="{{URL::asset('js/logic/customerPurchases.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/logic/pdfCustomerPurchases.js')}}"></script>
<!-- <script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script> -->
@endpush

@stop
