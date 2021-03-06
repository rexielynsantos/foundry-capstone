$(document).ready(function(){
  var table = $('#quoteTable').DataTable(
  {
     "searching": false,
      "ordering": false,
      "paging": false,
  });

  var terms = "";
  var moduleName = 'Quotation';
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

  $('#termsCondition').change(function(){
    if ($('#termsCondition').is(':checked')) {
      // alert('checked')
      $.ajax({
        type: 'POST',
        url: '/transaction/estimate-terms-view',
        data: {
          moduleName : moduleName
        },
        success: function(data){
          $('#termsConditionView').show()
          $('#termsConditionView').val(data[0].strNote)
        }
      });
    }
  });

  $('#changetabbutton').click(function(e){
    e.preventDefault();
    if (document.getElementById('termsCondition').checked && $('#custSelect').val() != null) {
      // alert($('#termsCondition').checked)
      $('#mytabs a[href="#tab_2"]').tab('show');
      terms = 'TERM00001';
      $('#tab2').removeClass('disabled')
    }
    else{
      // alert($('#custSelect').val())
      noty({
        type: 'error',
        layout: 'bottomRight',
        timeout: 3000,
        text: '<h4><center>Fill up required fields</center></h4>',
      });
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
          if (data.length != 0) {
            $("#costingID").empty();
            $(`<option value=0>Select Costing</option>`).appendTo("#costingID");
            for (var i = 0; i < data.length; i++) {
              $(`<option value=`+data[i].strCostingID+`>`+data[i].strCostingID+`</option>`).appendTo("#costingID");
            }
            var address = data[0].customer[0].strCustStreet+" "+data[0].customer[0].strCustBrgy+" "+data[0].customer[0].strCustCity
            $('#confAddress').val(address)

          }
          else {
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>There`s no approved costing for this customer</center></h4>',
            });
          }
          }
      });
  });

  $('#costingID').change(function(){
    var id = $('#costingID').val()
    table.column(0).visible(false);
    $.ajax({
        url: '/transaction/estimate-recycle',
        type: 'POST',
        data: {
        id  : id
        },
        success: function(data)
        {
          console.log(data);
          if (data.length != 0) {
            for (var i = 0; i < data.length; i++) {
              var x = ''
              for (var index = 0; index < data[i].costingmaterial.length; index++) {
                var element = data[i].costingmaterial[index].details.strMaterialName;
                x += '<li style="list-style-type:circle">'+element+'</li>'
              }
              var y = 0
              for (var indexx = 0; indexx < data[i].costingmaterial.length; indexx++) {
                var element1 = data[i].costingmaterial[indexx].dblFinalCost;
                // alert(element1)
                y = parseInt(y) + parseInt(element1)
              }

              table.row.add([
                data[i].strCostingID,
                data[i].product[0].strProductName,
                x,
                y
              ]).draw(true);
            }
            var address = data[0].customer[0].strCustStreet+" "+data[0].customer[0].strCustBrgy+" "+data[0].customer[0].strCustCity
            $('#confAddress').val(address)

          }
          else {
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>There`s no approved costing for this customer</center></h4>',
            });
          }
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
          $('#estimateID').text($('#maxQuotation').text());
          $('#quotationAddModal').modal('show')
        }
    });
  });

  $('#reloader').click(function(){
    location.reload()
  });
  $('#view').click(function(){
    window.location.href='/transaction/estimate';
  });

});
