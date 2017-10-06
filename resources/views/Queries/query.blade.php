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
                                      <option value="1">Most availed products</option>
                                      <option value="2">Most ordered supplies</option>
                                      <option value="3">Most jobs done by personnel</option>
                                      <option value="4">Most Active Customer</option>
                                  </select>
                              </div>
                          </div>
                       </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="list1" class="table table-striped table-bordered responsive">
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
            </div>
          </div>
    </div>
	</div>




</section>
@push('scripts')
	<script type="text/javascript" src="{{URL::asset('js/logic/customer.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script>
<script>
$('#custTransTable').DataTable();
</script>
@endpush

@stop
