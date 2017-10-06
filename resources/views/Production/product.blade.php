@extends('master')
@section('pageTitle', 'Products')
@section('content')

<!-- <div class="content-header"> -->
  <h4 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;"> Products </h4>
<!-- </div> -->
<div class="box box-Black">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddProduct" data-toggle="modal" data-target="#ProdModal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteProducts" data-toggle="modal" data-target="#ProdDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditProduct" data-toggle="modal" data-target="#ProdModal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table id="productTable" name="productTable" class="table table-bordered">
        <thead>
            <tr>
                <th class="hidden">ID</th>
           <!--      <th>Image</th> -->
                <th>Product Name</th>
                <th>Type</th>
                <th> Descriptions </th>
            </tr>
        </thead>

        <tbody>
        @foreach($product as $produ)
            <tr>
                <td class="hidden">{{$produ->strProductID}}</td>
            <!--     <td>
                  @if($produ->strProductImagePath == '')
                    <image src="" style="width:50px;height:50px;" alt="No image"/>
                  @else
                    <image src="{{ Storage::url($produ->strProductImagePath) }}" style="width:50px;height:50px;" alt="No image"/>
                  @endif
                </td> -->
                <td>{{$produ->strProductName}}</td>
                <td>{{$produ->producttype->strProductTypeName}}</td>
              <td>{{$produ->strProductDesc}}</td>
            </tr>

          @endforeach
          </tbody>
    </table>
    </div>


    @include('Production.productDetail')


      <div class="modal fade" id="ProdDeleteModal" role="dialog">
        <div class="col-md-6 col-md-offset-3  ">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Are you sure you want to deactivate??
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnDeleteProduct" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>

            </div>
          </div>
          </div>
      </div>

      <div class="modal fade" id="ProductReactivateModal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h4 class="modal-title">
                Product is deactivated. Do you want to reactivate?
              </h4>
          </center>
          </div>

          <div class="modal-footer">
              <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
              <button id="btnReactivateProduct" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
          </div>
        </div>
        </div>
    </div>

  </div>
</div>

    @push('scripts')
     <script type="text/javascript" src="{{URL::asset('js/tables/product-table.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/logic/product.js')}}"></script>
        <script>
            $(document).ready(function () {
                $("#kv-explorer").fileinput({
                    'theme': 'explorer',
                    'uploadUrl': '#',
                    overwriteInitial: false,
                    initialPreviewAsData: true,

                });

            });
        </script>
    @endpush

@stop
