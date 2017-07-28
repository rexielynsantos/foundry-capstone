@extends('master')
@section('pageTitle', 'Job Ticket')
@section('content')




    <section class="content-header">
      <h1>
        Production
    <!--     <small>13 new Requests</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Production</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->

  <section class="content">

    <div class="modal fade" style="margin-top:50px" id="endticketmodal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
            <center>  <h4 class="modal-title">Update Job Ticket No. 8324823532</h4> </center>
       </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
              <label> Personnel Name: Jhonny Manuel </label> <br>
              <label> Stage: Waxing</label> <br>
              <label> Sub-Stage: Primary Coating </label> <br>
              <hr>

             </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <table>
              <tr>
              <th> Part Names </th>
              <th> Quantity Done </th>
              <th> Time Finished </th>
              </tr>

              <tr>
              <td> Product 1 </td>
              <td> <input type="number"> </td>
              <td> TIME HEREEE </td>
              </tr>
              </table>
              </div>
            </div>


          </div>

           <div class="modal-footer">
              <button type="reset" class="btn bg-white btn-flat pull-right">Clear</button>
              <button id="btnDeleteModule" type="button" class="btn bg-blue btn-flat pull-right">Submit</button>
          </div>
        </div>
      </div>
    </div>

      <div class="row">
        <div class="col-md-3">
          <a id="btnAddTicket" data-toggle="modal" data-target="#ticketmodal"  class="btn btn-primary btn-block margin-bottom"><i class="fa fa-plus"></i></a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Job Ticket
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="/transaction/inspection"><i class="fa fa-envelope-o"></i> Inspection </a></li>
                <li><a href="/transaction/production-monitoring"><i class="fa fa-envelope-o"></i> Production Monitoring </a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jobs</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
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
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <th> Personnel </th>
                    <th> Part Name </th>
                    <th> Stage  </th>
                    <th> Sub-stage </th>
                    <th> No. of Finished Job</th>
                    <th> Time Started</th>
                    <th> Time Finished</th>
                    <th> Actions </th>
                  </thead>
                  <tbody>
                   <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Jhonny Cruz</a></td>
                    <td>Bracket Wheel </td>
                    <td>Waxing </td>
                     <td>Sub-sequent Coating </td>
                    <td>120 pcs </td>
                    <td>2:00pm</td>
                    <td>-</td>
                    <td> <button id = "btnendticket" data-toggle="modal" data-target="#endticketmodal"> <i class="fa fa-edit"></i></button></td>
                  </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
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

<div class="modal fade" style="margin-top:50px" id="ticketmodal" role="dialog">
  <div class="col-md-12">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
            <center>  <h4 class="modal-title">New Job Ticket</h4> </center>
       </div>
        <form class="" id="jobTicket_form" role="form" data-toggle="validator">
          <div class="modal-body">

            <div class="row">
              <div class="col-md-12">
                <label class="pull-right"> {{date('Y-m-d')}} </label>
              </div>
            </div>
            <div class ="row">
              <div class="col-md-3">
                <div class="row">
                 <div class="col-md-12">
                   <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="personnel" class="control-label">Personnel<span style="color:red">*</span></label>
                        <select class="form-control select2" id = "personnel" style="width: 100%;" required>
                          <option value="first" selected disabled>Select Personnel</option>
                          @foreach($emp as $prod)
                          <option value="{{$prod->strEmployeeID}}">{{$prod->strEmployeeFirst}} {{$prod->strEmployeeLast}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="stage" class="control-label">Stage<span style="color:red">*</span></label>
                      <select class="form-control select2" id = "stage" style="width: 100%;" required>
                        <option value="first" selected disabled>Select a Stage</option>
                        @foreach($stage as $zprod)
                          <option value="{{$zprod->strStageID}}">{{$zprod->strStageName}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="substage" class="control-label">Sub-Stage<span style="color:red">*</span></label>
                      <select class="form-control select2" id = "substage" style="width: 100%;" required>
                        <option value="first" selected disabled>Select a Sub-Stage</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                   <label> Choose Products </label>
            <div class="row">
                 <div class="col-md-10">
                      <div class="form-group">

                         <select id="prodSelect" name="prodSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Products" style="width: 100%;border:1px solid #3434343">
                          @foreach ($prodd as $productt)
                              <option value="{{$productt->strProductID}}">{{$productt->strProductName}}</option>
                              @endforeach
                         </select>

                         <!-- <span> You chose 3 product(s) </span> -->
                      </div>
                  </div>

                  <div class="col-md-2">
                    <button type="button" id="productAdd" style="height: 33px" class="btn btn-primary btn-flat">Add</button>
                  </div>
            </div>
            <div class="row">
              <div id="hidee" class="col-md-10">
                <table id="jobtixTable" class="table table-bordered">
                <thead>
                  <!-- <th> # </th> -->
                  <th width="50%"> Part Name </th>
                  <th> Type </th>
                  <th> Time Started</th>
                  <th> Action </th>
                </thead>
                <tbody>

                </tbody>
              </table>
              </div>
            </div>
              </div>
            </div>



            <hr>


           <div class="modal-footer">
                <button type="reset" id="btnClear" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Submit</button>
            </div>
       </form>
    </div>
  </div>
</div>


    </section>




@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/jobTicket.js')}}"></script>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>

@endpush
@stop
