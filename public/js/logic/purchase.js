$(document).ready(function(){


var purchaseArr= [];
var tempID = '';
// $('#hiddenDiv').hide();



$("#supplierselection").change(function()
{
    var valu = $('#supplierselection').val();
    // alert(valu);


    $.ajax({
        url: '/transaction/Supplier',
        type: "POST",
        data: {
          supplier_name : valu
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

  var address = $('#street').val() + $('#brgy').val() +  $('#city').val();

  
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

$("#addCart").click(function(){
    var table = $('#addMaterialsTable').DataTable();
    var matVal = $('#matSelect').val();
    var inptQty = "<input type='text' placeholder='0'>";

    for (var j = 0; j < matVal.length; j++) {
      $.ajax({
          url: "/transaction/purchaseCart",
          type: "POST",
          data: {
            mat_data : matVal[j]
          },
          success: function(data) {

            // $('#hiddenDiv').show();

            var btnn = "<button type='button' name='"+data[0].strMaterialName+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
            $('#matSelect option:selected').remove();
              table.row.add([
                data[0].strMaterialName,
                data[0].intReorderQty+""+data[0].unit.strUOMName,
                inptQty,
                data[0].unit.strUOMName,
                btnn
              ]).draw(true);
          }

    });
  }
  });



  });












function removeProd(id){
  // alert(id);
  var getDropdown = document.getElementById("matSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);
  $("#addMaterialsTable").on('click', '.deleteRow', function(e){
    $(this).closest('tr').remove()
    var table = $('#addMaterialsTable').DataTable();
    table.clear();
  });
}

