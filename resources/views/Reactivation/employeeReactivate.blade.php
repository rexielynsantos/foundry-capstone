@extends('Reactivation.dataReactivation')
@section('react')

<!-- <div class="content-header"> -->
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 250%;"><i class="glyphicon glyphicon-object-align-bottom"> </i> &nbsp;Employee Reactivate </h3><br><br>
<!-- </div> -->

<div class="box box-primary">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnActivateEmps" data-toggle="modal" data-target="#EmpReactivateModal">
        <i class="glyphicon glyphicon-check"></i> Reactivate Employee
      </button>
    </div>
    <div class="col-md-12">
      <table name = "empReactTable" id="empReactTable" class="table table-bordered">
        <thead>
        	<tr>
            <th>ID</th>
        		<th>Name</th>
        		<th>Contact No.</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>Hire Date</th>
            <th>Job Title</th>
            <th>Department</th>
            <th>Image</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($employeer as $emp)
          <tr>
            <td>{{$emp->strEmployeeID}}</td>
            <td>{{$emp->strEmployeeLast}},{{$emp->strEmployeeFirst}} {{$emp->strEmployeeMiddle}}</td>
            <td>{{$emp->strEmployeeContactNo}}</td>
            <td>{{$emp->strEmployeeEmail}}</td>
            <td>{{$emp->datBirthDate}}</td>
            <td>{{$emp->datHiringDate}}</td>
            <td>{{$emp->strJobTitleName}}</td>
            <td>{{$emp->strDepartmentName}}</td>
            <td>
              @if($emp->strEmployeeImagePath == '')
                <image src="{{ Storage::url('/employee/male.png') }}" style="width:50px;height:50px;" alt="No image"/>
              @else
                <image src="{{ Storage::url($emp->strEmployeeImagePath) }}" style="width:50px;height:50px;" alt="No image"/>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="modal fade" id="EmpReactivateModal" role="dialog">
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
              <button id="btnActivateEmp" type="button" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Yes</button>
              <button class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> &nbsp;Close</button>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/employeeReactivate.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/tables/employeeReactivate-table.js')}}"></script>
  @endpush

@stop
