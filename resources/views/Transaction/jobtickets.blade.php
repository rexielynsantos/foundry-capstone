@extends('master')
@section('pageTitle', 'Job Ticket')
@section('content')




    <section class="content-header">
       
    </section>

    <!-- Main content -->

  <section class="content">
     <a id="btnAddTicket" data-toggle="modal" data-target="#ticketmodal"  class="btn btn-primary margin-bottom pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Job Ticket</a>

  <div class="modal fade" style="margin-top:50px" id="endticketmodal" role="dialog">
    <form class="" id="jt_form" role="form" data-toggle="validator">
      <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <center>  <h4 class="modal-title">Update Job Ticket No. <label id="endjtid"></label> </h4> </center>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
              <label> Personnel Name: </label> <label id="endjtpersonnel"></label><br>
              <label> Stage: </label> <label id="endjtstage"></label> <br>
              <label> Sub-Stage: <label id="endjtsubstage"></label> </label> <br>
              <hr>

             </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <table id="editTable">
                <thead>
                  <th class="hidden">ID</th>
                  <th> Part Names </th>
                  <th class="hidden"> Time Started</th>
                  <th> Quantity Done </th>
                  <th> Time Finished </th>
                </thead>
                <tbody>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
             <button type="submit" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
             <button type="reset" id="btnEditClear" class="btn btn-default pull-left"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
          </div>   
        </div>
      </div>
    </form>
  </div>
      <div class="row">


        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jobs</h3>
            </div>
     
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table id="jobTicketTable" class="table table-hover table-striped">
                  <thead>
                    <th class="hidden"> ID </th>
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
                   @foreach($jobticket as $job)
                     <tr>
                      <td class="hidden"> {{$job -> strJobTicketID}}</td>
                      <td class="mailbox-name"><a href="read-mail.html">{{$job -> employee -> strEmployeeFirst}} {{$job -> employee -> strEmployeeLast}}</a></td>
                      <td>
                        @foreach($job -> product as $p)
                          <li width="35%" style="list-style-type:circle">{{$p->details->strProductName}}</li>
                        @endforeach
                      </td>
                      <td> {{$job -> stage -> strStageName}} </td>
                      <td>
                        {{$job -> substage['strSubStageName']}}
                      </td>
                      <td>
                        @foreach($job -> product as $p)
                          <li width="35%" style="list-style-type:circle">{{$p->dblJobFinished}}</li>
                        @endforeach
                      </td>
                      <td>
                        @foreach($job -> product as $p)
                          <li width="35%" style="list-style-type:circle">{{$p->timeStarted}}</li>
                        @endforeach
                      </td>
                      <td>
                        @foreach($job -> product as $p)
                          <li width="35%" style="list-style-type:circle">{{$p->timeFinished}}</li>
                        @endforeach
                      </td>
                      <td> <button id = "btnendticket" name='{{$job->strJobTicketID}}' data-toggle="modal" data-target="#endticketmodal"> <i class="fa fa-edit"></i></button></td>
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

                <div class="pull-right">

                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div> -->
                  <!-- /.btn-group -->
                <!-- </div> -->
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
                        <label for="joborderRef" class="control-label">Job Order No. <span style="color:red">*</span></label>
                        <select class="form-control select2" id = "joborderRef" style="width: 100%;" required>
                          <option value="first" selected disabled>Select Job Order</option>
                          @foreach($joborder as $jo)
                          <option value="{{$jo->strJobOrdID}}">{{$jo->strJobOrdID}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
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
                      <label for="substage" class="control-label">Sub-Stage</label>
                      <select class="form-control select2" id = "substage" style="width: 100%;" required>
                        <option value="first" selected disabled>Select a Sub-Stage</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                   <label class="control-label">Choose Products<span style="color:red">*</span></label>
            <div class="row">
                 <div class="col-md-10">
                      <div class="form-group">

                         <select id="prodSelect" name="prodSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Products" style="width: 100%;border:1px solid #3434343" required>

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

                  <th class="hidden"> ID </th>
                  <th> Part Name </th>
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
                <button type="submit" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
                <button type="reset" id="btnAddClear" class="btn btn-default pull-left"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
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
  

  
  function end(id){
    
          

  }
  

  

</script>

@endpush
@stop
