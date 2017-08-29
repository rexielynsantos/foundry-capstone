$(document).ready(function (){
var table = $('#viewAndUpdateQuoteTable').DataTable();
var table2 = $('#addJOTable').DataTable();
var table3 = $('#tblQuote').DataTable();
var generateArr = [];
table.column(0).visible(false);
table2.column(0).visible(false);
table3.column(0).visible(false);

$.ajax({
    url: "/transaction/estimate-table",
    type: "GET",
    success: function(data) {
      // console.log(data)
      for (var i = 0; i < data.length; i++) {
        if (data[i].strStatus == 'Pending') {
          var btnViewQuote = '<button class="btn btn-primary viewQuote" disabled> <i class="fa fa-eye"></i>&nbsp; View Quote</button>'
          var btnApprove = '<button type="button" class="btn btn-primary approve">Approve</button>'
          var btnEdit = '<button type="button" class="btn btn-primary" id="'+data[i].strQuoteRequestID+'" onclick="editQuote(this.id)">Edit</button>'


            table3.row.add([
              data[i].strQuoteRequestID,
              data[i].strCompanyName,
              data[i].strCustCity,
              data[i].strCustContactPerson,
              data[i].strStatus,
              btnViewQuote+" "+btnApprove+" "+btnEdit
            ]).draw(true);
          }
        else if(data[i].strStatus == 'Approved'){
          btnViewQuote = '<button class="btn btn-primary viewQuote"> <i class="fa fa-eye"></i>&nbsp; View Quote</button>'
            table3.row.add([
              data[i].strQuoteRequestID,
              data[i].strCompanyName,
              data[i].strCustCity,
              data[i].strCustContactPerson,
              data[i].strStatus,
              btnViewQuote
            ]).draw(true);
          }
        }
      }//END OF SUCCESS FUNCTION
});

});
var quoteID = ''
$("#tblQuote").on('click', '.viewQuote', function(e){
  var viewQuoteArr = [];
  var table = $('#tblQuote').DataTable();
  var table1 = $('#viewAndUpdateQuoteTable').DataTable();

  viewQuoteArr = table.row($(this).parents('tr')).data();

  $.ajax({
      url: "/transaction/modalInfos",
      type: "POST",
      data: {
        quote_id : viewQuoteArr[0],
      },
      success: function(data) {
        // console.log(data)
          // alert(i)
          table1.clear().draw();
          $('#quoteID').val(data[0].strQuoteRequestID);
          $('#companyName').val(data[0].strCompanyName);
          $('#custStreet').val(data[0].strCustStreet+" "+data[0].strCustBrgy);
          $('#custCity').val(data[0].strCustCity);
          $('#contactPerson').val(data[0].strCustContactPerson);

        $('#viewAndUpdateQuoteModal').modal('show')
      }
  });

  // AJAX FOR MODAL TABLE INFOS
            $.ajax({
                url: "/transaction/estimate-modalTable",
                type: "POST",
                data: {
                  quote_id : viewQuoteArr[0],
                },
                success: function(result) {
                  // console.log(result)
                  if (result.length != 0) {
                    for (var i = 0; i < result.length; i++) {
                      table.row.add([
                        result[i].strProductID,
                        result[i].strProductName,
                        result[i].intVariantQty+""+result[i].strUOMName,
                        result[i].intOrderQty,
                        "<div class='box-header'><h4 class='box-title'><a data-toggle='collapse' data-parent='#accordion' href='#collapseTwo' class='generate' id ='"+result[i].strProductID+"' onclick='generate()'>Generate Job Order</a></h4></div>"
                      ]).draw(true);
                    }
                  }
                  else{
                    for (var i = 0; i < result.length; i++) {
                      table.row.add([
                        result[i].strProductID,
                        result[i].strProductName,
                        result[i].intVariantQty+""+result[i].strUOMName,
                        result[i].intOrderQty,
                        '<h4 style="color:green;" class="box-title">Job Order Generated</h4>'
                      ]).draw(true);
                    }
                  }
                }
          }); //END OF AJAX FOR MODAL TABLE
quoteID = viewQuoteArr[0]
});//END OF VIEWQUOTE CLASS


function generate(){
  $("#viewAndUpdateQuoteTable").on('click', 'td', function(e){
    generateArr = [];
    var table2 = $('#addJOTable').DataTable();
    var table1 = $('#viewAndUpdateQuoteTable').DataTable();

    table2.clear().draw();

//GET VARIANCE CODE VALUES FOR DROPDOWN
    $.ajax({
        url: "/transaction/estimate-variance",
        type: "GET",
        success: function(data) {
          // console.log(data)
          var varianceDropdown = document.getElementById('generateVarCode')

          for (var i = 0; i < data.length; i++) {
            var o1 = new Option(data[i].strVarianceCode,data[i].strMatSpecID);
            varianceDropdown.options[varianceDropdown.options.length] = o1;
            o1.setAttribute(data[i].strVarianceCode,data[i].strMatSpecID);
          }
        }
  });
//END OF VARIANCE CODE GET

    var generateArr = table1.row($(this).parents('tr')).data();
    table2.row.add([
      generateArr[0],
      generateArr[1]+"("+generateArr[2]+")",
      generateArr[3],
      "<input type='text' id='generateRemarks' placeholder='....'>",
      "<button type='button' id='generateJobOrder' onclick='submitGenerate()' class='btn bg-blue btn-flat pull-right'><i class='glyphicon glyphicon-ok'></i></button>"
    ]).draw(true);
  });

}

function submitGenerate(){
  $("#addJOTable").on('click', 'td', function(e){
  var table1 = $('#viewAndUpdateQuoteTable').DataTable();
  var table2 = $('#addJOTable').DataTable();
  var submitGenerateArr = table2.row($(this).parents('tr')).data();
  var generated = [];

  var tbl = $('#addJOTable').dataTable();
  generated =  tbl.fnGetData();
  // alert(generated[0][0])
  var html = '<h4 style="color:green;" class="box-title">Job Order Generated</h4>';
  $('#'+generated[0][0]).replaceWith(html);
    $.ajax({
      url: "/transaction/submitGenerate",
      type: "POST",
      data: {
        quote_id : quoteID,
        matspec_id : $('#generateVarCode').val(),
        prod_id : submitGenerateArr[0]
      },
      success: function(data) {
        alert("Job order generated successfully!")
      }
    });
  });
}

function editQuote(quoteRequestID){
  $.ajax({
    url: "/transaction/quoteRequest-edit",
    type: "POST",
    data: {
      quote_id : quoteRequestID,
    },
    success: function(data) {
      window.location.href = '/transaction/estimate-add'
    }
  });
}
