$(document).ready(function(){
  var tablee = $('#receiveMatsTable').DataTable({
       "searching": false,
       "ordering": false,
       "paging": false,
       "bInfo" : false,
    });

    $("#refSelect").prop('disabled', true);

$(function(){

    $('#changetabbutton').click(function(e){
      e.preventDefault();
        $('#mytabs a[href="#tab_2"]').tab('show');
    })

})

 $('#to').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });
 $("#to").datepicker('setDate', new Date());

// $("#btnAddReceive").click(function(){
//   location.href = './receive-add'
//     $("#receive_form").find('.has-error').removeClass("has-error");
//     $("#receive_form").find('.has-success').removeClass("has-success");
//     $('#receive_form').find('.form-control-feedback').remove();
//
//     document.getElementById("receive_form").reset();
//     document.getElementById('receive_form').action = "{{URL::to('/transaction/receiving-add')}}";
//   });

  $('#supplierSelect').change(function(){

    $.ajax({
          url: '/transaction/receive-supplier',
          type: 'POST',
          data: {
            supplier_id : $('#supplierSelect').val()
          },
          success: function(data)
          {
            if (data.length != 0) {
              $("#refSelect").prop('disabled', false);
              $("#refSelect").empty();
              $('<option value="first" selected disabled>Search..</option>').appendTo("#refSelect");
              for(var i = 0; i < data.length; i++)
              {
                $(`<option value=`+data[i].strPurchaseID+`>`+data[i].strPurchaseID+`</option>`).appendTo("#refSelect");
              }
            }
            else {
              $("#refSelect").prop('disabled', true);
              alert('There`s no PO for this supplier')
            }
          }
      });
  });

$("#refSelect").change(function(){
  tablee.column(0).visible(false)
    $.ajax({
        url: "/transaction/receive-po",
        type: "POST",
        data: {
          po_id : $("#refSelect").val()
        },
        success: function(data)
         {
           console.log(data);
           tablee.clear().draw()
           for (var i = 0; i < data.length; i++) {
             tablee.row.add([
               data[i].strMaterialName,
               data[i].totalQty,
               data[i].strMaterialName +''+'<input type="text" id="materialID'+data[i].strMaterialName.replace(/ /g, '')+'" value="'+data[i].strMaterialID+'" hidden>',
               data[i].strPurchaseID,
               '<input type="number" min=0 id="received'+data[i].strMaterialName.replace(/ /g, '')+'" onkeyup="qtyReceived()" style="background:white;">',
             ]).draw(true);
           }
        }
    });
  });


$(document).on('submit', '#receive_form', function(e){
  // var current = new Date();
  // var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
  var qty = [];
  var purchaseID = [];
  var materialID = [];
  var oTable = $('#receiveMatsTable').dataTable();
  var tblrowd = oTable.fnGetData().length;
  materialArr =  oTable.fnGetData();

    for(var i = 0; i<tblrowd; i++){
    qty[i] = $("#received"+materialArr[i][0].replace(/ /g, '')).val();
    materialID[i] = $('#materialID'+materialArr[i][0].replace(/ /g, '')).val();
  }

   e.preventDefault();
   $.ajax({


      type: "GET",
      url: '/transaction/receiving-max',
      success: function(data){
        var current = new Date();
        var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
        $.ajax({
          type: "POST",
          url: "/transaction/receiving-add",
          data: {
            id: data,
            created_at: today,
            date_delivered : $('#to').val(),
            supplier_id : $('#supplierSelect').val(),
            purchase_id : $('#refSelect').val(),
            mat_data : materialID,
            mat_qty : qty,
            created_at: today,
          },

          success: function(result) {
            // alert("HNGG")
            noty({
                  type: 'success',
                  layout: 'bottomRight',
                  timeout: 3000,
                  text: '<h4><center>You successfully updated Received Deliveries!</center></h4>',
                });

          }

        })
      },
      error: function(data){
        alert('ERROR IN MAX ID');
      }
    })

    

    type: "GET",
    url: '/transaction/receiving-max',
    success: function(data){
      // alert('data: ' + data);
      var current = new Date();
      var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
      $.ajax({
      type: "POST",
      url: "/transaction/receiving-add",
      data: {
        id: data,
        created_at: today,
        date_delivered : $('#to').val(),
        supplier_id : $('#supplierSelect').val(),
        purchase_id : $('#refSelect').val(),
        mat_data : materialID,
        mat_qty : qty,
      },

      success: function(result) {
        // alert("HNGG")
        noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>You successfully updated Received Deliveries!</center></h4>',
            });
        tablee.clear();
        tablee.draw();
        $('#refSelect').val('');
        $('#supplierSelect').val('');
      }
    })
    },
    error: function(data){
      alert('ERROR IN MAX ID');
    }
  })

});

});

function qtyReceived()
{
  // alert('asd')
  var table = $('#receiveMatsTable').dataTable();
  var tblrowd = table.fnGetData().length;
  qtyArr =  table.fnGetData();

  for (var i = 0; i < tblrowd; i++) {
    var receivedQty =  $('#received'+qtyArr[i][0].replace(/ /g, '')).val()
    var orderedQty = qtyArr[i][1]
    if (receivedQty > orderedQty) {
      $('#received'+qtyArr[i][0].replace(/ /g, '')).val(orderedQty)
    }
  }
}
