<div class="modal fade" style="margin-top:50px" id="add_productType_modal" role="dialog">
    <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
                <h4 class="modal-title">Product Type Information</h4>
                </center>
            </div>

            <form class="" id="productType_form" role="form" data-toggle="validator">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <div class="form-group">
                            <label for="prodTypeName" class="control-label">Product Type<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id ="prodTypeName" style="width:100%;" required placeholder="Name">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-12">
                        <button type="button" class="btn btn-primary pull-right" id="showDiv"><i class="fa fa-plus-square"></i> &nbsp;Add Stage</button>
                        </div>
                    </div> -->

                    <!-- <div id="hidee" style="display:none;"> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <div class="form-group">
                                    <label for="prodTypeStage" class="control-label">Stage(s)<span style="color:red">*</span></label><br>
                                        <select class="form-control select2" multiple = "multiple" data-placeholder = "Select stage(s)" id = "prodTypeStage" style="width:100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                              <div class="form-group has-feedback">
                                  <div class="form-group">
                                      <label for="prodTypeStageDesc" class="control-label">Description</label><br>
                                      <input type="text" class="form-control" disabled id="prodTypeStageDesc" style="width:100%;">
                                      <input type="hidden" class="form-control" id="prodTypeStageDescH" style="width:100%;">
                                  </div>
                              </div>
                            </div> -->
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning pull-right" id="hideDiv">Close</button>
                                <button type="button" class="btn btn-primary pull-right" id="typeStageAdd">Add</button>
                            </div>
                        </div> -->
                    <!-- </div> -->


                    <!-- <div class="col-md-12">
                        <table id="stage_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Stage ID</th>
                                    <th>Stage</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div> -->

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <div class="form-group">
                            <label for="prodTypeDesc" class="control-label">Description</label>
                            <textarea class="form-control validate" style="resize: none;" rows="5" id ="prodTypeDesc"
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
