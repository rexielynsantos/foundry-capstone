@extends('master')
@section('pageTitle', 'Job Order')
@section('content')

<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->

	<div class="box box-danger">
		<div class="box-header with-border">
	          <h3 class="box-title">PRODUCT SPECIFICATION</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div>
	    </div>

		<div class="box-body">
    <button id="btnAddMat" data-toggle="modal" data-target="#matModal">Add </button>

			<div class="row">
				<div class="col-md-12">
			      <table  id="productionTable" name="jobTable" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>PS No. </th>
			                <th>Product Name</th>
			                <th>Specification</th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td>SCH15</td>
			                <td>Baril</td>
			                <td>
                      <li width="35%" style="list-style-type:circle"> Material1 - 20g </li>
                      <li width="35%" style="list-style-type:circle"> Material2 - 20g </li>
                      <li width="35%" style="list-style-type:circle"> Material3 - 20g </li>
                      <li width="35%" style="list-style-type:circle"> Material4 - 20g </li>
                      </td>
			            </tr>
			        </tbody>
			    </table>
    		</div>
		</div>
		<hr>

	</div>

	<div class="modal fade" style="margin-top:50px" id="matModal" role="dialog">
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
                          <select class="form-control select2" id="productSelection" style="width: 100%;" required>
														@foreach ($prodct as $prd)
															<option value="{{$prd->strProductName}}">{{$prd->strProductName}}</option>
														@endforeach
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group has-feedback">
	                    <div class="form-group">
	                    <label for="productName" class="control-label">Product Type</label>
	                    <input type="text" class="form-control validate letter" id ="productTypeName" value="" style="resize: none;border:1px solid #A9A9A9" disabled>
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
														 @foreach ($matr as $mtr)
                               <option value="{{$mtr->strMaterialName}}">{{$mtr->strMaterialName}}</option>
	                           @endforeach
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
                                <th></th>
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
</div>


@push('scripts')
 <!-- <script type="text/javascript" src="{{URL::asset('js/logic/joborder.js')}}"></script> -->
 <script type="text/javascript" src="{{URL::asset('js/logic/matSpec.js')}}"></script>
<script>
$(document).ready(function() {
            $('#productionTable').DataTable();

        } );
</script>
@endpush
@stop
