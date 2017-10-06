@extends('master')
@section('pageTitle', 'Production Monitoring')
@section('content')

    <section class="content-header">
      <h1> Production Monitoring </h1>
      <ol class="breadcrumb">
        <a href="/transaction/jobtickets" type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i> &nbsp; Go to Job Tickets</a>
        <a href="/transaction/order-allocation" type="button" class="btn bg-blue btn-flat margin">Check Order Progress</a>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <br>
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">

            
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <label> Product Type</label>
                    <select class="form-control select2" id = "stage" style="width: 100%;padding-left: 10px" required>
                    <option value="first" selected disabled>Search..</option>
                    @foreach($pt as $pts)
                        <option value="{{$pts->strProductTypeID}}">{{$pts->strProductTypeName}}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label> Stage </label>
                    <select class="form-control select2" id = "substage" style="width: 100%;padding-left: 10px" disabled>
                      <option value="first" selected disabled>Search..</option>
                       @foreach($stage as $st)
                        <option value="{{$st->strStageID}}">{{$st->strStageName}}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label> Sub-stage </label>
                    <select class="form-control select2" id = "substage" style="width: 100%;padding-left: 10px" disabled>
                      <option value="first" selected disabled>Search..</option>
                    </select>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                  <label> Product Search</label>
                    <select class="form-control select2" id = "stage" style="width: 100%;padding-left: 10px" required>
                    <option value="first" selected disabled>Search..</option>
                    @foreach($product as $pr)
                        <option value="{{$pr->strProductID}}">{{$pr->strProductName}}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="table-responsive mailbox-messages">
                <table id="monitoringTable" border = "3" class="table table-hover table-striped">
                  <tr>
                    <th class="hidden">ID</th>
                    <th class="hidden">Part ID</th>
                    <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                    <th colspan = "3" style="background-color: #3c8dbc">Waxing</th>
                    <th colspan = "6" style="background-color: #00c0ef">Mold Shop</th>
                    <th colspan = "3" style="background-color: #f56954">QA</th>
                    <th colspan="12" style="background-color: #00a65a">Metal Treatment</th>
                    <th style="background-color: #f56954">Final QA</th>
                    <th style="background-color: #605ca8">Total Parts Available</th>
                    <th style="background-color: #ff851b">Target Quantity</th>
                  </tr>
                  
                   <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">  </td>
                     <td colspan="3" style="background-color: #3c8dbc">Injected Wax</td>
                     <td colspan = "4" style="background-color: #00c0ef">Coating</td>
                     <td colspan = "2" style="background-color: #00c0ef">Available to Cast</td>
                     <td colspan="2" style="background-color: #f56954"> Casted(Knock-out) </td>
                     <td style="background-color: #f56954"> Inspection </td>
                     <td style="background-color: #00a65a"> Cut-off </td>
                     <td style="background-color: #00a65a"> Leaching </td>
                     <td style="background-color: #00a65a"> Grinding </td>
                     <td style="background-color: #00a65a"> Annealing </td>
                     <td style="background-color: #00a65a"> S-Blasting </td>
                     <td colspan="3" style="background-color: #00a65a"> Straightening </td>
                     <td style="background-color: #00a65a"> Welding </td>
                     <td style="background-color: #00a65a"> QC </td>
                     <td style="background-color: #00a65a"> Machining </td>
                     <td style="background-color: #00a65a"> Final Sandblast </td>
                     <td style="background-color: #f56954"> QC/QA </td>
                     <td style="background-color: #605ca8"> </td>
                     <td style="background-color: #ff851b"> </td>
                     
                   
          
               
                   
                  </tr>
                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de"></td>
                     <td style="background-color: #3c8dbc">Sol. Leaching</td>
                     <td style="background-color: #3c8dbc">Cleaning</td>
                     <td style="background-color: #3c8dbc">Assembly</td>
                     <td style="background-color: #00c0ef">Primary Coating</td>
                     <td style="background-color: #00c0ef">Sub-sequent Coating</td>
                     <td style="background-color: #00c0ef"> Dewaxing </td>
                     <td style="background-color: #00c0ef"> Inspection </td>
                     <td style="background-color: #00c0ef">Pcs</td>
                     <td style="background-color: #00c0ef">Cluster</td>
                     <td style="background-color: #f56954">Pcs</td>
                     <td style="background-color: #f56954">Cluster</td>
                     <td style="background-color: #f56954"></td>
                     <td style="background-color: #00a65a"></td>
                     <td style="background-color: #00a65a"></td>
                     <td style="background-color: #00a65a"></td>
                     <td style="background-color: #00a65a"></td>
                     <td style="background-color: #00a65a"></td>
                     <td style="background-color: #00a65a">Rework</td>
                     <td style="background-color: #00a65a">Recoil</td>
                     <td style="background-color: #00a65a">Stir-up</td>
                     <td style="background-color: #00a65a"> </td>
                     <td style="background-color: #00a65a"> </td>
                     <td style="background-color: #00a65a"> </td>
                     <td style="background-color: #00a65a"> </td>
                     <td style="background-color: #f56954"> </td>
                     <td style="background-color: #605ca8"> </td>
                     <td style="background-color: #ff851b"> </td>
                
                  </tr>
                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">M200 B.SHROUD "P"</td>
                     <td>5</td>
                     <td>15</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                     <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                       <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>0</td>
                     <td>0</td>
                     <td>0</td>
                     <td>85</td>
                     <td>0</td>
                     <td>0</td>
                    <td>2500</td>
                    <td>5000</td>
                  </tr>
                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">M200 HAMMER</td>
                     <td>5</td>
                     <td>15</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                     <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                       <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>0</td>
                     <td>0</td>
                     <td>0</td>
                     <td>85</td>
                     <td>0</td>
                     <td>0</td>
                    <td>2500</td>
                    <td>5000</td>
                  </tr>
                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">M200 TRIGGER</td>
                     <td>5</td>
                     <td>15</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                     <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>135</td>
                       <td>5</td>
                     <td>135</td>
                     <td>85</td>
                     <td>0</td>
                     <td>0</td>
                     <td>0</td>
                     <td>85</td>
                     <td>0</td>
                     <td>0</td>
                    <td>2500</td>
                    <td>5000</td>
                  </tr>

                  
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
                  <!-- /.btn-group
                </div> -->
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





@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/monitoring.js')}}"></script>


@endpush
@stop
