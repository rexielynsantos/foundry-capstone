@extends('master')
@section('pageTitle', 'Terms and Condition')
@section('content')

<section class="content">

	<div class="row">
		<div class="col-md-12">
          
          <div class="box box-widget widget-user-2">
            
            <div class="widget-user-header" style="background-color: #001F3F">
              <div class="widget-user-image">
              <img src="../images/mainlogo.png" alt="User Avatar">
              
              </div>
      
              <h3 class="widget-user-username" style="color:white"  >Terms and Conditions</h3>
              <h5 class="widget-user-desc"><p style="color:white">Precision Foundry of the Philippines Inc.</p>
            </div>
            <div class="box-footer">
              <form class="" id="term_form"  role="form" data-toggle="validator">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="modSelect" class="control-label">Module Name<span style="color:red">*</span></label>
                        <select class="form-control select2" id = "modSelect" style="width: 100%;" required>
                          <option value="first" selected disabled>Select a Module</option>
                           @foreach($module as $mod)
                          <option value="{{$mod->strModuleID}}">{{$mod->strModuleName}}</option>
                          @endforeach
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <textarea id="termNote" class="form-control validate" rows="5" placeholder="Please indicate note here">
                  </textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <button type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                  <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
                </div>
              </div>
          </form>

              <hr>

              <div class="row">
                <div class="col-md-12">
                  <table id="termsTable" border="0" class="table table-bordered" style="color:black;">
                    
                    <thead>
                      <tr>
                        <th class="hidden"> ID</th>
                        <th> Module</th>
                        <th class="col-md-6"> Terms and Condition</th>
                        <th> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
          <!-- /.widget-user -->
    </div>
	</div>


		

</section>

@push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/logic/termscondition.js')}}"></script>    
@endpush

@stop