$(document).ready(function(){

  $('#aprroveCosting').click(function(){
    var costingID =  $('#approveQuestion').val().replace('?','')
    // alert(costingID)
    $.ajax({
        url: '/transaction/costing-approve',
        type: 'POST',
        data: {
          costing_id: costingID
        },
        success: function(data)
        {
          $('#approveCostingModal').modal('hide')
          location.reload()
        }
    });
  });

  $('#disaprroveCosting').click(function(){
    var costingID =  $('#disapproveQuestion').val().replace('?','')
    // alert(costingID)
    $.ajax({
        url: '/transaction/costing-disapprove',
        type: 'POST',
        data: {
          costing_id: costingID
        },
        success: function(data)
        {
          // $('#discardCostingModal').modal('hide')
        }
    });
  });

});

function approveModal(id)
{
  // alert(id)
  $('#approveQuestion').val(id+"?")
  $('#approveCostingModal').modal('show')
}

function disapproveModal(idd)
{
  $('#disapproveQuestion').val(idd+"?")
  $('#discardCostingModal').modal('show')
}

function viewCosting(iddd)
{
  $.ajax({
      url: '/transaction/costing-view-summary',
      type: 'POST',
      data: {
        costing_id: iddd
      },
      success: function()
      {
        window.location.href = '/transaction/order-costing-summary'
      }
  });
}
