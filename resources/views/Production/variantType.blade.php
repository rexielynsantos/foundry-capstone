<div class="modal fade" style="margin-top:50px" id="varModal" role="dialog">
  <div class="col-md-6 col-md-offset-3">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <center><h4 class="modal-title">Variant Information</h4>
          </center>
        </div>
        <form class="" id="variant_form" role="form" data-toggle="validator">
        <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group has-feedback">
                  <div class="form-group">
                    <label for="variantQty" class="control-label">Variant<span style="color:red">*</span></label>
                    <input type="number" class="form-control validate number" placeholder="0" id ="variantQty" required
                    data-error="Variant Value is required.">
                    <div class="help-block with-errors"></div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="variantUnit" class="control-label">Unit<span style="color:red">*</span></label>
                <select class="form-control select2" id = "variantUnit" data-placeholder = "Select unit of measurement" style="width:100%">
                @foreach($unit as $uni)
                   <option value="{{$uni->strUOMID}}">{{$uni->strUOMName}}</option>
                @endforeach


                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
               <div class="form-group">
                  <label for="variantType" class="control-label">Limited to<span style="color:red">*</span></label>
                   <select id = "variantType" class="form-control select2"  multiple="multiple" data-placeholder="Select Type(s)" style="width: 100%;">
                   </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <div class="form-group">
                    <label for="variantDesc" class="control-label">Description</label>
                     <textarea class="form-control validate" style="resize: none;" rows="5" id ="variantDesc"
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
            <button id = "btnClear" type="reset" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
            <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
          </div>
        </div>
        </form>
      </div>
    </div>
