<div class="modal fade" style="margin-top:50px" id="ProdModal" role="dialog">
      <div class="col-md-8 col-md-offset-2">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title"> Product Information </h4> </center>

            </div>
             <!-- <form class="" id="product_form" name="product_form" role="form" data-toggle="validator" enctype="multipart/form-data"> -->
           <form class="" id="product_form" name="product_form" role="form" data-toggle="validator">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <input type="file" id ="prod_image" name="prod_image" accept="image/*">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                        <label for="productName" class="control-label">Product<span style="color:red">*</span></label>
                        <input type="text" placeholder="Name" class="form-control validate letter" id ="productName" required
                        data-error="Product name is required."
                        data-minlength-error="Minimum length 2."
                        data-minlength="2"
                        maxlength="35" style="resize: none;border:1px solid #A9A9A9">
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
                          <label for="productTypeSelect" class="control-label">Product Type<span style="color:red">*</span></label>
                          <select class="form-control select2" id="productTypeSelect" style="width: 100%;" required>
                            @foreach($type as $u)
                            <option value="{{$u->strProductTypeID}}">{{$u->strProductTypeName}}</option>
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
                         <label for="variantSelect" class="control-label">Variants<span style="color:red">*</span></label>
                           <select id="variantSelect" name="variantSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Variants" style="width: 100%;border:1px solid #A9A9A9" >
                           </select>
                           <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                          <!--  <small> <a href="../maintenance/productVariant"> + Add New Variant </a></small>  -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <div class="form-group">
                          <label for="prodDesc" class="control-label">Description</label>
                          <textarea class="form-control" style="resize: none;border:1px solid #A9A9A9" rows="2" id ="prodDesc"
                            data-error="Invalid input length."
                            data-minlength="2"
                            maxlength="255" placeholder="Description"></textarea>
                          <div class="help-block with-errors"></div>
                          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="reset" id="btnClear" class="btn bg-white btn-flat pull-right"><i class="fa fa-pencil"></i> &nbsp;Clear</button>
                <button type="submit" class="btn bg-blue btn-flat pull-right"><i class="glyphicon glyphicon-ok"></i> &nbsp;Save</button>
            </div>
                </form>

         </div>
      </div>
    </div>
