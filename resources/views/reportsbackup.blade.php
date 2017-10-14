@extends('master')
@section('pageTitle', 'Reports')
@section('content')

    <section class="content-header">
      <h1>
      </h1>

    </section>


<section class="content">

   <div class="row">
      <div class="col-md-12">
        <div class="box box-widget widget-user-2">
           <div class="widget-user-header bg-blue">
             <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">
             </div>
              <h3 class="widget-user-username">Reports</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
           </div>

            <div class="box-footer">
               <div class="row">
                    <div class="col-md-4">
                      <label> Report Search </label>
                        <form action="">
                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                  <select id="querySearch" name="querySearch" class="select2 form-control">
                                      <option value=""></option>
                                      <option value="table1">Production Monitoring Report</option>
                                      <option value="table4">Production Inspection Report</option>
                                      <option value="table3">Job Order Report</option>
                                      <option value="table2">Inventory Report</option>
                                    
                                  </select>
                              </div>
                          </div>
                       </form>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                         <label>Date range:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservation">
                          </div>
                      </div>
                    </div>
                </div>
                <hr>
              <div class="nav-tabs-custom">
                <ul id="mytabs" class="nav nav-tabs">
                  <li class="active"><a style="color:black" href="#tab_1" data-toggle="tab">&nbsp;&nbsp;Charts</a></li>
                  <li><a href="#tab_2" id="tab2" class="disabled" data-toggle="tab">&nbsp;&nbsp;Tables</a></li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <canvas id="chartJSContainer" width="600" height="400"></canvas>
                  </div>
                  <div class="tab-pane" id="tab_2">
                    <div class="row" >
                        <div class="col-md-12">
                          <center> 
                          <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
                          <h5> Sales Order Report </h5>


                          <table id="sales" class="table table-striped table-bordered responsive">
                                                      <thead>
                              <th> # </th>
                              <th>Customer Name </th>
                              <th> Total Purchases </th>
                              <th> Total Delivered </th>
                            </thead>
                            <tbody>
                              @foreach($customerPurchaseCount as $cust)
                              <tr>
                                  <td> {{$loop->index+1}} </td>
                                  <td> {{$cust->strCompanyName}}</td>
                                  <td> {{$count}} </td>
                                   <td> {{$count}} </td>

                              </tr>
                              @endforeach
                            </tbody>
  
                          </table>
                        </div>
                     </div>
                     <br>
                    <div class="row" >
                      <div class="col-md-12">
                        <center> 
                        <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
                        <h5> Inventory Report </h5>


                        <table id="inventoryRpt" class="table table-striped table-bordered responsive">
                           <thead>
                            <th> # </th>
                            <th>Material Name </th>
                            <th> Delivered </th>
                            <th> Returned </th>
                            <th> Total Inventory </th>
                            <th> Re-order Level </th>
                          </thead>
                          <tbody>
                            <tr>
                                <td> 1</td>
                                <td> Zircon Sand</td>
                                <td> {{$count}} </td>
                                <td> {{$count}} </td>
                                <td> {{$count}} </td>
                                <td> {{$count}} </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                   </div>
                    <br> <br>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <label> Product Type</label>
                    <select class="form-control select2" id = "stage" style="width: 100%;padding-left: 10px" required>
                    <option value="first" selected disabled>Search..</option>
                   
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label> Stage </label>
                    <select class="form-control select2" id = "substage" style="width: 100%;padding-left: 10px" disabled>
                      <option value="first" selected disabled>Search..</option>
                      
                    </select>
                  </div>
                </div>
                
              </div>

                   <div class="row" >
                      <div class="col-md-12">
                        <center> 
                        <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
                        <h5> Production Report </h5>


                <table id="monitoringTable" border = "3" class="table table-hover table-striped">
                  <tr>
                    <td style="background-color: #3c8dbc" colspan="7"> Waxing </td>
                  </tr> 
                  <tr>
                    <th class="hidden">ID</th>
                    <th class="hidden">Part ID</th>
                    <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
                    <td style="background-color: #3c8dbc">Sol. Leaching</td>
                    <td style="background-color: #3c8dbc">Cleaning</td>
                    <td style="background-color: #3c8dbc">Assembly</td>
                    <th style="background-color: #f56954"> QA</th>
                    <th style="background-color: #605ca8">Total Parts Available</th>
                    <th style="background-color: #ff851b">Target Quantity</th>
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
                  </tr>
                </table>
                      </div>
                   </div>

                   <div class="row" >
                      <div class="col-md-12">
                        <center> 
                        <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
                        <h5> Product Inspection Report </h5>


                        <table id="prodInspection" class="table table-striped table-bordered responsive">
                           <thead>
                            <th> # </th>
                            <th>Part Name </th>
                            <th> Total Inspected </th>
                            <th> Total Accepted </th>
                            <th> Total Rejects </th>
                            <th> % Rejection </th>
                          </thead>
                          <tbody>
                            <tr>
                                <td> 1</td>
                                <td> Bracket Wheel</td>
                                <td> {{$count}} </td>
                                <td> {{$count}} </td>
                                <td> {{$count}} </td>
                                <td> 50% </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                   </div>
                    <br> <br>
                    <div class="row" >
                      <div class="col-md-12">
                        <center> 
                        <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
                        <h5> Overall Rejection Report </h5>


                <table id="overallRejectPerStage" border = "3" class="table table-hover table-striped">
                  <tr>
                    <td style="background-color: #3c8dbc" colspan="9"> Stage Name </td>
                  </tr> 
                  <tr>
                    <th class="hidden">ID</th>
                    <th>Month</th>
                    <th colspan="2" style="background-color:#3c8dbc"> Inspected</th>
                    <th colspan="2"  style="background-color: #3c8dbc">Reject</td>
                    <th colspan="2"  style="background-color: #3c8dbc">% Reject</td> 
                    <th colspan="2"  style="background-color: #3c8dbc">% Accept</td> 
                  </tr>
                  <tr> 
                    <td colspan="1">  </td>
                    <td> pcs </td>
                    <td> Wt-kgs </td>
                    <td> pcs </td>
                    <td> Wt-kgs </td>
                    <td> pcs </td>
                    <td> Wt-kgs </td>
                    <td> pcs </td>
                    <td> Wt-kgs </td>


                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">January</td>
                     <td>5</td>
                     <td>15</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>0.46%</td>
                     <td>5</td>
                     <td>0.54%</td>
                  </tr>
                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">February</td>
                     <td>5</td>
                     <td>15</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>0.46%</td>
                     <td>5</td>
                     <td>0.54%</td>
                  </tr>
                  <tr>
                     <td class="hidden">as</td>
                     <td class="hidden">as</td>
                     <td style="background-color:#d2d6de">March</td>
                     <td>5</td>
                     <td>15</td>
                     <td>85</td>
                     <td>145</td>
                     <td>5</td>
                     <td>0.46%</td>
                     <td>5</td>
                     <td>0.54%</td>
                  </tr>
                  <tr>
                    <td>Total </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                  </tr>
                   <tr>
                    <td>Average </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                    <td> 10000.000 </td>
                     <td> 10000.000 </td>
                    <td> 10000.000 </td>
                  </tr>
                  <tr> 
                    <td colspan = "4"> Overall Average Acceptance: 1000000000 (by pcs)</td>
                    <td colspan = "5"> Overall Average Acceptance: 1000000000 (by kg)</td>
                 </tr>
                </table>
                      </div>
                   </div>
                    <br> <br>


   
                  </div>
                </div>
              </div>
                 

             

         <!-- 

                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                          <td colspan="10"> <center> <b> PRECISION FOUNDRY OF THE PHILIPPINES INC.</b> </center> </td>
                        </tr>
                        <tr>  
                          <td> Production Inspection Report </td>
                        </tr> 
                        <tr>
                            <td> Part Name </td>
                            <td> Code No. </td>
                            <td> Hardness </td>
                            <td> By. </td>
                            <td> Time  </td>
                            <td> Qty  </td>
                            <td> Accept  </td>
                            <td> Rework  </td>
                            <td> Rejection  </td>

                        </tr>
                    </table>
                  </div>
                </div>
 -->
             

             </div>
          </div>
    </div>


      </div>

    </section>
</form>




@push('scripts')
<script>
 var options = {
  type: 'line',
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      },  
      {
        label: '# of Points',
        data: [7, 11, 5, 8, 3, 7],
        borderWidth: 1
      }
    ]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          reverse: false
        }
      }]
    }
  }
}

var ctx = document.getElementById('chartJSContainer').getContext('2d');
new Chart(ctx, options);
$('#sales').DataTable();
</script>
<script type="text/javascript" src="{{URL::asset('js/logic/reports.js')}}"></script>

@endpush
@stop