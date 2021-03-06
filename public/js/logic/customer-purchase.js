$(document).ready(function(){
  var table = $('#prodTable').DataTable({
     "searching": false,
      "ordering": false,
      "paging": false,
  });

  var varianceTable = $('#varianceTable').DataTable({
     "searching": false,
      "ordering": false,
      "paging": false,
  });

  $('#orderDate').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true
     });
  $("#orderDate").datepicker('setDate', new Date());

  $('#targetDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  $('#targetDate').change(function(){
    var fromm = $('#orderDate').val()
    var too = $('#targetDate').val()
    if (fromm > too) {
      $('#targetDate').val('')
    }
  });

  $('#addCart').prop('disabled', true);

    $('#changetabbutton').click(function(e){
      e.preventDefault();
      var purchaseID = $('#purchaseID').val()
      var oDate = $('#orderDate').val()
      var tDate = $('#targetDate').val()
      var qRef = $('#quoteRefer').val()

      if (purchaseID == '' && oDate == '' && tDate == '' && qRef == 0) {
        noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Fill up required fields</center></h4>',
        });
      }
      else{
        // alert(purchaseID)
        // alert(oDate)
        // alert(tDate)
        // alert(qRef)
        $('#mytabs a[href="#tab_2"]').tab('show');
        $('#tab2').removeClass('disabled')
      }
    });


//AJAX GET AND DISPLAY MAX ID
  $.ajax({
    type: 'GET',
    url: '/transaction/customerPurchase-new-max',
    success: function(data){
        console.log(data);
      $('#maxCustPurchase').text(data);
      // $('#purchaseID').val(data);
    },
    error: function(data){
        alert('ERROR IN MAX ID');
    }
  });

  $.ajax({
      url: '/transaction/purchase-quote-get',
      type: 'GET',
      success: function(data)
      {
        $("#quoteRefer").empty();
        $(`<option value='0' selected>Select Quote</option>`).appendTo("#quoteRefer");
        for(var i = 0; i < data.length; i++)
        {
          $(`<option>`+data[i].strQuoteID+`</option>`).appendTo("#quoteRefer");
        }
      }
  });

$("#quoteRefer").change(function(){
  var selectedQuote = $('#quoteRefer').val()
  // alert(selectedQuote)

  $.ajax({
      url: '/transaction/selectedQuote',
      type: "POST",
      data: {
        quote_id : selectedQuote
      },
      success: function(data) {
        $("#prodSelect").empty();
        for(var i = 0; i < data.length; i++)
        {
          $(`<option value=`+data[i].strProductID+`>`+data[i].strProductName+`</option>`).appendTo("#prodSelect");
        }
      }
  });
});

  $('#prodSelect').change(function(){
    $('#addCart').prop('disabled', false);
  });

  $('#quoteRefer').change(function(){
    $.ajax({
        url: '/transaction/purchase-customerName-get',
        type: 'POST',
        data: {
          quote_id : $('#quoteRefer').val()
        },
        success: function(data)
        {
          $('#quoteCustName').val(data.strCompanyName)
          $('#quoteCustID').val(data.strCustomerID)
        }
    });
  });

  $('#addCart').click(function(){
    table.column(0).visible(false);
    $('#addCart').prop('disabled', true);
    var prodVal =  $('#prodSelect').val();
    $('#prodSelect option:selected').remove()
    for (var i = 0; i < prodVal.length; i++) {
      $.ajax({
          url: '/transaction/purchase-products-cart',
          type: 'POST',
          data: {
            prod_name : prodVal[i],
            quote_id : $('#quoteRefer').val()
          },
          success: function(data)
          {
            console.log(data)
            table.row.add([
              data.strProductID,
              data.strProductName,
              data.strProductTypeName,
              data.strVarianceCode,
              '<input type="number" id="qty'+data.strProductID+'" onkeyup="totalCost()">',
              '<input type="number" id="cost'+data.strProductID+'" onkeyup="totalCost()">',
              '<input type="text" id="totalCosting'+data.strProductID+'" disabled style="border:none; background:white;">',
              '<input type="text" id="remarks'+data.strProductID+'">',
              '<button type="button" id="'+data.strProductName+'" onclick="deleteRow(this.id)" class="deleteRow">Delete</button>'
            ]).draw(true);
            $('#addCart').prop('disabled', false);
          }
      });
    }
  });

  $('#prodVarSelect').change(function(){
    var varianceValue = $('#prodVarSelect').val();
    $.ajax({
       url: "/transaction/estimate-variance-add",
       type: "POST",
       data: {
         varianceCode : varianceValue
       },
       success: function(data) {
         console.log(data);
         $('#varianceProduct').val(data[0].strProductName)
         varianceTable.clear().draw();
         for (var i = 0; i < data.length; i++) {
           varianceTable.row.add([
             data[i].strMaterialName
           ]).draw(true);
         }
       }
     });
  });

  $('#addvar').click(function(){
    var varianceText = $('#varianceTextID').val()
    var varianceValuee = $('#prodVarSelect').val()
    // alert(varianceText)
    // alert(varianceValuee)
    $('#'+varianceText).val(varianceValuee)

    $('#addVarianceModal').modal('hide')
  });

  $(document).on('submit', '#customer_purchase_form', function(e){

    var submitVariance = [];
    var submitCost = [];
    var submitQty = [];
    var submitRemarks = [];
    var submitProductID = [];
    var table = $('#prodTable').dataTable();
    var tblrowd = table.fnGetData().length;
    submitArr =  table.fnGetData();

    for (var i = 0; i < tblrowd; i++) {
      var tempID = submitArr[i][0];
      var tempp = submitArr[i][1].replace(/ /g,'');
      submitProductID[i] = submitArr[i][0]
      submitVariance[i] = submitArr[i][3]
      submitCost[i] = $('#cost'+tempID).val()
      submitQty[i] = $('#qty'+tempID).val()
      submitRemarks[i] = $('#remarks'+tempID).val()
    }
    e.preventDefault();
    var current = new Date();
    var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
    $.ajax({
      url: "/transaction/customerPurchase-add",
      type: "POST",
      data: {
        id: $('#maxCustPurchase').text(),
        created_at: today,
        // cust_po : $('#custPONo').val(),
        po_id : $('#purchaseID').val(),
        orderDate : $('#orderDate').val(),
        targetDate : $('#targetDate').val(),
        customer_id : $('#quoteCustID').val(),
        quote_ref : $('#quoteRefer').val(),
        product_id : submitProductID,
        variance_code : submitVariance,
        cost :submitCost,
        qty :submitQty,
        rmrks :submitRemarks
      },
      success: function(data) {
        // $('#addedID').val($('#maxCustPurchase').text());
        // $('#modalAdded').modal('show');

        window.location.href = '/transaction/customerPurchases'
      }
    });
  });

});

function deleteRow(id)
{
  $('#prodTable').on('click', '.deleteRow', function(e){
    var table = $('#prodTable').DataTable();
    table.row($(this).parents('tr')).remove().draw();

    var getDropdown = document.getElementById('prodSelect');
    var opt = document.createElement("option");
    opt.text = id
    getDropdown.add(opt);
  });
}

function totalCost()
{
  // alert('asd')
  var initialCost = [];
  var usageOfMaterial = [];
  var totalCostt = [];
  var tablee = $('#prodTable').dataTable();
  var tblrowd = tablee.fnGetData().length;
  costingArr =  tablee.fnGetData();

  for (var i = 0; i < tblrowd; i++) {
    initialCost[i] = $('#qty'+costingArr[i][0]).val()
    usageOfMaterial[i] = $('#cost'+costingArr[i][0]).val()
    totalCostt[i] = initialCost[i] * usageOfMaterial[i]
    $('#totalCosting'+costingArr[i][0]).val(totalCostt[i])
    // alert(initialCost)
    // alert(usageOfMaterial)
  }
  initialCost = ''
  usageOfMaterial = ''
  totalCostt = ''
}
