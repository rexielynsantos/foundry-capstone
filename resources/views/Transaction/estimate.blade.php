@extends('master')
@section('pageTitle', 'Quotations')
@section('content')

    <section class="content-header">
      <h1>
      </h1>

    </section>


    <section class="content">

     <div class="row">
      <div class="col-md-3">
        <a href="../transaction/product-costing-list"  class="btn btn-block btn-social btn-tumblr"><i class="fa fa-rouble"></i> Product Costings </a>
        <a href="../transaction/materialrequisition-add" class="btn btn-block btn-social btn-linkedin"><i class="fa fa-opencart"></i> Material Requisitions </a>
        <a href="../transaction/joborders" class="btn btn-block btn-social btn-bitbucket"><i class="fa fa-tasks"></i> Job Orders </a>
      </div>

    <div class="col-md-9">

          <div class="box box-widget widget-user-2">

            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">

              </div>

              <h3 class="widget-user-username">Quotation</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
            </div>

<!--             <div class="box-footer">
                <table id = "tblQuote" class="table table-bordered">

            <div class="box-footer">

              <h3 class="widget-user-username">Quotations</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
            </div> -->
            <div class="box-footer">
              <div class="row">
                <div class="col-md-12">
                  <div class="nav-tabs-custom">
                      <ul id="mytabs" class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">&nbsp;&nbsp;Pending</a></li>
                        <li><a href="#tab_2" data-toggle="tab">&nbsp;&nbsp;Approved</a></li>

                      </ul>

                   <div class="tab-content">
                      <div class="tab-pane active" id="tab_1">
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
                              @foreach ($quote as $qt)
                              <tr>
                                <td>{{ $qt->strQuoteID }}</td>
                                <td>{{ $qt->strCompanyName }}</td>
                                <td>{{ $qt->strCustCity }}</td>
                                <td>{{ $qt->strContactPersonName }}</td>
                                <td>Approved</td>
                                <td></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="tab-pane" id="tab_2">
                          <table id="tblApprovedQuotes" border="0" class="table table-bordered" style="color:black;">
                            <thead>
                               <th width="10%"> Quote No.  </th>
                              <th width="20%"> Customer </th>
                              <th width="10%"> Shipping City</th>
                              <th width="20%"> Contact Person  </th>
                              <th> Status </th>
                              <th> Actions </th>
                            </thead>
                            <tbody>
                              <tr>
                                <td> QR00003 </td>
                                <td> Wacker Neuson </td>
                                <td> Pasay</td>
                                <td> 2017-09-14 </td>
                                <td> Approved </td>
                                <td> <button type="button" id="pdfestimate" class="btn btn-primary btn-flat" ><i class="fa fa-print"></i> </button> </td>
                                <td> <a type="button"  class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;Send to Customer</a> </td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
                <!-- <table id = "tblQuote" class="table table-bordered">
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

                  </tbody>
                </table> -->
            </div>
          </div>
    </div>

<!--         <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quotes</h3>
            </div>
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

            <div class="box-footer no-padding">
              <div class="mailbox-controls">

                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div> -->

      </div>

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
               <input type="text" name="companyName" id="companyName" style="border:none; background-color:white;" disabled> <br>
               <input type="text" name="custStreet" id="custStreet" style="border:none;background-color:white;"disabled> <br>
               <input type="text" name="custCity" id="custCity" style="border:none;background-color:white;"disabled>
               </b>

               <br><br>

               Attention: <input type="text" name="contactPerson" id="contactPerson" style="border:none;background-color:white;"disabled> <br> <br>

                <!-- <input type="text" name="quoteDesc" id="quoteDesc" style="border:none;"disabled><br> -->

               <table id="viewAndUpdateQuoteTable" class="display">
                 <thead>
                   <tr>
                     <th class='hidden'>ID</th>
                     <th width = "30%"> Description </th>
                     <th width = "20%"> Quantity </th>
                     <th width = "20%"> Amount </th>
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
              <button type="button" class="btn bg-default btn-flat pull-right" onclick="htmltopdf()"><i class="fa fa-print"></i> <a style="color:black">Print</a> </button>
              <!-- <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button> -->
            </div>
            <!-- </form> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



  <div class="modal fade" id="approveQuoteModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

              </div>
              <div class="modal-body" align="center">
                  <h4 style="text-align:center" class="modal-title">Approve Product Costing 00001?</h4>
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


@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/pdfEstimate.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/logic/estimate.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/tables/estimate-tables.js')}}"></script>
<!--  <script>
    $('#tblApprovedQuotes').DataTable();
 </script> -->


@endpush
@stop
