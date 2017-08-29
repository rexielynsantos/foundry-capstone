@extends('master')
@section('pageTitle', 'New Order Estimate')
@section('content')

<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="estimate_form" role="form" data-toggle="validator">
<input type="text" id="quoteIDHeader" value="{{ Session::get('strQuoteRequestID') }}" hidden>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="header">New Order Estimate</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> View Estimates</a></li>
        <li class="active">Add Estimate</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">


          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="companyName" class="form-control validate letter" value ="{{ Session::get('strCompanyName') }}" placeholder="Customer Name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label> Address </label>
                  <div class="form-group">
                    <input type="text" id="streetNum" class="form-control validate" value="{{ Session::get('strCustStreet') }}" placeholder="Street No. ">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="brgy" class="form-control validate letter" value="{{ Session::get('strCustBrgy') }}" placeholder="Brgy ">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="city" class="form-control validate letter" value="{{ Session::get('strCustCity') }}" placeholder="City ">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label> Email Address </label>
                  <div class="form-group">
                    <input type="email" class="form-control" id="custEmail" value="{{ Session::get('strCustEmail') }}" placeholder="Email ">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                 <label>Contact Number</label>
                  <div class="form-group">
                    <div class="input-group margin">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-phone-square"></i>
                              <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                              <li><a id="btncellphone" href="#">Cellphone Number</a></li>
                              <li><a id="btnhomephone" href="#">Home Phone</a></li>
                              <li><a id="btnworkphone" href="#">Work Phone</a></li>
                            </ul>
                          </div>
                        <input type="text" class="form-control" id ="cust_contact" name="cust_contact" value="{{ Session::get('strCustContactNo') }}" placeholder="ex.09123456789"
                    title="09*********" data-inputmask='"mask": "(99) 999-999-999"' data-mask
                    data-error="Contact number is required." required>
                    </div>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-12">
                  <button type="button" id="submitInfo" class="btn btn-success btn-flat pull-right"><i class="fa fa-arrow-right"></i></button>
                </div>
              </div>

            </div>
          </div>
        </div>


      <div class="col-md-9">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Step 1: Quotation Details</a></li>
              <li><a href="#tab_2" data-toggle="tab">Step 2: Order Details</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="compTo" class="form-control" disabled value="{{ Session::get('strCompanyName') }}" placeholder="To:">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="confAddress" class="form-control" disabled value="{{ Session::get('strCustStreet') }} {{ Session::get('strCustBrgy') }} {{ Session::get('strCustCity') }}" placeholder="Address:">
                  </div>
                </div>
              </div>
               <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="contactPerson" class="form-control" value="{{ Session::get('strCustContactPerson') }}" placeholder="Contact Person:">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">

                  <div class="form-group">
                        <textarea id="quoteNote" class="form-control validate" rows="10" placeholder="Please indicate note here">
                        </textarea>
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
                        <table id="quoteTable" border="0" class="table table-bordered" style="color:black;">
                          <thead>
                            <th class="hidden">ID</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Variant(s)</th>
                            <th>Variance Code</th>
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
          </div>
        </div>
    </div>

  </section>

</form>
<!--variant modal  -->
<div class="modal fade" style="margin-top:30px;" id="varModal" role="dialog">
  <div class="col-md-6 col-md-offset-3">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h4 class="modal-title">
            Add Product Variant
          </h4>
      </center>
      </div>
      <div class="modal-body">

      <div class="row">
        <div class="col-md-12">
          <select id="prodVarSelect" name="prodVarSelect" class='form-control select2' multiple='multiple' style='width: 100%;border:1px solid #3434343'>
            <option></option>
          </select>
          <button id="varqtyAdd" type="button" class="btn bg-blue btn-flat pull-right">Add</button>
        </div>
      </div>


        <div class="row">
          <div class="col-md-12">
            <table id="variantQtyTable" class="display">
              <thead>
                <th>Variant</th>
                <th>Quantity</th>
                <th>U/M</th>
                <th>Action</th>
              </thead>
              <tbody>

              </tbody>
            </table>

          </div>
        </div>

         <div class="modal-footer">
          <button id="prodvarAdd" type="button" class="btn bg-blue btn-flat pull-right">Add to Order</button>
      </div>

      </div>


</div>


    </div>
</div>






@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/estimate-add.js')}}"></script>
<script>
  $(function(){

    $('#changetabbutton').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_2"]').tab('show');
    })

})
 </script>
<script>
function nexttest(evt){
  alert(evt.target.value);
}

function addRow(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var cell1 = row.insertCell(0);
  cell1.innerHTML = rowCount + 1;


  var cell2 = row.insertCell(1);
  var element2 = document.createElement("input");
  element2.type = "text";
  element2.name = "txtbox[]";
  element2.onchange = nexttest;
  cell2.appendChild(element2);

}
</script>

@endpush
@stop
