@extends('master')
@section('pageTitle', 'Manage Orders')
@section('content')
	

<form class="" id="purchase_form" role="form" data-toggle="validator">
  <section class="content-header">
    <h1>
    Manage Orders
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"> {{date('Y-m-d')}} </a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">View Orders</h3>


          </div>
          <!-- /.box-header -->
          <div class="box-body">

          </div>
        </div>
      </div>
    </div>
  </section>
</form>





@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/purchase.js')}}"></script>
<script>


@endpush
@stop
