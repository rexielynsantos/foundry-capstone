@extends('master')
@section('pageTitle', 'Stock Monitoring')
@section('content')

 <div class="modal fade" style="margin-top:50px" id="receivingModal" role="dialog">
        <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Delivery Records</h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="deliveryTable" class="table table-bordered">
                    <thead>
                      <th class="hidden"> ID </th>
                      <th> Date Delivered  </th>
                      <th> Material </th>
                      <th> Quantity </th>
                      <th> Status </th>
                    </thead>
                    <tbody>
                     <!--  <tr>
                        <td> 2017-08-28 </td>
                        <td> Zircon Sand </td>
                        <td> 100 </td>
                        <td> Partial Delivery </td>
                      </tr>
                      <tr>
                        <td> 2017-08-27 </td>
                        <td> Zircon Sand </td>
                        <td> 250 </td>
                        <td> Full Delivery </td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 </div>

 <div class="modal fade" style="margin-top:50px" id="requisitionModal" role="dialog">
        <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Requisition Records</h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="requisitionTable" class="table table-bordered">
                    <thead>
                      <th class="hidden"> ID </th>
                      <th> Need Date  </th>
                      <th> Material </th>
                      <th> Variant </th>
                      <td> Used for </td>
                      <th> Quantity </th>
                      <th> Date Accquired </th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 </div>


  <section class="content-header">
    <h1>
      Stock Monitoring
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"> {{date('Y-m-d')}} </a></li>
    </ol>
  </section>

  <section class="content">

       <div class="row">
        <div class="col-md-4">
           <a href="../transaction/purchaseOrder" class="btn btn-block btn-social btn-instagram">  <i class="fa fa-arrow-left"></i> Back to Main </a> <br>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Choose Material to Monitor</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              </div>
            </div>

            <div class="box-body">

              <div class="row">
                <div class="col-md-12">
                 <div class="form-group has-feedback">
                  <div class="form-group">
                    <select class="form-control select2" id="materialStocks" style="width: 100%;" required>
                      <option value="first" selected disabled>Select a Material</option>
                       @foreach($material as $mat)
                          <option value="{{$mat->strMaterialID}}">{{$mat->strMaterialName}}</option>
                       @endforeach
                    </select>

                  </div>
                 </div>
                </div>
              </div>

              <hr>

            </div>
          </div>

        </div>

      <div class="col-md-8">
        <div class="box box-block">
          <div class="box-header with-border">
            <h3 class="box-title">Material Information</h3>
          </div          <div class="box-body">
            <table id ="stockTable" class="table table-bordered">
              <thead>
                <tr>
                  <th class="hidden">asdf</th>
                  <th class="hidden">asdf</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><b>Material Name</b> </td>
                  <td id="selectMatName"> </td>
                </tr>
                <tr>
                <td> <b>  Description </b> </td>
                <td id="selectMatDesc"> </td>
              </tr>
              <tr>
                <td> <b>  Re-order Level </b> </td>
                <td id="selectMatReorderlvl"> </td>
              </tr>
              <tr>
                <td> <b>  Re-order Quantity </b> </td>
                <td id="selectMatReorderqty"> </td>
              </tr>
              <tr>
                <td> <b>  Status </b> </td>
                <td id="selectMatStatus"> </td>
              </tr>
               <tr>
                <td> <b>  Supplier(s) </b> </td>
                <td id="selectMatSupName"> </td>
              </tr>
               <!-- <tr>
                <td> <b>  Variant(s) </b> </td>
                <td id="selectMatVariants"> </td>
              </tr> -->
              <tr>
                <td> <b>  Quantity Onhand</b> </td>
                <td id="selectMatQtyOnhand"> </td>
              </tr>

            <!--   <tr>
                <td> <b> Actions </b></td>
                <td>
                   <button id="btndeliveries" data-toggle="modal" data-target="#receivingModal" class="btn btn-primary"> <i class="fa fa-eye"></i>&nbsp;View Deliveries </button>
                   <button id="btnrequisition" data-toggle="modal" data-target="#requisitionModal" class="btn btn-warning"> <i class="fa fa-eye"></i>&nbsp;View Requisitions </button>
               </td>
              </tr> -->

              </tbody>
            </table>
          </div>
        </div>
      </div>

  </section>


@push('scripts')
<script type="text/javascript" src="{{URL::asset('js/logic/inventory.js')}}"></script>


@endpush
@stop
