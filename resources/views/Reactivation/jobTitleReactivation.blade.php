@extends('Reactivation.dataReactivation')
@section('react')

<div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 250%;"><i class="glyphicon glyphicon-object-align-bottom"> </i> &nbsp;Job Title Reactivate</h3><br><br>
</div>
<div class="box box-primary">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="activateJobTitles" data-toggle="modal" data-target="#jobTitleReactivateModal">
        <i class="glyphicon glyphicon-check"></i> Reactivate Job Title
      </button>
    </div>
    <div class="col-md-12">
      <table name = "jobTitleReactivateTable" id="jobTitleReactivateTable" class="table table-bordered">
        <thead>
        	<tr>
        		<th hidden>ID</th>
        		<th>Name</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($jobTitle as $jtitle)
          <tr>
            <td hidden>{{$jtitle->strJobTitleID}}</td>
            <td>{{$jtitle->strJobTitleName}}</td>
            <td>{{$jtitle->strJobTitleDesc}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="jobTitleReactivateModal" role="dialog">
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
              <button id="activateJobTitle" type="button" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Yes</button>
              <button class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> &nbsp;Close</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/jobTitleReactivate.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/tables/jobReactivate-table.js')}}"></script>
  @endpush

@stop