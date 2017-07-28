@extends('master')
@section('pageTitle', 'Stock Monitoring')
@section('content')


<form class="" id="purchase_form" role="form" data-toggle="validator">
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
           <a href="../transaction/purchaseOrder" class="btn btn-block btn-social btn-github">  <i class="fa fa-arrow-left"></i> Back to Main </a> <br>

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
                    <select class="form-control select2" id="supplierselection" style="width: 100%;" required>
                      <option value="first" selected disabled>Select a Material</option>
                 
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                 </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-12">
                <button type="reset" class="btn bg-white btn-flat pull-right">Update</button>
                <button type="submit" class="btn bg-primary btn-flat pull-right">View</button>
<!--                   <button id="updateStock" type="button" class="btn btn-default pull-right"><i class="fa fa-arrow-right"></i></button>
                  <button id="viewStock" type="button" class="btn btn-default pull-right"><i class="fa fa-eye"></i></button> -->
                </div>
              </div>

            </div>
          </div>

        </div>

    <div class="col-md-8">
        <div class="box box-block">
          <div class="box-header with-border">
            <h3 class="box-title">Material Information</h3>


          </div>
          <!-- /.box-header -->
          <div class="box-body">

              <!-- <table id="stockTable">
                <thead>

                  <th> PO No. </th>
                  <th> Supplier </th>
                  <th width="30%"> Orders</th>
                  <th> Payment Term  </th>
                  <th> Order Date </th>
                  <th> Status </th>
                </thead>
                <tbody>
                  <tr>
                    <td> 
                
                </tbody>
              </table> -->
              <table id ="stockTable" class="display"> 
              <tr>
              <td> <b> Material Name </b> </td>
              <td> Zircon Sand </td>
       
              </tr>
              <tr>
                <td> <b>  Supplier(s) </b> </td>
                <td>  <li> Wacker Neuson </li><li> Miller Corp </li> </td>
              </tr>
              <tr> 
                <td> <b> Description </b></td>
                <td> description</td>             
              </tr>
               <tr> 
                  <td> <b> Stock On-hand </b>  </td>
                <td> 500 </td>
              </tr>
              </table>

          </div>
        </div>
      </div>
  </section>

</form>




@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/purchase.js')}}"></script>
<Script>
  $('#stockTable').DataTable();
</Script>
@endpush
@stop

