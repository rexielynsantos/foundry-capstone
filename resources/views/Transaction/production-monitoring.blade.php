@extends('master')
@section('pageTitle', 'Production Monitoring')
@section('content')
	 <div class="modal fade" style="margin-top:50px" id="jobModal" role="dialog">
        <div class="col-md-8 col-md-offset-2">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Use Products </h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="row">
                    <div class="col-md-12">
                      <label class="pull-right"> {{date('Y-m-d')}} </label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="jobOrderNo" class="control-label">Use in: <span style="color:red">*</span></label>
                        <select class="form-control select2" id = "joborderNo" style="width: 100%;" required>
                          <option value="first" selected disabled>Select Job Order No. </option>
                          @foreach($joborder as $jo)
                            <option value="{{$jo->strJobOrderID}}">{{$jo->strJobOrderID}}</option>
                          @endforeach
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                      </div>
                    <div class="col-md-6">
                       <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="stageName" class="control-label">Stage</label>
                        <select class="form-control select2" id = "stageName" style="width: 100%;" required>
                          <option value="first" selected disabled>Select Stage </option>
                          @foreach($stage as $s)
                            <option value="{{$s->strStageID}}">{{$s->strStageName}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="materialsReq" class="control-label">Order Details: <span style="color:red">*</span></label>
                    </div>

                    <div class="col-md-12">
                       <table id="addMaterialsTable" name="example" border="0" class="table table-bordered">
                      <thead style="color:black">
                        <th class = "hidden">ID</th>
                        <th width="60%">Product</th>
                        <th> Target Quantity </th>
                        <th> Add Finish Products </th>
                        <th> Remaining </th>
                      </thead>
                      <tbody>
                       
                      </tbody>
                   </table>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-12">
                   
                  </div>
                </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 </div>

    <section class="content-header">
      <h1>
        Production Monitoring
        <br><br>
      
       <a id="btnViewAll" class="btn btn-primary btn-block margin-bottom pull-left">View all</a>
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Production Monitoring</a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">

            
            <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                <label> Choose Stage to Monitor </label>
                  <select class="form-control select2" id = "stage" style="width: 100%;padding-left: 10px" required>
                  <option value="first" selected disabled>Choose Stage</option>
                    @foreach($jobticket as $j)
                      <option value="{{$j->strStageID}}">{{$j->stage->strStageName}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label> Choose Substage to Monitor </label>
                  <select class="form-control select2" id = "substage" style="width: 100%;padding-left: 10px" required>
                  </select>
                </div>
              </div>

            </div>


              <div class="table-responsive mailbox-messages">
                <table id="monitoringTable" class="table table-hover table-striped">
              <tr colspan="7"> <b> FINISHED PARTS </b></tr> 
                  <thead>
                    <th class="hidden">ID</th>
                    <th class="hidden">Part ID</th>
                    <th> Part Name </th>
                    <th>Quantity</th>
                    <th> Action</th>
                  </thead>
                  <tbody>
                    @foreach($detail as $jt)
                      <tr>
                        <td class="hidden">{{$jt -> strJobTicketID}}</td>
                        <td class="hidden">{{$jt -> strProductID}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#viewProduct"> {{$jt -> details -> strProductName}}</a></td>
                        <td>100</td>
                        <td> <button class="btn btn-primary" id="btnuse" data-toggle="modal" data-target="#jobModal"> Use </button> </td>
                      </tr>
                    @endforeach
                  </tbody>
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
