@extends('master')
@section('pageTitle', 'Product Variants')
@section('content')


<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Product Variants </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddProductVariant" data-toggle="modal" data-target="#varModal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteProductVariants" data-toggle="modal" data-target="#ProdVariantDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditProductVariant" data-toggle="modal" data-target="#varModal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "prodVariantTable" id="prodVariantTable" class="table table-bordered">
        <thead>
        	<tr>
            <th class="hidden">ID</th>
        		<th>Variant</th>
            <th>Limited to</th>
            <th>Description</th>

        	</tr>
        </thead>
        <tbody>
          @foreach($variant as $var)
          <tr>
            <td class="hidden">{{$var->strProductVariantID}}</td>
            <td>{{$var->intVariantQty}} {{$var->unit->strUOMName}}</td>
            <td>
            @foreach($var->producttype as $type)
                <li width="35%" style="list-style-type:circle"> {{$type->details->strProductTypeName}}</li>
              @endforeach

            </td>
            <td>{{$var->strProductVariantDesc}}</td>
          </tr>
          @endforeach
        </tbody>
     </table>
    </div>

    @include('Production.variantType')

    <div class="modal fade" id="ProdVariantDeleteModal" role="dialog">
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
                <button id="btnDeleteProductVariant" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
        </div>
        </div>
    </div>

    </div>
  </div>
<!-- </div> -->

  @push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/tables/productVariant-table.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/logic/productVariant.js')}}"></script>

    <script>
      $(document).ready(function() {
          $('#prodVariantTable').DataTable();
      } );
    </script>
  @endpush

@stop
