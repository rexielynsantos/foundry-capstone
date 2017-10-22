@extends('master')
@section('pageTitle', 'Reports')
@section('content')

    <section class="content">
      <div class="row">
    		<div class="col-md-12">

        <div class="box box-widget widget-user-2">
      <div class="widget-user-header bg-red">
        <div class="widget-user-image">
        <img src="../images/mainlogo.png" alt="User Avatar">

        </div>

        <h3 class="widget-user-username">Sales Order</h3>
        <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
      </div>
      <div class="box-footer">
      <div class="row">
           <div class="col-md-4">
             <label> Report Search </label>
                 <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-search"></i></span>
                         <select id="reportDropdown" name="reportDropdown" class="select2 form-control">
                             <option value="first" disabled selected>Select Report</option>
                             <option value="table1">Sales Report</option>
                             <option value="table2">Inventory Report</option>
                             <option value="table3">Production Monitoring Report</option>
                             <!-- <option value="table4">Product Inspection Report</option>
                             <option value="table5">Overall Rejection Report</option> -->

                         </select>
                     </div>
                 </div>
              </form>
           </div>
           <div class="col-md-3">
                <label>Starting Date:</label>
                 <div class="input-group">
                   <div class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                   </div>
                   <input type="text" class="form-control pull-right" id="StartDate">
                 </div>
           </div>
           <div class="col-md-3">
             <label>End Date:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="EndDate">
              </div>
           </div>
           <br>
           <div class="col-md-2">
             <button type="button" class="btn btn-primary" id="searchDate">Search..</button>
           </div>
       </div>

    <!-- </section>


<section class="content"> -->
    <div id="table1" align="center" style="display:none;">
      <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
        <h5> Sales Order Report </h5>
        <div class="row">
          <div class="col-md-12">
            <center>Number of {Purchases</center>
            <canvas id="myChart" width="400" height="400"></canvas>
          </div>
        </div>
        <br><br>
        <table id="sales" class="table table-striped table-bordered responsive">
          <thead>
            <th>Customer Name </th>
            <th> Total Purchases </th>
            <th> Total Delivered </th>
          </thead>
          <tbody>

          </tbody>
        </table>

    </div> <!-- END OF DIV 1/TABLE1  -->

    <!-- START OF TABLE 2 -->
    <div id="table2" align="center" style="display:none;">
      <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
       <h5> Inventory Report </h5><br><br>
       <div class="row">
         <div class="col-md-6">
           <center>Deliveries</center>
           <canvas id="deliveredChart" width="400" height="400"></canvas>
         </div>
         <div class="col-md-6">
           <center>Returns</center>
           <canvas id="returnedChart" width="400" height="400"></canvas>
         </div>
       </div><br>
       <table id="inventoryRpt" class="table table-striped table-bordered responsive">
          <thead>
           <th>Material Name </th>
           <th> Delivered </th>
           <th> Returned </th>
           <th> Total Inventory </th>
           <th> Re-order Level </th>
         </thead>
         <tbody>

         </tbody>
       </table>
    </div><!-- END OF DIV 2/TABLE2  -->

    <!-- START OF DIV 3/TABLE 3  -->
    <div id="table3" align="center" style="display:none;">
      <div class="col-md-12">
      <center>
        <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
        <h5> Production Report </h5>
      </center>

      <table id="monitoringTable" border = "3" class="table table-hover table-striped">
        <!-- <tr>
          <td style="background-color: #3c8dbc" colspan="7"> Waxing </td>
        </tr> -->
        <thead>
          <tr>
            <th class="col-md-3" style="background-color:#d2d6de"> Part Name (#)</th>
            <td style="background-color: #3c8dbc">Sol. Leaching</td>
            <td style="background-color: #3c8dbc">Cleaning</td>
            <td style="background-color: #3c8dbc">Assembly</td>
            <th style="background-color: #f56954"> QA</th>
            <th style="background-color: #605ca8">Total Parts Available</th>
            <th style="background-color: #ff851b">Target Quantity</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      </div>
    </div><!-- END OF DIV 3/TABLE3  -->
</div>
</div>
</div>
</div>
  </section>

<style>
div.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>


  @push('scripts')
  <script src="/plugins/chartjs/Chart.js"></script>
  <script src="/plugins/chartjs/Chart.min.js"></script>
  <script type="text/javascript" src="{{URL::asset('js/logic/reports.js')}}"></script>

  @endpush
@stop
