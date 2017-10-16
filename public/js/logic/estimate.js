$(document).ready(function (){


});

function approveModal(id)
{
  $('#approveQuoteModal').modal('show');
  $('#quoteModalID').val(id+'?');
  $('#approveYes').click(function(){
    $.ajax({
      type: 'POST',
      url: '/transaction/estimate-update-approve',
      data: {
        quote_id : id
      },
      success: function(data){
        location.reload()
      }
    });
  });
}

function disapproveModal(id)
{
  $('#disapproveQuoteModal').modal('show');
  $('#quoteModalIDD').val(id+'?');
  $('#disapproveYes').click(function(){
    $.ajax({
      type: 'POST',
      url: '/transaction/estimate-update-disapprove',
      data: {
        quote_id : id
      },
      success: function(data){
        location.reload()
      }
    });
  });
}
