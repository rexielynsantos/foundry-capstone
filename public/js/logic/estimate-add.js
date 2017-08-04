$(document).ready(function(){
var table = $('#quoteTable').DataTable(
{
   "searching": false,
    "ordering": false,
    "paging": false,
  }
    );

  $("#addCart").click(function(){
    var table = $('#quoteTable').DataTable();
    var prodVal = $('#prodSelect').val();
    var inpt = "<input type='text'>";

    for (var j = 0; j < prodVal.length; j++) {
      $.ajax({
          url: "/transaction/cart",
          type: "POST",
          data: {
            prodct_data : prodVal[j]
          },
          success: function(data) {
            var btnn = "<button type='button' class='deleteRow' name='"+data[0].strProductName+"' onclick='removeProd(this.name)'>Remove</button>";
            var btn = "<button type='button' class='addVar' name='"+data[0].strProductName+"'onclick='addVari(this.name)'>Add Variant</button><br>";
            var inptt = "<input type='text' disabled id='"+data[0].strProductName+"'>";
            $('#prodSelect option:selected').remove();
              table.row.add([
                data[0].strProductName,
                data[0].strProductTypeName,
                inptt,
                inpt,
                btnn+" "+btn
              ]).draw(true);
          }
    });
  }
  });


$("#submitInfo").click(function(){

  compName = $("#companyName").val();
  st = $("#streetNum").val();
  br = $("#brgy").val();
  ct = $("#city").val();
  address = st+" Brgy. "+br+" "+ct;

  $("#compTo").val(compName);
  $("#confAddress").val(address);
});

});

function removeProd(id){
  //Return value to dropdown
  var getDropdown = document.getElementById("prodSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);

//Delete selected row
  $("#quoteTable").on('click', '.deleteRow', function(e){
    $(this).closest('tr').remove()
    var table = $('#quoteTable').DataTable();
    table.clear();
  });
}

function addVari(variantadd){

  $.ajax({
    type: "POST",
    url: "/transaction/submitOrder",
    data: {
        prodName: variantadd
    },
    success: function(data) {
      // console.log(data);
      for (var i = 0; i < data.length; i++) {
        var varDropdown = document.getElementById("prodVarSelect");
        var opt = document.createElement("option");
        opt.text = data[i].intVariantQty;
        varDropdown.add(opt);
      }
      $('#varModal').modal('show');
    },
    error: function(data) {
        alert("There's no variant available for this product");
    }
  });
  $("#prodvarAdd").click(function(){
    console.log(varValue);
    var varValue = $("#prodVarSelect").val();
    $("#"+variantadd).val(varValue);
    $('#varModal').modal('hide');
  });
}
