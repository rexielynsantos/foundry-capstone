@extends('master')
@section('pageTitle', 'Receive Supplies')
@section('content')

<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="estimate_form" role="form" data-toggle="validator">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receiving and Inspection 
       <!--  <small>13 new messages</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> View Quotes</a></li>
        <li class="active">Add Quote</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="../transaction/receive" class="btn btn-primary btn-block margin-bottom">View Receiving Records</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Delivery Details</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                   
                   <!-- <div class="form-group has-feedback"> -->
                        <div class="form-group">
                          <label for="supplierSelect" class="control-label">Received from:
                          </label>
                          <select class="form-control select2" id="supplierSelect" style="width: 100%;" required>
                           @foreach($receivedFrom as $sup)
                          <option value="{{$sup->strSupplierID}}">{{$sup->strSupplierName}}</option>
                          @endforeach
                          </select>
                          <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                   <!-- </div> -->
                
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                          <label for="refSelect" class="control-label">Reference:
                          </label>
                          <select class="form-control select2" id="refSelect" style="width: 100%;" required>
                          @foreach($purchase as $pur)
                          <option value="{{$pur->strPurchaseID}}">{{$pur->strPurchaseID}}</option>
                          @endforeach
                          </select>
                          <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                </div>
              </div>

               <div class="row">
                <div class="col-md-12"> 
                  <div class="form-group">
                    <label for="supplierSelect" class="control-label">Received from:
                    </label>
                    <input type="text" class="form-control" id="receiveFrom">
                  </div>
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
                  <input type="text" class="form-control pull-right" id="datepicker">
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
                        <button type="button" onclick="displayMaterial()" style="height: 33px" class="btn btn-primary btn-flat">Add</button>
                  </div>
                 </div>
               <hr>
               <div class="row">
                 <div class="col-md-12">
                   <table id="receiveMatTable" class="table table-bordered">

          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary" style="overflow:hidden;height:500px">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body" style="height: 400px">
            <br>
                  <label class="control-label" style="margin-left:18px">Items Delivered</label>
                <div class="row"  style="margin-left:5px">
                      <div class="col-md-9">
                        <div class="form-group">

                           <select id="receiveMatSelect" name="receiveMatSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">
                           </select>

                           <span> You chose 3 materials </span>
                        </div>
                      </div>
                      <div class="col-md-3">
                            <button type="button" onclick="displayProduct()" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                      </div>
                      </div>
             
               <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                   <table id="jobtixTable" border="1" class="display">
                        <thead>
                          <th width="60%"> Material</th>
                          <th width="10%"> Quantity Expected </th>
                          <th width="10%"> Quantity Received </th>
                          <th width="10%"> Cost </th>
                          <th width="10%"> Amount </th>
                        </thead>
                        <tbody>
                         <tr>
                          <td> Buhangin </td>
                          <td> 500 </td>
                          <td> <input type="number"  id="qtyReceived"> </td>
                          <td> <input type="number" id="costReceived"> </td>
                          <td> 12000 </td>
                         </tr>
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
                <br>
                Remaining Items <br>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="row">
                              <div class="col-md-12">
                                  <input type=text" data-placeholder="BUHANGIN" disabled> 
                              </div>
                          </div>
                          
                      </div>
                      <div class="col-md-3">
                          <div class="row">
                              <div class="col-md-12">
                                   <select> 
                              <option> For Supplier Return </option>
                          </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <input type="text"> 
                      </div>

                  </div>
                  <div class="row">
                      <div class="col-md-6">
                       <input type=text" data-placeholder="ayoq na" disabled> 
                      </div>
                      <div class="col-md-3">
                          <select> 
                              <option> For Supplier Return </option>
                          </select>
                      </div>
                       <div class="col-md-3">
                          <input type="text"> 
                      </div>
                  </div>
               <!--  <div class="row">
                   <label style="margin-left:15px"> Rejected Items </label>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                       <select id="matReceiveSelect" name="matReceiveSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">
                       </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                        <button type="button" onclick="displayMaterial()" style="height: 33px" class="btn btn-primary btn-flat">Add</button>
                  </div>
                 </div> -->
               <hr> 
              </div>

            </div>
          </div>
        </div>
    </div>
  </section>

</form>






@push('scripts')
<script>
$('#receiveMatTable').DataTable(
  {
     "searching": false,
     "ordering": false,
     "paging": false,  
     "bInfo" : false,
  });
$(function(){

    $('#changetabbutton').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_2"]').tab('show');
    })

})
</script>

@endpush
@stop

