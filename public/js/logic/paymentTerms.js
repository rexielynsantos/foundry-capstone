$(document).ready(function(){
  var table =  $('#ptTable').DataTable();
  var urlCode = '';
  var tempID = '';

$("#btnAddPterm").click(function(){
  $("#pt_form").find('.has-error').removeClass("has-error");
  $("#pt_form").find('.has-success').removeClass("has-success");
  $('#pt_form').find('.form-control-feedback').remove();
  document.getElementById("pt_form").reset();
  document.getElementById('pt_form').action = "{{URL::to('/maintenance/paymentTerms-add')}}";
  urlCode =  '/maintenance/paymentTerms-add';
})

$("#btnEditPterm").click(function(){
  $("#pt_form").find('.has-error').removeClass("has-error");
  $("#pt_form").find('.has-success').removeClass("has-success");
  $('#pt_form').find('.form-control-feedback').remove()

  document.getElementById("pt_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/paymentTerms-edit',
      type: 'POST',
      data: {
        pterm_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#ptDesc').val(data[0].strPaymentTermDesc);
        $('#ptName').val(data[0].strPaymentTermName);
        // URL OF EDIT
        tempID = data[0].strPaymentTermID;
        document.getElementById('pt_form').action = "{{URL::to('/maintenance/paymentTerms-update')}}";
        urlCode =  '/maintenance/paymentTerms-update';
      },
      error: function(result) {
        alert('No ID found');
      }
  });
})

  $(document).on('submit', '#pt_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
      $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            pterm_desc: $('#ptDesc').val(),
            pterm_name: $('#ptName').val(),
            pterm_id: tempID
        },
        success: function(result) {
          if(urlCode == '/maintenance/paymentTerms-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Payment Term successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Payment Term successfully added!</center></h4>',
            });
          }
          table.row.add([
            result[0].strPaymentTermID,
            result[0].strPaymentTermName,
            result[0].strPaymentTermDesc,
            ]
          ).draw(false);

          $('#ptName').val('')
          $('#ptDesc').val('')
          $('#Ptermmodal').modal('toggle');
          $('#btnEditPterm').hide()
          $('#btnDeletePterms').hide()
          $('#btnAddPterm').show()
        },
        error: function(result){
          var errors = result.responseJSON;
          if(errors == undefined){
            noty({
              type: 'error',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Payment Term name already exist!</center></h4>',
            });
          }
        }
      });
  })


$('#btnDeletePterm').click(function(){
  var tblname = $('#ptTable').DataTable();
  var selected = tblname.rows('tr.active').data();
  var selectedArr = [];

  for(var i = 0; i < selected.length; i++)
    {
       selectedArr[i] = selected[i][0];
    }

  $.ajax({
    type: "POST",
    url: "/maintenance/paymentTerms-delete",
    data: {
        pterm_id: selectedArr
    },
    success: function(result) {
      tblname.rows('tr.active').remove().draw();
      $('#payTermDeleteModal').modal('toggle');
      $('#btnAddPterm').show();
      $('#btnEditPterm').hide();
      $('#btnDeletePterms').hide();

      noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Payment Term(s) successfully deactivated!</center></h4>',
        });
    },
    error: function(result) {
        alert('error');
    }
  });
});

});
