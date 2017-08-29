@extends('master')
@section('pageTitle', 'Order Estimate')
@section('content')


<!-- <form class="" id="estimate_form" role="form" data-toggle="validator"> -->
    <section class="content-header">
      <h1>
        Order Estimate
     <!--    <small>13 new Requests</small> -->
      </h1>

    </section>


    <section class="content">

     <div class="row">
      <div class="col-md-3">
        <a href="../transaction/estimate-add-quote"  class="btn btn-block btn-social btn-instagram"><i class="fa fa-edit"></i> New Order Estimate </a>
        <a href="../transaction/materialrequisition-add" class="btn btn-block btn-social btn-linkedin"><i class="fa fa-opencart"></i> Material Requisitions </a>
        <a href="../transaction/joborders" class="btn btn-block btn-social btn-bitbucket"><i class="fa fa-tasks"></i> Job Orders </a>
      </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quotes</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
               <table id = "tblQuote" class="table table-bordered">
                  <thead>
                    <th width="10%"> Quote No.  </th>
                    <th width="20%"> Customer </th>
                    <th width="10%"> Shipping City</th>
                    <th width="20%"> Contact Person  </th>
                    <th> Status </th>
                    <th> Actions </th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">

                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
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
    <!-- /.content -->

</form>

<div class="modal fade" style="margin-top:50px" id="viewAndUpdateQuoteModal" role="dialog">
      <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Quote No. <input type="text" name="quoteID" id="quoteID" style="border:none; background:white;" disabled></h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
              <b>
               <input type="text" name="companyName" id="companyName" style="border:none;"> <br>
               <input type="text" name="custStreet" id="custStreet" style="border:none;"> <br>
               <input type="text" name="custCity" id="custCity" style="border:none;">
               </b>

               <br><br>

               Attention: <input type="text" name="contactPerson" id="contactPerson" style="border:none;"> <br> <br>

                <input type="text" name="quoteDesc" id="quoteDesc" style="border:none;"><br>

               <table id="viewAndUpdateQuoteTable" class="display">
                 <thead>
                   <tr>
                     <th class='hidden'>ID</th>
                     <th width = "30%"> Description </th>
                     <th width = "20%"> Variants </th>
                     <th width = "20%"> Quantity </th>
                     <th width = "20%"> Amount </th>
                     <th> Actions </th>
                   </tr>
                 </thead>
                 <tbody>

                 </tbody>
               </table>
               <!-- <tr>
                 <td colspan="6"> -->
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                     <b> Input Job Order Details: </b>
                        <table id="addJOTable" class="display">
                          <thead>
                            <tr>
                              <th class='hidden'>ID</th>
                              <th> Job Description </th>
                              <th> Material Spec </th>
                              <th> Qty </th>
                              <th> Remarks </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>

                        </table>
                    </div>
                  </div>
               <!-- </td>
             </tr> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-default btn-flat pull-right" onclick="htmltopdf()"><i class="fa fa-print"></i> <a style="color:black"">Print</a> </button>
              <!-- <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button> -->
            </div>
            <!-- </form> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/estimate.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/logic/pdf.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/tables/estimate-tables.js')}}"></script>

@endpush
@stop
