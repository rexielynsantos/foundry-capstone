@extends('master')
@section('pageTitle','Job Orders')
@section('content')

<section class="content">
 <div class="row">
          <div class="col-md-12">
            <a href="/transaction/joborder-new" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Job Order</a>
          </div>
        </div>
          <br>
  <div class="row">
    <div class="col-md-12">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header" style="background-color: #00a65a;">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">Job Orders</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
            </div>
            <div class="box-footer">
              <table id="custTransTable" border="0" class="table table-bordered" style="color:black;">
                <thead>
                  <th width="10%">JO No. </th>
                  <th width="20%">Reference</th>
                  <th width="20%">Customer</th>
                  <th width="%">Date Received</th>
                  <th width="%">Delivery Date</th>
                  <th width="%">Classification</th>
                  <th width="%">Status</th>
                  <th width="11%">Action</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</section>

 @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/newjoborder.js')}}"></script>
  @endpush

@stop
