 <div class="modal fade" style="margin-top:50px" id="add_material_modal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title"> Material Information</h4>
              </center>
            </div>
            <form class="" id="material_form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label>Material<span style="color:red">*</span></label>
                      <input type="text" placeholder="Name" class="form-control validate" id ="materialName" required
                      data-error="Material name is required."
                      data-minlength-error="Minimum length 2."
                      data-minlength="2"
                      maxlength="35" style="border:1px solid #A9A9A9">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label>Re-order Level<span style="color:red">*</span></label>
                      <input type="number" placeholder="0" class="form-control validate" id ="reorderLevel" required
                      data-error="Re-order level is required."
                      data-minlength-error="Minimum length 2."
                      data-minlength="2"
                      maxlength="35" style="border:1px solid #A9A9A9">
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
                      <label>Re-order Quantity<span style="color:red">*</span></label>
                      <input type="number" placeholder="0" class="form-control validate" id ="reorderQty" required
                      data-error="Re-order Quantity is required."
                      data-minlength-error="Minimum length 2."
                      data-minlength="2"
                      maxlength="35" style="border:1px solid #A9A9A9">
                      <div class="help-block with-errors"></div>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                          <label for="uomSelect" class="control-label">Unit<span style="color:red">*</span></label>
                          <select class="form-control select2" id = "uomSelect" style="width: 100%;" required>
                          @foreach($unit as $uni)
                   <option value="{{$uni->strUOMID}}">{{$uni->strUOMName}}</option>
                @endforeach
                          </select>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                     </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                    <label for="matSupplier" class="control-label">Supplier(s)<span style="color:red">*</span></label><br>
                        <select class="form-control select2" multiple = "multiple" data-placeholder = "Select supplier(s)" id = "matSupplier" style="width:100%;">
                        </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" style="border:1px solid #A9A9A9" rows="5" id ="material_desc"
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