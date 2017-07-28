@extends('master')
@section('content')
<div class="content-header">
  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 180%;"> <i class="fa  fa-spinner"></i>&nbsp;&nbsp;&nbsp;Workflow Management </h3>
</div>

<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa  fa-users"></i>   Workflow Participants</a></li>
	  <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-sitemap"></i>   Manage Work Items</a></li>
	  <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-cog"> </i>   Workflow Setup</a></li>

	  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
	</ul>
			    <div class="tab-content">
			      <div class="tab-pane active" id="tab_1">
			      	<div class="row">
			      		<div class="col-md-4">
				         <div class="form-group">
				          <label>Employee Name</label>
				            <select class="form-control select2" class="control-label" id = "employeeSelect" style="width:100%;">
				             <option value="" selected disabled>Select an Employee</option>
				             <option value="" >Rexielyn Santos</option>
				            </select>
				            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				         </div>
				        </div>
				        <div class="col-md-4">
				         <div class="form-group">
				          <label>Assign Role</label>
				            <select class="form-control select2" class="control-label" id = "employeeSelect" style="width:100%;">
				             <option value="" selected disabled>Select a User Role</option>
				             <option value="" >Costing Approver</option>
				            </select>
				            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				         </div>
				        </div>
				        <div class="col-md-2">
				        <label></label>
				        	<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Add Participant </button>
				        </div>
				    </div>
				    <hr>
				    <div class="row">
				    <br>
				    	<div class="col-md-12">
					      <table name = "ptTable" id="ptTable" class="table table-bordered">
					        <thead>
					        	<tr>
					        		<th class="hidden">ID</th>
					            <th>Workflow Participant</th>
					            <th>Role</th>
					        	</tr>
					        </thead>
					        <tbody>
					          <tr>
					            <td class="hidden">rgerge</td>
					            <td>Rexielyn Santos</td>
					            <td>Costing Approver</td>
					          </tr>

					        </tbody>
					      </table>
					   </div>
				    </div>
			      </div>

			      <div class="tab-pane" id="tab_2">
			      	<h4 style="color:teal"> Work Re-Assignment </h4>
			      	<hr>
			      	<div class="row">
			      		<div class="col-md-4">
				         <div class="form-group">
				          <label>Worklist</label>
				            <select class="form-control select2" class="control-label" id = "employeeSelect" style="width:100%;">
				             <option value="" selected disabled>Select Work to Re-Assign</option>
				            </select>
				            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				         </div>
				        </div>
				        <div class="col-md-4">
				         <div class="form-group">
				          <label>Assign Role</label>
				            <select class="form-control select2" class="control-label" id = "employeeSelect" style="width:100%;">
				             <option value="" selected disabled>Select Participant</option>
				            </select>
				            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				         </div>
				        </div>
				        <div class="col-md-4">
				         <div class="form-group">
				          <label>Assign Role</label>
				            <select class="form-control select2" class="control-label" id = "employeeSelect" style="width:100%;">
				             <option value="" selected disabled>Select Role</option>
				            </select>
				            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				         </div>
				        </div>
				       </div>
				       <div class="row">
				        <div class="col-md-2" style="float:right">
				        <label></label>
				        	<button type="submit" class="btn btn-block btn-primary">Update</button>
				        </div>
				       </div>
				    
						<h4 style="color:teal"> Worklist Handler </h4>
					   <div class="row">
					    <br>

					    	<div class="col-md-12">
						      <table name = "ptTable" id="ptTable" class="table table-bordered">
						        <thead>
						        	<tr>
						        		<th class="hidden">ID</th>
						            <th>Work</th>
						            <th>Participant</th>
						            <th>Status</th>
						        	</tr>
						        </thead>
						        <tbody>
						          <tr>
						            <td class="hidden">rgerge</td>
						            <td>Order Costing</td>
						            <td>Rexielyn Santos</td>
						            <td>For Approval</td>
						          </tr>

						        </tbody>
						              </table>
						    </div>
					    </div>
					  </div>

			      <div class="tab-pane" id="tab_3">
					  <div class="box">
					    <div class="box-header with-border">
					      <h3 class="box-title">Module Workflow Details</h3>
					    </div>
						<form class="form-horizontal">
						      <div class="box-body">        
						        <div class="col-xs-6">
						          <div class="form-group" style="margin:1%";>
						            <label>Module</label>
						            <select class="form-control select2" width="100%" id="select_workflow">
						              <option value="" selected disabled>--Select a Module--</option>
						            </select>
						          </div>
						        </div>
						      </div>

						      <div class="row" style="margin:1%";>
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
						                    <td>Draft</td>
						                    <td><input type="checkbox" class="minimal" id="draft1"></td>
						                    <td><input type="checkbox" class="minimal" id="draft2"></td>
						                    <td><input type="checkbox" class="minimal" id="draft3"></td>
						                    <td><input type="checkbox" class="minimal" id="draft4"></td>
						                    <td><input type="checkbox" class="minimal" id="draft5"></td>
						                    <td><input type="checkbox" class="minimal" id="draft6"></td>
						                  </tr>
						                  <tr>
						                    <td>For Review</td>
						                    <td><input type="checkbox" class="minimal" id="review1"></td>
						                    <td><input type="checkbox" class="minimal" id="review2"></td>
						                    <td><input type="checkbox" class="minimal" id="review3"></td>
						                    <td><input type="checkbox" class="minimal" id="review4"></td>
						                    <td><input type="checkbox" class="minimal" id="review5"></td>
						                    <td><input type="checkbox" class="minimal" id="review6"></td>
						                  </tr>
						                  <tr>
						                    <td>For Revision</td>
						                    <td><input type="checkbox" class="minimal" id="revision1"></td>
						                    <td><input type="checkbox" class="minimal" id="revision2"></td>
						                    <td><input type="checkbox" class="minimal" id="revision3"></td>
						                    <td><input type="checkbox" class="minimal" id="revision4"></td>
						                    <td><input type="checkbox" class="minimal" id="revision5"></td>
						                    <td><input type="checkbox" class="minimal" id="revision6"></td>
						                  </tr>
						                  <tr>
						                    <td>Revised</td>
						                    <td><input type="checkbox" class="minimal" id="revise1"></td>
						                    <td><input type="checkbox" class="minimal" id="revise2"></td>
						                    <td><input type="checkbox" class="minimal" id="revise3"></td>
						                    <td><input type="checkbox" class="minimal" id="revise4"></td>
						                    <td><input type="checkbox" class="minimal" id="revise5"></td>
						                    <td><input type="checkbox" class="minimal" id="revise6"></td>
						                  </tr>
						                  <tr>
						                    <td>Approved</td>
						                    <td><input type="checkbox" class="minimal" id="approve1"></td>
						                    <td><input type="checkbox" class="minimal" id="approve1"></td>
						                    <td><input type="checkbox" class="minimal" id="approve1"></td>
						                    <td><input type="checkbox" class="minimal" id="approve1"></td>
						                    <td><input type="checkbox" class="minimal" id="approve1"></td>
						                    <td><input type="checkbox" class="minimal" id="approve1"></td>
						                  </tr>
						                  <tr>
						                    <td>Expired</td>
						                    <td><input type="checkbox" class="minimal" id="expired1"></td>
						                    <td><input type="checkbox" class="minimal" id="expired2"></td>
						                    <td><input type="checkbox" class="minimal" id="expired3"></td>
						                    <td><input type="checkbox" class="minimal" id="expired4"></td>
						                    <td><input type="checkbox" class="minimal" id="expired5"></td>
						                    <td><input type="checkbox" class="minimal" id="expired6"></td>
						                  </tr>
						                </tbody>
						              </table>
						            </div>
						          </div>
						        </div>
						      </div>
						    <div class="box-footer">
						      <button type="submit" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> Update Module Workflow</button>
      						</div>
   						 </form>
  					</div>
      			</div>
			</div>
		</div>
	</div>
</div>


@stop