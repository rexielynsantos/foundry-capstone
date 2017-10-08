@extends('master')
@section('pageTitle', 'Stages')
@section('content')

  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Production Stage </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddStage" data-toggle="modal" data-target="#Stagemodal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteStages" data-toggle="modal" data-target="#StageDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditStage" data-toggle="modal" data-target="#Stagemodal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
      </script>
    </div>
    <div class="col-md-12">
      <table name = "stageTable" id="stageTable" class="table table-bordered">
        <thead>
        	<tr>
        		<th class="hidden">ID</th>
            <th>Name</th>
            <th>SubStage(s)</th>
            <th>Process Time(in hours)</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($stage as $prod)
          <tr>
            <td class="hidden">{{$prod->strStageID}}</td>
            <td>{{$prod->strStageName}}</td>
           <td>

              @foreach($prod->substage as $sub)
                <li width="35%" style="list-style-type:circle"> {{$sub->details1->strSubStageName}}</li>
              @endforeach
            </td>
            <td>{{$prod->dbltimeRequired}} hr(s)</td>
            <td>{{$prod->strStageDesc}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @include('Utilities.stageSubstage')

    <div class="modal fade" id="StageDeleteModal" role="dialog">
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
              <button id="btnDeleteStage" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
          </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="StageReactivateModal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
          <div class="modal-header">
            <center>
              <h4 class="modal-title">
                Stage is deactivated. Do you want to reactivate?
              </h4>
          </center>
          </div>

          <div class="modal-footer">
              <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
              <button id="btnReactivateStage" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
          </div>
        </div>
        </div>
    </div>

  </div>
</div>

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/stage-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/stage.js')}}"></script>
  @endpush

@stop
