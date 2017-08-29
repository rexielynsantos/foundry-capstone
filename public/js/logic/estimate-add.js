$(document).ready(function(){
var table = $('#quoteTable').DataTable(
{
   "searching": false,
    "ordering": false,
    "paging": false,
  }
    );
var variantTable = $('#variantQtyTable').DataTable({
   "searching": false,
    "ordering": false,
    "paging": false,
  });

var urlCode = ''

if ($('#companyName').val() == '') {
  urlCode = "/transaction/quoteSubmit"
}
else{
  urlCode = "/transaction/update-quote"

  var qID = $('#quoteIDHeader').val()
  var html = '<h4 class="box-title" style="font-weight:bold;">Quote No. '+qID+'</h4>';
  $('#header').replaceWith(html);
}

  $.ajax({
    url: '/transaction/getProducts',
    type: 'GET',
    success: function(productDropdown)
    {
      console.log(productDropdown);
      if (productDropdown) {
        $("#prodSelect").empty();
        for(var i = 0; i < productDropdown.length; i++)
        {
          $(`<option>`+productDropdown[i].strProductName+`</option>`).appendTo("#prodSelect");
        }
      }

    }
  });

  $("#prodSelect").change(function(){
    var prodVal = $('#prodSelect').val();
    document.getElementById('prodCount').innerHTML = "You chose "+prodVal.length+" products";
  });

  $("#addCart").click(function(){
    var table = $('#quoteTable').DataTable();
    var prodVal = $('#prodSelect').val();
    document.getElementById('prodCount').innerHTML = "";
    table.column(0).visible(false);

    for (var j = 0; j < prodVal.length; j++) {
      $.ajax({
          url: "/transaction/cart",
          type: "POST",
          data: {
            prodct_data : prodVal[j]
          },
          success: function(data) {
            var btnn = "<button type='button' class='deleteRow' name='"+data[0].strProductName+"' onclick='removeProd(this.name)'><i class='fa fa-trash'></i></button>";
            var btn = "<button type='button' class='addVar' name='"+data[0].strProductName+"'onclick='addVari(this.name)'><i class='fa fa-plus'></i></button><br>";
            var inptt = "<textarea disabled id='"+data[0].strProductName.replace(/ /g,'')+"' style='border:none; overflow:hidden; resize:none; background-color:white;'></textarea>";
            var inpt = "<input type='text' id='"+data[0].strProductID+"'>";
            var varianceSelect = '<select class="" id="variance'+data[0].strProductID+'"></select>',
            var prodCost = "<input type='text' id='cost"+data[0].strProductID+"'>";
            // alert(data[0].strProductName.replace(/ /g,''));
            $('#prodSelect option:selected').remove();
              table.row.add([
                data[0].strProductID,
                data[0].strProductName,
                data[0].strProductTypeName,
                inptt,
                varianceSelect,
                inpt,
                btnn+" "+btn
              ]).draw(true);
          }
    });
  }
  });


$("#submitInfo").click(function(){
     var x = document.getElementById('hiddenFirst')
      $(".hideable").fadeIn("slow");
   // x.style.display='block';
  compName = $("#companyName").val();
  st = $("#streetNum").val();
  br = $("#brgy").val();
  ct = $("#city").val();
  address = st+" "+br+" "+ct;

  $("#compTo").val(compName);
  $("#confAddress").val(address);

});

$(document).on('submit', '#estimate_form', function(e){

  var submitArr = [];
  var idArr = [];
  var prodvarArr = [];
  var submitProdVar = [];
  var submitProdQty = [];
  var submitQty = [];
  var varQty = [];
  var uomName = [];
  var tempArr = [];
  var finalArr = [];
  var table = $('#quoteTable').dataTable();
  var tblrowd = table.fnGetData().length;
  submitArr =  table.fnGetData();

  compName = $("#companyName").val();
  st = $("#streetNum").val();
  br = $("#brgy").val();
  ct = $("#city").val();
  address = st+" "+br+" "+ct;
  email = $('#custEmail').val();
  contact = $('#cust_contact').val();
  contactPerson = $('#contactPerson').val();
  quoteNote = $('#quoteNote').val();

  // alert(compName)
  // alert(address)
  // alert(email)
  // alert(contact)
  // alert(contactPerson)
  // alert(quoteNote)

  // alert(submitArr)
  for (var i = 0; i < tblrowd; i++) {
    var tempID = submitArr[i][0];
    idArr[i] = $('#'+tempID).val();
  }

  for (var i = 0; i < tblrowd; i++) {
    var tempProdID = submitArr[i][1];
    prodvarArr[i] = $('#'+tempProdID.replace(/ /g,'')).val().split(/\n/);
    var regex = /(\d+)/g;

//ITERATE THROUGH THE VARIANT ARRAY AND SPLIT VARIANT FROM QUANTITY THEN PUT IT TO ANOTHER ARRAY WITH OBJECT
    for (var j = 0; j < prodvarArr[0].length-1; j++) {
      tempArr[j] = prodvarArr[i][j].split("--");
      finalArr[j] = {
        qty : tempArr[j][0],
        um : tempArr[j][1]
      };
    }

    for (var k = 0; k < finalArr.length; k++) {
      submitProdVar[i] = finalArr[k].qty.replace(/\D/g, "");
      submitProdQty[i] = finalArr[k].qty.replace(/[^a-z]/gi, "");
      submitQty[i] = finalArr[k].um.match(regex);
    }
  }
  // alert(submitProdVar)
  // alert(submitProdQty)
  // alert(submitQty)
  e.preventDefault();
  $.ajax({
      url: urlCode,
      type: "POST",
      data: {
        company_name : compName,
        street : st,
        brgy : br,
        city : ct,
        email : email,
        contact_no : contact,
        contact_person : contactPerson,
        quote_note : quoteNote,
        prod_id : submitArr,
        remrks : idArr,
        var_qty : submitProdVar,
        uom_name : submitProdQty,
        qty : submitQty
      },
      success: function(data) {
        window.location.href="/transaction/estimate-final";
        // alert("tagumpay")
      }
});
});

$("#prodvarAdd").click(function(){
  var idd = staydata.replace(/ /g,'');
  var qty = [];
  var varArr = [];
  var oTable = $('#variantQtyTable').dataTable();
  var tblrowd = oTable.fnGetData().length;
  varArr =  oTable.fnGetData();

  if (varArr != '') {
      var x='';

      for(var i = 0; i<tblrowd; i++){
        var y = i+1;
        qty[i] = $("#qty"+y).val();
      }

      for (var index = 0; index < tblrowd; index++) {
        var element = varArr[index][0]+"--"+qty[index]+"pcs";
        x += element+"\n"
      }
      // alert(x)
      for (var indx = 0; indx < tblrowd; indx++) {
        $("#"+idd).val(x);
      }
        $('#varModal').modal('hide');
        var table2 = $('#variantQtyTable').DataTable();
        table2.clear().draw();
  }
  else {
    $('#varModal').modal('hide');
  }

});

$('#varqtyAdd').click(function(){
  var varValue = $("#prodVarSelect").val();
  var idd = staydata.replace(/ /g,'');
  var elemId = 0;
  var pcs = "pcs";
  var elementId = elemId + 1;
  $('#prodVarSelect option:selected').remove();
  for (var i = 0; i < varValue.length; i++) {
    variantTable.row.add([
      varValue[i],
      "<input type='number' id='qty"+elementId+"'>",
      pcs,
      "<button type='button' class='deletevarRow' name='"+varValue[i]+"' onclick='removeVari(this.name)'>Remove</button>"
    ]).draw(true);
    elementId = elementId + 1;
  }

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
    var table = $('#quoteTable').DataTable();
    table.row($(this).parents('tr')).remove().draw();
  });
}

function removeVari(id){
  //Return value to dropdown
  var getDropdown = document.getElementById("prodVarSelect");
  var opt = document.createElement("option");
  opt.text = id;
  getDropdown.add(opt);

//Delete selected row
  $("#variantQtyTable").on('click', '.deletevarRow', function(e){
    $(this).closest('tr').remove()
    var table = $('#variantQtyTable').DataTable();
    table.clear();
  });
}

var staydata = '';

function addVari(variantadd){
  // var table = $('#variantQtyTable').DataTable();
  // table.empty();
  $.ajax({
    type: "POST",
    url: "/transaction/submitOrder",
    data: {
        prodName: variantadd
    },
    success: function(data) {
      // console.log(data);
      $("#prodVarSelect").empty();
      for (var i = 0; i < data.length; i++) {
        var varDropdown = document.getElementById("prodVarSelect");
        var opt = document.createElement("option");
        opt.text = data[i].intVariantQty+data[i].strUOMName;
        varDropdown.add(opt);
      }
      $('#varModal').modal('show');
    },
    error: function(data) {
        alert("There's no variant available for this product");
    }
  });
  staydata = variantadd;
}
