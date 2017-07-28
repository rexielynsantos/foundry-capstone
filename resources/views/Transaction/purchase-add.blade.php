@extends('master')
@section('pageTitle', 'Inventory')
@section('content')


<form class="" id="purchase_form" role="form" data-toggle="validator">
  <section class="content-header">
    <h1>
      New Purchase
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> View Purchases</a></li>
      <li class="active">Add Purchase</li>
    </ol>
  </section>

  <section class="content">
      <div class="row">
        <div class="col-md-4">
          <a href="../transaction/purchaseOrder" class="btn btn-block btn-social btn-github">  <i class="fa fa-arrow-left"></i> Back to Main </a> <br>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Choose Supplier</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              </div>
            </div>

            <div class="box-body">

              <div class="row">
                <div class="col-md-12">
                 <div class="form-group has-feedback">
                  <div class="form-group">
                    <select class="form-control select2" id="supplierselection" style="width: 100%;" required>
                      <option value="first" selected disabled>Select a Supplier</option>
                    @foreach($supplier as $sup)
                    <option>{{$sup->strSupplierName}}</option>
                    @endforeach
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                 </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label> Address </label>
                  <div class="form-group">
                    <input type="text" class="form-control validate letter" id="street" name="street" value="" placeholder="Street" disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="brgy" name="brgy" placeholder="Brgy " disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City " disabled>
                  </div>
                </div>
              </div>
             
              <hr>

              <div class="row">
                <div class="col-md-12">
                  <button id="sendPODetails" type="button" class="btn btn-success btn-flat pull-right"><i class="fa fa-arrow-right"></i></button>
                </div>
              </div>

            </div>
          </div>

        </div>

        <div class="col-md-8">
          <div class="box box-primary direct-chat direct-chat-primary" style="overflow:hidden;height:500px">
            <div class="box-header with-border">
              <h3 class="box-title">New Purchase Order</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body" style="height: 400px">
            <br>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                  <label class="control-label">To:</label>
                    <input id ="supplierTo" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Address:</label>
                    <input id="supplierAdd" type="text" class="form-control">
                  </div>
                </div>
              </div>
               <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="control-label">Attention:</label>
                    <input type="text" class="form-control">
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
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                   </div>
                </div>
              </div>

              <div class="direct-chat-contacts"  style="height: 500px">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../images/girl1.png" alt="User Image">
                        <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Select Materials to Order
                                <small class="contacts-list-date pull-right">2/28/2015</small>
                              </span>
                          <span class="contacts-list-msg">No maximum number of materials to be selected</span>
                        </div>
                    </a>
                  </li>
                </ul>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group" style="margin-left:55px">

                            <select id="matSelect" name="matSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">
                            @foreach ($matt as $mat)
                                <option value="{{$mat->strMaterialName}}">{{$mat->strMaterialName}}</option>
                                @endforeach
                           </select>

                           <span> You chose 3 materials </span>
                        </div>
                      </div>
                      <div class="col-md-3">
                            <button type="button" id="addCart" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="hiddendiv">
                      <div class="col-md-9">
                        <table id="addMaterialsTable" border="0" class="display compact" cellspacing="0" width="100%"  style="margin-left:55px;color:black">
                          <thead style="color:white">
                            <th>Items</th>
                            <th>Re-order Quantity</th>
                            <th>Addtl. Qty</th>
                            <th> U/M</th>
                            <th> Action </th>
                        
                          </thead>
                          <tbody>
                           
                          </tbody>
                      </table>
                      </div>
                     </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

           <div class="box-footer">
              <div class="pull-right">
              <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Orders" data-widget="chat-pane-toggle">
                  Add Purchase Details</button>
                &nbsp;
              <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Submit</button>
             </div>
           </div>
        </div>
      </div>
  </section>

</form>




@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/purchase.js')}}"></script>

@endpush
@stop

