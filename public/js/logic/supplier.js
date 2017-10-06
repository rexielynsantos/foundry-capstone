$(document).ready(function(){
  var table =  $('#supplierTable').DataTable();
  var urlCode = '';
  var tempID = '';

  $("#btnAddSupplier").click(function(){
    // URL OF ADD
    $("#supplier_form").find('.has-error').removeClass("has-error");
    $("#supplier_form").find('.has-success').removeClass("has-success");
    $('#supplier_form').find('.form-control-feedback').remove();
    document.getElementById("supplier_form").reset();
    document.getElementById('supplier_form').action = "{{URL::to('/maintenance/supplier-add')}}";
    urlCode =  '/maintenance/supplier-add';
  });

$("#btnEditSupplier").click(function(){
  // CHANGE TABLE DATANAME
  $("#supplier_form").find('.has-error').removeClass("has-error");
  $("#supplier_form").find('.has-success').removeClass("has-success");
  $('#supplier_form').find('.form-control-feedback').remove()
  document.getElementById("supplier_form").reset();
  var tblData = table.row('tr.active').data();
  var id = tblData[0];
  $.ajax({
      url: '/maintenance/supplier-edit',
      type: 'POST',
      data: {
        supplier_id: id
      },
      success: function(data)
      {
        // CHANGE ADD THIS DEPENDS ON INPUT FIELDS
        $('#supplierName').val(data[0].strSupplierName);
        $('#street').val(data[0].strSupStreet);
        $('#brgy').val(data[0].strSupBrgy);
        $('#city').val(data[0].strSupCity);
        $('#supplierDesc').val(data[0].strSupplierDesc);
        // URL OF EDIT
        tempID = data[0].strSupplierID;
        document.getElementById('supplier_form').action = "{{URL::to('/maintenance/supplier-update')}}";
        urlCode =  '/maintenance/supplier-update';
      },
      error: function(result) {
        alert('No ID found');
      }
  });
})

  $(document).on('submit', '#supplier_form', function(e){
    table.column(0).visible(false);
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: '/maintenance/supplier-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
        type: "POST",
        url: urlCode,
        data: {
            id:data,
            supplier_name: $('#supplierName').val(),
            supplier_street: $('#street').val(),
            supplier_brgy: $('#brgy').val(),
            supplier_city: $('#city').val(),
            supplier_desc: $('#supplierDesc').val(),
            created_at: today,
            supplier_id: tempID
        },
        success: function(result) {

          console.log(result);

          if(urlCode == '/maintenance/supplier-update'){
            table.rows('tr.active').remove().draw();
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Supplier successfully updated!</center></h4>',
            });
          }else{
            noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>Supplier successfully added!</center></h4>',
            });
          }
          table.row.add([
            result.strSupplierID,
            result.strSupplierName,
            result.strSupStreet+" "+result.strSupBrgy+","+result.strSupCity,
            result.strSupplierDesc,
            ]
          ).draw(false);
          //reset form
          document.getElementById("supplier_form").reset();
          $('#add_supplier_modal').modal('toggle');
          $('#btnEditSupplier').hide()
          $('#btnDeleteSuppliers').hide()
          $('#btnAddSupplier').show()
        },
        error: function(result){
          $.ajax({
              url: '/maintenance/supplier-status',
              type: 'POST',
              data: {
                  supplier_name: $('#supplierName').val()
              },
              success: function(data)
              {
                var errors = result.responseJSON;
                  if(errors == undefined){
                    if(data[0].strStatus == 'Active'){
                      noty({
                        type: 'error',
                        layout: 'bottomRight',
                        timeout: 3000,
                        text: '<h4><center>Supplier already exist!</center></h4>',
                      });
                    }
                    else if(data[0].strStatus == 'Inactive'){
                      $('#SupplierReactivateModal').modal();
                    }
                  }
              }
          });
        }
      })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })
  })


  $('#btnDeleteSupplier').click(function(){
    var tblname = $('#supplierTable').DataTable();
    var selected = tblname.rows('tr.active').data();
    var selectedArr = [];

    for(var i = 0; i < selected.length; i++)
      {
        selectedArr[i] = selected[i][0];
      }

    $.ajax({
      type: "POST",
      url: "/maintenance/supplier-delete",
      data: {
          supplier_id: selectedArr
      },
      success: function(result) {
        tblname.rows('tr.active').remove().draw();
        $('#SupplierDeleteModal').modal('toggle');
        $('#btnAddSupplier').show();
        $('#btnEditSupplier').hide();
        $('#btnDeleteSuppliers').hide();

        noty({
          type: 'error',
          layout: 'bottomRight',
          timeout: 3000,
          text: '<h4><center>Supplier(s) successfully deactivated!</center></h4>',
        });

      },
      error: function(result) {
          alert('error');
      }
    });
  });

  $('#btnReactivateSupplier').click(function(){
    $.ajax({
      url: '/maintenance/supplier-active',
      type: 'POST',
      data: {
          supplier_name: $('#supplierName').val()
      },
      success: function(result) {
        $('#add_supplier_modal').modal('toggle');
        $('#SupplierReactivateModal').modal('toggle');
        noty({
            type: 'success',
            layout: 'bottomRight',
            timeout: 3000,
            text: '<h4><center>Supplier successfully reactivated!</center></h4>',
          });
        table.row.add([
          result.strSupplierID,
          result.strSupplierName,
          result.strSupStreet+" "+result.strSupBrgy+" "+result.strSupCity,
          result.strSupplierDesc,
          ]
        ).draw(false);
      },
      error: function(result) {
          alert('error');
      }
    });
  });

});
