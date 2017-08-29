$(document).ready(function (){
  var table = $('#addMaterialsTable').DataTable();

var jobID = $('#jobID').val();

// AJAX FOR JOB ORDER DROPDOWN
  $.ajax({
    url: '/transaction/getJoborders',
    type: 'POST',
    data: {
      job_id: jobID
    },
    success: function(jobOrder)
    {
      if (jobOrder) {
        $('#newRequisitionModal').modal('show');
        // $("#joborderNo").empty();
        for(var i = 0; i < jobOrder.length; i++)
        {
          $(`<option value=`+jobOrder[i].strJobOrderID+`>`+jobOrder[i].strJobOrderID+`</option>`).appendTo("#joborderNo");
        }
      }

    }
  });

$('#joborderNo').change(function(){
  var jobOrder = $('#joborderNo').val()

  table.column(0).visible(false);
  $.ajax({
    url: '/transaction/matReq-modal',
    type: 'POST',
    data: {
      job_id: jobOrder
    },
    success: function(result)
    {
      // console.log(result)
      $('#productName').val(result[0].strProductName)
      $('#prodVariance').val(result[0].strVarianceCode)
      for (var i = 0; i < result.length; i++) {
        table.row.add([
          result[i].strMaterialID,
          result[i].strMaterialName,
          '<select class="" id="'+result[i].strMaterialID+'"></select>',
          '<input type = "text" id="'+result[i].strMaterialID+'" style="border:none; background:#E6E6E6;" placeholder="0">',
          'pcs'
        ]).draw(true)
      }

      //AJAX FOR MATERIAL VARIANT
      var matID = [];
      var table1 = $('#addMaterialsTable').dataTable();
      var tblrow = table1.fnGetData().length;
      matID =  table1.fnGetData();
      for (var k = 0; k < tblrow; k++) {
        $.ajax({
          url: '/transaction/matReq-matVar',
          type: 'POST',
          data: {
            mat_id : matID[k][0]
          },
          success: function(matVar)
          {
            console.log(matVar)
            // $('#'+matID[k][0]).empty();
            for (var j = 0; j < matVar.length; j++) {
              $(`<option value=`+matVar[j].strMaterialVariantID+`>`+matVar[j].intVariantQty+`</option>`).appendTo('#'+matVar[j].strMaterialID);
            }
          }
        });
      }
    }//END OF SUCCESS FUNCTION
  });//END OF AJAX FOR TABLE
});//END OF CHANGE FUNCTION


  //AJAX FOR EMPLOYEE
  $.ajax({
    url: '/transaction/matReq-employee',
    type: 'GET',
    success: function(employee)
    {
      // console.log(employee)
      if (employee) {

        // $("#empName").empty();
        for(var i = 0; i < employee.length; i++)
        {
          $(`<option value=`+employee[i].strEmployeeID+`>`+employee[i].strEmployeeFirst+" "+employee[i].strEmployeeMiddle+" "+employee[i].strEmployeeLast+`</option>`).appendTo("#empName");
        }
      }

    }
  });

  //AJAX FOR MATERIAL
  $.ajax({
    url: '/transaction/matReq-material',
    type: 'GET',
    success: function(material)
    {
      // console.log(material)
      if (material) {

        // $("#materialsSelect").empty();
        for(var i = 0; i < material.length; i++)
        {
          $(`<option value=`+material[i].strMaterialID+`>`+material[i].strMaterialName+`</option>`).appendTo("#materialsSelect");
        }
      }

    }
  });

$('#addCart').click(function(){
  var materials = $('#materialsSelect').val()
  $('#materialsSelect option:selected').remove();
  for (var i = 0; i < materials.length; i++) {

    // table.row.add([
    //
    // ]).draw(true);
  }
});
}); //END OF READY FUNCTION
