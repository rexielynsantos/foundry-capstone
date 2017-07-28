@extends('master')
@section('pageTitle', 'Job Titles')
@section('content')


  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Job Titles </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddJob" data-toggle="modal" data-target="#JobTitleModal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteJo" data-toggle="modal" data-target="#JobTitleDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditJob" data-toggle="modal" data-target="#JobTitleModal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "jobTitleTable" id="jobTitleTable" class="table table-bordered">
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
    <div class="modal fade" style="margin-top:50px" id="JobTitleModal" role="dialog">
      <div class="col-md-6 col-md-offset-3  ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <center>
                <h4 class="modal-title">Job Title Information</h4>
              </center>
            </div>
            <form class="" id="JobTitle_form" role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label for="JobTitleName" class="control-label">Job Title<span style="color:red">*</span></label>
                      <input type="text" placeholder="Name" class="form-control validate" id ="JobTitleName"
                      data-error="Job Title name is required."
                      data-minlength-error="Minimum length 2."
                      data-minlength="2"
                      maxlength="35" required>
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label for="JobTitleDesc" class="control-label">Description</label>
                      <textarea class="form-control validate" style="resize: none;" rows="5" id ="JobTitleDesc"
                        data-error="Invalid input length."
                        data-minlength="2"
                        maxlength="255"></textarea>
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
      </div>

      <div class="modal fade" id="JobTitleDeleteModal" role="dialog">
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
                <button id="btnDeleteJob" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
      <div class="modal fade" id="JobTitleReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Job Title is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateJobTitle" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>

  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/jobTitle-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/jobTitle.js')}}"></script>
  @endpush

@stop
