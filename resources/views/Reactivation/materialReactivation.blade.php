@extends('Reactivation.dataReactivation')
@section('react')

<div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 250%;"><i class="glyphicon glyphicon-object-align-bottom"> </i> &nbsp;Material Reactivate</h3><br><br>
</div>
<div class="box box-primary">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="activateMaterials" data-toggle="modal" data-target="#materialReactivateModal">
        <i class="glyphicon glyphicon-check"></i> Reactivate Material
      </button>
    </div>
    <div class="col-md-12">
      <table id="materialReactTable" name="materialReactTable" class="table table-bordered">
        <thead>
        	<tr>
            <th>ID</th>
        		<th>Name</th>
            <th>Measurement</th>
        		<th>Type</th>
            <th>Reorder Level</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($material as $prod)
          <tr>
            <td>{{$prod->strMaterialID}}</td>
            <td>{{$prod->strMaterialName}}</td>
            <td>{{$prod->strMaterialQty}} {{$prod->strUOMName}}</td>
            <td>{{$prod->strMaterialTypeName}}</td>
            <td>{{$prod->intMaterialReorderLevel}}</td>
            <td>{{$prod->strMaterialDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>
    <div class="modal fade" id="materialReactivateModal" role="dialog">
      <div class="col-md-6 col-md-offset-3  ">
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h4 class="modal-title">
                <i class ="fa fa-plus-square"></i>Are you sure you want to reactivate?
              </h4>
          </center>
          </div>

          <div class="modal-footer">
              <button id="activateMaterial" type="button" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Yes</button>
              <button class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> &nbsp;Close</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>

@stop
