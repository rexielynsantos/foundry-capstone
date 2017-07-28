$(document).ready(function(){
  var materialArr= [];
  var urlCode = '';
  var tempID = '';
  var btnDelete = '#btnDelete';

  var table =  $('#prodVarianceTable').DataTable();
  var tblmaterial =  $('#material_table').DataTable({"paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": true,"responsive": true,"cache": false,"scrollY": "150px"});

//Add material on table variance
  $('#varianceMaterialAdd').click(function(){
    id = $('#prodVarianceMaterial option:selected').val();
    text = $('#prodVarianceMaterial option:selected').text();
    qty =  $('#prodVarianceMaterialQty').val();

    if(id != null && qty != ''){
      $('#prodVarianceMaterial option:selected').remove();
      tblmaterial.row.add([id,text,qty,
        `
        <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
        `
        ]
      ).draw(false);
      $('#prodVarianceMaterialQty').val('');
      $("#prodVarianceMaterial").val(null).change();
    }
  });


  $('#material_table tbody').on( 'click', btnDelete, function () {
    var data = tblmaterial.row( $(this).parents('tr') ).data();
    var row = $(this).parent().parents('tr');
    tblmaterial.row(row).remove().draw();
    $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#prodVarianceMaterial");
  });

  $("#btnAddProductVariance").click(function(){
    $.ajax({
        url: '/maintenance/material-all',
        type: 'GET',
        success: function(data)
        {
          tblmaterial.clear().draw();
          $("#prodVarianceMaterial").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strMaterialID+`>`+data[i].strMaterialName+`</option>`).appendTo("#prodVarianceMaterial");
          }
        }
    });
    //
    $("#productVariance_form").find('.has-error').removeClass("has-error");
    $("#productVariance_form").find('.has-success').removeClass("has-success");
    $('#productVariance_form').find('.form-control-feedback').remove();
    // $("#modDept").val(null).change();
    document.getElementById("productVariance_form").reset();
    document.getElementById('productVariance_form').action = "{{URL::to('/maintenance/productVariance-add')}}";
    urlCode =  '/maintenance/productVariance-add';
  });

  $("#btnEditProductVariance").click(function(){
    $.ajax({
        url: '/maintenance/material-all',
        type: 'GET',
        success: function(data)
        {
          tblmaterial.clear().draw();
          $("#prodVarianceMaterial").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strMaterialID+`>`+data[i].strMaterialName+`</option>`).appendTo("#prodVarianceMaterial");
          }
        }
    });
    // CHANGE TABLE DATANAME
    tblmaterial.clear().draw();
    $("#productVariance_form").find('.has-error').removeClass("has-error");
    $("#productVariance_form").find('.has-success').removeClass("has-success");
    $('#productVariance_form').find('.form-control-feedback').remove()
    document.getElementById("productVariance_form").reset();

    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/productVariance-edit',
        type: 'POST',
        data: {
          variance_id: id
        },
        success: function(data)
        {
          console.log(data);
          $('#prodVarianceName').val(data.variance.strProductVarianceName);
          $('#prodVarianceDesc').val(data.variance.strProductVarianceDesc);

          for(var i = 0; i < data.material.length; i++)
            {
              tblmaterial.row.add([
                data.material[i].strMaterialID,
                data.material[i].strMaterialName,
                data.material[i].strVarianceMaterialQty,
                `
                <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                `
                ]
              ).draw(false);
            }

            $("#prodVarianceMaterial option").each(function()
              {
                for(var i = 0; i < data.material.length; i++)
                {
                  if($(this).val() == data.material[i].strMaterialID){
                      $(`#prodVarianceMaterial option[value=`+$(this).val()+`]`).remove();
                  }
                }
              });


          // URL OF EDIT
          tempID = data.variance.strProductVarianceID;
          document.getElementById('productVariance_form').action = "{{URL::to('/maintenance/productVariance-update')}}";
          urlCode =  '/maintenance/productVariance-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#productVariance_form', function(e){
    var oTable = $('#material_table').dataTable();
    materialArr =  oTable.fnGetData()
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          material_data: materialArr,
          variance_name: $('#prodVarianceName').val(),
          variance_desc: $('#prodVarianceDesc').val(),
          variance_id: tempID
      },
      success: function(result) {
        if(urlCode == '/maintenance/productVariance-update'){
          table.rows('tr.active').remove().draw();
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product variance successfully updated!</center></h4>',
            });
        }else{
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product variance successfully added!</center></h4>',
            });
        }

        table.row.add([
          result.strProductVarianceID,
          result.strProductVarianceName,
          result.strProductVarianceDesc,
          ]
        ).draw(false);

        $('#add_productVariance_modal').modal('toggle');
        $('#btnEditProductVariance').hide()
        $('#btnDeleteProductVariance').hide()
        $('#btnAddProductVariance').show()

      },
      error: function(result){
        var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Variance name already exist!</center></h4>',
            });
          }
      }
    });
  });



$('#btnDeleteProductVariance').click(function(){
  var tblname = $('#prodVarianceTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/productVariance-delete",
    data: {
        variance_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#btnAddProductVariance').show();
      $('#btnEditProductVariance').hide();
      $('#btnDeleteProductVariance').hide();
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Variance(s) successfully deleted!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

$("#showDiv").click(function(){
    $('#hidee').show();
    $('#showDiv').hide();
  });
  $("#hideDiv").click(function(){
    $('#showDiv').show();
    $("#hidee").hide();
  });

});
