<div class="modal fade" style="margin-top:50px" id="Stagemodal" role="dialog">
    <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
                <h4 class="modal-title">Stage Information</h4>
                </center>
            </div>

            <form class="" id="stage_form" role="form" data-toggle="validator">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <div class="form-group">
                            <label for="stageName" class="control-label">Stage Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control validate letter" id ="stageName" style="resize: none;width:100%" required data-error="Stage name is required."
                            data-minlength-error="Invalid Stage Name."
                            data-minlength="1"
                            maxlength="50">
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
                                <label for="stageSubstage" class="control-label">SubStage<span style="color:red">*</span></label><br>
                                    <select class="form-control select2" id = "stageSubstage" multiple = "multiple" data-placeholder = "Select substage(s)" style="width:100%;resize: none;" required>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <div class="form-group">
                                <label for="timeRequired" class="control-label">Process Time(in hours)</label>
                                <input type="number" class="form-control validate number" id ="timeRequired" style="width:100%; resize:none;" max="24">
                                <div class="help-block with-errors"></div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <div class="form-group">
                            <label for="stageDesc" class="control-label">Description</label>
                            <textarea class="form-control validate" style="resize: none;" rows="5" id ="stageDesc"
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
                    <button type="submit" class="btn btn-info pull-left"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
                    <button type="reset" id = "btnClear" class="btn btn-default pull-left"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
