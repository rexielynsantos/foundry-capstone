<div class="modal fade" style="margin-top:50px" id="add_productVariance_modal" role="dialog">
    <div class="col-md-6 col-md-offset-3">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Product Variance</h4>
                </center>
            </div>

            <form class="" id="productVariance_form" role="form" data-toggle="validator">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <div class="form-group">
                            <label for="prodVarianceName" class="control-label">Variance Name</label>
                            <input type="text" class="form-control" id ="prodVarianceName" style="width:100%;" required
                            data-error="Variance name is required."
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
                        <div class="col-md-12">
                        <button type="button" class="btn btn-primary pull-right" id="showDiv"><i class="fa fa-plus-square"></i> &nbsp;Add Material</button>
                        </div>
                    </div>

                    <div id="hidee" style="display:none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="form-group">
                                        <label for="prodVarianceMaterialQty" class="control-label"> Quantity*</label><br>
                                        <input type="number" min=1 class="form-control number" id="prodVarianceMaterialQty" style="width:100%;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <div class="form-group">
                                    <label for="prodVarianceUOM" class="control-label"> Material*</label><br>
                                        <select class="form-control select2" id = "prodVarianceMaterial" style="width:100%;">
                                            <option value="" selected disabled>Select a material</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning pull-right" id="hideDiv">Close</button>
                                <button type="button" class="btn btn-primary pull-right" id="varianceMaterialAdd">Add</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <table id="material_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Material ID</th>
                                    <th>Material</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <div class="form-group">
                            <label for="prodVarianceDesc" class="control-label">Description</label>
                            <textarea class="form-control validate" style="resize: none;" rows="5" id ="prodVarianceDesc"
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
                    <button type="reset" class="btn btn-default pull-left"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
