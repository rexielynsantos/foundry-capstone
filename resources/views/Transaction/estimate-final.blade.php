@extends('master')
@section('pageTitle', 'Quote Request')
@section('content')

<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="estimate_form" role="form" data-toggle="validator">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quote No. 123455
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

        <b>
         Toyota Philippines <br>
         24A Malaya St. Maginhawa <br>
         Pasig City 
         </b>

         <br><br>

         Attention: Sean Puyod (Customer Contact Person) <br> <br>

         We are pleased to bla bla bla bla eto yung nasa text area  We are pleased to bla bla bla bla eto yung nasa text area We are pleased to bla bla bla bla eto yung <br>
         We are pleased to bla bla bla bla eto yung nasa text area  We are pleased to bla bla bla bla eto yung nasa text area We are pleased to bla bla bla bla eto yung <br>
         We are pleased to bla bla bla bla eto yung nasa text area  We are pleased to bla bla bla bla eto yung nasa text area We are pleased to bla bla bla bla eto yung <br>
         We are pleased to bla bla bla bla eto yung nasa text area  We are pleased to bla bla bla bla eto yung nasa text area We are pleased to bla bla bla bla eto yung <br>
         We are pleased to bla bla bla bla eto yung nasa text area  We are pleased to bla bla bla bla eto yung nasa text area We are pleased to bla bla bla bla eto yung <br>

<hr>
         <table>
          <tr>
            <th width = "30%"> Description </th>
            <th width = "30%"> Variants </th>
            <th width = "20%"> Unit Cost </th>
            <th width = "10%"> Quantity </th>
            <th width = "10%"> Amount </th>
          </tr>
          <tr>  
            <td> Bracket Wheel Mount </td>
            <td> 300pcs </td>
            <td> 12.00 </td>
            <td> <input type="number"> </td>
            <td> 2312412 </td>
          </tr>
         </table>
        </div>

            
      </div>
  </section>

</form>




@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/tables/quote-Table.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/logic/estimate-add.js')}}"></script>

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
