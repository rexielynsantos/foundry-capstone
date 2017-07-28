@extends('Reactivation.dataReactivation')
@section('react')

<div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 250%;"><i class="glyphicon glyphicon-object-align-bottom"> </i> &nbsp;Module Reactivate</h3><br><br>
</div>
<div class="box box-primary">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="activateModules" data-toggle="modal" data-target="#moduleReactivateModal">
        <i class="glyphicon glyphicon-check"></i> Reactivate Module
      </button>
    </div>
    <div class="col-md-12">
      <table id="modReactTable" name="modReactTable" class="table table-bordered">
        <thead>
        	<tr>
        		<th> ID</th>
        		<th> Name</th>
            <th class="col-md-6"> Description</th>
            <th> Responsible Department</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($module as $md)
          <tr>
            <td>{{$md->strModuleID}}</td>
            <td>{{$md->strModuleName}}</td>
            <td class="col-md-6">{{$md->strModuleDesc}}</td>
            <td>{{$md->strDepartmentName}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="moduleReactivateModal" role="dialog">
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
              <button id="activateModule" type="button" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Yes</button>
              <button class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> &nbsp;Close</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/moduleReactivate.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/tables/moduleReactivate-table.js')}}"></script>
  @endpush

@stop
