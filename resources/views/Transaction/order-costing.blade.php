@extends('master')
@section('pageTitle', 'Product Costing')
@section('content')


<form class="" id="costing_form" role="form" data-toggle="validator">

    <section class="content">

      <div class="box box-widget widget-user-2">
<!--
            <div class="widget-user-header" style="background-color:#f56954 ">

 -->
              <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                 <img src="../images/mainlogo.png" alt="User Avatar">
              </div>

              <h3 class="widget-user-username" style="color:black">Precision Foundry of the Philippines Inc.</h3>
              <h5 class="widget-user-desc"><a href="#" style="color:black"> <label id="maxCosting"></label></a></h5>
              <h5 class="widget-user-desc"><a href="#" style="color:black"> All fields with <span style="color:red">*</span> are required</a></h5>
              <a href="/transaction/product-costing-list" style="margin-left:70px" class="btn btn-social btn-instagram"><i class="fa fa-users"></i> View Product Costings </a>

            </div>
      <div class="row">

      <div class="col-md-12">

          <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a style="color:black" href="#tab_1" data-toggle="tab"><i class="fa fa-circle"></i>&nbsp;&nbsp;Material</a></li>
              <li><a href="#tab_2" id="tab2" class="disabled" data-toggle="tab"><i class="fa fa-circle"></i>&nbsp;&nbsp;Part Specification</a></li>
              <li><a href="#tab_3" id="tab3" class="disabled" data-toggle="tab"><i class="fa fa-circle"></i>&nbsp;&nbsp;Production Data</a></li>
              <li><a href="#tab_4" id="tab4" class="disabled" data-toggle="tab"><i class="fa fa-circle"></i>&nbsp;&nbsp;Cost Computation</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="selectCustomer" class="control-label">Customer Name<span style="color:red">*</span></label>
                          <select class="form-control select2" id = "selectCustomer" style="width: 100%;" required>
                            <option value="first" selected disabled>Select a Customer</option>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                  </div>
                </div>

                <br>


                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="prodName" class="control-label">PART NAME<span style="color:red">*</span></label>
                          <select class="form-control select2" id = "productSelect" style="width: 100%;" required>
                            <option value="first" selected disabled>Select a Product</option>
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label> Material: </label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                     <label> Sp. Gravity of Metal </label>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-5">

                    <div class="form-group">
                      <input type="text" id="spGravity" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>
                  <div class="col-md-1">
                    =
                  </div>
                  <div class="col-md-2">
                  <label> <input type="text" id="steelEquiv" readonly style="border:none;"> </label>
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
              <div class="row">
                <div class="col-md-4">
                <label> Surface Area </label>
                  <div class="form-group">
                    <input type="text" id="surfaceArea" class="form-control validate number" placeholder="0.00">
                  </div>
                </div>

                <div class="col-md-4">
                  <label> Volume: </label>
                  <div class="form-group">
                    <input type="text" id="volume" class="form-control validate number">
                  </div>
                </div>
              </div>
               <hr>
              <div class="row">
                <div class="col-md-6">
                  <label> Weight </label>
                </div>
              </div>

             <div class="row">
              <div class="col-md-6" style="margin-left: 20px">
                <label> As Wax: </label>
              </div>
             </div>

              <div class="row">
                <div class="col-md-4" style="margin-left: 25px">
                <label style="color:grey;font-size: 10pt"> Non-Filled </label>
                  <div class="form-group">
                    <input type="text" id="weightNon" class="form-control validate number" placeholder="0.00">
                  </div>
                </div>

                <div class="col-md-4" style="margin-left: 25px">
                  <label style="color:grey;font-size: 10pt"> Filled </label>
                  <div class="form-group">
                    <input type="text" id="weightFilled" class="form-control validate number" placeholder="0.00">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" style="margin-left: 25px">
                <label style="color:grey;font-size: 10pt"> Soluble </label>
                  <div class="form-group">
                    <input type="text" id="soluble" class="form-control validate number" placeholder="0.00">
                  </div>
                </div>

                  <div class="col-md-4" style="margin-left: 25px">
                <label style="color:grey;font-size: 10pt"> Reclaimed </label>
                  <div class="form-group">
                    <input type="text" id="reclaimed" class="form-control validate number" placeholder="0.00">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4" style="margin-left: 20px">
                  <label> As Metal: </label>
                  <div class="form-group">
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="asMetal" class="form-control validate number">
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button>
                    <button type="button" id="changetabbutton1" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i></button>
                  </div>
              </div>

            </div>

               <div class="tab-pane" id="tab_3">
                <div class="row">
                  <div class="col-md-4">
                    <label> Runner-Type </label>
                      <div class="form-group">
                        <input type="text" id="runnerType" class="form-control validate number" placeholder="0.00">
                      </div>
                  </div>
                </div>

               <div class="row" style="margin-left: 20px;color:grey">
                <div class="col-md-3">
                 <label> Area: </label>
                  <div class="form-group">
                    <input type="text" id="area" class="form-control validate number" placeholder="0.00">
                  </div>
                </div>

                <div class="col-md-3">
                  <label> Volume: </label>
                  <div class="form-group">
                    <input type="text" id="svolume" class="form-control validate number">
                  </div>
                </div>


                <div class="col-md-3">
                  <label> Weight: </label>
                  <div class="form-group">
                    <input type="text" id="weight" class="form-control validate number">
                  </div>
                </div>
              </div>

                <div class="row">
                  <div class="col-md-4">
                  <label> Sprue-Type </label>
                    <div class="form-group">
                      <input type="text" id="sprue" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-4">
                  <label> Cluster Area </label>
                    <div class="form-group">
                      <input type="text" id="cluster" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-md-4">
                    <label> Cluster Weight </label>
                  </div>
                </div>

                <div class="row" style="margin-left: 20px;color:grey">
                  <div class="col-md-3">
                  <label> As Wax </label>
                    <div class="form-group">
                      <input type="text" id="wax" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label> As Metal </label>
                    <div class="form-group">
                      <input type="text" id="asMetal" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-4">
                  <label> Pcs per Cluster </label>
                    <div class="form-group">
                      <input type="text" id="pcsPerCluster" class="form-control validate number" placeholder="0">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <label> Prod. Efficiency </label>
                  </div>
                </div>

                 <div class="row" style="margin-left: 20px;color:grey">
                  <div class="col-md-3">
                  <label> at Injection </label>
                    <div class="form-group">
                      <input type="text" id="atInjection" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label> at Assembly  </label>
                    <div class="form-group">
                      <input type="text" id="atAssembly" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label> at Coating  </label>
                    <div class="form-group">
                      <input type="text" id="atCoating" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label> at Casting  </label>
                    <div class="form-group">
                      <input type="text" id="atCasting" class="form-control validate number" placeholder="0.00">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button>
                    <button type="button" id="changetabbutton2" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i></button>
                  </div>
              </div>

              </div>


              <div class="tab-pane" id="tab_4">
                 <div class="row">
                  <div class="col-md-12">
                   <label> Product Specification </label>
                  </div>
                </div>
               <div class="row">

                  <div class="col-md-9">
                    <div class="form-group">
                        <div id="rest">
                          <select id="prodVarianceSelect" name="prodVarianceSelect" class="form-control select2" style="width: 100%;border:1px solid #3434343">
                          </select>
                        </div>
                         <p id="prodCount"></p>
                    </div>
                  </div>

                   <!-- <div class="col-md-3">
                      <button type="button" id="addCart" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i></button>
                   </div> -->

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table id="varianceTable" border="0" class="table table-bordered" style="color:black;">
                      <thead>
                        <th class="hidden">ID</th>
                        <th>Material</th>
                        <th>U/M</th>
                        <th>Unit Cost</th>
                        <th> Usage </th>
                        <th>Cost</th>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                    <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Submit</button>
                  </div>
                </div>

             </div>
    </div>

  </section>

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
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <style media="screen">
    .disabled{
      pointer-events: none;
      cursor: default;
      opacity:0.6;
    }
    </style>



@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/orderCosting.js')}}"></script>

@endpush
@stop
