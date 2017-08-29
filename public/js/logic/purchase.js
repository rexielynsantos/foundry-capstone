$(document).ready(function(){

var btnTrash = '#btnTrash';
var purchaseArr= [];
var materialArr= [];
var tempID = '';
var table =$('#purchasesTable').DataTable(
  {
    // "searching": false,
    "ordering": false,
    "paging": false,
  });
// $('#hiddenDiv').hide(); 
  function getMaterials(){
    $.ajax({
        url: '/transaction/mat-all',
        type: 'GET',
        success: function(data)
        {
          $("#matSelect").empty();
           for (var i = 0; i < data.length; i++) {
            var varDropdown = document.getElementById("matSelect");
            var opt = document.createElement("option");
            opt.text = data[i].strMaterialName;
            varDropdown.add(opt);
      }
        }
    });
  }
  function getMaterialVars(){
    $("#matvarSelect").empty();
    $.ajax({
        url: '/transaction/matvar-all',
        type: 'GET',
        success: function(data)
        {
          // console.log(data)
          var table = document.getElementById('addMaterialsTable');
          var total = table.rows.length;
          for(var i=0; i<total; i++){
            var index = i + 1;
              if(i > 0){
                  var drpdwnId= "matvarSelect"+i;
                  $("#"+drpdwnId).empty();
                  for (var k = 0; k < data.length; k++) {
                    var getDropdown = document.getElementById(drpdwnId);
                    var opt = document.createElement("option");
                    opt.text = data[k].intVariantQty+data[k].strUOMName;
                    getDropdown.add(opt);
                  }
              }
          }
      }
    });
  }


  $("#btnAddpurchase").click(function(){
  location.href = './purchase-add'
  getMaterials();

    $("#purchase_form").find('.has-error').removeClass("has-error");
    $("#purchase_form").find('.has-success').removeClass("has-success");
    $('#purchase_form').find('.form-control-feedback').remove();

    document.getElementById("purchase_form").reset();
    document.getElementById('purchase_form').action = "{{URL::to('/transaction/purchaseorder-add')}}";
  });




$("#supplierselection").change(function()
{
    var valu = $('#supplierselection').val();
    // alert(valu);
    $.ajax({
        url: '/transaction/Supplier',
        type: "POST",
        data: {
          supplier_id : valu
        },
        success: function(data) {

             // $('#street').val(data[0].strSupplierID);
              // console.log(data);
             $('#street').val(data[0].strSupStreet);
             $('#brgy').val(data[0].strSupBrgy);
             $('#city').val(data[0].strSupCity);

        }
  });
});

$('#sendPODetails').click(function()
{

  var sup = document.getElementById("supplierselection");
  var supSelected = sup.options[sup.selectedIndex].text;

  var address = $('#street').val() +' '+ $('#brgy').val() +' '+  $('#city').val();

var x = document.getElementById('hiddenFirst')
      $(".hideable").fadeIn("slow");

$('#supplierTo').val(supSelected);
$('#supplierAdd').val(address);

});

var table = $('#addMaterialsTable').DataTable(
  {
     "searching": false,
     "ordering": false,
     "paging": false,
     "bInfo" : false,
  }
);


 getMaterials();
$("#addCart").click(function(){
    var matVal = $('#matSelect').val();

    table.column(0).visible(false);
    for (var j = 0; j < matVal.length; j++) {
      $.ajax({
          url: "/transaction/purchaseCart",
          type: "POST",
          data: {
            mat_data : matVal[j]
          },
          success: function(data) {
            // console.log(data);
            getMaterialVars();

            var oTable = $('#addMaterialsTable').dataTable();
            var tblrows = oTable.fnGetData().length;
            var row = tblrows+1;
            var btnn = "<button type='button' id = 'btnTrash'  class='deleteRow btn btn-danger' name='"+data[0].strMaterialName+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
            $('#matSelect option:selected').remove();
              table.row.add([
                data[0].strMaterialID,
                data[0].strMaterialName,
                '<select id="matvarSelect'+row+'" class="form-control select2"></select>',
                data[0].intReorderQty,
                  '<input type="number" id="matqty'+row+'" placeholder="0">',

                data[0].unit.strUOMName,
                 '<input type="text" class="number" id="matcost'+row+'" placeholder="0">',
                // data[0].intReorderQty + 3,
                btnn

              ]).draw(true);
              // $("#matSelect").val(null).change();
              // $('matqty').val('');

          }

    });
  }
  });

// $('#addMaterialsTable tbody').on( 'click', btnTrash, function () {
//   var data = table.row( $(this).parents('tr') ).data();
//   var row = $(this).parent().parents('tr');
//   table.row(row).remove().draw();
//   $(`<option value=`+data[0]+`>`+data[1]+`</option>`).appendTo("#matSelect");
// });


$(document).on('submit', '#purchase_form', function(e){
  table.column(0).visible(false);
  var qty = [];
  var cost = [];
  var varia = [];
  var uomArr = [];
  var oTable = $('#addMaterialsTable').dataTable();
  var tblrowd = oTable.fnGetData().length;
  materialArr =  oTable.fnGetData();

  // var regex = /(\d+)/g;

  for(var i = 0; i<tblrowd; i++){
    var x = i+1;
    qty[i] = $("#matqty"+x).val();
    cost[i] = $("#matcost"+x).val();
    varia[i] = $("#matvarSelect"+x).val().replace(/\D/g, "");
    uomArr[i] = $("#matvarSelect"+x).val().replace(/[^a-z]/gi, "");
  }

   e.preventDefault();

    $.ajax({
      type: "POST",
      url: "/transaction/purchaseorder-add",
      data: {
        mat_data : materialArr,
        sup_id : $('#supplierselection').val(),
        sup_contact : $('#contactPerson').val(),
        pterm_id : $('#paymentTermSelect').val(),
        mat_var : varia,
        mat_qty : qty,
        mat_cost : cost,
        uom : uomArr

      },

      success: function(result) {
        // alert("HNGG")
        noty({
              type: 'success',
              layout: 'bottomRight',
              timeout: 3000,
              text: '<h4><center>You successfully sent a Purchase Request!</center></h4>',
            });
            window.location.href = '/transaction/purchase-final';
        // console.log(data);
      }

    });
});

});

function removeProd(id){
  //Return value to dropdown
  var getDropdown = document.getElementById("matSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);

//Delete selected row
  $("#addMaterialsTable").on('click', '.deleteRow', function(e){
    var table = $('#addMaterialsTable').DataTable();
    table.row($(this).parents('tr')).remove().draw();
  });
}
