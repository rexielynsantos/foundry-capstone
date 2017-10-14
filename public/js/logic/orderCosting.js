$(document).ready(function(){
  var tbl = $('#varianceTable').DataTable({
  "searching": false,
  "ordering": false,
  "paging": false,
  "bInfo": false
  });

//AJAX GET AND DISPLAY MAX ID
  $.ajax({
    type: 'GET',
    url: '/transaction/order-costing-max',
    success: function(data){
        console.log(data);
      $('#maxCosting').text(data);
    },
    error: function(data){
        alert('ERROR IN MAX ID');
    }
  });

//AJAX GET CUSTOMERS
  $.ajax({
      url: '/maintenance/customer-get',
      type: 'GET',
      success: function(customer)
      {
        $("#selectCustomer").empty();
        $(`<option value='0'>Select Customer</option>`).appendTo("#selectCustomer");
        for(var i = 0; i < customer.length; i++)
        {
          $(`<option value=`+customer[i].strCustomerID+`>`+customer[i].strCompanyName+`</option>`).appendTo("#selectCustomer");
        }
      }
  });

//AJAX GET PRODUCTS
  $.ajax({
      url: '/maintenance/customer-product-get',
      type: 'GET',
      success: function(product)
      {
        $("#productSelect").empty();
        $(`<option value='0'>Select Product</option>`).appendTo("#productSelect");
        for(var i = 0; i < product.length; i++)
        {
          $(`<option value=`+product[i].strProductID+`>`+product[i].strProductName+`</option>`).appendTo("#productSelect");
        }
      }
  });


  $('#productSelect').change(function(){
    $.ajax({
        url: '/maintenance/customer-variance-get',
        type: 'POST',
        data: {
          product_id : $('#productSelect').val()
        },
        success: function(variance)
        {
          if (variance != '') {
            $("#prodVarianceSelect").empty();
            $(`<option value='0'>Select Variance</option>`).appendTo("#prodVarianceSelect");
            for(var i = 0; i < variance.length; i++)
            {
              $(`<option value=`+variance[i].strMatSpecID+`>`+variance[i].strVarianceCode+`</option>`).appendTo("#prodVarianceSelect");
            }
          }
          else {
            alert('No variance for this product')
            $("#prodVarianceSelect").empty();
            $(`<option value='0'>Select Variance</option>`).appendTo("#prodVarianceSelect");
          }
        }
    });
  });

  $('#prodVarianceSelect').change(function(){
    tbl.clear().draw();
    tbl.column(0).visible(false);
    $.ajax({
        url: '/transaction/variance-info',
        type: 'POST',
        data: {
          variance_code : $('#prodVarianceSelect').val()
        },
        success: function(result)
        {
          console.log(result);
          if (result[0].strMaterialName != null) {
            for (var i = 0; i < result.length; i++) {
              tbl.row.add([
                result[i].strMaterialID,
                result[i].strMaterialName,
                '<select id="uomSelect'+result[i].strMaterialName.replace(/ /g, '')+'" style="width: 100%;" class="select2" required></select>',
                '<input type="number" id="unitCost'+result[i].strMaterialName.replace(/ /g, '')+'" onkeyup="totalCost()" required placeholder="0.00">',
                '<input type="number" id="usage'+result[i].strMaterialName.replace(/ /g, '')+'" required onkeyup="totalCost()" placeholder="0.0000">',
                '<input type="number" id="cost'+result[i].strMaterialName.replace(/ /g, '')+'" readonly style="border:none;">',
              ]).draw(true);
            }
          }
          else{
            alert('There`s no material in this variance code')
          }

          //AJAX GET UOM
            $.ajax({
                url: '/maintenance/costing-uom-get',
                type: 'GET',
                success: function(uom)
                {
                  var uomArr = [];
                  var table = $('#varianceTable').dataTable();
                  var tblrowd = table.fnGetData().length;
                  uomArr =  table.fnGetData();
                  for (var i = 0; i < tblrowd; i++) {
                    $("#uomSelect"+uomArr[i][1].replace(/ /g,'')).empty();
                    for (var j = 0; j < uom.length; j++) {
                      $(`<option value=`+uom[j].strUOMID+`>`+uom[j].strUOMName+`</option>`).appendTo("#uomSelect"+uomArr[i][1].replace(/ /g,''));
                    }
                  }
                }
            });
        }
    });

  });

  $(document).on('submit', '#costing_form', function(e){
    var submitUomArr = [];
    var varianceTableArr = [];
    var unitCostArr = [];
    var usageArr = [];
    var costArr = [];
    var matspecArr = [];
    var table = $('#varianceTable').dataTable();
    var tblrows = table.fnGetData().length;
    varianceTableArr =  table.fnGetData();

    for (var i = 0; i < tblrows; i++) {
      unitCostArr[i] = $("#unitCost"+varianceTableArr[i][1].replace(/ /g,'')).val()
      usageArr[i] = $("#usage"+varianceTableArr[i][1].replace(/ /g,'')).val()
      costArr[i] = $("#cost"+varianceTableArr[i][1].replace(/ /g,'')).val()
      submitUomArr[i] = $("#uomSelect"+varianceTableArr[i][1].replace(/ /g,'')).val()
      matspecArr[i] = varianceTableArr[i][0]
    }

    e.preventDefault();
    var current = new Date();
    var today = current.getFullYear() + '-' + current.getMonth() + '-' + current.getDate() + ' ' + current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();
    $.ajax({
        url: '/transaction/costing-submit',
        type: 'POST',
        data: {
          id: $('#maxCosting').text(),
          created_at: today,
          customer_id : $("#selectCustomer").val(),
          product_id : $("#productSelect").val(),
          spGravity : $('#spGravity').val(),
          surfaceArea : $('#surfaceArea').val(),
          volume : $('#volume').val(),
          weightNon : $('#weightNon').val(),
          weightFilled : $('#weightFilled').val(),
          soluble : $('#soluble').val(),
          reclaimed : $('#reclaimed').val(),
          asMetal : $('#asMetal').val(),
          runnerType : $('#runnerType').val(),
          area : $('#area').val(),
          svolume : $('#svolume').val(),
          weight : $('#weight').val(),
          sprue : $('#sprue').val(),
          cluster : $('#cluster').val(),
          wax : $('#wax').val(),
          asMetal : $('#asMetal').val(),
          pcsPerCluster : $('#pcsPerCluster').val(),
          atInjection : $('#atInjection').val(),
          atAssembly : $('#atAssembly').val(),
          atCoating : $('#atCoating').val(),
          atCasting : $('#atCasting').val(),
          unit_cost : unitCostArr,
          usage : usageArr,
          cost : costArr,
          uom : submitUomArr,
          matspec : matspecArr,
          matspec_id : $('#prodVarianceSelect').val()
        },
        success: function()
        {
          $('#modalCostAdded').modal({
            backdrop: 'static',
            keyboard: false
          })
          $('#modalCostAdded').modal('show');
        }
    });
  });

  $('#changetabbutton').click(function(e){
    e.preventDefault();
    var custSelect = $('#selectCustomer').val()
    var prodSelect = $('#productSelect').val()
    var spGravity = $('#spGravity').val()
    if (custSelect == 0 && prodSelect == 0 && spGravity == '') {
      noty({
        type: 'error',
        layout: 'bottomRight',
        timeout: 3000,
        text: '<h4><center>Fill up required fields</center></h4>',
      });
    }
    else {
      $('#mytabs a[href="#tab_2"]').tab('show');
      $('#tab2').removeClass('disabled');
    }
  })
  $('#changetabbutton1').click(function(e){
    e.preventDefault();
    var surfaceArea = $('#surfaceArea').val()
    var volume = $('#volume').val()
    var spGravity = $('#spGravity').val()
    if (surfaceArea == '' && volume == '') {
      noty({
        type: 'error',
        layout: 'bottomRight',
        timeout: 3000,
        text: '<h4><center>Fill up required fields</center></h4>',
      });
    }
    else {
      $('#mytabs a[href="#tab_3"]').tab('show');
      $('#tab3').removeClass('disabled');
    }
  })
  $('#changetabbutton2').click(function(e){
    e.preventDefault();
    var runnerType = $('#runnerType').val();
    var area = $('#area').val();
    var svolume = $('#svolume').val();
    var weight = $('#weight').val();
    var sprue = $('#sprue').val();
    var cluster = $('#cluster').val();
    var wax = $('#wax').val();
    var asMetal = $('#asMetal').val();
    var pcsPerCluster = $('#pcsPerCluster').val();
    var atInjection = $('#atInjection').val();
    var atAssembly = $('#atAssembly').val();
    var atCoating = $('#atCoating').val();
    var atCasting = $('#atCasting').val();
    if (runnerType == '' && area == '' && svolume == '' && weight == '' && sprue == '' && cluster == '' && wax == '' && asMetal == '' && pcsPerCluster == '' && atInjection == '' && atAssembly == '' && atCoating == '' && atCasting == '') {
      noty({
        type: 'error',
        layout: 'bottomRight',
        timeout: 3000,
        text: '<h4><center>Fill up required fields</center></h4>',
      });
    }
    else {
      $('#tab3').removeClass('disabled');
      $('#tab4').removeClass('disabled');
      $('#mytabs a[href="#tab_4"]').tab('show');
    }
  })

  $('#spGravity').keyup(function(){
    var specGrave = $('#spGravity').val()
    if (specGrave == '1.77') {
      $('#steelEquiv').val('Magnesium')
    }
    else if (specGrave == '2.70') {
      $('#steelEquiv').val('Aluminum')
    }
    else if (specGrave == '4.51') {
      $('#steelEquiv').val('Titanium')
    }
    else if (specGrave == '6.92') {
      $('#steelEquiv').val('Chromium')
    }
    else if (specGrave == '7.14') {
      $('#steelEquiv').val('Zinc')
    }
    else if (specGrave == '7.30') {
      $('#steelEquiv').val('Tin')
    }
    else if (specGrave == '7.70') {
      $('#steelEquiv').val('Stainless Steel (Type 410)')
    }
    else if (specGrave == '7.87') {
      $('#steelEquiv').val('Iron/Steel')
    }
    else if (specGrave == '7.90') {
      $('#steelEquiv').val('Stainless Steel (Type 304')
    }
    else if (specGrave == '8.39') {
      $('#steelEquiv').val('Muntz Metal')
    }
    else if (specGrave == '8.53') {
      $('#steelEquiv').val('Cartridge Brass')
    }
    else if (specGrave == '8.80') {
      $('#steelEquiv').val('Commercial Bronze')
    }
    else if (specGrave == '8.83') {
      $('#steelEquiv').val('Monel')
    }
    else if (specGrave == '8.90') {
      $('#steelEquiv').val('Nickel')
    }
    else if (specGrave == '8.95') {
      $('#steelEquiv').val('Nickel Silver')
    }
    else if (specGrave == '8.96') {
      $('#steelEquiv').val('Cooper')
    }
    else if (specGrave == '10.49') {
      $('#steelEquiv').val('Silver')
    }
    else if (specGrave == '11.34') {
      $('#steelEquiv').val('Lead')
    }
    else if (specGrave == '19.32') {
      $('#steelEquiv').val('Gold')
    }
  });

  $('#goBack').click(function(){
    window.location.href= '/transaction/order-costing';
  });

});

function totalCost()
{
  // alert('asd')
  var initialCost = [];
  var usageOfMaterial = [];
  var totalCostt = [];
  var table = $('#varianceTable').dataTable();
  var tblrowd = table.fnGetData().length;
  costingArr =  table.fnGetData();

  for (var i = 0; i < tblrowd; i++) {
    initialCost[i] = $('#unitCost'+costingArr[i][1].replace(/ /g, '')).val()
    usageOfMaterial[i] = $('#usage'+costingArr[i][1].replace(/ /g, '')).val()
    totalCostt[i] = initialCost[i] * usageOfMaterial[i]
    $('#cost'+costingArr[i][1].replace(/ /g, '')).val(totalCostt[i])
    // alert(initialCost)
    // alert(usageOfMaterial)
  }
  initialCost = ''
  usageOfMaterial = ''
  totalCostt = ''
}
