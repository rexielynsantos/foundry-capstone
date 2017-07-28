@extends('master')
@section('pageTitle', 'User Role')
@section('content')


  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">&nbsp;User Role </h3>
<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddUserRole" data-toggle="modal" data-target="#add_userRole_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteRole" data-toggle="modal" data-target="#RoleDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditUserRole" data-toggle="modal" data-target="#add_userRole_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "userRoleTable" id="userRoleTable" class="table table-bordered">
        <thead>
        	<tr>
        		<th class="hidden">ID</th>
        		<th>Name</th>
            <th>Module</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($userRole as $prod)
          <tr>
            <td class="hidden">{{$prod->strUserActionID}}</td>
            <td>{{$prod->strUserActionName}}</td>
            <td>{{$prod->strModuleName}}</td>
            <td>{{$prod->strUserActionDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>
    <div class="modal fade" style="margin-top:50px" id="add_userRole_modal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title">User Role Information</h4>
              </center>
            </div>
            <form class="" id="userRole_form" role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label for="userRoleName" class="control-label">User Role<span style="color:red">*</span></label>
                      <input type="text" placeholder="Name" class="form-control validate letter" id ="userRoleName"
                      data-error="User Role name is required."
                      data-minlength-error="Minimum length 2."
                      data-minlength="2"
                      maxlength="35" style="border:1px solid #A9A9A9" required="">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label for="modSelect" class="control-label">Module<span style="color:red">*</span></label>
                      <select class="form-control select2" id = "modSelect" style="width: 100%;border:1px solid #A9A9A9"">
                      <option value="" selected disabled>Select a Module</option>
                        @foreach($module as $mdl)
                        <option value="{{$mdl->strModuleID}}">{{$mdl->strModuleName}}</option>
                        @endforeach
                      </select>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label for="userRoleDesc" class="control-label">Description</label>
                       <textarea class="form-control validate" style="resize: none;" rows="5" id ="userRoleDesc"
                       data-error="Invalid input length."
                        data-minlength="2"
                        maxlength="255" style="border:1px solid #A9A9A9"></textarea>
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

      <div class="modal fade" id="RoleDeleteModal" role="dialog">
        <div class="col-md-6 col-md-offset-3  ">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Are you sure you want to delete?
                </h4>
            </center>
            </div>

             <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnDeleteUserRole" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
      <div class="modal fade" id="UserRoleReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  User Role is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateUserRole" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>

  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/userRole-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/userRole.js')}}"></script>
  @endpush

@stop
