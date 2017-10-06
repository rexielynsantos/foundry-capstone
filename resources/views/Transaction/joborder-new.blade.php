@extends('master')
@section('pageTitle', 'New Job Order')
@section('content')


<form class="" id="jonew_form" role="form" data-toggle="validator">

    <section class="content">

      <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                 <img src="../images/mainlogo.png" alt="User Avatar">
              </div>

              <h3 class="widget-user-username" style="color:black">New Job Order</h3>
              <h5 class="widget-user-desc"><a href="#" style="color:black"> <label id="max"></label></a></h5>
               <a href="/transaction/joborders" style="margin-left:70px" class="btn btn-social btn-tumblr"><i class="fa fa-cubes"></i> View Job Orders </a>
               <br>
            </div>
      <div class="row">

      <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">&nbsp;&nbsp;New</a></li>  
            </ul>
            


            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group has-feedback"> 
                        <div class="form-group">
                          <label for="refPO" class="control-label">Reference P.O. No.<span style="color:red">*</span></label>
                           <select class="form-control select2" id = "refPO" style="width: 100%;" required>
                            <option value="first" selected disabled>Select Customer PO</option>
                            @foreach($custpur as $cp)
                              <option value="{{$cp->strCustPurchaseID}}">{{$cp->strCustPurchaseID}}</option>
                            @endforeach
                          </select>
                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                </div>

               <div class="row">
                  <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="customerName" class="control-label">Customer Name<span style="color:red">*</span></label>
                          
                          <input type="text" disabled id = "customerName" class="form-control pull-right" style="width: 100%;">
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                  </div>
                   <div class="col-md-4">
                      <div class="form-group">
                        <label> Date Received:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                          </div>
                          
                          <input disabled type="text" class="form-control pull-right" id="dateReceived">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Delivery Date:</label>  

                        <div class="input-group date">
                          <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                          </div>
                          
                          <input disabled type="text" class="form-control pull-right" id="dateDelivery">
                        </div>
                      </div>
                    </div>

                     <div class="row" style="margin-left: 5px;">
                      <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                              <input id="radioRepeat" type="radio"   >
                              Repeat Order
                            </label>

                            <label>
                              <input id="radioNew" type="radio">
                              New Product
                            </label>
                        </div>
                      </div>
                     </div>

                     <hr>

                    </div>

                     <div class="row">
                        <div class="col-md-12">
                          <table id="jobDescTable" class="table table-bordered">
                            <thead>
                              <th>Job Descriptions</th>
                              <th>Qty</th>
                              <th>U/M</th>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                      <div class="col-md-12">
                        <label> Remarks </label>
                        <textarea id="remarks" class="form-control validate" rows="5" placeholder="Please indicate remarks here">
                        </textarea>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group has-feedback">
                            <div class="form-group">
                              <label for="userName" class="control-label">Prepared by</label>
                              <input type="text" value="{{ Auth::user()->name }}" class="form-control validate" id ="userName" disabled>
                              <div class="help-block with-errors"></div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group has-feedback">
                            <div class="form-group">
                              <label for="date" class="control-label">Date</label>
                              <input type="date" class="form-control validate" value="{{date('Y-m-d')}}" id ="date" disabled>
                              <div class="help-block with-errors"></div>
                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                           </div>
                        </div>
                    </div>

                <br><br>  
              <div class="row">
                 <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                    <button type="submit" data-toggle="modal" data-target="#jobOrderAdded" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Send Request</button>
                </div>
              </div>
            </div>
    </div>

  </section>

    <div class="modal fade" id="jobOrderAdded" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!--   <span aria-hidden="true">&times;</span></button> -->
                <h4 style="text-align:center" class="modal-title">Successfully sent Job Order for approval!</h4>
              </div>
              <div class="modal-body" align="center">
                <input type="text" id="addedJobOrderID" style="background-color:white; border:none; font-size:100%;" disabled>
              </div>
              <div class="modal-footer">

                <a href="/transaction/joborder-new"><button type="button" href="/transaction/customers" class="btn btn-success">Create Another Job Order</button></a>
                <a href="/transaction/joborders"><button type="button" class="btn btn-primary">View Job Order</button></a>
        </div>
            </div>
          </div>
        </div>

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
 <script type="text/javascript" src="{{URL::asset('js/logic/newjoborder.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/logic/pdfJobOrder.js')}}"></script>
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
