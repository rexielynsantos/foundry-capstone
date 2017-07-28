@extends('master')
@section('pageTitle', 'Suppliers')
@section('content')

  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Suppliers </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddSupplier" data-toggle="modal" data-target="#add_supplier_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteSuppliers" data-toggle="modal" data-target="#SupplierDeleteModal" style="display:none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditSupplier" data-toggle="modal" data-target="#add_supplier_modal" style="display:none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "supplierTable" id="supplierTable" class="table table-bordered">
        <thead>
          <tr>
            <th class="hidden">ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          @foreach($supp as $supl)
          <tr>
            <td class="hidden">{{$supl->strSupplierID}}</td>
            <td>{{$supl->strSupplierName}}</td>
            <td>{{$supl->strSupStreet}} {{$supl->strSupBrgy}},{{$supl->strSupCity}}</td>
            <td>{{$supl->strSupplierDesc}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal fade" style="margin-top:50px" id="add_supplier_modal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Supplier Information</h4>
              </center>
            </div>
            <form class="" id="supplier_form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label for="supplierName" class="control-label">Supplier Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control validate" id ="supplierName" required
                      data-error="Supplier name is required."
                      data-minlength-error="Minimum length 2."
                      data-minlength="2"
                      maxlength="35" style="border:1px solid #A9A9A9">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
              </div>
             <hr>
             <label> Address </label>
             <div class="row">
                <div class="col-md-4">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <!-- <label for="street" class="control-label">Supplier Name<span style="color:red">*</span></label> -->
                      <input type="text" class="form-control validate" id ="street" style="border:1px solid #A9A9A9" placeholder="No/Street">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <!-- <label for="street" class="control-label">Supplier Name<span style="color:red">*</span></label> -->
                      <input type="text" class="form-control validate" id ="brgy" style="border:1px solid #A9A9A9" placeholder="Brgy/Subd">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <!-- <label for="street" class="control-label">Supplier Name<span style="color:red">*</span></label> -->
                      <input type="text" class="form-control validate" id ="city" style="border:1px solid #A9A9A9" placeholder="City">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" style="resize: none;" rows="5" id ="supplierDesc"
                      data-error="Invalid input length."
                      data-minlength="2"
                      maxlength="255" style="border:1px solid #A9A9A9"></textarea>
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="SupplierDeleteModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Are you sure you want to deactivate?
                </h4>
            </center>
            </div>

             <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>

                <button id="btnDeleteSupplier" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
<!--
                <button id="btnDeleteSuppliers" type="button" class="btn bg-blue btn-flat pull-right">Yes</button> -->

            </div>
          </div>
          </div>
      </div>
      <div class="modal fade" id="SupplierReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Supplier is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateSupplier" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript" src="{{URL::asset('js/tables/supplier-table.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/logic/supplier.js')}}"></script>
@endpush
@stop
