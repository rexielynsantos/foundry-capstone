$(document).ready(function(){

  var supID = $('#supID').val();
  var purID = $('#purchaseID').val()
  // alert(supID)
  $.ajax({
    url: '/transaction/purchase-final-read',
    type: 'POST',
    data : {
      supplier_id : supID,
      purchase_id : purID
    },
    success: function(supplier)
    {
      // console.log(suppler)
      $('#supName').val(supplier.strSupplierName);
      $('#supAddress').val(supplier.strSupStreet+" "+supplier.strSupBrgy);
      $('#supCity').val(supplier.strSupCity);
      $('#contactPerson').val(supplier.strSupplierContactPerson)
    }

  });


  $.ajax({
    type: "POST",
    url: "/transaction/purchase-table-read",
    data: {
        purchase_id : purID
    },
    success: function(data) {
      console.log(data)

      for (var i = 0; i < data.length; i++) {
        table.row.add([
          data[i].strMaterialName,
          data[i].intVariantQty+""+data[i].strUOMName,
          data[i].dblAddlQty+"pcs",
          data[i].dblMaterialCost+"pesos",
        ]).draw(true);
      }

    }
  });

});
