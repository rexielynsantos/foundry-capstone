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
                <label>Delivery Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="to">
                </div>
              </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                          <label for="supplierSelect" class="control-label">Received from:
                          </label>
                          <select class="form-control select2" id="supplierSelect" style="width: 100%;" required>
                            <option value="first" selected disabled>Search..</option>
                          </select>
                         <!--  <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                   <!-- </div> -->

                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                          <label for="refSelect" class="control-label">Reference PO:
                          </label>
                          <select class="form-control select2" id="refSelect" style="width: 100%;" required>
                            @foreach($purchase as $purch)
                          <option value="first" selected disabled>Search..</option>
                          <option value="{{$purch->strPurchaseID}}">{{$purch->strPurchaseID}}</option>
                          @endforeach
                          </select>
                        <!--   <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
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
            
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <br>
                <div class="row">
                   <label style="margin-left:15px"> Material Name </label>
                </div>
       
               <hr>
               <div class="row">
                 <div class="col-md-12">
                   <table id="receiveMatsTable" class="table table-bordered">
                        <thead>
                          <th width="40%"> Quantity Ordered </th>
                          <th width="40%"> Material </th>
                          <th width="30%"> Order ID </th>
                          <th width="30%"> Quantity Received</th>
                        </thead>
                        <tbody>
                          <tr> 
                            <td> 23pcs</td>
                            <td> Sand (500 kg) </td>
                            <td> PO-00001 x 14 pcs. </td>
                            <td> <input type="number" class="form-control"> </td>
                          </tr>

                        </tbody>
                   </table>
                  </div>
                </div>
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
