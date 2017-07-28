@extends('master')
@section('content')

  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 220%;"><i class="glyphicon glyphicon-object-align-bottom"> </i> &nbsp;Product Variance </h3>

<div class="box box-default">
  <div class="box-body">

    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddProductVariance" data-toggle="modal" data-target="#add_productVariance_modal">
        <i class="fa fa-plus"></i> Add Product Variance
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteProductVariance" style="display: none;">
        <i class="fa fa-trash-o"></i> Delete Product Variance
      </button>
      <button class="btn btn-app pull-right" id="btnEditProductVariance" data-toggle="modal" data-target="#add_productVariance_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit Product Variance
      </button>
    </div>

    <div class="col-md-12">
      <table name = "prodVarianceTable" id="prodVarianceTable" class="table table-bordered">
        <thead>
        	<tr>
            <th class="hidden">ID</th>
        		<th>Name</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($productVariance as $prod)
          <tr>
            <td class="hidden">{{$prod->strProductVarianceID}}</td>
            <td>{{$prod->strProductVarianceName}}</td>
            <td>{{$prod->strProductVarianceDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>

  </div>
</div>

@include('Production.varianceMaterial')

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/productVariance-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/productVariance.js')}}"></script>

    <script>
    $(document).ready(function() {
        $('#stageTable').DataTable();
    } );
    </script>
  @endpush
@stop
