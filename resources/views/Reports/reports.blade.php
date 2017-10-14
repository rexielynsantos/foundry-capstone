@extends('master')
@section('pageTitle', 'Reports')
@section('content')

    <section class="content-header">
      <div class="row">
        <div class="col-md-12">
          <div class="widget-user-header bg-blue">
            <div class="widget-user-image">
             <img src="../images/mainlogo.png" alt="User Avatar">
            </div>
             <h3 class="widget-user-username">Reports</h3>
             <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
          </div>
        </div>
      </div>

      <div class="row">
           <div class="col-md-4">
             <label> Report Search </label>
                 <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-search"></i></span>
                         <select id="reportDropdown" name="reportDropdown" class="select2 form-control">
                             <option value="first" disabled selected>Select...</option>
                             <option value="table1">Sales Report</option>
                             <option value="table2">Inventory Report</option>
                             <option value="table3">Production Monitoring Report</option>
                             <option value="table4">Product Inspection Report</option>
                             <option value="table5">Overall Rejection Report</option>

                         </select>
                     </div>
                 </div>
              </form>
           </div>
           <div class="col-md-4">
                <label>Starting Date:</label>
                 <div class="input-group">
                   <div class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                   </div>
                   <input type="text" class="form-control pull-right" id="StartDate">
                 </div>
           </div>
           <div class="col-md-4">
             <label>End Date:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="EndDate">
              </div>
           </div>
       </div>

    </section>


<section class="content">
    <div id="table1" align="center" style="display:none;">
      <h3> PRECISION FOUNDRY OF THE PHILIPPINES INC. </h3>
        <h5> Sales Order Report </h5>
        <canvas id="myChart" width="400" height="400"></canvas><br><br>
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
    </div><!-- END OF DIV 1/TABLE1  -->

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
