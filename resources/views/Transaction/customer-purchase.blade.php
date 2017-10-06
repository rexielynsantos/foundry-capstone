@extends('master')
@section('pageTitle', 'Customer Purchase')
@section('content')


<form class="" id="customer_purchase_form" role="form" data-toggle="validator">

    <section class="content">

      <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                 <img src="../images/mainlogo.png" alt="User Avatar">
              </div>

              <h3 class="widget-user-username" style="color:black">Customer Purchase</h3>
              <h5 class="widget-user-desc"><a href="#" style="color:black"> <label id="maxCustPurchase"></label></a></h5>
              <a href="/transaction/customerPurchases" style="margin-left:70px"  class="btn btn-social btn-instagram"><i class="fa fa-shopping-cart"></i> View Purchases </a>

            </div>
      <div class="row">

      <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">&nbsp;&nbsp;Customer Details</a></li>
              <li><a href="#tab_2" data-toggle="tab">&nbsp;&nbsp;Order Details</a></li>

            </ul>
 
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="modName" class="control-label">Customer P.O. No.<span style="color:red">*</span></label>
                          <input type="text" class="form-control validate" disabled id ="custPONo" required>
                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Order Date:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                          </div>

                          <input type="text" class="form-control pull-right" id="orderDate">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Target Delivery Date:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                          </div>

                          <input type="text" class="form-control pull-right" id="targetDate">
                        </div>
                      </div>
                    </div>
                </div>

               <div class="row">
                   <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="quoteRefer" class="control-label">Reference Quote<span style="color:red">*</span></label>
                          <select class="form-control select2" id = "quoteRefer" style="width: 100%;" required>
                            <option value="first" selected disabled>Select Customer Quote</option>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="quoteCustName" class="control-label">Customer Name:<span style="color:red"></span></label>
                        <input type="text" id="quoteCustName" style="border:none;" readonly>
                        <input type="text" id="quoteCustID" hidden>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <br><br>
              <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button>
                    <button type="button" id="changetabbutton" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i></button>
                  </div>
              </div>
            </div>

            <div class="tab-pane" id="tab_2">
                            <br>
                <div class="row">
                  <div class="col-md-12">
                   <label> Select Products to Order </label>
                  </div>
                </div>
               <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                          <div id="rest">
                            <select id="prodSelect" name="prodSelect" class="form-control select2" multiple="multiple" style="width: 100%;border:1px solid #3434343">
                            </select>
                          </div>
                           <p id="prodCount"></p>
                        </div>
                    </div>
                     <div class="col-md-3">
                            <button type="button" id="addCart" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                      </div>
                    </div>
               <hr>
                <div class="row">
                      <div class="col-md-12">
                        <table id="prodTable" border="0" class="table table-bordered" style="color:black;">
                          <thead>
                            <th class="hidden">ID</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Variance Code</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th> Remarks </th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                      </div>
                    </div>
                     <br>
                     <br>

                <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button>
                    <button type="submit" class="btn bg-blue btn-flat pull-right">Submit</button>
                  </div>
                </div>

              </div>

    </div>

  </section>

</form>
<!--variant modal  -->
</div>

<div class="modal fade" id="modalCostAdded" style="margin-top: 60px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
        <!--   <span aria-hidden="true">&times;</span></button> -->
      </div>
      <div class="modal-body" align="center">
        <h1 style="text-align:center" class="modal-title">Successfully added!</h1>
      </div>
      <div class="modal-footer">

        <button type="button" id="goBack" class="btn btn-success">Go Back</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/customer-purchase.js')}}"></script>
<script>
  $(function(){

    $('#changetabbutton').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_2"]').tab('show');
    })
    $('#changetabbutton1').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_3"]').tab('show');
    })
    $('#changetabbutton2').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_4"]').tab('show');
    })

})
 </script>

@endpush
@stop
