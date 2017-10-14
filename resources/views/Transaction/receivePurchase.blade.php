@extends('master')
@section('pageTitle', 'Receive Purchases')
@section('content')
	

<form class="" id="purchase_form" role="form" data-toggle="validator">
	<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Receiving Section
    <!--     <small>13 new Requests</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Receive Orders</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Received Orders</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>	
              </div>
            </div>

            <div class="box-body no-padding">
 

                <table id="receiveingTable" class="display">
                  <thead>
                    <th width="10%"> Reference PO No.  </th>
                    <th width="20%"> Supplier </th>
                    <th width="60%"> Orders </th>
                    <th width="10%"> Date Received</th>
                  </thead>
                  <tbody>
              
                  </tbody>
                </table>
          
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</form>
  <div class="modal fade" style="margin-top:50px" id="receivemModal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title"> Product Specification </h4> </center>
               
            </div>
             <!-- <form class="" id="product_form" name="product_form" role="form" data-toggle="validator" enctype="multipart/form-data"> -->
           <form class="" id="matspec_form" name="matspec_form" role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="productName" class="control-label">Product<span style="color:red">*</span></label>
                          <select class="form-control select2" id="productTypeSelect" style="width: 100%;" required>
                           <option> product mo to </option>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                      <label for="productName" class="control-label">Product Type</label>
                      <input type="text" placeholder="Investment Casting" class="form-control validate letter" id ="productName" style="resize: none;border:1px solid #A9A9A9" disabled>
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>

                 </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                         <label for="materialSelect" class="control-label">Materials needed<span style="color:red">*</span></label>
                           <select id="materialSelect" name="materialSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #A9A9A9" >
                           </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          <!--  <small> <a href="../maintenance/productVariant"> + Add New Variant </a></small>  --> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                     <table id="materialTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="hidden">Material ID</th>
                                <th width="60%">Material</th>
                                <th width="20%">Quantity</th>
                                <th width="20%">U/M</th>
                                <th width="20%">Actions</th>
                            </tr>
                            <tr>
                                <th class="hidden">Material ID</th>
                                <th>Buhangin</th>
                                <th><input type="number"></th>
                                <th>
                                  pcs
                                </th>
                                <th><button> delete </button></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    </div>
                  </div>

             </div>
            <div class="modal-footer">
                <button type="reset" id="btnClear" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Send to Production</button>
            </div>
                </form>
                       
         </div>
      </div>
    </div>  

@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/estimate.js')}}"></script>
<script>
$('#receiveingTable').DataTable(
  {
    "searching": false,
    "ordering": false,
    "paging": false,
  });
</script>



 <script type="text/javascript" src="{{URL::asset('js/logic/receive-add.js')}}"></script>


@endpush
@stop
