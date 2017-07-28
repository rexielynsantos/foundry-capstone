@extends('master')
@section('pageTitle', 'Modules')
@section('content')


<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Module </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddModule" data-toggle="modal" data-target="#add_module_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteModules" data-toggle="modal" data-target="#ModuleDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditModule" data-toggle="modal" data-target="#add_module_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table id="modTable" name="modTable" class="table table-bordered">
        <thead>
        	<tr>
        		<th class="hidden"> ID</th>
        		<th> Name</th>
            <th class="col-md-6"> Description</th>
            <th> Responsible Department</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($module as $md)
          <tr>
            <td class="hidden">{{$md->strModuleID}}</td>
            <td>{{$md->strModuleName}}</td>
            <td class="col-md-6">{{$md->strModuleDesc}}</td>
            <td>{{$md->strDepartmentName}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>

    <div class="modal fade" style="margin-top:50px" id="add_module_modal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">Module Information</h4>
              </center>
            </div>
            <form class="" id="mod_form"  role="form" data-toggle="validator">
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="modName" class="control-label">Module Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control validate" id ="modName"
                        data-error="Module name is required."
                        data-minlength-error="Minimum length 2."
                        data-minlength="2"
                        maxlength="35" required>
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="modDept" class="control-label">Responsible Department<span style="color:red">*</span></label>
                        <select class="form-control select2" id = "modDept" style="width: 100%;" required>
                          <option value="first" selected disabled>Select a Responsible Deparment</option>
                          @foreach($dept as $prod)
                          <option value="{{$prod->strDepartmentID}}">{{$prod->strDepartmentName}}</option>
                          @endforeach
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="modDesc" class="control-label">Description</label>
                         <textarea class="form-control validate" id ="modDesc" style="resize: none;" rows="5"
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
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="ModuleDeleteModal" role="dialog">
        <div class="col-md-6 col-md-offset-3  ">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Are you sure you want to deactivate?
                </h4>
            </center>
            </div>

            < <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnDeleteModule" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
      <div class="modal fade" id="ModuleReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Module is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateModule" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/module.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/tables/module-table.js')}}"></script>
  @endpush

@stop
