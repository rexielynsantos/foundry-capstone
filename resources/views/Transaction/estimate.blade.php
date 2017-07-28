@extends('master')
@section('pageTitle', 'Quote Request')
@section('content')
	

<form class="" id="estimate_form" role="form" data-toggle="validator">
    <section class="content-header">
      <h1>
        Quote Requests
        <small>13 new Requests</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="../transaction/estimate-add" class="btn btn-primary btn-block margin-bottom">Compose</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
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
               <table class="table table-bordered">

                  <thead>
                    <th width="10%"> Quote No.  </th>
                    <th width="20%"> Customer </th>
                    <th width="20%"> Shipping City</th>
                    <th width="20%"> Contact Person  </th>
                   <th width="10%"> Email  </th>
                    <th width="10%"> Contact No </th>
                    <th> Status </th>

                    <th> Action</th>

                  </thead>
                  <tbody>
                  @foreach($estimate as $est)
                   <tr>
                    <td>{{$est->strQuoteRequestID}}</td>
                    <td>{{$est->strCompanyName}}</td>
                    <td>{{$est->strCustCity}}</td>
                    <td> {{$est->strCustContactPerson}}</td>
                    <td> {{$est->strCustEmail}} </td>
                    <td> {{$est->strCustContactNo}} </td>
                    <td>{{$est->strStatus}}</td>

                    <td> 
                    <button> <i class="fa fa-eye"></i></button>
                    <button> <i class="fa fa-check-square-o"></i></button>
                    <button> <i class="fa fa-edit"></i></button>
                    </td>
                  </tr>

                  @endforeach

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