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



// $(document).on('submit', 'purchase_form', function(e)
// {
//   table.column(0).visible(false);
//   $('#matSelect' :'selected').each(function(i, selected)
//   {
//     purchaseArr[i] = $(selected).val();


//   });
//   e.preventDefault();

//   $.ajax({
//     type:POST,
//     data: {
//       material_data: purchaseArr, 
//       sup_id : $('#supplierselection').val(),
//       pterm_id : $('#paymentTermSelect').val();
//       purchase_id: tempID

//   },

//   success: function(result){
//       console.log(result);
//   }
// });


// });



  $(document).on('submit', '#purchase_form', function(e){
    table.column(0).visible(false);
    $('#matSelect :selected').each(function(i, selected){
      purchaseArr[i] = $(selected).val();
    });
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "/transaction/purchaseorder-add",
      data: {
          material_data: purchaseArr,
          sup_id : $('#supplierselection').val(),
          pterm_id : $('#paymentTermSelect').val(),
          purchase_id: tempID
      },
      success: function(result) {
        console.log(result);
      //   if(urlCode == '/maintenance/stage-update'){
      //     table.rows('tr.active').remove().draw();
      //     noty({
      //         type: 'success',
      //         layout: 'bottomRight',
      //         timeout: 3000,
      //         text: '<h4><center>Stage successfully updated!</center></h4>',
      //       });
      //   }else{
      //     noty({
      //         type: 'success',
      //         layout: 'bottomRight',
      //         timeout: 3000,
      //         text: '<h4><center>Stage successfully added!</center></h4>',
      //       });
      //   }

      //   //para mag fit sa data table
      //   var x='';
      //   for (var index = 0; index < result.substage.length; index++) {
      //     var element = result.substage[index].details1.strSubStageName;
      //     x += '<li style="list-style-type:circle">'+element+'</li>'
      //   }


      //   table.row.add([
      //     result.strStageID,
      //     result.strStageName,
      //     x,
      //     result.strStageDesc,
      //     ]
      //   ).draw(false);

      //   substageArr = [];

      //   $('#Stagemodal').modal('toggle');
      //   $('#btnEditStage').hide()
      //   $('#btnDeleteStages').hide()
      //   $('#btnAddStage').show()

      // },
      // error: function(result){
      //   $.ajax({
      //       url: '/maintenance/stage-status',
      //       type: 'POST',
      //       data: {
      //           stage_name: $('#stageName').val()
      //       },
      //       success: function(data)
      //       {
      //         var errors = result.responseJSON;
      //           if(errors == undefined){
      //             if(data[0].strStatus == 'Active'){
      //               noty({
      //                 type: 'error',
      //                 layout: 'bottomRight',
      //                 timeout: 3000,
      //                 text: '<h4><center>Stage name already exist!</center></h4>',
      //               });
      //             }
      //             else if(data[0].strStatus == 'Inactive'){
      //               $('#StageReactivateModal').modal();
      //             }
      //           }
      //       }
      //   });

      }
    });
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

