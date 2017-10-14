$(document).ready(function(){
  var table = $('#contactPersonTable').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
  "bInfo": false

  });
  var urlCode = ''

// $(#telNo).inputmask("(02) 999 9999");
 
  if ($('#checkCustomerID').val() != '') {
    urlCode = '/transaction/customers-update'
    $.ajax({
      type: "POST",
      url: '/transaction/customers-contactPersons',
      data: {
        cust_id : $('#checkCustomerID').val(),
      },
      success: function(data) {
        for (var i = 0; i < data.length; i++) {
          table.row.add([
            data[i].strContactPersonName,
            '<input type="text" class="form-control number" id="'+data[i].strContactPersonName+'" placeholder="ex.09123456789" title="09*********" data-inputmask="mask": "(99) 999-999-999" data-mask data-error="Contact number is required." minlength="11" maxlength="11" required value="'+data[i].strContactNo+'">',
            '<button type="button" name="delete" class="deleteRow"><i class="fa fa-trash"></i></button>'
          ]).draw(true);
        }
      }
    });
  }
  else {
    urlCode= '/transaction/customers-add'
  }

  $('#addContactPerson').prop('disabled', true);

  $('#contactName').change(function(){
    // if (contactPerson != '') {
      $('#addContactPerson').prop('disabled', false);
    // }
  });

  $('#addAnother').click(function(){
    window.location.href = '/transaction/customers'
  });

  $('#addContactPerson').click(function(){
    var contactPerson = $('#contactName').val();
    var contactPersonTextField = '<input class="form-control" id="'+contactPerson+'" type="text" placeholder="ex.09123456789" title="09*********" data-inputmask="mask": "(99) 999-999-999" data-mask data-error="Contact number is required." required>'
    var deleteButtonContactPerson = '<button type="button" name="delete" class="deleteRow"><i class="fa fa-trash"></i></button>'

    table.row.add([
      contactPerson,
      contactPersonTextField,
      deleteButtonContactPerson
    ]).draw(true);
    $('#contactName').val('');
    $('#addContactPerson').prop('disabled', true);
  });

  $("#contactPersonTable").on('click', '.deleteRow', function(e){
    var table = $('#contactPersonTable').DataTable();
    table.row($(this).parents('tr')).remove().draw();
  });

  $(document).on('submit', '#cust_form', function(e){
    // alert(urlCode)
    var submitArr = [];
    var contactNumberArray = [];
    var contactPersonArray = [];
    var table = $('#contactPersonTable').dataTable();
    var tblrowd = table.fnGetData().length;
    submitArr =  table.fnGetData();

    for (var i = 0; i < tblrowd; i++) {
      var tempID = submitArr[i][0]
      contactPersonArray[i] = submitArr[i][0]
      contactNumberArray[i] = $('#'+tempID).val()
    }
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: '/transaction/customers-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: urlCode,
          data: {
            id: data,
            created_at: today,
            tempID : $('#checkCustomerID').val(),
            cust_name : $('#custName').val(),
            cust_street : $('#streetNum').val(),
            cust_brgy : $('#brgy').val(),
            cust_city : $('#city').val(),
            custTelNo : $('#telNo').val(),
            cust_email : $('#custEmail').val(),
            cust_contact : contactPersonArray,
            cust_contactNum : contactNumberArray
          },
          success: function(result) {
            $('#addedCustomer').val(result)
            $('#addedCustomerID').val($('#custName').val())
            $('#modalAdded').modal('show');
          }
        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
  });


  $('#viewProfileID').click(function(){
    var idd = $('#addedCustomer').val();
    viewProfile(idd)
  });

});

function viewProfile(id){
  $.ajax({
    type: "POST",
    url: '/transaction/customers-viewProfile',
    data: {
      cust_id : id,
    },
    success: function() {
      window.location.href = '/transaction/customer-profile'
      // alert('asd')
    }
  });
}
