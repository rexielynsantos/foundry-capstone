@extends('master')
@section('pageTitle', 'Inventory')
@section('content')


<form class="" id="purchase_form" role="form" data-toggle="validator">
  <section class="content-header">
    <h1>
     Inventory
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"> {{date('Y-m-d')}} </a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a id="btnAddpurchase" class="btn btn-block btn-social btn-instagram"><i class="fa fa-edit"></i> New Purchase Order </a>
        <a id="btnAddReceive" class="btn btn-block btn-social btn-linkedin"><i class="fa fa-truck"></i> Receive Delivery </a>
        <a href="/transaction/returnItems" class="btn btn-block btn-social btn-linkedin"><i class="fa fa-truck"></i> Return Items </a>
        <a href="/transaction/stocks" class="btn btn-block btn-social btn-bitbucket"><i class="fa fa-industry"></i> Monitor Stocks </a>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Purchases</h3>


          </div>
          <!-- /.box-header -->
          <div class="box-body">

              <table id="purchasesTable" class="display">
                <thead>
                  <th> PO No. </th>
                  <th> Supplier </th>
                  <th width="30%"> Material </th>
                  <th> Payment Term  </th>
                  <th> Order Date </th>
                  <th> Status </th>
                </thead>
                <tbody>
                @foreach($purchase as $purch)
                 <tr>
                  <td>{{$purch->strPurchaseID}}</td>
                  <td>{{$purch->supplier->strSupplierName}} </td>
                   <td> 
                  @foreach($purch->material as $mat)
                  <li width="35%"> {{$mat->details->strMaterialName}} ( {{$mat->details->variant->intVariantQty}}{{$mat->details->variant->unit->strUOMName}} )</li>
                  @endforeach
                  </td>
                  <td> {{$purch->paymentterm->strPaymentTermName}} </td>
                  </td>
                  <td>{{$purch->dateCreated}}</td>
                  <td> <small class="label pull-right bg-blue">{{$purch->strPStatus}}</small> </td>
                </tr>
                @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>

<div class="modal fade" style="margin-top:50px" id="viewPurchase" role="dialog">
      <div class="col-md-8 col-md-offset-2">
      <div class="box box-primary direct-chat direct-chat-primary" style="overflow:hidden;height:500px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Purchase Order</h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
             <div class="box-body">

              <div class="row">
                <div class="col-md-12">
                  <label class="pull-right"> INSERT DATE HERE </label>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-12">
                   <table border="1">
                    <tr>
                      <td width="450px"> <b> To: </b> Wacker Neuson </td>
                      <td width="450px"> <b> Date: </b>11/9/2015 </td>
                    </tr>
                    <tr>
                      <td width="450px"> <b> Address: </b> Muntinlupa City </td>
                      <td width="450px"> <b> Terms: </b> 30 days after delivery </td>
                    </tr>
                    <tr>
                      <td width="450px"> <b> Attention: </b> Mr. Raul Reyes </td>
                      <td width="450px"> <b> Delivery: </b> 5WEEKS </td>
                   </tr>

                   </table>
                  </div>
              </div>
              <hr>

                <div class="row">
                  <div class="col-md-12">
                   <table border="1">
                    <tr>
                      <td width="180px"> <b> Part Name </b></td>
                      <td width="210px"> <b>  Description </b></td>
                      <td width="150px"> <b> Qty </b>  </td>
                      <td width="130px"> <b> Unit Price </b>  </td>
                      <td width="130px"> <b> Amount </b> </td>
                    </tr>

                    <tr>
                      <td width="180px"> Bracket Wheel Mount</td>
                      <td width="210px">
                        <li width="35%" style="list-style-type:circle"> 500ml</li>
                        <li width="35%" style="list-style-type:circle"> 300ml</li>
                        <li width="35%" style="list-style-type:circle"> 100ml</li>
                      </td>
                      <td width="150px">
                        <li width="35%" style="list-style-type:circle"> 100pcs</li>
                        <li width="35%" style="list-style-type:circle"> 50pcs</li>
                        <li width="35%" style="list-style-type:circle"> 10pcs</li>
                      </td>

                      <td width="130px"> 125.00  </td>
                      <td width="130px"> 28.000.00 </td>
                    </tr>
                    <tr>
                      <td width="180px"> Bracket Wheel Mount</td>
                      <td width="210px">
                        <li width="35%" style="list-style-type:circle"> 500ml</li>
                        <li width="35%" style="list-style-type:circle"> 300ml</li>
                        <li width="35%" style="list-style-type:circle"> 100ml</li>
                      </td>
                      <td width="150px">
                        <li width="35%" style="list-style-type:circle"> 100pcs</li>
                        <li width="35%" style="list-style-type:circle"> 50pcs</li>
                        <li width="35%" style="list-style-type:circle"> 10pcs</li>
                      </td>

                      <td width="130px"> 125.00  </td>
                      <td width="130px"> 28.000.00 </td>
                    </tr>
                    <tr>
                      <td width="180px"> Bracket Wheel Mount</td>
                      <td width="210px">
                        <li width="35%" style="list-style-type:circle"> 500ml</li>
                        <li width="35%" style="list-style-type:circle"> 300ml</li>
                        <li width="35%" style="list-style-type:circle"> 100ml</li>
                      </td>
                      <td width="150px">
                        <li width="35%" style="list-style-type:circle"> 100pcs</li>
                        <li width="35%" style="list-style-type:circle"> 50pcs</li>
                        <li width="35%" style="list-style-type:circle"> 10pcs</li>
                      </td>

                      <td width="130px"> 125.00  </td>
                      <td width="130px"> 28.000.00 </td>
                    </tr>
                   </table>
                  </div>
                </div>
             </div>
           </div>
           <br>
             <div class="pull-right" style="margin-right: 10px;">
              <button type="button"> &nbsp;Generate PDF</button>
            </div>

            </form>
          </div>
        </div>
      </div>
</div>



@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/purchase.js')}}"></script>
 <!-- <script type="text/javascript" src="{{URL::asset('js/logic/receive-add.js')}}"></script> -->
@endpush
@stop
