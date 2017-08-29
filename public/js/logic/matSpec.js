$(document).ready(function(){
  var table =  $('#matSpecTable').DataTable();
  var table1 = $('#materialTable').DataTable(
    {
    "searching": false,
    "ordering": false,
    "paging": false,
  });
  var urlCode = '';
  var tempID = '';
  var varArr = [];

$("#btnAddMat").click(function(){
  $("#matspec_form").find('.has-error').removeClass("has-error");
  $("#matspec_form").find('.has-success').removeClass("has-success");
  $('#matspec_form').find('.form-control-feedback').remove();
  document.getElementById("matspec_form").reset();
  table1.clear().draw();
  document.getElementById('matspec_form').action = "{{URL::to('/transaction/matspec-add')}}";
  urlCode =  '/transaction/matspec-add';
});

$("#btnEditMat").click(function(){
  // CHANGE TABLE DATANAME
  $("#matspec_form").find('.has-error').removeClass("has-error");
  $("#matspec_form").find('.has-success').removeClass("has-success");
  $('#matspec_form').find('.form-control-feedback').remove()


  document.getElementById("matspec_form").reset();
  table1.clear().draw();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  var g = "g";
  // alert(id)
  $.ajax({
      url: '/transaction/matspec-edit',
      type: 'POST',
      data: {
        matspec_id: id
      },
      success: function(data)
      {
        table1.column(0).visible(false);

        // console.log(data);
        $('#productSelection').val(data.strProductID).change();
        $('#varianceCode').val(data.strVarianceCode)
        for (var i = 0; i < data.material.length; i++) {
          $("#materialSelect option[value='"+data.material[i].details.strMaterialName+"'").remove();
          // alert(data.material[i].strMaterialID)
          table1.row.add([
            data.material[i].details.strMaterialID,
            data.material[i].details.strMaterialName,
            '<input type="number" id="'+data.material[i].details.strMaterialName.replace(/ /g,'')+'" value="'+data.material[i].dblMaterialQuantity+'">',
            g,
            "<button type='button' class='deleteRow' name='"+data.material[i].details.strMaterialName+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>"
          ]).draw(false);

        }
        // URL OF EDIT
        tempID = data.strMatSpecID;
        document.getElementById('matspec_form').action = "{{URL::to('/transaction/matspec-edit')}}";
        urlCode =  '/transaction/matspec-update';
      },
      error: function(result) {
        alert('No ID found');

      }
  });
});

$('#btnDeleteMats').click(function(){
  var tblname = $('#matSpecTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];
  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/transaction/matspec-delete",
    data: {
        matspec_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#DeptDeleteModal').modal('toggle');
      $('#btnAddMat').show();
      $('#btnEditMat').hide();
      $('#btnDeleteMats').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Department(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});


$("#productSelection").change(function(){
    var val = $('#productSelection').val();
    // alert (val);
    $.ajax({
        url: "/Specification/ProductType",
        type: "POST",
        data: {
          prod_id : val
        },
        success: function(data) {
             $("#productTypeName").val(data[0].strProductTypeName);
        }
      });
});


$("#addCart").click(function(){

    table1.column(0).visible(false);
    var matVal = $('#materialSelect').val();

    for (var j = 0; j < matVal.length; j++) {
      $.ajax({
          url: "/transaction/matSpecCart",
          type: "POST",
          data: {
            mat_data : matVal[j]
          },
          success: function(data) {

            var btnn = "<button type='button' class='deleteRow' name='"+data[0].strMaterialName+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
            $('#materialSelect option:selected').remove();
              table1.row.add([
                data[0].strMaterialID,
                data[0].strMaterialName,
                "<input type='number' id='"+data[0].strMaterialName.replace(/ /g,'')+"' placeholder='0'>",
                data[0].unit.strUOMName,
                btnn
              ]).draw(true);
              $("#materialSelect").val(null).change();
              $('matqty').val('');
          }
    });
  }
  });


$(document).on('submit', '#matspec_form', function(e){
  var oTable = $('#materialTable').dataTable();
  var tblrowd = oTable.fnGetData().length;
  varArr =  oTable.fnGetData();
  // console.log(oTable.fnGetData());
  var qty = [];
  var matArr = [];
  var value = [];
  table.column(0).visible(false);

  for(var i = 0; i<tblrowd; i++){
    var x = i+1;
    var temporaryID = varArr[i][1]
    value[i] = $("#"+temporaryID.replace(/ /g,'')).val()
    // alert(value[i])
    if (value[i]) {
      qty[i] = value[i];
      // alert(qty[i])
    }
    if (varArr[i][0] != '') {
      matArr[i] = varArr[i][0]
      // alert(matArr)
    }

  }

  // alert(qty)
  // alert(tempID)
  // alert(matArr)
  // alert($('#productSelection').val())
  e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
        mat_data : matArr,
        product_id : $('#productSelection').val(),
        variance_code : $('#varianceCode').val(),
        mat_qty : qty,
        tmp_id : tempID
      },
      success: function(result) {
        // console.log(result);
        if(urlCode == '/transaction/matspec-update'){
          table.rows('tr.active').remove().draw();
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center> successfully updated!</center></h4>',
          });
        }else{
          noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center> successfully added!</center></h4>',
          });
        }
        // table.row.add([
        //
        // ]).draw(false);

        varArr = [];
        qty = [];
        urlCode = '';
        table1.clear().draw();
        $('#matModal').modal('toggle');
      },
      error: function(result){
        $.ajax({
            url: '/transaction',
            type: 'POST',
            data: {

            },
            success: function(data)
            {
              var errors = result.responseJSON;
                if(errors == undefined){
                  if(data[0].strStatus == 'Active'){
                    noty({
                      type: 'error',
                      layout: 'bottomRight',
                      timeout: 3000,
                      text: '<h4><center>Already exist!</center></h4>',
                    });
                  }
                  else if(data[0].strStatus == 'Inactive'){
                    $('#matModal').modal();
                  }
                }
            }
        });
      }
    });
})

});

function removeProd(id){
  //Return value to dropdown
  var getDropdown = document.getElementById("materialSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);

//Delete selected row
  $("#materialTable").on('click', '.deleteRow', function(e){
    var table = $('#materialTable').DataTable();
    table.row($(this).parents('tr')).remove().draw()
  });
}
