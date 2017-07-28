@extends('master')
@section('pageTitle', 'Receive Supplies')
@section('content')

<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="estimate_form" role="form" data-toggle="validator">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receiving and Inspection 
       <!--  <small>13 new messages</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> View Quotes</a></li>
        <li class="active">Add Quote</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="../transaction/receive" class="btn btn-primary btn-block margin-bottom">View Receiving Records</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Delivery Details</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                   
                   <!-- <div class="form-group has-feedback"> -->
                        <div class="form-group">
                          <label for="supplierSelect" class="control-label">Received from:
                          </label>
                          <select class="form-control select2" id="supplierSelect" style="width: 100%;" required>
                           @foreach($receivedFrom as $sup)
                          <option value="{{$sup->strSupplierID}}">{{$sup->strSupplierName}}</option>
                          @endforeach
                          </select>
                          <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                   <!-- </div> -->
                
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                          <label for="refSelect" class="control-label">Reference:
                          </label>
                          <select class="form-control select2" id="refSelect" style="width: 100%;" required>
                          @foreach($purchase as $pur)
                          <option value="{{$pur->strPurchaseID}}">{{$pur->strPurchaseID}}</option>
                          @endforeach
                          </select>
                          <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"></span> -->
                        </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                <label>Delivery Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                </div>
              </div>
             
              <hr>

              <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-success btn-flat pull-right"><i class="fa fa-arrow-right"></i></button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-9">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary" style="overflow:hidden;height:500px">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body" style="height: 400px">
            <br>
                  <label class="control-label" style="margin-left:18px">Items Delivered</label>
                <div class="row"  style="margin-left:5px">
                      <div class="col-md-9">
                        <div class="form-group">

                           <select id="receiveMatSelect" name="receiveMatSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Materials" style="width: 100%;border:1px solid #3434343">
                           </select>

                           <span> You chose 3 materials </span>
                        </div>
                      </div>
                      <div class="col-md-3">
                            <button type="button" onclick="displayProduct()" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                      </div>
                      </div>
             
               <div class="row" style="margin-left: 5px;">
                <div class="col-md-12">
                   <table id="jobtixTable" border="1" class="display">
                        <thead>
                          <th> # </th>
                          <th width="40%"> Material</th>
                          <th width="20%"> Supplier </th>
                          <th> Quantity Received </th>
                          <th> Date Received</th>
                        </thead>
                       <tr>
                        <td> 1 </td>
                        <td> Buhangin </td>
                        <td> Wacker Neuson </td>
                        <td> <input type="number" width="5px" id="qtyReceived"> </td>
                        <td> insertdate here </td>
                       </tr>
                      </table>
                </div>
              </div>

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts"  style="height: 500px">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../images/girl1.png" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Select Materials to Order
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">No maximum number of products to be selected</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group" style="margin-left:55px">

                           <select id="prodSelect" name="prodSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Products" style="width: 100%;border:1px solid #3434343">
                           </select>

                           <span> You chose 3 materials </span>
                        </div>
                      </div>
                      <div class="col-md-3">
                            <button type="button" onclick="displayProduct()" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <table id="quoteTable" border="0" class="display"  style="margin-left:55px;color:black">
                          <thead>
                            <th>Item (Material Name)</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th> U/M</th>
                            <th> Amount </th>
                            <th> Charge To </th>
                          </thead>
                          <tbody>
                            <tr>
                              <td> </td>
                              <td> </td>
                              <td> </td>
                              <td> </td>
                              <td> </td>
                              <td> </td>
                           </tr>
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
              <div class="box-footer">
              <div class="pull-right">
              <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Orders" data-widget="chat-pane-toggle">
                  Add Purchase Details</button>
                &nbsp;
              <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Submit</button>
            </div>
          </div>
        </div>
      </div>
  </section>

</form>




@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/estimate.js')}}"></script>

<script>
// $("#addtocart").click(function(){
// 	var tbl = $('#quoteTable').DataTable();
// 	var disp = $('#prodSelect').val();
//   console.log(disp);
//   tbl.row.add([
//     disp
//   ]).draw(false);
	// var prods = [];
  //
	// for(var i = 0; i < disp.length; i++)
  //   {
  //      prods[i] = prods[i][0];
  //   }
		// $.ajax({
	  //   type: "POST",
	  //   url: "/transaction/cart",
	  //   data: {
	  //       prods_id: prods
	  //   },
	  //   success: function(result) {
	  //     alert("blob");
    //
	  //     noty({
	  //         type: 'error',
	  //         layout: 'bottomRight',
	  //         timeout: 3000,
	  //         text: '<h4><center>Added to Cart!</center></h4>',
	  //       });
	  //   },
	  //   error: function(result) {
	  //       alert('error');
	  //   }
	  // });
// });

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

function displayProduct(){
	var disp = $('#prodSelect').val();

  var table = document.getElementById("quoteTable");
  var tbl = $('#quoteTable').DataTable(
    {
    "searching": false,
    "ordering": false,
    "paging": false,

    });

    for (var j = 0; j < disp.length; j++) {
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = disp[j];
    }
	// console.log(disp);
}

function nexttest(evt){
  alert(evt.target.value);
}

function addRow(tableID) {

  var table = document.getElementById(tableID);

  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);

  var cell1 = row.insertCell(0);
  cell1.innerHTML = rowCount + 1;

  //  var x = document.getElementById("prodSelect").value;
  // document.getElementById("demo").innerHTML = "You selected: " + x;

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

