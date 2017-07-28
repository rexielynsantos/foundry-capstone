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
    var inpt = "<input type='text' placeholder='blob'>";

    for (var j = 0; j < prodVal.length; j++) {
      $.ajax({
          url: "/transaction/cart",
          type: "POST",
          data: {
            prodct_data : prodVal[j]
          },
          success: function(data) {
            var btnn = "<button type='button' class='deleteRow' name='"+data[0].strProductName+"' onclick='removeProd(this.name)'>Remove</button>";
            $('#prodSelect option:selected').remove();
              table.row.add([
                data[0].strProductName,
                data[0].strProductTypeName,
                inpt,
                inpt,
                btnn
              ]).draw(true);
          }
    });
  }
  });

});

function removeProd(id){
  // alert(id);
  var getDropdown = document.getElementById("prodSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);
  $("#quoteTable").on('click', '.deleteRow', function(e){
    $(this).closest('tr').remove()
    var table = $('#quoteTable').DataTable();
    table.clear();
  });
}
