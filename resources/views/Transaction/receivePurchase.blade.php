@extends('master')
@section('pageTitle', 'Receive Purchases')
@section('content')


<form class="" id="purchase_form" role="form" data-toggle="validator">
	<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Receiving Section
    <!--     <small>13 new Requests</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Receive Orders</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Received Orders</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            </div>

            <div class="box-body no-padding">


                <table id="receiveingTablee" class="display">
                  <thead>
                    <th width="10%"> Reference PO No.  </th>
                    <th width="20%"> Supplier </th>
                    <th width="60%"> Orders </th>
                    <th width="10%"> Date Received</th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>

            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</form>

@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/receive-view.js')}}"></script>
<script>
$('#receiveingTable').DataTable(
  {
    "searching": false,
    "ordering": false,
    "paging": false,
  });
</script>



 <script type="text/javascript" src="{{URL::asset('js/logic/receive-add.js')}}"></script>


@endpush
@stop
