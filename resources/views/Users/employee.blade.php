@extends('master')
@section('pageTitle', 'Employees')
@section('content')


<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Employees </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAddEmp" data-toggle="modal" data-target="#EmpModal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteEmpl" data-toggle="modal" data-target="#EmpDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEditEmp" data-toggle="modal" data-target="#EmpModal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "empTable" id="empTable" class="table table-bordered">
        <thead>
        	<tr>
            <th>Image</th>
            <th>ID</th>
        		<th>Name</th>
        		<th>Contact No.</th>
            <th>Email</th>
            <th>Job Title</th>
            <th>Department</th>

        	</tr>
        </thead>
        <tbody>
          @foreach($employee as $emp)
          <tr>
            <td>
              @if($emp->strEmployeeImagePath == '')
                <image src="{{ Storage::url('/employee/male.png') }}" style="width:50px;height:50px;" alt="No image"/>
              @else
                <image src="{{ Storage::url($emp->strEmployeeImagePath) }}" style="width:50px;height:50px;" alt="No image"/>
              @endif
            </td>
            <td>{{$emp->strEmployeeID}}</td>
            <td>{{$emp->strEmployeeLast}},{{$emp->strEmployeeFirst}} {{$emp->strEmployeeMiddle}}</td>
            <td>{{$emp->strEmployeeContact}}</td>
            <td>{{$emp->strEmployeeEmail}}</td>
            <td>{{$emp->jobtitle->strJobTitleName}}</td>
            <td>{{$emp->department->strDepartmentName}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal fade" style="margin-top:50px" id="EmpModal" role="dialog">
      <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="<tru></tru>e">&times;</span></button>
              <center>
              <h4 class="modal-title">Employee Information</h4>
              </center>
            </div>

            <form class="" id="Emp_form" data-toggle="validator" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                      <div class="form-group">
                        <center>
                      <label for="emp_image">Employee Image<span style="color:red">*</span></label>
                      <input type="file" class="form-control img" id ="emp_image" name="emp_image" accept="image/*" required
                      data-error="Employee image is required.">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="text" id="emp_id" name="emp_id" hidden>
              </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                       <label for="emp_first" class="control-label">First Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id ="emp_first" name="emp_first" required
                        data-error="First name is required."
                        data-minlength-error="Minimum length 2."
                        data-minlength="2"
                        maxlength="35">
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <div class="form-group">
                        <label for="emp_middle" class="control-label">Middle Name</label>
                          <input type="text" class="form-control" id ="emp_middle" name="emp_middle"
                          data-minlength-error="Minimum length 2."
                          data-minlength="2"
                          maxlength="35">
                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                   </div>
                   <div class="col-md-4">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                      <label for="emp_last" class="control-label">Last Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id ="emp_last" name="emp_last" required
                        data-error="Last name is required."
                        data-minlength-error="Minimum length 2."
                        data-minlength="2"
                        maxlength="35">
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                </div>

                 <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="jobtitle_id" class="control-label">Job Title<span style="color:red">*</span></label>
                        <select id="jobtitle_id" class="form-control select2" name="jobtitle_id" style="width:100%" required>
                        <option value="" selected disabled>Select a Job Title</option>
                          @foreach ($jobTitle as $jobemp)
                            <option value= "{{$jobemp->strJobTitleID}}">{{$jobemp->strJobTitleName}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="dept_id" class="control-label">Department<span style="color:red">*</span></label>
                        <select id="dept_id" class="form-control select2" name="dept_id"  style="width:100%" required>
                        <option value="" selected disabled>Select a Department</option>
                          @foreach ($department as $deptemp)
                            <option value= "{{$deptemp->strDepartmentID}}">{{$deptemp->strDepartmentName}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                      <label for="emp_contact" class="control-label">Contact Number<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id ="emp_contact" name="emp_contact" placeholder="ex.09123456789" required
                        title="09*********" data-inputmask='"mask": "(99) 999-999-999"' data-mask
                        data-error="Contact number is required." required>
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                      <label for="emp_email" class="control-label">Email Address</label>
                        <input type="email" class="form-control" id ="emp_email" placeholder="example@yahoo.com" name="emp_email" required
                        data-error="Email address is required."
                        data-minlength-error="Minimum length 11."
                        data-minlength="2"
                        maxlength="40">
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
      <div class="modal fade" id="EmpDeleteModal" role="dialog">
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
                <button id="btnDeleteEmp" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/employee-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/employee.js')}}"></script>
  @endpush

@stop
