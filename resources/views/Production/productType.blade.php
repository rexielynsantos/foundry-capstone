@extends('master')
@section('pageTitle', 'Product Types')
@section('content')

<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;"> &nbsp;Product Types </h3>
<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddProductType" data-toggle="modal" data-target="#add_productType_modal">
        <i class="fa fa-plus"></i> Add New
      <button class="btn btn-app pull-right btn" id="btnDeleteProductTypes" data-toggle="modal" data-target = "#ProdTypeDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      <button class="btn btn-app pull-right" id="btnEditProductType" data-toggle="modal" data-target="#add_productType_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
    </div>
    <div class="col-md-12">
      <table name = "prodTypeTable" id="prodTypeTable" class="table table-bordered">
        <thead>
        	<tr>
            <th class="hidden">ID</th>
        		<th>Name</th>
            <th> Stages Assigned </th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($productType as $prod)
          <tr>
            <td class="hidden">{{$prod->strProductTypeID}}</td>
            <td width="35%">{{$prod->strProductTypeName}}</td>
            <td>

              @foreach($prod->stage as $type)
                <li width="35%" style="list-style-type:circle"> {{$type->details->strStageName}}</li>
              @endforeach
            </td>

            <td width="30%">{{$prod->strProductTypeDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>

    @include('Production.typeStage')

    <div class="modal fade" id="ProdTypeDeleteModal" role="dialog">
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
                <button id="btnDeleteProductType" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
        </di  v>
        </div>
    </div>

  </div>

  <div class="modal fade" id="ProdTypeReactivateModal" role="dialog">
    <div class="col-md-6 col-md-offset-3">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h4 class="modal-title">
              Product Type is deactivated. Do you want to reactivate?
            </h4>
        </center>
        </div>

        <div class="modal-footer">
            <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
            <button id="btnReactivateProdType" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
        </div>
      </div>
      </div>
  </div>
</div>

  @push('scripts')
        <script type="text/javascript" src="{{URL::asset('js/tables/productType-table.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/logic/productType.js')}}"></script>

        <script>
        $(document).ready(function() {
            $('#prodTypeTable').DataTable();
            // $('#prodTypeStage').multiSelect();
        } );
        </script>
  @endpush

@stop
