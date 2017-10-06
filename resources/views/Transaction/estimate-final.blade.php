@extends('master')
@section('pageTitle', 'Quote Request')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quote No. <input type="text" id="testval" name="testval" disabled style="border:none;"value="{{ Session::get('quotenum') }}">
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
           <!--  <div class="col-md-4">
              <center>
              <p style="font-weight: bold;font-size:13pt;" class="companyTitle"> Precision Foundry of the Philippines Inc. </p>
              <p class="companyAddress">  #86 Fortune Avenue, Brgy. Fortune, Marikina City, PHILIPPINES </p>
              <p class="companyTelNo">  Tel No. 998-2581 </p>
              </center>
            </div>
 -->
          </div>

        <b>
         {{ Session::get('compname') }}<br>
         {{ Session::get('street') }} {{ Session::get('brgy') }}<br>
         {{ Session::get('city') }}
         </b>

         <br><br>

         Attention: {{ Session::get('contactperson') }}<br> <br>

         <br>

<hr>    <div class="row">
          <div class="col-md-12">
           <table id="estimateFinalTable" class="display">
             <thead>
               <tr>
                 <th width = "30%"> Description </th>
                 <th width = "30%"> Variance </th>
                 <th width = "20%"> Quantity</th>
               </tr>
             </thead>
             <tbody>

             </tbody>
           </table>
          </div>
        </div>
        </div>
        <br>
        <a href="/transaction/estimate" class="btn btn-primary pull-right" style="width:3cm; height:1cm;">Go Back</a>
      </div>


  </section>





@push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/tables/estimatefinal-table.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/logic/estimate-final.js')}}"></script>

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

function nexttest(evt){
  alert(evt.target.value);
}

function addRow(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var cell1 = row.insertCell(0);
  cell1.innerHTML = rowCount + 1;


  var cell2 = row.insertCell(1);
  var element2 = document.createElement("input");
  element2.type = "text";
  element2.name = "txtbox[]";
  element2.onchange = nexttest;
  cell2.appendChild(element2);

}
</script>

@endpush
@stop
