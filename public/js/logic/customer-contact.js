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
var table1 = $('#custJOTable').DataTable({
    "ordering": false,
    "bInfo": false
  });

  // alert($('#customerID').val())
  $.ajax({
    type: "POST",
    url: '/transaction/customers-contactPersons',
    data: {
      cust_id : $('#customerID').val(),
    },
    success: function(data) {
      console.log(data)
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
          'On-Process',
          '<button type="button" class="btn btn-primary btn-sm">View Details</button>'
        ]).draw(true);
      }
    }
  });
  table1.column(0).visible(false);
  $.ajax({
    type: "POST",
    url: '/transaction/customer-currentJob',
    data: {
      cust_id : $('#customerID').val(),
    },
    success: function(data) {
      for (var i = 0; i < data.length; i++) {
        table1.row.add([
          data[i].strCustPurchaseID,
          data[i].strJobOrdID,
          data[i].strJobOrdStatus,
          data[i].dtDeliveryDate,
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
