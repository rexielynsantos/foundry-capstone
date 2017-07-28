@extends('master')
@section('pageTitle', 'Inspection')
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
        <div class="col-md-3">
          <a  id="btnAddTicket" data-toggle="modal" data-target="#ticketmodal"  class="btn btn-primary btn-block margin-bottom"><i class="fa fa-plus"></i></a>

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
                <li><a href="/transaction/inspectProduction"><i class="fa fa-envelope-o"></i> Inspection </a></li>
                <li><a href="/transaction/joborder"><i class="fa fa-envelope-o"></i> Production Monitoring </a></li>
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
                  </thead>
                  <tbody>
                   <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Jhonny Cruz</a></td>
                    <td>Bracket Wheel </td>
                    <td>Waxing </td>
                     <td>Sub-sequent Coating </td>
                    <td>120 pcs </td>
                    <td>2:00pm</td>
                    <td>4:00pm</td>
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
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


<div class="modal fade" style="margin-top:50px" id="ticketmodal" role="dialog">
  <div class="col-md-6 col-md-offset-3">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
            <center>  <h4 class="modal-title">New Job Ticket</h4> </center>
       </div>
        <form class="" id="mod_form" role="form" data-toggle="validator">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <label class="pull-right"> INSERT DATE HERE </label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="stage" class="control-label">Sub-Stage<span style="color:red">*</span></label>
                  <select class="form-control select2" id = "substage" style="width: 100%;" required>
                  </select>
                </div>
              </div>
            </div>
            <hr>
             <label> Choose Products </label>
            <div class="row">
             <div class="col-md-9">
                  <div class="form-group">
                 
                     <select id="prodSelect" name="prodSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Products" style="width: 100%;border:1px solid #3434343">
                      
                     </select>

                     <span> You chose 3 product(s) </span>
                  </div>
              </div>
            
              <div class="col-md-2">
                <button type="button" onclick="displayProduct()" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add</button>
              </div>
            </div>
          <div class="row">
            <div class="col-md-10">
              <table id="jobtixTable" border="1" class="display"  style="color:black;"">
              <thead>
                <th> # </th>
                <th width="50%"> Part Name </th>
                <th> Type </th>
                <th> Quantity Done </th>
                <th> Time Alotted</th>
              </thead>
             <tr>
              <td> 1 </td>
              <td> Bracket Wheel Mount </td>
              <td> Investment Casting </td>
              <td> <input type="number" width="5px" id="qtyFinished"> </td>
              <td> inserttimepicker here </td>
             </tr>
             <tr>
              <td> 2 </td>
              <td> Art Fossil </td>
              <td> Artworks </td>
              <td> <input type="number" width="5px" id="qtyFinished"> </td>
              <td> inserttimepicker here </td>
             </tr>
            </table>
            </div>
          </div>

           <div class="modal-footer">
                <button type="reset" id="btnClear" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Submit</button>
            </div>
       </form>           
    </div>
  </div>
</div>


@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/estimate.js')}}"></script>
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
