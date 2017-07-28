@extends('master')
@section('pageTitle', 'Units')
@section('content')


  <h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Unit </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAdduom" data-toggle="modal" data-target="#add_uom_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteuoms" data-toggle="modal" data-target="#uomDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEdituom" data-toggle="modal" data-target="#add_uom_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "uomTable" id="uomTable" class="table table-bordered">
        <thead>
        	<tr>
            <th class="hidden">ID</th>
        		<th>Unit</th>
            <th>Description</th>
            <th>Unit Type</th>

        	</tr>
        </thead>
        <tbody>
          @foreach($productUOM as $uom)
          <tr>
            <td class="hidden">{{$uom->strUOMID}}</td>
            <td>{{$uom->strUOMName}}</td>
            <td>{{$uom->strUOMDesc}}</td>
            <td>{{$uom->unittype->strUOMTypeName}}</td>

          </tr>
          @endforeach
        </tbody>
              </table>
    </div>
    <!-- START OF UOM ADD MODAL -->
    <div class="modal fade" style="margin-top:50px" id="add_uom_modal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center>
              <h4 class="modal-title"> Unit Information </h4>
              </center>
            </div>
            <form class="" id="uom_form" role="form" data-toggle="validator">
            <div class="modal-body">
                <!-- D2 UNG FORM -->
                <div class="form-group has-feedback">
                  <div class="form-group">
                    <label for="uomTypeSelect" class="control-label">Unit Type<span style="color:red">*</span></label>
                    <select class="form-control select2" id = "uomTypeSelect" style="width: 100%;" required>
                     <option value="first" selected disabled>Select a Unit Type</option>
                      @foreach($uomType as $u)
                      <option value="{{$u->strUOMTypeID}}">{{$u->strUOMTypeName}}</option>
                      @endforeach
                    </select>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <div class="form-group">
                    <label for="uomName" class="control-label">Unit<span style="color:red">*</span></label>
                    <input type="text" placeholder="Name" class="form-control validate letter" id ="uomName" required
                    data-error="Unit of Measurement name is required."
                    data-minlength-error="Minimum length 1."
                    data-minlength="1"
                    maxlength="35">
                    <div class="help-block with-errors"></div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <div class="form-group">
                    <label for="uomDesc" class="control-label">Description</label>
                    <textarea class="form-control validate" style="resize: none;" rows="5" id ="uomDesc"
                    data-error="Invalid input length."
                    data-minlength="2"
                    maxlength="25"></textarea>
                    <div class="help-block with-errors"></div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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
      <div class="modal fade" id="uomDeleteModal" role="dialog">
        <div class="col-md-6 col-md-offset-3  ">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Are you sure you want to deactivate?
                </h4>
            </center>
            </div>

             <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnDeleteuom" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>

      <div class="modal fade" id="UOMReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  Unit is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateUOM" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/uom-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/uom.js')}}"></script>
  @endpush

@stop
