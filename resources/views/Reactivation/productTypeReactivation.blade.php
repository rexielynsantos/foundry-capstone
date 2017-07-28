@extends('Reactivation.dataReactivation')
@section('react')

<div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 250%;"><i class="glyphicon glyphicon-object-align-bottom"> </i> &nbsp;Product Type Reactivate</h3><br><br>
</div>
<div class="box box-primary">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="activateProdTypes" data-toggle="modal" data-target="#prodTypeReactivateModal">
        <i class="glyphicon glyphicon-check"></i> Reactivate Product Type
      </button>
    </div>
    <div class="col-md-12">
      <table name = "prodTypeReactTable" id="prodTypeReactTable" class="table table-bordered">
        <thead>
        	<tr>
            <th>ID</th>
        		<th>Name</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($productType as $prod)
          <tr>
            <td>{{$prod->strProductTypeID}}</td>
            <td>{{$prod->strProductTypeName}}</td>
            <td>{{$prod->strProductTypeDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>
    <div class="modal fade" id="prodTypeReactivateModal" role="dialog">
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
              <button id="activateProdType" type="button" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Yes</button>
              <button class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> &nbsp;Close</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/productTypeReactivate.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/tables/productTypeReactivate-table.js')}}"></script>
  @endpush

@stop
