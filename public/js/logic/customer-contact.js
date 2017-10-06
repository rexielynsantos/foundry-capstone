$(document).ready(function(){

  var tbl = $('#contactTable').DataTable({
    "searching": false,
    "ordering": false,
    "paging": false,
    "bInfo": false
  });

  var table = $('#custTransTable').DataTable({
    "ordering": false,
    "bInfo": false
  });

  $.ajax({
    type: "POST",
    url: '/transaction/customers-contactPersons',
    data: {
      cust_id : $('#customerID').val(),
    },
    success: function(data) {
      for (var i = 0; i < data.length; i++) {
        tbl.row.add([
          data[i].strContactPersonName,
          data[i].strContactNo
        ]).draw(true);
      }
    }
  });

  $.ajax({
    type: "POST",
    url: '/transaction/customer-orderHistory',
    data: {
      cust_id : $('#customerID').val(),
    },
    success: function(data) {
      for (var i = 0; i < data.length; i++) {
        table.row.add([
          data[i].strCustPurchaseID,
          '',
          '<button type="button" class="btn btn-primary btn-sm">View Details</button>'
        ]).draw(true);
      }
    }
  });

  $('#editCustomer').click(function(){
    $.ajax({
      type: "POST",
      url: '/transaction/customers-edit',
      data: {
        cust_id : $('#customerID').val(),
      },
      success: function(data) {
        window.location.href = '/transaction/customers-editView';
      }
    });
  });
});
