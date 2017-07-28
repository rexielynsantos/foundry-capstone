@extends('master')
@section('pageTitle', 'Workflow Setup')
@section('content')



<div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;">Workflow Setup </h3>
<div class="box box-primary">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Module Workflow Details</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal">
      <div class="box-body">        
        <div class="col-xs-6">
          <div class="form-group" style="margin:1%";>
            <label>Module</label>
            <select class="form-control select2" id="select_workflow">
              <option value="" selected disabled>--Select a Module--</option>
              @foreach($module as $md)
              <option value="{{$md->strModuleID}}">{{$md->strModuleName}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <!-- /.box-body -->
      <div class="row" style="margin:1%"; hidden id="hiddentableworkflow">
        <div class="col-xs-12">
          <div class="box">            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered" id="tblworkflow">
                <thead>
                  <tr>
                    <th></th>
                    <th>Draft</th>
                    <th>For Review</th>
                    <th>For Revision</th>
                    <th>Revised</th>
                    <th>Approved</th>
                    <th>Expired</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td id="draftID">Draft</td>
                    <td style="background-color:#4b646f"></td>
                    <td><input type="checkbox" class="minimal" id="draft2"></td>
                    <td><input type="checkbox" class="minimal" id="draft3"></td>
                    <td><input type="checkbox" class="minimal" id="draft4"></td>
                    <td><input type="checkbox" class="minimal" id="draft5"></td>
                    <td><input type="checkbox" class="minimal" id="draft6"></td>
                  </tr>
                  <tr>
                    <td id="reviewID">For Review</td>
                    <td><input type="checkbox" class="minimal" id="review1"></td>
                    <td style="background-color:#4b646f"></td>
                    <td><input type="checkbox" class="minimal" id="review3"></td>
                    <td><input type="checkbox" class="minimal" id="review4"></td>
                    <td><input type="checkbox" class="minimal" id="review5"></td>
                    <td><input type="checkbox" class="minimal" id="review6"></td>
                  </tr>
                  <tr>
                    <td id="revisionID">For Revision</td>
                    <td><input type="checkbox" class="minimal" id="revision1"></td>
                    <td><input type="checkbox" class="minimal" id="revision2"></td>
                    <td style="background-color:#4b646f"></td>
                    <td><input type="checkbox" class="minimal" id="revision4"></td>
                    <td><input type="checkbox" class="minimal" id="revision5"></td>
                    <td><input type="checkbox" class="minimal" id="revision6"></td>
                  </tr>
                  <tr>
                    <td id="reviseID">Revised</td>
                    <td><input type="checkbox" class="minimal" id="revise1"></td>
                    <td><input type="checkbox" class="minimal" id="revise2"></td>
                    <td><input type="checkbox" class="minimal" id="revise3"></td>
                    <td style="background-color:#4b646f"></td>
                    <td><input type="checkbox" class="minimal" id="revise5"></td>
                    <td><input type="checkbox" class="minimal" id="revise6"></td>
                  </tr>
                  <tr>
                    <td id="approveID">Approved</td>
                    <td><input type="checkbox" class="minimal" id="approve1"></td>
                    <td><input type="checkbox" class="minimal" id="approve2"></td>
                    <td><input type="checkbox" class="minimal" id="approve3"></td>
                    <td><input type="checkbox" class="minimal" id="approve4"></td>
                    <td style="background-color:#4b646f"></td>
                    <td><input type="checkbox" class="minimal" id="approve6"></td>
                  </tr>
                  <tr>
                    <td id="expiredID">Expired</td>
                    <td><input type="checkbox" class="minimal" id="expired1"></td>
                    <td><input type="checkbox" class="minimal" id="expired2"></td>
                    <td><input type="checkbox" class="minimal" id="expired3"></td>
                    <td><input type="checkbox" class="minimal" id="expired4"></td>
                    <td><input type="checkbox" class="minimal" id="expired5"></td>
                    <td style="background-color:#4b646f"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-info pull-left" id="btnUpdateWorkflow"><i class="glyphicon glyphicon-ok"></i> Update Module Workflow</button>
         
      </div>

      </div>
            
      <!-- /.box-footer -->
    </form>
  </div>
</div>

  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/workflow.js')}}"></script>
  @endpush

@stop

