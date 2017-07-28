$(document).ready(function(){
  var stageArr= [];
  var urlCode = '';
  var tempID = '';
  var btnDelete = '#btnDelete';

  var table =  $('#prodTypeTable').DataTable();
  var tblstage =  $('#stage_table').DataTable({"paging": false,"lengthChange": false,"searching": false,"ordering": false,"info": false,"autoWidth": true,"responsive": true,"cache": false,"scrollY": "150px"});

$('#prodTypeStage').change(function(){
  var stageID = $('#prodTypeStage option:selected').val();
  $.ajax({
      url: '/maintenance/productType-getStageDesc',
      type: 'POST',
      data: {
        stage_id: stageID
      },
      success: function(data)
      {
        $("#prodTypeStageDesc").val(data[0].strStageDesc);
        $("#prodTypeStageDescH").val(data[0].strStageDesc);
      },
      error: function(result) {
        alert('No stage found!');
      }
  });
});

//Add material on table variance
  $('#typeStageAdd').click(function(){
    id = $('#prodTypeStage option:selected').val();
    text = $('#prodTypeStage option:selected').text();
    desc = $('#prodTypeStageDescH').val();
    if(id != null){
      $('#prodTypeStage option:selected').remove();
      tblstage.row.add([id,text,desc,
        `
        <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
        `
        ]
      ).draw(false);
      $("#prodTypeStage").val(null).change();
      $('#prodTypeStageDescH').val('');
      $('#prodTypeStageDesc').val('');
    }
  });

  $('#stage_table tbody').on( 'click', btnDelete, function () {
    var data = tblstage.row( $(this).parents('tr') ).data();
    var row = $(this).parent().parents('tr');
    tblstage.row(row).remove().draw();
    $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#prodTypeStage");
  });

  $("#btnAddProductType").click(function(){
    $.ajax({
        url: '/maintenance/productType-all',
        type: 'GET',
        success: function(data)
        {
          tblstage.clear().draw();
          $("#prodTypeStage").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strStageID+`>`+data[i].strStageName+`</option>`).appendTo("#prodTypeStage");
          }
        }
    });
    //
    $("#productType_form").find('.has-error').removeClass("has-error");
    $("#productType_form").find('.has-success').removeClass("has-success");
    $('#productType_form').find('.form-control-feedback').remove();
    // $("#modDept").val(null).change();
    document.getElementById("productType_form").reset();
    document.getElementById('productType_form').action = "{{URL::to('/maintenance/productType-add')}}";
    urlCode =  '/maintenance/productType-add';
  });

  $("#btnEditProductType").click(function(){
    $.ajax({
        url: '/maintenance/productType-all',
        type: 'GET',
        success: function(data)
        {
          tblstage.clear().draw();
          $("#prodTypeStage").empty();
          for(var i = 0; i < data.length; i++)
          {
            $(`<option value=`+data[i].strStageID+`>`+data[i].strStageName+`</option>`).appendTo("#prodTypeStage");
          }
        }
    });
    // CHANGE TABLE DATANAME
    tblstage.clear().draw();
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
          $('#prodTypeName').val(data.type.strProductTypeName);
          $('#prodTypeDesc').val(data.type.strProductTypeDesc);

          for(var i = 0; i < data.stage.length; i++)
            {
              tblstage.row.add([
                data.stage[i].strStageID,
                data.stage[i].strStageName,
                data.stage[i].strStageDesc,
                `
                <button type="button" id="btnDelete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                `
                ]
              ).draw(false);
            }

            $("#prodTypeStage option").each(function()
              {
                for(var i = 0; i < data.stage.length; i++)
                {
                  if($(this).val() == data.stage[i].strStageID){
                      $(`#prodTypeStage option[value=`+$(this).val()+`]`).remove();
                  }
                }
              });


          // URL OF EDIT
          tempID = data.type.strProductTypeID;
          document.getElementById('productType_form').action = "{{URL::to('/maintenance/productType-update')}}";
          urlCode =  '/maintenance/productType-update';

        },
        error: function(result) {
          alert('EDIT_ERROR');
        }
    });
  })

  $(document).on('submit', '#productType_form', function(e){
    var oTable = $('#stage_table').dataTable();
    stageArr =  oTable.fnGetData()
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

        table.row.add([
          result.strProductTypeID,
          result.strProductTypeName,
          result.strProductTypeDesc,
          ]
        ).draw(false);

        $('#add_productType_modal').modal('toggle');
        $('#hideDiv').trigger('click');
        $('#btnEditProductType').hide()
        $('#btnDeleteProductType').hide()
        $('#btnAddProductType').show()

      },
      error: function(result){
        var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Type name already exist!</center></h4>',
            });
          }
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
      $('#btnDeleteProductType').hide();
      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Type(s) successfully deleted!</center></h4>',
        });

    },
    error: function(result) {
        alert('error');
    }
  });
});

// $("#showDiv").click(function(){
//     $('#hidee').show();
//     $('#showDiv').hide();
//   });
//   $("#hideDiv").click(function(){
//     $('#showDiv').show();
//     $("#hidee").hide();
//   });

});
