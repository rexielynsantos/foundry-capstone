$(document).ready(function (){
var tbl = $('#jobOrdersTable').DataTable();

  $.ajax({
    url: '/transaction/joborders-table',
    type: 'GET',
    success: function(data)
    {
      console.log(data)
      var pdfButton = '<button type="button" name="PDF">PDF</button><br>'
      var matReqButton =  '<button type="button" id ="strJobOrderID" onclick="matReq(this.id)" name="Material Requisiton">Material Requisiton</button><br>'
      var pHeadButton = '<button type="button" name="Production Head">Production Head</button>'
      for (var i = 0; i < data.length; i++) {
        tbl.row.add([
          data[i].strJobOrderID,
          data[i].strQuoteRequestID,
          data[i].strProductName,
          data[i].strVarianceCode,
          data[i].intOrderQty,
          data[i].strRemarks,
          pdfButton+""+matReqButton+""+pHeadButton
        ]).draw(true);
      }

    }
  });

}); //END OF READY FUNCTION

function matReq(jobOrderID){
  // alert(jobOrderID)
  $.ajax({
    url: '/transaction/joborder-material',
    type: 'POST',
    data: {
      job_id: jobOrderID
    },
    success: function(data)
    {
      window.location.href = '/transaction/materialrequisition-add'
    }
  });
}
