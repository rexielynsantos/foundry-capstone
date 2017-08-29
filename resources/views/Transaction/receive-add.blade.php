@extends('master')
@section('pageTitle', 'Receive Supplies')
@section('content')

<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="receive_form" role="form" data-toggle="validator">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receiving and Inspection

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="../transaction/purchaseOrder" class="btn btn-primary btn-block margin-bottom">Back</a>
          <a href="../transaction/receive" class="btn btn-success btn-block margin-bottom">View All Receiving Records</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Delivery Details</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
           <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                          <label for="refSelect" class="control-label">Reference:
                          </label>
                          <select class="form-control select2" id="refSelect" style="width: 100%;" required>
                            @foreach($purchase as $purch)
                          <option value="first" selected disabled></option>
                          <option value="{{$purch->strPurchaseID}}">{{$purch->strPurchaseID}}</option>
                          @endforeach
                          </select>
                        <!--   <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                          <label for="supplierSelect" class="control-label">Received from:
                          </label>
                          <select class="form-control select2" id="supplierSelect" style="width: 100%;" required>

                          </select>
                         <!--  <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                   <!-- </div> -->

                </div>
              </div>



              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                <label>Delivery Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="to">
                </div>
                <!-- /.input group -->
              </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-success btn-flat pull-right"><i class="fa fa-arrow-right"></i></button>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-9">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Step 1: Receiving</a></li>
              <li><a href="#tab_2" data-toggle="tab">Step 2: Inspection</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <br>
                <div class="row">
                   <label style="margin-left:15px"> Material Name </label>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                       <select id="matReceiveSelect" name="matReceiveSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">
                       </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                        <button type="button" id="addCarts" style="height: 33px" class="btn btn-primary btn-flat">Add</button>
                  </div>
                 </div>
               <hr>
               <div class="row">
                 <div class="col-md-12">
                   <table id="receiveMatsTable" class="table table-bordered">
                        <thead>
                        <th class="hidden"> ID</th>
                          <th width="40%"> Material</th>
                          <th width="40%"> Variant</th>
                          <th width="30%"> Quantity Received </th>
                         <!--  <th width="30%"> U/M </th> -->
                          <th width="30%"> Action </th>
                        </thead>
                        <tbody>

                        </tbody>
                   </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button>
                    <button type="button" id="changetabbutton" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i></button>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab_2">
              <table id ="invInspectTable" class="display">
                <thead>

                  <th> Remaining Items </th>
                  <th> Action </th>
                </thead>

                <tbody>
                  <tr>
                    <td> Buhangin - 50 pcs </td>
                    <td> <select class="form-control select2">
                          <option> Supplier Return </option>
                          <option> Waiting for Delivery </option>
                          </select>
                    </td>
                  </tr>

                </tbody>
              </table>

            <hr>

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
  </section>

</form>






@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/purchase.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/logic/receive-add.js')}}"></script>
 <script>
 $('#invInspectTable').DataTable();
 </script>
@endpush
@stop
