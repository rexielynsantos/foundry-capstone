$(document).ready(function(){
  var table = $('#quoteTable').DataTable(
  {
     "searching": false,
      "ordering": false,
      "paging": false,
  });
  var terms = "";
//AJAX GET AND DISPLAY MAX ID
  $.ajax({
    type: 'GET',
    url: '/transaction/estimate-add-max',
    success: function(data){
        console.log(data);
      $('#maxQuotation').text(data);
    },
    error: function(data){
        alert('ERROR IN MAX ID');
    }
  });

  $('#changetabbutton').click(function(e){
    e.preventDefault();
    if (document.getElementById('termsCondition').checked) {
      $('#mytabs a[href="#tab_2"]').tab('show');
      terms = 'TERM00001';
    }
    else{
      alert("Required fields are null")
    }
  });

  $('#custSelect').change(function(){
    var id = $('#custSelect').val()
    table.column(0).visible(false);
    $.ajax({
        url: '/transaction/quotation-new',
        type: 'POST',
        data: {
        cust_id  : id
        },
        success: function(data)
        {
          console.log(data);
          $('#costingID').val(data[0].strCostingID)
          for (var i = 0; i < data.length; i++) {
            table.row.add([
              data[i].strCostingID,
              data[i].strProductName,
              data[i].strProductName,
              data[i].dblFinalCost,
              ''
            ]).draw(true);
          }
          var address = data[0].strCustStreet+" "+data[0].strCustBrgy+" "+data[0].strCustCity
          $('#confAddress').val(address)
          }
      });
  });

  $(document).on('submit', '#estimate_form', function(e){
    e.preventDefault();
    var current = new Date();
    var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
    $.ajax({
        url: '/transaction/quotation-add',
        type: 'POST',
        data: {
        id: $('#maxQuotation').text(),
        created_at: today,
        cust_id  : $('#custSelect').val(),
        costing_id : $('#costingID').val(),
        term_id : terms,
        quote_desc : $('#quoteNote').val()
        },
        success: function(data)
        {
          $('#quotationAddModal').modal('show')
        }
    });
  });

});
