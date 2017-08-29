$(document).ready(function(){



function getMaterialVar(){
    $("#matvarSelect").empty();
    $.ajax({
        url: '/transaction/matvariant-all',
        type: 'GET',
        success: function(data)
        {
          // console.log(data)
          var table = document.getElementById('receiveMatsTable');
          var total = table.rows.length;
          for(var i=0; i<total; i++){
            var index = i + 1;
              if(i > 0){
                  var drpdwnId= "matvarSelect"+i;
                  $("#"+drpdwnId).empty();
                  for (var k = 0; k < data.length; k++) {
                    var getDropdown = document.getElementById(drpdwnId);
                    console.log(getDropdown);
                    var opt = document.createElement("option");
                    opt.text = data[k].intVariantQty+data[k].strUOMName;

                    getDropdown.add(opt);
                  }
              }
          }
      }
    });
  }

var table =$('#receiveMatTable').DataTable(
	{
	"searching": false,
	"ordering": false,
	"paging": false,
	});

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

$("#btnAddReceive").click(function(){
  location.href = './receive-add'
    $("#receive_form").find('.has-error').removeClass("has-error");
    $("#receive_form").find('.has-success').removeClass("has-success");
    $('#receive_form').find('.form-control-feedback').remove();

    document.getElementById("receive_form").reset();
    document.getElementById('receive_form').action = "{{URL::to('/transaction/receiving-add')}}";
  });

$('#refSelect').change(function(){

   // alert($('#refSelect').val())
      $.ajax({
            url: '/transaction/receive-supplier',
            type: 'GET',
            data: {
              purchase_id: $('#refSelect').val()
            },
            success: function(data)
            {
              $("#supplierSelect").empty();
              if(data['supplier'].length == 0){
                $(`<option value="first" selected disabled>No supplier to be selected</option>`).appendTo("#supplierSelect");
              }
              else{
                $(`<option value="first" selected disabled>Select a Supplier</option>`).appendTo("#supplierSelect");

                for(var i = 0; i < data['supplier'].length; i++)
                {
                  $(`<option value=`+data['supplier'][i].strSupplierID+`>`+data['supplier'][i].strSupplierName+`</option>`).appendTo("#supplierSelect");
                }
              }


              $("#matReceiveSelect").empty();
              for(var i = 0; i < data['material'].length; i++)
                {
                  $(`<option value=`+data['material'][i].strMaterialID+`>`+data['material'][i].strMaterialName+`</option>`).appendTo("#matReceiveSelect");
                }

            },
            error: function(result)
            {
              alert('ERRRORRRR');

            },

        });
    // }
  });


var tablee = $('#receiveMatsTable').DataTable(
   {
     "searching": false,
     "ordering": false,
     "paging": false,
     "bInfo" : false,
  }
  );

$("#addCarts").click(function(){
    var matVal = $('#matReceiveSelect').val();
    tablee.column(0).visible(false);
    for (var j = 0; j < matVal.length; j++) {
      $.ajax({
          url: "/transaction/receiveCart",
          type: "POST",
          data: {
            mats_data : matVal[j]
          },
          success: function(data)

           {

            getMaterialVar();
            console.log(data)
            var oTable = $('#receiveMatsTable').dataTable();
            var tblrows = oTable.fnGetData().length;
            var row = tblrows+1;
            var btnn = "<button type='button' id = 'btnTrash' class='deleteRow btn btn-danger' name='"+data[0].strMaterialName+"'><i class='fa fa-trash'></i></button>";
            $('#matReceiveSelect option:selected').remove();
              tablee.row.add([
                data[0].strMaterialID,
                data[0].strMaterialName,
                '<select id="matvarSelect'+row+'" class="form-control select2"></select>',
                '<input type="number" id="matqty'+row+'" placeholder="0">',
                // data[0].strUOMID,
                btnn
              ]).draw(true);
              // $("#matSelect").val(null).change();
              // $('matqty').val('');

          }

    });
  }
  });


$(document).on('submit', '#receive_form', function(e){
  table.column(0).visible(false);
  var qty = [];
  var varia = [];
  var uomArr = [];
  var oTable = $('#receiveMatsTable').dataTable();
  var tblrowd = oTable.fnGetData().length;
  materialArr =  oTable.fnGetData();

  // var regex = /(\d+)/g;

  // for(var i = 0; i<tblrowd; i++){
  //   var x = i+1;
  //   qty[i] = $("#matqty"+x).val();
  //   varia[i] = $("#matvarSelect"+x).val().replace(/\D/g, "");
  //   uomArr[i] = $("#matvarSelect"+x).val().replace(/[^a-z]/gi, "");
  // }
    for(var i = 0; i<tblrowd; i++){
    var x = i+1;
    qty[i] = $("#matqty"+x).val();
    varia[i] = $("#matvarSelect"+x).val().replace(/\D/g, "");
    uomArr[i] = $("#matvarSelect"+x).val().replace(/[^a-z]/gi, "");
  }

   e.preventDefault();

    $.ajax({
      type: "POST",
      url: "/transaction/receiving-add",
      data: {
        purchase_id : $('#refSelect').val(),

        date_delivered : $('#datepicker').val(),

        date_delivered : $('#to').val(),

        mat_data : materialArr,
        mat_var : varia,
        mat_qty : qty,
        uom : uomArr
        // mat_var : varia,
        // mat_qty : qty,
        // uom : uomArr

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

    });
});



});
