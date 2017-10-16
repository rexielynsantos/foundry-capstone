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

              <div class="table-responsive mailbox-messages">
                <table id="tbl1" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Waxing  </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Leaching</th>
                      <th style="background-color: #3c8dbc">Cleaning</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl2" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="8"> Molding </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      <th style="background-color: #3c8dbc">Dewaxing</th>
                      <th style="background-color: #3c8dbc">Primary Coating</th>
                      <th style="background-color: #3c8dbc">Subsequent Coating</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl3" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="13"> Fettling/Metal Treatment </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Leaching</th>
                      <th style="background-color: #3c8dbc">Grinding</th>
                      <th style="background-color: #3c8dbc">Annealing</th>
                      <th style="background-color: #3c8dbc">Sand-Blasting</th>
                      <th style="background-color: #3c8dbc">Recoil Height/Flatness</th>
                      <th style="background-color: #3c8dbc">Stir-Up Mag.Box</th>
                      <th style="background-color: #3c8dbc">Welding</th>
                      <th style="background-color: #3c8dbc">Machining</th>
                      <th style="background-color: #3c8dbc">Final Sand-Blasting</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl4" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Final Quality Assurance </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl5" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Injecting </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl6" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Water Debinding </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl7" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Drying </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl8" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Thermal Debinding </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl9" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Sintering </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl10" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Heat Treatment </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl11" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> S-Blasting </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl12" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Cleaning </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>
              <div class="table-responsive mailbox-messages">
                <table id="tbl13" border = "3" class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th style="background-color: #3c8dbc" colspan="7"> Recovery </th>
                    </tr>
                    <tr><!-- 
                      <th class="hidden">ID</th>
                      <th class="hidden">Part ID</th> -->
                      <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                      <th style="background-color: #3c8dbc">Jobs Finished</th>
                      <th style="background-color: #f56954">QA</th>
                      <th style="background-color: #605ca8">Total Parts Available</th>
                      <th style="background-color: #ff851b">Target Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <br>


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
 <script type="text/javascript" src="{{URL::asset('js/logic/prodmonitoring.js')}}"></script>


@endpush
@stop
