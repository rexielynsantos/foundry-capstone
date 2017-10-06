$(document).ready(function(){

 var x='';
 var y='';

 var table = $('#stockTable').DataTable(
  {
    "searching": false,
    "ordering": false,
    "paging": false,
  });



$('#materialStocks').change(function()
	{

    // table.clear();
	
	var valu = $('#materialStocks').val();

    // table.column(0).visible(false);
      // table.clear().draw();

    $.ajax({
        url: '/transaction/materials-all',
        type: "POST",
        data: {
          	material_id : valu
        },
        success: function(data) {
          console.log(data);

          document.getElementById('selectMatName').innerHTML = data[0].strMaterialName;
          document.getElementById('selectMatDesc').innerHTML = data[0].strMaterialDesc;
          document.getElementById('selectMatReorderlvl').innerHTML = data[0].intReorderLevel;
          document.getElementById('selectMatReorderqty').innerHTML = data[0].intReorderQty+data[0].unit.strUOMName;
          document.getElementById('selectMatStatus').innerHTML = data[0].strStatus;
         
          for (var index = 0; index < data[0].materialsupplier.length; index++) {
            var element = data[0].materialsupplier[index].supplier.strSupplierName;
            x += '<li style="list-style-type:circle">'+element+'</li>'

             document.getElementById('selectMatSupName').innerHTML = x;
         
          }
          for (var index = 0; index < data[0].materialvariant.length; index++) {
            var elements = data[0].materialvariant[index].details.intVariantQty+"pcs";
            y += '<li style="list-style-type:circle">'+elements+'</li>'
                    
             document.getElementById('selectMatVariants').innerHTML = y;
        }
         var btnn = "<button type='button' data-toggle='modal' data-target='#receivingModal'  class='btn btn-primary' name='"+data[0].strMaterialID+"' onclick='getDeliveries(this.name);' > <i class='fa fa-eye'></i>&nbsp;View Deliveries</button>   <button type='button' data-toggle='modal' data-target='#requisitionModal'  class='btn btn-success' name='"+data[0].strMaterialID+"' onclick='getRequisitions(this.name);' > <i class='fa fa-eye'></i>&nbsp;View Requisitions</button>";
          table.row.add([
               "<b> Actions</b>",
               btnn,
              ]).draw(true);
        }


   });

          document.getElementById('selectMatName').innerHTML = "";
          document.getElementById('selectMatDesc').innerHTML = "";
          document.getElementById('selectMatReorderlvl').innerHTML = "";
          document.getElementById('selectMatReorderqty').innerHTML = "";
          document.getElementById('selectMatStatus').innerHTML = "";
          document.getElementById('selectMatSupName').innerHTML = "";
          document.getElementById('selectMatVariants').innerHTML = "";
      
});


});

function getDeliveries(id)
{
  var tableDel = $('#deliveryTable').DataTable();
     tableDel.clear().draw();
  tableDel.column(0).visible(false);
  $.ajax({
        url: '/transaction/receive-records',
        type: "POST",
        data: {
            material_id : id
        },
        success: function(data) {
       
          console.log(data);
          tableDel.row.add([
            data[0].strReceivePurchaseID,
            data[0].dtDeliveryReceived,
            data[0].strMaterialName,
            data[0].intQtyReceived,
            data[0].strPStatus,
            ]).draw(true);
        }

   });
}
function getRequisitions(id)
{
  var tableReq = $('#requisitionTable').DataTable();
  
  tableReq.column(0).visible(false);
  $.ajax({
        url: '/transaction/requisi-records',
        type: "POST",
        data: {
            material_id : id
        },
        success: function(data) {
          
          console.log(data);
          // tableReq.row.add([
          //   data[0].strReceivePurchaseID,
          //   data[0].dtDeliveryReceived,
          //   data[0].strMaterialName,
          //   data[0].intQtyReceived,
          //   data[0].strPStatus,
          //   ]).draw(true);
        }

   });
}