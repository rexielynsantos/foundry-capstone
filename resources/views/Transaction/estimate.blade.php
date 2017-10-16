@extends('master')
@section('pageTitle', 'Quotations')
@section('content')

    <section class="content-header">
      <h1>
      </h1>

    </section>


    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <a href="/transaction/estimate-add" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Quote</a>
        </div>
      </div>
  <br>
     <div class="row">


    <div class="col-md-12">

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
                              <th width="30%"> Contact Person  </th>
                              <th> Status </th>
                              <th> Actions </th>
                            </thead>
                            <tbody>
                              @foreach ($quote as $qt)
                              <tr>
                                <td>{{ $qt->strQuoteID }}</td>
                                <td>{{ $qt->customer->strCompanyName }}</td>
                                <td>{{ $qt->customer->strCustCity }}</td>
                                <td>
                                  @foreach($qt->customer->contact as $qts)
                                  <li>
                                  {{ $qts->strContactPersonName }}
                                </li>
                                @endforeach
                                </td>
                                <td>{{ $qt->strQuoteStatus }}</td>
                                <td>
                                  <button type="button" id="{{$qt->strQuoteID}}" onclick="approveModal(this.id)" class="btn btn-success"><i class="fa fa-check"></i></button>
                                  <button type="button" id="{{$qt->strQuoteID}}" onclick="disapproveModal(this.id)" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                  <button type="button" id="{{$qt->strQuoteID}}" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                </td>
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
                              <th width="30%"> Contact Person  </th>
                              <th> Status </th>
                              <th> Actions </th>
                            </thead>
                            <tbody>
                              @foreach ($quoteApproved as $qta)
                              <tr>
                                <td>{{ $qta->strQuoteID }}</td>
                                <td>{{ $qta->customer->strCompanyName }}</td>
                                <td>{{ $qta->customer->strCustCity }}</td>
                             
                                 <td>
                                  @foreach($qta->customer->contact as $qtas)
                                  <li>
                                  {{ $qtas->strContactPersonName }}
                                </li>
                                @endforeach
                                </td>
                                
                                <td>{{ $qta->strQuoteStatus }}</td>
                                <td>
                                  <button type="button" id="pdfestimate" class="btn btn-primary btn-flat" ><i class="fa fa-print"></i> </button>
                                  <a type="button"  class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;Send to Customer</a>
                                </td>
                              </tr>
                              @endforeach
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


  <div class="modal fade" id="approveQuoteModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

              </div>
              <div class="modal-body" align="center">
                  <h4 style="text-align:center" class="modal-title">Approve <input type="text" id="quoteModalID" readonly style="border:none;"></h4>
              </div>
              <div class="modal-footer">
                 <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                 <button type="button" id="approveYes" class="btn bg-blue btn-flat pull-right">Yes</button>
             </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="disapproveQuoteModal" style="margin-top: 60px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

              </div>
              <div class="modal-body" align="center">
                  <h4 style="text-align:center" class="modal-title">Disapprove <input type="text" id="quoteModalIDD" readonly style="border:none;"></h4>
              </div>
              <div class="modal-footer">
                 <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                 <button type="button" id="disapproveYes" class="btn bg-blue btn-flat pull-right">Yes</button>
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
