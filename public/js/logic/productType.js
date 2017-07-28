$(document).ready(function(){
  var stageArr= [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#prodTypeTable').DataTable();

  function getStage(){
    $.ajax({
        url: '/maintenance/productType-all',
        type: 'GET',
        success: function(data)
        {
          $("#prodTypeStage").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strStageID+`>`+data[i].strStageName+`</option>`).appendTo("#prodTypeStage");
          }
        }
    });
  }

  $("#btnAddProductType").click(function(){
    getStage();
    //
    $("#productType_form").find('.has-error').removeClass("has-error");
    $("#productType_form").find('.has-success').removeClass("has-success");
    $('#productType_form').find('.form-control-feedback').remove();
    document.getElementById("productType_form").reset();
    document.getElementById('productType_form').action = "{{URL::to('/maintenance/productType-add')}}";
    urlCode =  '/maintenance/productType-add';
  });

  $("#btnEditProductType").click(function(){
    getStage();
    // CHANGE TABLE DATANAME
    $("#productType_form").find('.has-error').removeClass("has-error");
    $("#productType_form").find('.has-success').removeClass("has-success");
    $('#productType_form').find('.form-control-feedback').remove()
    document.getElementById("productType_form").reset();

    var tblData = table.row('tr.active').data();
    var id = tblData[0];
    $.ajax({
        url: '/maintenance/productType-edit',
        type: 'POST',
        data: {
          ptype_id: id
        },
        success: function(data)
        {
          console.log(data);
          $('#prodTypeName').val(data.strProductTypeName);
          $('#prodTypeDesc').val(data.strProductTypeDesc);

            $("#prodTypeStage option").each(function()
              {
                for(var i = 0; i < data.stage.length; i++)
                {
                  if($(this).val() == data.stage[i].strStageID){
                      $(`#prodTypeStage option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#prodTypeStage').change();
                  }
                }
              });

          // URL OF EDIT
          tempID = data.strProductTypeID;
          document.getElementById('productType_form').action = "{{URL::to('/maintenance/productType-update')}}";
          urlCode =  '/maintenance/productType-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#productType_form', function(e){
    table.column(0).visible(false);
    $('#prodTypeStage :selected').each(function(i, selected){
      stageArr[i] = $(selected).val();
      // alert(stageArr[i]);
    });
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: urlCode,
      data: {
          stage_data: stageArr,
          ptype_name: $('#prodTypeName').val(),
          ptype_desc: $('#prodTypeDesc').val(),
          ptype_id: tempID
      },
      success: function(result) {
        if(urlCode == '/maintenance/productType-update'){
          table.rows('tr.active').remove().draw();
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product Type successfully updated!</center></h4>',
            });
        }else{
          noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Product Type successfully added!</center></h4>',
            });
        }

        // LIST
        var x='';
        for (var index = 0; index < result.stage.length; index++) {
          var element = result.stage[index].details.strStageName;
          x += '<li style="list-style-type:circle">'+element+'</li>'
        }

        table.row.add([
          result.strProductTypeID,
          result.strProductTypeName,
          x,
          result.strProductTypeDesc,
          ]
        ).draw(false);

        $('#add_productType_modal').modal('toggle');
        $('#hideDiv').trigger('click');
        $('#btnEditProductType').hide()
        $('#btnDeleteProductTypes').hide()
        $('#btnAddProductType').show()
        stageArr = [];

      },
      error: function(result){
        $.ajax({
            url: '/maintenance/productType-status',
            type: 'POST',
            data: {
                ptype_name: $('#prodTypeName').val(),
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
                      text: '<h4><center>Type name already exist!</center></h4>',
                    });
                  }
                  else if(data[0].strStatus == 'Inactive'){
                    $('#ProdTypeReactivateModal').modal();
                  }
                }
            }
        });
      }
    });
  });



$('#btnDeleteProductType').click(function(){
  var tblname = $('#prodTypeTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/productType-delete",
    data: {
        ptype_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#btnAddProductType').show();
      $('#btnEditProductType').hide();
      $('#btnDeleteProductTypes').hide();
      $('#ProdTypeDeleteModal').modal('toggle');
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Type(s) successfully deactivated!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnReactivateProdType').click(function(){
  $.ajax({
    url: '/maintenance/productType-active',
    type: 'POST',
    data: {
        ptype_name: $('#prodTypeName').val(),
    },
    success: function(result) {
      $('#add_productType_modal').modal('toggle');
      $('#ProdTypeReactivateModal').modal('toggle');
      noty({
          type: 'success',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Product Type successfully reactivated!</center></h4>',
        });
      var x='';
      for (var index = 0; index < result.stage.length; index++) {
        var element = result.stage[index].details.strStageName;
        x += '<li style="list-style-type:circle">'+element+'</li>'
      }

      table.row.add([
        result.strProductTypeID,
        result.strProductTypeName,
        x,
        result.strProductTypeDesc,
        ]
      ).draw(false);

    },
    error: function(result) {
        alert('error');
    }
  });
});

$('#btnClear').click(function(){
  getStage();
});

});
