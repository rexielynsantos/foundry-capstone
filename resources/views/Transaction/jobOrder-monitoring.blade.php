@extends('master')
@section('pageTitle', 'Product Variance')
@section('content')

<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Product Variance </h3>

	<div class="box box-default">


		<div class="box-body">

    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddMat" data-toggle="modal" data-target="#matModal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteMats" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditMat" data-toggle="modal" data-target="#matModal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>

		<div class="row">
			<div class="col-md-12">
		      <table  id="matSpecTable" name="matSpecTable" class="table table-bordered">
              <thead>
		            <tr>
		                <th class="hidden">PS No. </th>
										<th>Variance Code</th>
		                <th>Product Name</th>
                    <th>Type</th>
		                <th>Specification</th>
		            </tr>
		        </thead>
		        <tbody>
             @foreach($matspec as $md)
              <tr>
                <td class="hidden">{{$md->strMatSpecID}}</td>
								<td>{{$md->strVarianceCode}}</td>
                <td>{{$md->product->strProductName}}</td>
                <td>{{$md->product->producttype->strProductTypeName}}</td>
                <td>
                    @foreach($md->material as $var)
                <li width="35%" style="list-style-type:circle"> {{$var->details->strMaterialName}} - {{$var->dblMaterialQuantity}}{{$var->details->unit->strUOMName}}</li>
                @endforeach
                </td>
              </tr>
              @endforeach
		        </tbody>
		    </table>
  		</div>
	</div>
		<hr>

  <div class="modal fade" id="MatSpecReactivateModal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h4 class="modal-title">
                Product Variance is deactivated. Do you want to reactivate?
              </h4>
          </center>
          </div>

          <div class="modal-footer">
              <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
              <button id="btnReactivateMatSpec" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
          </div>
        </div>
        </div>
    </div>


	</div>

	<div class="modal fade" style="margin-top:50px" id="matModal" role="dialog">
      <div class="col-md-8 col-md-offset-2  ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title"> Product Variance Information </h4> </center>

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
														<option value="first" selected disabled>Select a Product</option>
														@foreach ($prodct as $prd)
															<option value="{{$prd->strProductID}}">{{$prd->strProductName}}</option>
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
										 <label for="varianceCode" class="control-label">Variance Code<span style="color:red">*</span></label>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group has-feedback">
											 <div class="form-group">
												 <input type="text" id="varianceCode" class="form-control" name="varianceCode" data-placeholder="SCH15">
											 </div>
										 </div>
									 </div>
								 </div>
                 <div class="row">
                  <div class="col-md-12">
                    <label for="materialSelect" class="control-label">Materials needed<span style="color:red">*</span></label>
                  </div>
                 </div>
                 <div class="row">
                    <div class="col-md-10">
                      <div class="form-group has-feedback">
                        <div class="form-group">

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
                      <div class="col-md-2">
                        <button type="button" id="addCart" style="height: 33px" class="btn btn-primary btn-flat">Add</button>
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
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    </div>
                  </div>

             </div>
            <div class="modal-footer">
                <button type="reset" id="btnClear" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Submit</button>
            </div>
                </form>

         </div>
      </div>
    </div>
</div>


@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/tables/matspec-table.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/logic/matSpec.js')}}"></script>
@endpush
@stop
