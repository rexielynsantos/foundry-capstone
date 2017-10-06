@extends('master')
@section('pageTitle', 'Purchase Order')
@section('content')


<form class="" id="purchase_form" role="form" data-toggle="validator">
  <section class="content-header">

  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <a href="/transaction/purchaseOrder" type="button" class="btn bg-blue btn-flat margin pull-left"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;&nbsp;Back to Purchases</a>
      </div>
    </div>
    <br>
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Purchase Details</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              </div>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                <label>Order Date:</label>

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


                   <!-- <div class="form-group has-feedback"> -->
                        <div class="form-group">
                          <label>Supplier</label>
                          <select class="form-control select2" id="supplierselection" style="width: 100%;" required>
                            <option value="first" selected disabled>Select a Supplier</option>
                          @foreach($supplier as $sup)
                          <option value = "{{$sup->strSupplierID}}">{{$sup->strSupplierName}}</option>
                          @endforeach
                          </select>
                          <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                   <!-- </div> -->


                </div>
              </div>

            </div>
          </div>
        </div>

        <div id="hiddenFirsta">
        <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Step 1: Purchase Details</a></li>
              <li><a href="#tab_2" data-toggle="tab">Step 2: Order Details</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                  <label class="control-label">To:</label>
                    <input id ="supplierTo" type="text" class="form-control" disabled="">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Address:</label>
                    <input id="supplierAdd" type="text" class="form-control" disabled="">
                  </div>
                </div>
              </div>
               <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label class="control-label">Attention:</label>
                      <input type="text" id="contactPerson" class="form-control validate letter">
                       <div class="help-block with-errors"></div>
                         <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                   <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="paymentTermName" class="control-label">Payment Term
                          </label>
                          <select class="form-control select2" id="paymentTermSelect" style="width: 100%;" required>
                           <option value="first" selected disabled>Choose A Payment Term</option>
                          @foreach($paymentterm as $term)
                          <option value="{{$term->strPaymentTermID}}">{{$term->strPaymentTermName}}</option>
                          @endforeach

                          </select>
                           <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                   </div>
                </div>

              </div>
              <br>

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
                   <label> Material Name </label>
                  </div>
                </div>
               <div class="row">
                      <div class="col-md-9">
                        <div class="form-group">

                            <select id="matSelect" name="matSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">

                           </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                            <button type="button" id="addCart" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                      </div>
                    </div>
               <hr>
                <div class="row">
                  <div class="col-md-12">
                    <table id="addMaterialsTablee" name="example" border="0" class="table table-bordered">
                      <thead style="color:black">
                        <th class = "hidden">ID</th>
                        <th width="60%">Items</th>
                        <th width="60%">Variant</th>
                        <th width="10%">Re-order Quantity</th>
                        <th width="10%">Base Price</th>
                        <th width="10%">Addtl. Qty</th>
                        <th width="10%"> U/M</th>
                        <th width="10%"> Cost</th>
                      <!--   <th width="10%"> Total Qty</th> -->
                        <th width="10%"> Action </th>

                      </thead>
                      <tbody>

                      </tbody>
                   </table>
                  </div>
                </div>
                <hr>

              <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-4">
                    <label class="pull-right"> Total Cost: <input type="text" id="totCost" value="0" readonly style="border:none;"></label>
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
          </div>
        </div>
        </div>
        </div>








  </section>

</form>




@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/purchase.js')}}"></script>
 <script>
  $(function(){

    $('#changetabbutton').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_2"]').tab('show');
    })

})
 </script>
<!--   <link rel="stylesheet" href="/dist/css/style.css" type="text/css"> -->

@endpush
@stop
