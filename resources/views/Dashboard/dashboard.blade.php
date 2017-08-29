@extends('master')
@section('pageTitle', 'Dashboard')
@section('content')


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



     

  

    
@stop
