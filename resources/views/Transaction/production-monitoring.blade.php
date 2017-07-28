@extends('master')
@section('pageTitle', 'Production Monitoring')
@section('content')
	

    <section class="content-header">
      <h1>
        Production Monitoring
        <br><br>
      
       <a id="btnViewAll" class="btn btn-primary btn-block margin-bottom pull-left">View all</a>
     
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pro duction Monitoring</a></li>

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
                    <option selected disabled> Waxing  </option>
                  </select>
                </div>
              </div>

            </div>


              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
              <tr colspan="7"> <b> FINISHED PARTS </b></tr> 

                  <thead>

                    <th> Part Name </th>
                    <th> Primary Coating  </th>
                    <th> Subsequent Coating </th>
                    <th> Primary Coating  </th>
                    <th> Dewaxing </th>
                    <th> Leaching </th>
                    <th> Action</th>
   
                  </thead>
                  <tbody>
                   <tr>
                    <td><a href="#" data-toggle="modal" data-target="#viewProduct"">Pako</a></td>
                    <td>56 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
                  </tr>
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Baril</a></td>
                    <td>68 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
                  </tr>
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Buhay q</a></td>
                    <td>72 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
                  </tr>
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Yaw q na</a></td>
                    <td>56 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
                  </tr>
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Barilin kita</a></td>
                    <td>788 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
                  </tr>
                   <tr>
                    <td class="mailbox-name"><a href="read-mail.html">lagot u kay duterts</a></td>
                    <td>78 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
                  </tr>
                   <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Beng beng</a></td>
                    <td>12 </td>
                     <td>150 </td>
                    <td>50 </td>
                    <td>150</td>
                    <td>150</td>
                    <td> <button> View In-Process </button> </td>
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

<div class="modal fade" style="margin-top:50px" id="viewProduct" role="dialog">
  <div class="col-md-6 col-md-offset-3">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <center>
        <h4 class="modal-title">Product Information</h4>
        </center>
      </div>
      <form class="" id="viewform"  role="form" data-toggle="validator">
      <div class="modal-body">
        <div class="row">
        <label> pakoooo </label>
        </div>
      </div>
      <div class="modal-footer">
          <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
          <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
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
