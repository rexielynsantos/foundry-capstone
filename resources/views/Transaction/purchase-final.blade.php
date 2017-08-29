@extends('master')
@section('pageTitle', 'Finalize Purchase')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Purchase No. <input type="text" id ="purchaseID" value="{{ Session::get('purchaseID') }}" disabled style="border:none;">
       <!--  <small>13 new messages</small> -->
      </h1>


    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-body">
          <div class="row">
              <div class="col-md-12">
                <label class="pull-right"> {{date('Y-m-d')}} </label>
              </div>
          </div>
          <div class="row">
            <!--logo here-->
            <div class="col-md-4">
              <img src="../images/mainlogo.png" width="90" height="90" style="margin-left: 30px;">
            </div>
            <div class="col-md-4">
              <center>
              <p style="font-weight: bold;font-size:13pt;" class="companyTitle"> Precision Foundry of the Philippines Inc. </p>
              <p class="companyAddress">  #86 Fortune Avenue, Brgy. Fortune, Marikina City, PHILIPPINES </p>
              <p class="companyTelNo">  Tel No. 998-2581 </p>
              </center>
            </div>
          </div>
          <hr>
          <div class="row" style="margin-left: 30px;">
            <div class="col-md-12">
              <input type="text" id="supID" value="{{ Session::get('supID') }}" hidden>
               <input type="text" id ="supName" style="border:none;background:white;" disabled><br>
               <input type="text" id="supAddress" style="border:none;background:white;" disabled><br>
               <input type="text" id="supCity" style="border:none;background:white;" disabled>
               </b>
            </div>
          </div>
          <br><br>
          <div class="row" style="margin-left: 30px;">
            <div class="col-md-12">
                  Attention:<input type="text" id="contactPerson" disabled style="border:none;background:white;"> <br> <br>

            </div>
          </div>
          <br><br>
          <div class="row" style="margin-left: 30px;">
            <div class="col-md-12">
                <table>
                  <thead>
                    <tr>
                      <th width = "30%"> Description </th>
                      <th width = "20%"> Quantity </th>
                      <th width = "20%"> Unit Cost </th>
                      <th width = "10%"> Amount </th>
                      <th> Remarks </th>
                    </tr>
                  </thead>
             </table>
            </div>
          </div>

        </div>


        </div>

         <a href="{{ route('htmltopdfview',['download'=>'pdf']) }}">Generate PDF</a>


  </section>



@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/logic/purchase-final.js')}}"></script>


@endpush
@stop
