$(document).ready(function (){
  var table = $('#addMaterialsTable').DataTable();
  var tbl = $('#materialrequisitionTable').DataTable();
  var jobID = $('#jobID').val();

$.ajax({
  url: '/transaction/matReq-view',
  type: 'GET',
  success: function(result)
  {
    for (var i = 0; i < result.length; i++) {
      tbl.row.add([
        result[i].strMaterialRequisitionID,
        result[i].strJobOrdID,
        result[i].strEmployeeFirst+' '+result[i].strEmployeeMiddle+' '+result[i].strEmployeeLast,
        result[i].dtNeeded,
      ]).draw(true);
    }
  }
});

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
        // $('#newRequisitionModal').modal('show');
        // $("#joborderNo").empty();
        for(var i = 0; i < jobOrder.length; i++)
        {
          $(`<option value=`+jobOrder[i].strJobOrdID+`>`+jobOrder[i].strJobOrdID+`</option>`).appendTo("#joborderNo");
        }
      }

    }
  });

$('#joborderNo').change(function(){
  var jobOrder = $('#joborderNo').val()
  table.clear();
  table.column(0).visible(false);
  $.ajax({
    url: '/transaction/matReq-modal',
    type: 'POST',
    data: {
      job_id: jobOrder
    },
    success: function(result)
    {
      console.log(result)
      $('#productName').val(result[0].strProductName)
      $('#prodVariance').val(result[0].strVarianceCode)
      for (var i = 0; i < result.length; i++) {
        table.row.add([
          result[i].strMaterialID,
          result[i].strMaterialName,
          // parseInt(result[i].intOrderQty)*parseInt(result[i].dblMaterialQuantity),
          result[i].intOrderQty,
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

$(document).on('submit', '#mod_form', function(e){
  e.preventDefault();
    var emp = $('#empName').val();
    var jobID = $('#joborderNo').val();
    var matReqDate = $('#to').val();

// alert(emp)
// alert(jobID)
// alert(matReqDate)
    $.ajax({
      type: "GET",
      url: '/transaction/matReq-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $('#addedID').val(data);
        $.ajax({
          url: '/transaction/matReq-add',
          type: 'POST',
          data: {
            id: data,
            created_at: today,
            emp_name : emp,
            job_id : jobID,
            date : matReqDate
          },
          success: function(data)
          {
            // alert('PAPASA TAYO!');
            // console.log(data);
            $('#modalAdded').modal('show');
            // window.location.href = '/transaction/materialrequisition-add'
          }
        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
  });

//   //AJAX FOR MATERIAL
//   $.ajax({
//     url: '/transaction/matReq-material',
//     type: 'GET',
//     success: function(material)
//     {
//       // console.log(material)
//       if (material) {
//
//         // $("#materialsSelect").empty();
//         for(var i = 0; i < material.length; i++)
//         {
//           $(`<option value=`+material[i].strMaterialID+`>`+material[i].strMaterialName+`</option>`).appendTo("#materialsSelect");
//         }
//       }
//
//     }
//   });
//
// $('#addCart').click(function(){
//   var materials = $('#materialsSelect').val()
//   $('#materialsSelect option:selected').remove();
//   for (var i = 0; i < materials.length; i++) {
//
//     // table.row.add([
//     //
//     // ]).draw(true);
//   }
// });
}); //END OF READY FUNCTION
