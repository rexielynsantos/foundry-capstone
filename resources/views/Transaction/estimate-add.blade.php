@extends('master')
@section('pageTitle', 'Quotation')
@section('content')


<form class="" id="estimate_form" role="form" data-toggle="validator">
    <section class="content">

      <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                 <img src="../images/mainlogo.png" alt="User Avatar">
              </div>
              <h3 class="widget-user-username" style="color:black">Precision Foundry of the Philippines Inc.</h3>
              <h5 class="widget-user-desc"><a href="#" style="color:black"> <label id="maxQuotation"></label></a></h5>
              <h5 class="widget-user-desc"><a href="#" style="color:black"> All fields with <span style="color:red">*</span> are required</a></h5>
              <a href="/transaction/estimate" style="margin-left:70px"  class="btn btn-social btn-instagram"><i class="fa fa-list-alt"></i> View Quotes </a>
            </div>
      <div class="row">

      <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Step 1: Quotation Details</a></li>
              <li ><a href="#tab_2" id="tab2" data-toggle="tab" class="disabled">Step 2: Order Details</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="row" style="margin-left: 5px;">
                <div class="col-md-6">
                <label> Customer Name<span style="color:red">*</span> </label>
                 <select class="form-control select2" id="custSelect" style="width: 100%;" required>
                  <option value="first" selected disabled>Select a Customer</option>
                    @foreach ($cust as $cs)
                      <option value="{{ $cs->strCustomerID }}">{{ $cs->strCompanyName }}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <br>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="confAddress" class="form-control" disabled placeholder="Address:">
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-6">

                  <div class="form-group">
                        <textarea id="quoteNote" class="form-control validate" rows="5" style="resize:none;" placeholder="Please indicate note here">
                        </textarea>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-6">
                  <div class="checkbox">
                      <label>
                        <input type="checkbox" id="termsCondition">
                        Use Terms and Condition
                      </label>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 5px;">
                <div class="col-md-6">
                  <div class="checkbox">
                      <label>
                        <textarea id="termsConditionView" rows="8" cols="80" readonly style="border:none; resize:none;" hidden></textarea>
                      </label>
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
                <input type="text" id="costingID" hidden>
                <div class="row">
                      <div class="col-md-12">
                        <table id="quoteTable" border="0" class="table table-bordered" style="color:black;">
                          <thead>
                            <th class="hidden">ID</th>
                            <th>Description</th>
                            <th>Materials</th>
                            <th>Unit Cost</th>
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
            Add Product Variance
          </h4>
      </center>
      </div>
      <div class="modal-body">

      <div class="row">
        <div class="col-md-12">
          <select id="prodVarSelect" name="prodVarSelect" class='form-control select2' style='width: 100%;border:1px solid #3434343'>
            <option value="0" selected>--Select Variance--</option>
          </select>
        </div>
      </div>
      <br><br>
      <b>Product: </b> <input type="text" id="varianceProduct" style="font-weight:bold;font-size:120%; background-color:white ;border:none;" disabled>

        <div class="row">
          <div class="col-md-12">
            <table id="variantQtyTable" class="display">
              <thead>
                <tr>
                  <th>Material(s)</th>
                </tr>
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
</div>

        <div class="modal fade" id="quotationAddModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <!--   <span aria-hidden="true">&times;</span></button> -->
                <h4 style="text-align:center" class="modal-title">Successfully added Quote No.00001</h4>
              </div>
              <div class="modal-body" align="center">
               <!--  <input type="text" id="addedCustomer" style="background-color:white; border:none; font-size:150%;" disabled><br>
                <input type="text" id="addedCustomerID" style="background-color:white; border:none; font-size:100%;" disabled> -->
              </div>
              <div class="modal-footer">

                <button type="button" id="reloader" class="btn btn-success">Add Another Quote</button>
                <button type="button" class="btn btn-primary">View Quote</button>
        </div>
            </div>
          </div>
        </div>

<style media="screen">
.disabled{
  pointer-events: none;
  cursor: default;
  opacity:0.6;
}
</style>

@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/estimate-add.js')}}"></script>
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
