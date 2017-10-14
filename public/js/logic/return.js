$(document).ready(function(){

  var table = $('#returnTable').DataTable({
       "searching": false,
       "ordering": false,
       "paging": false,
       "bInfo" : false,
    });

  $('#orderDate').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true
     });
  $("#orderDate").datepicker('setDate', new Date());

  $('#receivingID').prop('disabled', true);

  $.ajax({
      url: '/transaction/supplier-dropdown',
      type: 'GET',
      success: function(data)
      {
        $("#supplierselection").empty();
        $('<option value="first" selected disabled>Search..</option>').appendTo("#supplierselection");
        for(var i = 0; i < data.length; i++)
        {
          $(`<option value=`+data[i].strSupplierID+`>`+data[i].strSupplierName+`</option>`).appendTo("#supplierselection");
        }
      }
  });

  $('#supplierselection').change(function(){
    $.ajax({
        url: '/transaction/receive-dropdown',
        type: 'POST',
        data: {
          supplier_id : $('#supplierselection').val()
        },
        success: function(data)
        {
          if (data.length != 0) {
            $('#receivingID').prop('disabled', false);
            $("#receivingID").empty();
            $('<option value="first" selected disabled>Search..</option>').appendTo("#receivingID");
            for(var i = 0; i < data.length; i++)
            {
              $(`<option value=`+data[i].strReceivePurchaseID+`>`+data[i].strReceivePurchaseID+`</option>`).appendTo("#receivingID");
            }
          }
          else {
            $("#receivingID").empty();
            $('#receivingID').prop('disabled', true);
            alert('You haven`t received any products from this supplier')
          }
        }
    });
  });

  $('#receivingID').change(function(){
    table.column(0).visible(false)
    $.ajax({
        url: '/transaction/receive-infos',
        type: 'POST',
        data: {
          receive_id : $('#receivingID').val()
        },
        success: function(data)
        {
          for (var i = 0; i < data.length; i++) {
            table.row.add([
              data[i].strMaterialID,
              data[i].quantityReceived,
              data[i].strMaterialName,
              '<input type="number" min=0 id="return'+data[i].strMaterialID+'" onkeyup="validateReturn()" style="background:white;">'
            ]).draw(true);
          }
        }
    });
  });

  $(document).on('submit', '#return_form', function(e){
    // var current = new Date();
    // var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
    var qtyReturned = [];
    var qtyReceived = [];
    var materialID = [];
    var oTable = $('#returnTable').dataTable();
    var tblrowd = oTable.fnGetData().length;
    materialArr =  oTable.fnGetData();

      for(var i = 0; i<tblrowd; i++){
      qtyReturned[i] = $("#return"+materialArr[i][0]).val();
      qtyReceived[i] = materialArr[i][1]
      materialID[i] = materialArr[i][0]
    }
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/transaction/return-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
            url: '/transaction/return-submit',
            type: 'POST',
            data: {
              id: data,
              receive_id : $('#receivingID').val(),
              supplier_id : $('#supplierselection').val(),
              return_date : $('#orderDate').val(),
              qty_returned : qtyReturned,
              mat_id : materialID,
              created_at: today
            },
            success: function(data)
            {
              // alert('yey')
               noty({
                  type: 'success',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>You successfully updated Returned Items!</center></h4>',
                });
               table.clear();
               table.draw();
            }
        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
  });

});

function validateReturn()
{
  // alert('asd')
  var table = $('#returnTable').dataTable();
  var tblrowd = table.fnGetData().length;
  qtyArr =  table.fnGetData();

  for (var i = 0; i < tblrowd; i++) {
    var returnedQty =  $('#return'+qtyArr[i][0]).val()
    var deliveredQty = qtyArr[i][1]
    if (returnedQty > deliveredQty) {
      $('#return'+qtyArr[i][0]).val(deliveredQty)
    }
  }
}
