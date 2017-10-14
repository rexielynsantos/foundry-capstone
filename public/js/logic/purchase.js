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
$('#orderDate').datepicker({
     format: 'yyyy-mm-dd',
     autoclose: true
   });
$("#orderDate").datepicker('setDate', new Date());

  $("#btnAddpurchase").click(function(){
  location.href = './purchase-add'
  getMaterials();

    $("#purchase_form").find('.has-error').removeClass("has-error");
    $("#purchase_form").find('.has-success').removeClass("has-success");
    $('#purchase_form').find('.form-control-feedback').remove();

    document.getElementById("purchase_form").reset();
    document.getElementById('purchase_form').action = "{{URL::to('/transaction/purchaseorder-add')}}";
  });

  $("#btnAddReceive").click(function(){
  location.href = './receive-add'
    $("#receive_form").find('.has-error').removeClass("has-error");
    $("#receive_form").find('.has-success').removeClass("has-success");
    $('#receive_form').find('.form-control-feedback').remove();

    document.getElementById("receive_form").reset();
    document.getElementById('receive_form').action = "{{URL::to('/transaction/receiving-add')}}";
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
          console.log(data);
          $('#supplierAdd').val(data.strSupStreet+' '+data.strSupBrgy+' '+data.strSupCity);
          var sup = document.getElementById("supplierselection");
          var supSelected = sup.options[sup.selectedIndex].text;
          $('#supplierTo').val(supSelected);
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

var table = $('#addMaterialsTablee').DataTable(
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
    var matID = [];
    var materialValue = []
    for (var i = 0; i < matVal.length; i++) {
      materialValue[i] = matVal[i].split('-')
    }
    // alert(materialValue[0][0])

    table.column(0).visible(false);
    for (var j = 0; j < matVal.length; j++) {
      $.ajax({
          url: "/transaction/purchaseCart",
          type: "POST",
          data: {
            mat_data : materialValue[j][0]
          },
          success: function(data) {
            $('#totCost').val('0')
            console.log(data);
            // getMaterialVars();
            var btnn = "<button type='button' id = 'btnTrash'  class='deleteRow btn btn-danger' name='"+data[0].strMaterialName+' - ('+data[0].intVariantQty+''+data[0].strUOMName+')'+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
              $('#matSelect option:selected').remove();
            var costt = parseInt(data[0].intReorderQty) * parseInt(data[0].dblBasePrice)
              table.row.add([
                data[0].strMaterialID,
                data[0].strMaterialName+' - ('+data[0].intVariantQty+''+data[0].strUOMName+')',
                data[0].intReorderQty,
                '<input type="number" id="basePrice'+data[0].strMaterialID+'" value="'+data[0].dblBasePrice+'" class="form-control" readonly style="border:none; background:white;" placeholder="0">',
                '<input type="number" min="0" id="matqty'+data[0].strMaterialID+'" onkeyup="computeTotalCost()">',
                'pcs',
                '<input type="text" id="matcost'+data[0].strMaterialID+'" value="'+costt+'" readonly style="border:none;">',
                btnn
              ]).draw(true);

              var oTable = $('#addMaterialsTablee').dataTable();
              var tblrows = oTable.fnGetData().length;
              var matID =  oTable.fnGetData();
              for (var i = 0; i < tblrows; i++) {

                var totalCost = matID[i][3] * $('#basePrice'+matID[i][0]).val()
                $('#matcost'+matID[i][0]).val(totalCost)

                totalCost = ''
              }
              for (var j = 0; j < tblrows; j++) {
                var totalCosting = parseInt($('#totCost').val()) + parseInt($('#matcost'+matID[j][0]).val())
                $('#totCost').val(totalCosting)
              }
              getMaterialVars();
        }
    });
  }
});

$(document).on('submit', '#purchase_form', function(e){
  e.preventDefault();
  table.column(0).visible(false);
  // var current = new Date();
  // var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
  var qty = [];
  var cost = [];
  var varia = [];
  var uomArr = [];
  var totalQty = [];
  var splitter = [];
  var oTable = $('#addMaterialsTablee').dataTable();
  var tblrowd = oTable.fnGetData().length;
  materialArr =  oTable.fnGetData();

  // var regex = /(\d+)/g;

  for(var i = 0; i<tblrowd; i++){
    splitter[i] = materialArr[i][1].split('-');
    qty[i] = $("#matqty"+materialArr[i][0]).val();
    cost[i] = $("#matcost"+materialArr[i][0]).val();
    varia[i] = materialArr[i][1].replace(/\D+/g, "");
    uomArr[i] = splitter[i][1].replace(/[^a-z]/ig, "");
    totalQty[i] = parseInt(materialArr[i][2]) + parseInt($("#matqty"+materialArr[i][0]).val());
    // alert(totalQty[i])
  }
  // alert(varia)
  // alert(uomArr)
  // alert(totalQty)
  $.ajax({
    type: "GET",
    url: '/transaction/purchase-max',
    success: function(data){
      var current = new Date();
      var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
      $.ajax({
        type: "POST",
        url: "/transaction/purchaseorder-add",
        data: {
          id: data,
          mat_data : materialArr,
          sup_id : $('#supplierselection').val(),
          sup_contact : $('#contactPerson').val(),
          pterm_id : $('#paymentTermSelect').val(),
          date_created : $('#orderDate').val(),
          mat_var : varia,
          mat_qty : qty,
          mat_cost : cost,
          uom : uomArr,
          total_qty : totalQty,
          created_at: today,
        },

        success: function(result) {
            window.location.href = '/transaction/purchaseOrder';
        }

      })
    },
    error: function(data){
      alert('ERROR IN MAX ID');
    }
  })
});

});

function removeProd(id){
  //Return value to dropdown
  var getDropdown = document.getElementById("matSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);

//Delete selected row
  $("#addMaterialsTablee").on('click', '.deleteRow', function(e){
    var table = $('#addMaterialsTablee').DataTable();
    table.row($(this).parents('tr')).remove().draw();
  });
}

function getMaterials(){
  $.ajax({
      url: '/transaction/mat-all',
      type: 'GET',
      success: function(data)
      {
        $("#matSelect").empty();
        var varDropdown = document.getElementById("matSelect");
         for (var i = 0; i < data.length; i++) {

          var opt = document.createElement("option");
          opt.text = data[i].strMaterialName +" "+ "-"+" "+"("+  data[i].variant.intVariantQty+ data[i].variant.unit.strUOMName+""+")";
          varDropdown.add(opt);
    }
      }
  });
}
function getMaterialVars(){
  var oTable = $('#addMaterialsTablee').dataTable();
  var tblrows = oTable.fnGetData().length;
  var matID =  oTable.fnGetData();

  for (var x = 0; x < tblrows; x++) {
    $.ajax({
        url: '/transaction/matvar-all',
        type: 'POST',
        data: {
          material_id : matID[x][0]
        },
        success: function(data)
        {
          // console.log(data)
          var oTable = $('#addMaterialsTablee').dataTable();
          var tblrows = oTable.fnGetData().length;
          var matID =  oTable.fnGetData();

          for(var i=0; i<tblrows; i++){
            var drpdwnId= "matvarSelect"+matID[i][0];
            $("#"+drpdwnId).empty();
            for (var k = 0; k < data.length; k++) {
              var getDropdownn = document.getElementById(drpdwnId);
              var opt = document.createElement("option");
              opt.text = data[k].intVariantQty+''+data[k].strUOMName;
              getDropdownn.add(opt);
            }
          }
      }
    });
  }
}

function computeTotalCost(){
  $('#totCost').val('0')
  var oTable = $('#addMaterialsTablee').dataTable();
  var tblrows = oTable.fnGetData().length;
  var matID =  oTable.fnGetData();

  for (var i = 0; i < tblrows; i++) {
  var tempCost = matID[i][2] + parseInt($('#matqty'+matID[i][0]).val())
  var totalCost = tempCost * parseInt($('#basePrice'+matID[i][0]).val())
  $('#matcost'+matID[i][0]).val(totalCost)

  tempCost = ''
  totalCost = ''
  }
  for (var j = 0; j < tblrows; j++) {
    var totalCosting = parseInt($('#totCost').val()) + parseInt($('#matcost'+matID[j][0]).val())
    $('#totCost').val(totalCosting)
  }
}
