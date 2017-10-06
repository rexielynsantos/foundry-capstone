@extends('master')
@section('pageTitle', 'Costing Summary')
@section('content')

<section class="content">

	<div class="row">
		<div class="col-md-12">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">Precision Foundry of the Philippines Inc.</h3>
              <h5 class="widget-user-desc"><p style="color:black">Order Costing No. 00001</p>
            </div>
            <div class="box-footer">

                  <label> INVESTMENT CASTING PART COSTING </label> <br> <br>
									<input type="text" id="costingID" value="{{ Session::get('costingID') }}" hidden>
                  <div class="row">
                    <div class="col-md-6">
                      <p> Customer <input type="text" id="companyName" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       <p> Part Name: <input type="text" id="partName" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="col-md-6">
                   <p> Material</p>
                  </div>

                   <div class="col-md-6">
                   <p> Specific Gravity: <input type="text" id="spcGrav" style="border:none;" readonly></p>
                  </div>
                  <br><br>
                  <div class="row">
                    <div class="col-md-12">
                      <label> PART SPECIFICATION </label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Surface Area: <input type="text" id="surfArea" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Weight</p>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;As Wax</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Non-Filled: <input type="text" id="nonfilled" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Filled: <input type="text" id="filled" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Soluble: <input type="text" id="soluble" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Reclaimed: <input type="text" id="reclaimed" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;As Metal: <input type="text" id="asmetal" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> Volume: <input type="text" id="volume" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <br><br>
                   <div class="row">
                    <div class="col-md-12">
                      <label> PRODUCTION DATA </label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Runner-Type: <input type="text" id="rnnrtype" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Area: <input type="text" id="are" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Volume: <input type="text" id="vol" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;Weight: <input type="text" id="wght" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Sprue Type: <input type="text" id="sprue" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Cluster Area: <input type="text" id="clusterarea" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Cluster Weight</p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;As Wax: <input type="text" id="caswax" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;As Metal: <input type="text" id="casmetal" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Pcs per Cluster: <input type="text" id="pcsperclster" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> Prod. Efficiency</p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;At Injection: <input type="text" id="atinjec" style="border:none;" readonly></p>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;At Assembly: <input type="text" id="atassem" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;At Coating: <input type="text" id="atcoating" style="border:none;" readonly></p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p> &nbsp;&nbsp;&nbsp;&nbsp;At Casting: <input type="text" id="atcasting" style="border:none;" readonly></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <label> COST COMPUTATION </label>
                    </div>
                  </div>

                   <div class="row">
                  <div class="col-md-12">
                    <table id="costTable" border="0" class="table table-bordered" style="color:black;">
                      <thead>
                        <th width="20%">Material</th>
                        <th width="5%">U/M</th>
                        <th width="15%">Unit Cost</th>
                        <th width="15%"> Usage </th>
                        <th width="15%">Cost</th>
                     <!--    <th>Action</th> -->
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;&nbsp;Finalize Costing</button>
                  </div>
                </div>

            </div>
          </div>
          <!-- /.widget-user -->
    </div>
	</div>


  <div class="modal fade" id="finalizeCostModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 style="text-align:center" class="modal-title">Ready to finalize costing details?</h4>
              </div>
              <div class="modal-body" align="center">
                <h5> Order Costing will be sent to Admin for approval </h5>
              </div>
              <div class="modal-footer">
                 <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                 <button  type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
             </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>




</section>
@push('scripts')
	<script type="text/javascript" src="{{URL::asset('js/logic/order-summary.js')}}"></script>
<!-- <script type="text/javascript" src="{{URL::asset('js/tables/customer-table.js')}}"></script> -->
<script>
$('#custTransTable').DataTable();
</script>
@endpush

@stop
