$(document).ready(function (){
  var productArr = [];
  var urlCode = '';
  var tempID = '';
  var table =  $('#quoteTable').DataTable(
    {
    "searching": false,
    "ordering": false,
    "paging": false,

    });

$('#btnClear').click(function(){
  getAllProducts();
});
  $('#btnAddQuote').click(function(){
      location.href = './estimate-add';
      getAllProducts();
      $("#estimate_form").find('.has-error').removeClass("has-error");
      $("#estimate_form").find('.has-success').removeClass("has-success");
      $('#estimate_form').find('.form-control-feedback').remove();
      document.getElementById("estimate_form").reset();

      var tblData = table.row('tr.active').data();
      var id = tblData[0];

      $.ajax({
        url: '/transaction/estimate-add',
        type: 'POST',
        data: {
          estimate_id: id
      },
      success: function(data)
      {
        $('#companyName').val(data.strCompanyName);
        $('#streetNo').val(data.strStreet);
        $('#brgy').val(data.strBrgy);
        $('#city').val(data.strCity);
        $('#contactPersonName').val(data.strContactPerson);
        $('#cust_contact').val(data.strContactNo);

        $("#prodSelect option").each(function()
        {
          for(var i = 0; i < data.supplier.length; i++)
                {
                  if($(this).val() == data.product[i].strProductID){
                      $(`#prodSelect option[value=`+$(this).val()+`]`).attr('selected', true);
                      $('#prodSelect').change();
                  }
                }


        });
        // url
        tempID = data.strMaterialID;
        // console.log(data.strMaterialID);
        document.getElementById('estimate_form').action = "{{URL::to('/transaction/estimate-add')}}";
        urlCode =  '/transaction/estimate-add-update';
      },
      error: function(result) {
        alert('EDIT ERROR');
      }
  });
})

  $(document).on('submit', '#estimate_form', function(e){
    table.column(0).visible(false);
    $('#prodSelect :selected').each(function(i, selected){
      productArr[i] = $(selected).val();
      // alert(productArr[i]);
    });

    var count = $("#prodSelect :selected").length;
    console.log(count);


    e.preventDefault();
    $.ajax({
        type: "POST",
        url: urlCode,
        data: {
          // product_data: productArr,
          company_name: $('#companyName').val(),
          street: $('#streetNo').val(),
          brgy: $('#brgy').val(),
          city: $('#city').val(),
          contact_person: $('#contactPersonName').val(),
          contact_no: $('#contactNo').val(),
          estimate_id: tempID
        },
        success: function(result) {
          if(urlCode == '/transaction/estimate-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Order Estimate successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Order Estimate successfully added!</center></h4>',
            });
        }
        table.row.add([
            result.strQuoteRequestID,
            result.strCompanyName,
            result.strStreet,
            result.strBrgy,
            result.strCity,
            result.strContactPerson,
            result.strContactNo,
            ]
          ).draw(false);

          productArr = [];
        },
        error: function(result){
          var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Order Estimate already exist!</center></h4>',
            });
          }
        }
              });


    })


});
