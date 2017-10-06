@extends('master')
@section('pageTitle', 'Dashboard')
@section('content')




 <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PRODUCTS  </span>
       
              <span class="info-box-number">{{$products}}</span>
       
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa  fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ORDERS</span>
              <span class="info-box-number">{{$orders}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CUSTOMERS</span>
              <span class="info-box-number">{{$customer}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SUPPLIERS</span>
              <span class="info-box-number">{{$supplier}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">ORDERS THIS MONTH</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                	<table id="custTransTable" border="0" class="table table-bordered" style="color:black;">
		                <thead>
		                  <th width="10%">S.O No.</th>
		                  <th width="20%">Company Name</th>
		                  <th width="20%">Ordered Product(s)</th>
		                </thead>
		                <tbody>
		                	<tr>
		                		<td> SO-00001 </td>
		                		<td> Jensen Gomez </td>
		                		<td> Bracket Wheel Mount </td>
		                	</tr>
		                	<tr>
		                		<td> SO-00002 </td>
		                		<td> Reese Lansangan </td>
		                		<td> Baril </td>
		                	</tr>
		                	<tr>
		                		<td> SO-00003 </td>
		                		<td> Bullet Dumas </td>
		                		<td> M200 Trigger </td>
		                	</tr>
		                	<tr>
		                		<td> SO-00004 </td>
		                		<td> Moira Dela Torre </td>
		                		<td> M200 Hammer </td>
		                	</tr>
		                	<tr>
		                		<td> SO-00005 </td>
		                		<td> Clara Benin </td>
		                		<td> Artwork </td>
		                	</tr>

		                </tbody>
		              </table>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Product Costing Done</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Approved Quotations</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Processed Jobs</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Released Orders</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
    </section>
    <!-- /.content -->
    
<!-- 
<div class="row">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-6" >
              <div class="info-box" style="height:120px">

                <span class="info-box-icon bg-light-blue-gradient" style="height:120px"><i class="fa fa-cart-plus"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">In-Process Orders</span>
                  <span class="info-box-number">90</span>
                </div>
  
              </div>
      </div>
      <div class="col-md-6">
              <div class="info-box" style="height:120px">
                <span class="info-box-icon bg-aqua" style="height:120px"><i class="fa fa-truck"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Finished Orders</span>
                  <span class="info-box-number">500</span>
                </div>
  
              </div>
      </div>
    </div>

  </div>
  <div class="col-md-4">
    <div class="box box-solid bg-light-blue-gradient">
      <div class="box-header">
        <div class="pull-right box-tools">
          <button type="button" id="daterange-btn" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                  title="Date range">
            <i class="fa fa-calendar"></i></button>
          <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                  data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
            <i class="fa fa-minus"></i></button>
        </div>
        <i class="fa fa-cart-plus"></i>

      <h3 style="color:white" class="box-title">
          Inventory Summary
        </h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <p style="text-align: left"> Quantity On-hand:  </p> 
          </div>
          <div class="col-md-6">
            1500
          </div>
        </div>
           <div class="row">
          <div class="col-md-6">
            <p style="text-align: left"> Quantity to be Received:  </p> 
          </div>
          <div class="col-md-6">
            1500
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="box box-solid bg-white-gradient">
              <div class="box-header">
                

                <h3 style="color:black" class="box-title"><i class="fa fa-map-pin"></i>&nbsp; Top Selling Products</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn bg-white btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-white btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
              </div>

      </div>
 </div>
  <div class="col-md-4">
    <div class="box box-solid bg-light-blue-gradient">
      <div class="box-header">
        <div class="pull-right box-tools">
          <button type="button" id="daterange-btn" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                  title="Date range">
            <i class="fa fa-calendar"></i></button>
          <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                  data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
            <i class="fa fa-minus"></i></button>
        </div>
        <i class="fa fa-cart-plus"></i>

      <h3 style="color:white" class="box-title">
         Purchases
        </h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <p style="text-align: left"> Quantity Ordered:  </p> 
          </div>
          <div class="col-md-6">
            1500
          </div>
        </div>
           <div class="row">
          <div class="col-md-6">
            <p style="text-align: left"> Total Cost:  </p> 
          </div>
          <div class="col-md-6">
            1500
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


 -->
     

  

    
@stop
