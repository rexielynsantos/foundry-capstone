@extends('master')
@section('pageTitle', 'Customer List')
@section('content')

<section class="content">

<div class="row">
  <div class="col-md-12">
    <a href="/transaction/customers" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Customer</a>
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

            <h3 class="widget-user-username">PFPI Customers</h3>
            <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
                </a>
          </div>
          <div class="box-footer">
            <table id="custTransTable" border="0" class="table table-bordered" style="color:black;">
              <thead>
                <th width="10%">Customer No.</th>
                <th width="20%">Company Name</th>
                <th width="20%">Address</th>
                <th width="20%">Contact(s)</th>
                <th width="5%">Action</th>

              </thead>
              <tbody>
								@foreach ($customers as $cust)
                <tr>
                  <td>{{$cust->strCustomerID}}</td>
                  <td>{{$cust->strCompanyName}}</td>
                  <td> {{$cust->strCustStreet}} {{$cust->strCustBrgy}} {{$cust->strCustCity}}</td>
                  <td>
                  @foreach($cust->contact as $ct)
                   <li width="35%" style="list-style-type:circle"> {{$ct->strContactPersonName}} ( {{$ct->strContactNo}} )</li>
                  @endforeach
                </td>
                  <td> <button type="button" id="{{$cust->strCustomerID}}" onclick='viewProfile(this.id)' class="btn btn-primary">View More Info</button> </td>
                </tr>
								@endforeach

              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>




</section>
@push('scripts')
	<script type="text/javascript" src="{{URL::asset('js/logic/customer.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script>
<script>
$('#custTransTable').DataTable();
</script>
@endpush

@stop
