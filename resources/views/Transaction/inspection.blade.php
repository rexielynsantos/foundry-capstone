@extends('master')
@section('pageTitle', 'Product Inspection')
@section('content')
  

    <section class="content-header">
      <h1>
        Inspection
    <!--     <small>13 new Requests</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inspection</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Transactions</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="/transaction/jobtickets">Job Ticket
                <li class="active"><a href="/transaction/inspectProduction">Inspection </a></li>
                <li><a href="/transaction/production-monitoring">Production Monitoring </a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">For Inspection</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">
                <table id = "inspectTable" class="table table-hover table-striped">
                  <thead>
                    <th class="hidden">ID</th>
                    <th class="hidden">Part ID</th>
                    <th class="hidden">Part</th>
                    <th> Part Name </th>
                    <th> For Inspection </th>
                    <th> Action  </th>
                    <th> Accepted  </th>
                    <th> For Rework  </th>
                  
                  </thead>
                  <tbody>
                    @foreach($ins as $i)
                      <tr>
                        <td class="hidden">{{$i -> strProdInspectionID}}</td>
                        <td class="hidden">{{$i -> strProductID}}</td>
                        <td class="hidden">{{$i -> product -> details -> strProductName}}</td>
                        <td class="mailbox-name"><a href="read-mail.html">{{$i -> product -> details -> strProductName}}</a></td>
                        <td>{{$i -> forInspection}}</td>
                        <td><button id="btnAddInspection" name="{{$i -> strProdInspectionID}}"  class="btn btn-primary"> <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Inspection </button></td>
                        <td>{{$i -> intAcceptQty}}</td>
                        <td>{{$i -> intReworkQty}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">

                <!-- <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div> -->
                  <!-- /.btn-group -->
                <!-- </div> -->
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


<div class="modal fade" style="margin-top:50px" id="addInspectionModal" role="dialog">
      <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title"> New Inspection</h4>
              </center>
            </div>
    <form class="" id="inspection_form"  role="form" data-toggle="validator">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group has-feedback">
                  <div class="form-group">
                     <label for="inspector" class="control-label">Inspector<span style="color:red">*</span></label>
                     <select class="form-control select2" id = "personnelAssigned" style="width: 100%;" data-error="This field is required." required>
                        <option value="first" selected disabled>Select Inspector</option>
                        @foreach($emp as $e)
                          <option value="{{$e->strEmployeeID}}">{{$e->strEmployeeFirst}} {{$e->strEmployeeLast}}</option>
                        @endforeach
                      </select>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group has-feedback">
                  <div class="form-group">
                    <label for="inspectTime" class="control-label">Time<span style="color:red">*</span></label>
                      <input type="time" id="inspectTime" class="form-control " data-error="This field is required." required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
            </div>
           <div class="nav-tabs-custom">
            <ul id="mytabs" class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Accept</a></li>
              <li><a href="#tab_2" data-toggle="tab">Rework</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="modName" class="control-label">Part Name<span style="color:red">*</span></label>
                          <input type="text" class="form-control validate" id ="apartName" disabled>
                          <!-- <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="hardness" class="control-label">Specify Hardness<span style="color:red">*</span></label>
                          <input type="number" class="form-control number" id ="ahardness"
                          data-error="This field is required."
                          min = 0 required>
                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="inspectQty" class="control-label">Quantity<span style="color:red">*</span></label>
                          <input type="number" class="form-control number" id ="ainspectQty"
                          data-error="This field is required."
                          min = 0 required>
                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                  </div>

                 <div class="row">
                    <div class="col-md-12">
                      <!-- <button type="reset" id="btnReset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button> -->
                      <button type="button" id="changetabbutton" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i></button>
                    </div>
                </div>
            </div>

              <div class="tab-pane" id="tab_2">
                      
                         <div class="row">
                            <div class="col-md-6">
                              <div class="form-group has-feedback">
                                <div class="form-group">
                                  <label for="modName" class="control-label">Part Name<span style="color:red">*</span></label>
                                  <input type="text" class="form-control validate" id ="rpartName" disabled>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group has-feedback">
                                <div class="form-group">
                                  <label for="hardness" class="control-label">Specify Hardness<span style="color:red">*</span></label>
                                  <input type="number" class="form-control number" id ="rhardness"
                                  data-error="This field is required."
                                  min = 0 required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                              </div>
                            </div>


                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group has-feedback">
                                <div class="form-group">
                                  <label for="inspectQty" class="control-label">Quantity<span style="color:red">*</span></label>
                                  <input type="number" class="form-control number" id ="rinspectQty"
                                  data-error="This field is required."
                                  min = 0 required>
                                  <div class="help-block with-errors"></div>
                                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                              </div>
                            </div>
                          </div>

                
                          <div class="row">
                            <div class="col-md-12">
                              <!-- <button type="reset" id="btnReset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i></button> -->
                              <button type="submit" class="btn bg-blue btn-flat pull-right">Submit</button>
                          </div>
                         </div>
                  </div>
                </div>
              </div>
             </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
 

@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/inspection.js')}}"></script>
<script>
  $(function(){

    $('#changetabbutton').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_2"]').tab('show');
    })

})
 </script>

@endpush
@stop
