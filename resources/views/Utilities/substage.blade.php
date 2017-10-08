@extends('master')

@section('pageTitle', 'SubStages')

@section('content')


  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">{{ $page_title or "SubStages" }} </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddSubstg" data-toggle="modal" data-target="#add_substg_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteSubstge" data-toggle="modal" data-target="#delete_substg_modal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditSubstg" data-toggle="modal" data-target="#add_substg_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit Substage
      </button>
    </div>
    <div class="col-md-12">
      <table id="substgTable" name="substgTable" class="table table-bordered">
        <thead>
        	<tr>
            <th class="hidden">ID</th>
        		<th>Name</th>
            <th>Process Time(in hours)</th>
        		<th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($substage as $s)
          <tr>
            <td class="hidden">{{$s->strSubStageID}}</td>
            <td width="25%">{{$s->strSubStageName}}</td>
            <td width="20%">{{$s->dbltimeRequired}} hr(s)</td>
            <td>{{$s->strSubStageDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>

    <div class="modal fade" id="add_substg_modal" style="margin-top:50px" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Substage Information</h4>
              </center>
            </div>
            <form class="" id="substg_form" role="form" data-toggle="validator">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                       <label for="substgName" class="control-label">SubStage<span style="color:red">*</span></label>
                        <input type="text" class="form-control validate letter" id ="substgName"
                        name ="substgName" required data-error="Substage name is required."
                        data-minlength-error="Invalid input length."
                        data-minlength="1"
                        maxlength="35" placeholder="Name">
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                        <label for="timeRequired" class="control-label">Process Time(in hours)<span style="color:red">*</span></label>
                        <input type="text" class="form-control validate number" id ="timeRequired"
                        required
                        max="24"
                        data-error="Maximum hour is 24">
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="substgDesc" class="control-label">Description</label>
                        <textarea class="form-control" style="resize: none;" rows="5" id ="substgDesc"
                          data-error="Invalid input length."
                          data-minlength="1"
                          maxlength="255" placeholder="Description"></textarea>
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                  </div>

              </div>
            <div class="modal-footer">
              <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
            </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="delete_substg_modal" style="margin-top:50px" role="dialog">
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
                <button id="btnDeleteSubstg" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
      <div class="modal fade" id="SubstageReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Substage is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateSubstage" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/substage-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/substage.js')}}"></script>
  @endpush

@stop
