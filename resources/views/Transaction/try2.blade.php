@extends('master')
@section('pageTitle', 'Quote Request')
@section('content')
	
<!-- <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Order Estimate </h3> -->
<form class="" id="estimate_form" role="form" data-toggle="validator">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Quote Request
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
        <div class="col-md-4">
          <a href="../transaction/try" class="btn btn-primary btn-block margin-bottom">Back to Quote Requests</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Customer</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Company Name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label> Address </label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Street No. ">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Brgy ">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="City ">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label> Contact Person </label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name ">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label> Email Address </label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email ">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                 <label>Contact Number</label>
                  <div class="form-group">
                    <div class="input-group margin">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-phone-square"></i>
                              <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu">
                              <li><a id="btncellphone" href="#">Cellphone Number</a></li>
                              <li><a id="btnhomephone" href="#">Home Phone</a></li>
                              <li><a id="btnworkphone" href="#">Work Phone</a></li>
                            </ul>
                          </div>
                        <input type="text" class="form-control" id ="cust_contact" name="cust_contact" placeholder="ex.09123456789" required
                    title="09*********" data-inputmask='"mask": "(99) 999-999-999"' data-mask
                    data-error="Contact number is required." required>
                    </div>
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

        <div class="col-md-8">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary" style="overflow:hidden">
            <div class="box-header with-border">
              <h3 class="box-title">New Quote Request</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
        
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="To:">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Address:">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <textarea id="compose-textarea" class="form-control" style="height: 100px">
                        </textarea>
                  </div>
                </div>
              </div>
              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts" style="height:500px">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../images/girl1.png" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Select Products to Order
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
                            
                               <select id="prodSelect" name="prodSelect" class="form-control select2" multiple="multiple" onchange="displayProduct()" data-placeholder="Select Products" style="width: 100%;border:1px solid #3434343">
                                <option> Bracket Wheel Mount </option>
                                <option> Art Fossil </option>
                               </select>
                              
                               <span> You chose 3 products </span>
                </div>

              </div>
              <div class="col-md-3">
                    <button type="button" onclick="addRow('dataTable')" style="height: 33px" class="btn btn-primary btn-flat"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table id="dataTable" border="1"  style="margin-left:55px">
               <tr>
                <td>1</td>
                <td> <input id="demo" type="text"> </td>
               </tr>
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
                  Add Order Details</button>
                <!-- <button type="button" class="btn btn-primary">Proceed to --> <!-- Order Details <i class="fa fa-arrow-right"></i></button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
            </div>
          </div>
        </div>
      </div>
  </section>

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

  function nexttest(evt){
    alert(evt.target.value);
}

function addRow(tableID) {

    var table = document.getElementById(tableID);
   
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    cell1.innerHTML = rowCount + 1;

     var x = document.getElementById("prodSelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;

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
