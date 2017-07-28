$(document).ready(function(){
  var table =  $('#materialTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddMaterial").click(function(){
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove();
  document.getElementById("material_form").reset();
  document.getElementById('material_form').action = "{{URL::to('/maintenance/material-add')}}";
  urlCode =  '/maintenance/material-add';
});

$("#btnEditMaterial").click(function(){
  $("#material_form").find('.has-error').removeClass("has-error");
  $("#material_form").find('.has-success').removeClass("has-success");
  $('#material_form').find('.form-control-feedback').remove()

  document.getElementById("material_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/material-edit',
      type: 'POST',
      data: {
        material_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#materialName').val(data[0].strMaterialName);
        $('#materialTypeSelect').val(data[0].strMaterialTypeID).change();
        $('#measurementQty').val(data[0].strMaterialQty);
        $('#materialUOMSelect').val(data[0].strUOMID).change();
        $('#reorderLevel').val(data[0].intMaterialReorderLevel).change();
        $('#material_desc').val(data[0].strMaterialDesc);
        // URL OF EDIT
        tempID = data[0].strMaterialID;
        document.getElementById('material_form').action = "{{URL::to('/maintenance/material-update')}}";
        urlCode =  '/maintenance/material-update';
      },
      error: function(result) {
        alert('No ID found');
      }
  });
})

  $(document).on('submit', '#material_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            material_name: $('#materialName').val(),
            mtype_id: $('#materialTypeSelect').val(),
            reorder_level: $('#reorderLevel').val(),
            uom_id: $('#materialUOMSelect').val(),
            material_qty: $('#measurementQty').val(),
            material_desc: $('#material_desc').val(),
            material_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/material-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Material successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Material successfully added!</center></h4>',
            });
          }
          table.row.add([
            result.strMaterialID,
            result.strMaterialName,
            result.strMaterialQty+" "+result.strUOMName,
            result.strMaterialTypeName,
            result.intMaterialReorderLevel,
            result.strMaterialDesc,
            ]
          ).draw(false);

          $('#materialName').val('')
          $('#measurementQty').val('')
          $('#materialUOMSelect').val('')
          $('#material_desc').val('')
          $('#materialTypeSelect').val('')
          $('#reorderLevel').val('')
          $('#add_material_modal').modal('toggle');
          $('#btnEditMaterial').hide()
          $('#btnDeleteMaterials').hide()
          $('#btnAddMaterial').show()
        },
        error: function(result){
          var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Material name already exist!</center></h4>',
            });
          }
        }
      });
  })


$('#btnDeleteMaterial').click(function(){
  var tblname = $('#materialTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/material-delete",
    data: {
        material_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#MaterDeleteModal').modal('toggle');
      $('#btnAddMaterial').show();
      $('#btnEditMaterial').hide();
      $('#btnDeleteMaterials').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Material(s) successfully deleted!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});
});
