$(document).ready(function (){


}); //END OF READY FUNCTION

function matReq(jobOrderID){
  alert(jobOrderID)
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
