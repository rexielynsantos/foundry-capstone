@extends('master')
@section('pageTitle', 'UOM Type')
@section('content')

<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Unit Type </h3>

<div class="box box-default">
  <div class="box-body">
    <div class="col-md-12">
      <button class="btn btn-app pull-right" id="btnAdduomType" data-toggle="modal" data-target="#add_uomType_modal">
        <i class="fa fa-plus"></i> Add New
      </button>
      <button class="btn btn-app pull-right btn" id="btnDeleteuomTypes" data-toggle="modal" data-target="#uomTypeDeleteModal" style="display: none;">
        <i class="fa fa-trash-o"></i> Deactivate
      </button>
      <button class="btn btn-app pull-right" id="btnEdituomType" data-toggle="modal" data-target="#add_uomType_modal" style="display: none;">
        <i class="fa fa-pencil-square-o"></i> Edit
      </button>
    </div>
    <div class="col-md-12">
      <table name = "uomTypeTable" id="uomTypeTable" class="table table-bordered">
        <thead>
        	<tr>
            <th  class="hidden">ID</th>
            <th>Name</th>
            <th>Description</th>
        	</tr>
        </thead>
        <tbody>
          @foreach($UOMType as $uomT)
          <tr>
            <td class="hidden">{{$uomT->strUOMTypeID}}</td>
            <td>{{$uomT->strUOMTypeName}}</td>
            <td>{{$uomT->strUOMTypeDesc}}</td>
          </tr>
          @endforeach
        </tbody>
              </table>
    </div>
    <!-- START OF UOM ADD MODAL -->
    <div class="modal fade" style="margin-top:50px" id="add_uomType_modal" role="dialog">
      <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <center><h4 class="modal-title">Unit Type Information</h4>
              </center>
            </div>
            <form class="" id="uomType_form" role="form" data-toggle="validator">
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="uomTypeName" class="control-label">UOM Type<span style="color:red">*</span></label>
                        <input type="text" placeholder="Name" class="form-control validate letter" id ="uomTypeName" data-error="Unit Type name is required."
                        data-minlength-error="Minimum length 2."
                        data-minlength="2"
                        maxlength="35" style="resize: none;border:1px solid #A9A9A9" required>
                        <div class="help-block with-errors"></div>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="uomTypeDesc" class="control-label">Description</label>
                         <textarea class="form-control validate" rows="5" id ="uomTypeDesc"
                          data-error="Invalid input length."
                          data-minlength="2"
                          maxlength="255" style="resize: none;border:1px solid #A9A9A9"></textarea>
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
      <div class="modal fade" id="uomTypeDeleteModal" role="dialog">
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
                <button id="btnDeleteuomType" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>

      <div class="modal fade" id="UOMTypeReactivateModal" role="dialog">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h4 class="modal-title">
                  UOM Type is deactivated. Do you want to reactivate?
                </h4>
            </center>
            </div>

            <div class="modal-footer">
                <button class="btn bg-white btn-flat pull-right" data-dismiss="modal">No</button>
                <button id="btnReactivateUOMType" type="button" class="btn bg-blue btn-flat pull-right">Yes</button>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>


  @push('scripts')
    <script type="text/javascript" src="{{URL::asset('js/tables/uomType-table.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/logic/uomType.js')}}"></script>

    <script>
    $(document).ready(function() {
        $('#uomType').DataTable();
    } );
    </script>
  @endpush

@stop
