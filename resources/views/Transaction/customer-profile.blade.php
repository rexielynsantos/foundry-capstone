@extends('master')
@section('pageTitle', 'Customer')
@section('content')

<section class="content">
<!-- <h4> Customer Profile </h4> -->
	<div class="row">
		<div class="col-md-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
              <img src="../images/customer.jpg" class="img-circle" alt="User Avatar">

              </div>
              <!-- /.widget-user-image -->
							<input type="text" id="customerID" value="{{ Session::get('strCustomerID') }}" hidden>
              <h3 class="widget-user-username">{{ Session::get('strCompanyName') }}</h3>
              <h5 class="widget-user-desc"><a type="button"  id="editCustomer" style="color:white"><i class="fa fa-edit"></i> &nbsp;Edit Info</a>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><b> Address </b><br>{{ Session::get('strCustStreet') }} {{ Session::get('strCustBrgy') }} {{ Session::get('strCustCity') }}</a>
                </li>
                <li><a href="#"><b> Company Phone Number </b><br>{{ Session::get('strCustTelNo') }}</a>
                </li>
                <li><a href="#"><b> Email Address </b><br>{{ Session::get('strCustEmail') }}</a>
                </li>
              	<li>
									<table name = "contactTable" id="contactTable" class="table table-bordered">
						        <thead>
						        	<tr>
						        		<th>Contact Person</th>
						            <th>Contact Number</th>
						        	</tr>
						        </thead>
						        <tbody>

						        </tbody>
						      </table>
		            </a>
              	</li>
              	<li><a href="#"><b> Last Order Date: <input type="text" value="{{ Session::get('dtOrderDate') }}" readonly style="border:none;"></b><br>
                </li>
              	<li><a href="#"><b> No. of Transactions made: <input type="text"value="{{ Session::get('transactionsMade') }}" readonly style="border:none;"></b><br></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">

         <!--  <div class="row">
	          <div class="col-md-12">

		      </div>
          </div><br> -->
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Order History</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	          	<table id="custTransTable" border="0" class="table table-bordered" style="color:black;">
	              <thead>
	                <th>S.O No</th>
	                <th width="50%">Status</th>
	                <th>Action</th>
	              </thead>
	              <tbody>
	              </tbody>
	            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <br>
         <div class="col-md-8">
          <div class="box box-default box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Current Order On-Process</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	          	<table id="custTransTable" border="0" class="table table-bordered" style="color:black;">
	              <thead>
	                <th width="20%">J.O No</th>
	                <th width="50%">Quantity Done</th>
	                <th width="50%">Target Quantity</th>
	                <th>Progress</th>
	              </thead>
	              <tbody>
	              	<tr>
	              		<td> JO-00002 </td>
	              		<td> 500 </td>
	              		<td> 1500 </td>
	              		<td>
		              		<div class="clearfix">
		                    	<small class="pull-right">90%</small>
		                    </div>

		                    <div class="progress xs">
		                    	<div class="progress-bar progress-bar-green" style="width: 90%;"></div>
		                    </div>
		                 </td>
	              	</tr>


	              </tbody>
	            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <br>
        <div class="col-md-8">
	        <div class="chart">
	                <canvas id="barChart" style="height: 227px; width: 504px;" width="1008" height="454"></canvas>
	        </div>
	    </div>

      <button id="btnPDF" type="submit">Generate PDF</button>
	</div>




</section>
@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/pdfCustomer.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/logic/pdf.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/logic/customer-contact.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script>

@endpush

@stop
