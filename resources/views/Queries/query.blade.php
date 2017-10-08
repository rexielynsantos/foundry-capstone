@extends('master')
@section('pageTitle', 'Queries')
@section('content')

<section class="content">

	<div class="row">
		<div class="col-md-12">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">Queries</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-12">
                      <label> Query Search </label>
                        <form action="">
                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                  <select id="querySearch" name="querySearch" class="select2 form-control">
                                      <option value=""></option>
                                      <option value="table1">Most availed products</option>
                                      <option value="table2">Most ordered supplies</option>
                                      <option value="table3">Most jobs done by personnel</option>
                                      <option value="table4">Most Active Customer</option>
                                  </select>
                              </div>
                          </div>
                       </form>
                    </div>
                </div>

                <div class="row" id="table1" style="display:none">
                    <div class="col-md-12">
                        <table id="MostProducts" class="table table-striped table-bordered responsive">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th class="text-right">No. of times availed</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
								<div class="row" id="table2" style="display:none">
                    <div class="col-md-12">
											<table id="MostSupplies" class="table table-striped table-bordered responsive">
													<thead>
															<tr>
																	<th>Supply</th>
																	<th>Description</th>
																	<th class="text-right">No. of times availed</th>
															</tr>
													</thead>
													<tbody>
													</tbody>
											</table>
                    </div>
                </div>
								<div class="row" id="table3" style="display:none">
                    <div class="col-md-12">
											<table id="MostJobs" class="table table-striped table-bordered responsive">
													<thead>
															<tr>
																	<th>Job</th>
																	<th>Description</th>
																	<th class="text-right">No. of times done</th>
															</tr>
													</thead>
													<tbody>
													</tbody>
											</table>
                    </div>
                </div>
								<div class="row" id="table4" style="display:none">
                    <div class="col-md-12">
											<table id="MostActiveCustomer" class="table table-striped table-bordered responsive">
													<thead>
															<tr>
																	<th>Customer</th>
																	<th class="text-right">No. of orders</th>
															</tr>
													</thead>
													<tbody>
													</tbody>
											</table>
                    </div>
                </div>
            </div>
          </div>
    </div>
	</div>




</section>
@push('scripts')
	<script type="text/javascript" src="{{URL::asset('js/logic/query.js')}}"></script>
@endpush

@stop
