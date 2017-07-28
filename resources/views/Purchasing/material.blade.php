@extends('master')
@section('pageTitle', 'Materials')
@section('content')

<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Material </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddMaterial" data-toggle="modal" data-target="#add_material_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteMaterials" data-toggle="modal" data-target="#MaterDeleteModal" style="display:none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditMaterial" data-toggle="modal" data-target="#add_material_modal" style="display:none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "materialTable" id="materialTable" class="table table-bordered">
        <thead>
          <tr>
            <th class="hidden">ID</th>
            <th>Name</th>
            <th>Supplier(s)</th>
            <th>Re-order Level</th>
            <th>Re-order Quantity</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          @foreach($matr as $mtrl)
          <tr>
            <td class="hidden">{{$mtrl->strMaterialID}}</td>
            <td>{{$mtrl->strMaterialName}}</td>
            <td>

              @foreach($mtrl->supplier as $supl)
                <li width="35%" style="list-style-type:circle"> {{$supl->details2->strSupplierName}}</li>
              @endforeach
            </td>
            <td>{{$mtrl->intReorderLevel}}</td>
            <td>{{$mtrl->intReorderQty}}{{$mtrl->unit->strUOMName}}</td>
            <td>{{$mtrl->strMaterialDesc}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @include('Purchasing.materialsupplier')
      <div class="modal fade" id="MaterDeleteModal" role="dialog">
        <div class="col-md-6 col-md-offset-3  ">
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

                <button id="btnDeleteMaterial" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
      <div class="modal fade" id="MaterialReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Material is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateMaterial" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/material-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/material.js')}}"></script>
  @endpush

@stop
