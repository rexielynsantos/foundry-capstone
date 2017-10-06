@extends('master')
@section('pageTitle', 'Material Requisition')
@section('content')
<input type="text" id="jobID"  value="{{ Session::get('jobOrderID') }}" hidden>
 <div class="modal fade" style="margin-top:50px" id="newRequisitionModal" role="dialog">
        <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">New Material Request</h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">

                  <div class="row">
                    <div class="col-md-12">
                      <label class="pull-right"> {{date('Y-m-d')}} </label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                       <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="jobOrderNo" class="control-label">Reference: <span style="color:red">*</span></label>
                        <select class="form-control select2" id="joborderNo" name="joborderNo" style="width: 100%;" required>
                          <option value="first" selected disabled>Select Job Order No. </option>

                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                      </div>
                    <div class="col-md-4">
                       <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="empName" class="control-label">Requested by: <span style="color:red">*</span></label>
                        <select class="form-control select2" id = "empName" style="width: 100%;" required>
                          <option value="first" selected disabled>Select Personnel</option>

                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                      </div>
                      <div class="col-md-4">

                          <div class="col-md-12">
                            <div class="form-group">
                          <label>Need Date:</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="to">
                          </div>
                            </div>
                          </div>

                      </div>
                  </div>
                  <hr>
                  <div class="row">

                       <div class="col-md-6">
                          <div class="form-group has-feedback">
                          <div class="form-group">
                          <label for="productName" class="control-label">Product</label>

                          <input type="text" class="form-control validate letter" id ="productName" value="" style="resize: none;border:1px solid #A9A9A9" disabled>

                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>
                         </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group has-feedback">
                          <div class="form-group">

                          <label for="prodVariance" class="control-label">Product Variance</label>
                          <input type="text" class="form-control validate letter" id ="prodVariance" value="" style="resize: none;border:1px solid #A9A9A9" disabled>

                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          </div>
                         </div>
                        </div>

                  </div>
<!--                   <div class="row">
                  <div class="col-md-12">
                    <label for="materialsReq" class="control-label">Materials: <span style="color:red">*</span></label>
                  </div>
                    <div class="col-md-9">
                       <div class="form-group has-feedback">
                      <div class="form-group">

                         <select id="materialsSelect" name="materialsSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">

                           </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                      </div>
                    </div>
                   <div class="col-md-3">
                          <button type="button" id="addCart" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                    </div>
                  </div> -->

                  <div class="row">
                  <div class="col-md-12">
                    <table id="addMaterialsTable" name="example" border="0" class="table table-bordered">
                      <thead style="color:black">
                        <th class = "hidden">ID</th>
                        <th width="60%">Material</th>
                        <th width="60%">Variant </th>
                        <th width="60%">Quantity </th>
                        <th width="10%">U/M</th>

                      </thead>
                      <tbody>

                      </tbody>
                   </table>
                  </div>
                </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button> -->
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 </div>


<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="receive_form" role="form" data-toggle="validator">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Material Requisitions

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="../transaction/estimate" class="btn btn-primary btn-block margin-bottom">Back</a>
          <a id="AddNewRequest" data-toggle="modal" data-target="#newRequisitionModal" class="btn btn-success btn-block margin-bottom">Add New Request</a>
        </div>
        <div class="col-md-9">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Requests</h3>
            </div>
              <div class="box-body">
                <table class="display" id="materialrequisitionTable">
                  <thead>
                    <th> Req No. </th>
                    <th> SO No. </th>
                    <th> Requested By </th>
                    <th> Need Date </th>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
         </div>
        </div>
    </div>
  </section>

</form>






@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/materialRequisition.js')}}"></script>
 <script>
 $('#materialrequisitionTable').DataTable();

  $('#to').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

 </script>
@endpush
@stop
