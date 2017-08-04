@extends('master')
@section('pageTitle', 'Material Variant')
@section('content')


<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Material Variants </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddMaterialVariant" data-toggle="modal" data-target="#varModal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteMaterialVariants" data-toggle="modal" data-target="#MatVariantDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditMaterialVariant" data-toggle="modal" data-target="#varModal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "matVariantTable" id="matVariantTable" class="table table-bordered">
        <thead>
        	<tr>
            <th class="hidden">ID</th>
        		<th>Variant</th>
            <th>Description</th>

        	</tr>
        </thead>
        <tbody>
          @foreach($variant as $var)
          <tr>
            <td class="hidden">{{$var->strMaterialVariantID}}</td>
            <td>{{$var->intVariantQty}} {{$var->unit->strUOMName}}</td>
            <td>{{$var->strMaterialVariantDesc}}</td>
          </tr>
          @endforeach
        </tbody>
     </table>
    </div>

    @include('Production.variantmaterial')

    <div class="modal fade" id="MatVariantDeleteModal" role="dialog">
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
                <button id="btnDeleteMaterialVariant" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
        </div>
        </div>
    </div>

    </div>
  </div>
<!-- </div> -->

  @push('scripts')
  <script type="text/javascript" src="{{URL::asset('js/tables/materialVariant-table.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/logic/materialVariant.js')}}"></script>

    <script>
      $(document).ready(function() {
          $('#matVariantTable').DataTable();
      } );
    </script>
  @endpush

@stop
