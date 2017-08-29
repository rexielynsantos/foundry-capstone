$(document).ready(function(){
	var table =  $('#inspectTable').DataTable({
	  "searching": false,
	  "ordering": false,
	  // "paging": false,
	});

	var id = '';
	var pid = '';
	var partName = '';
    var row = '';
    var insp = '';

	$('#inspectTable tbody').on('click', '#btnAddInspection', function () {
		var data = table.row( $(this).closest('tr') ).data();
        row = $(this).parent().parents('tr');
        $('#addInspectionModal').modal('show');
		id =  data[0];
		pid = data[1];
		partName = data[2];
		$('#apartName').val(data[2]);
		$('#rpartName').val(data[2]);
        
        $.ajax({
            url: '/transaction/inspection-edit',
            type: 'POST',
            data: {
                insp_id: id
            },
            success: function(data){
                insp = '';
                if(data.strEmployeeID == null){
                    $('#personnelAssigned').val('first');
                }
                else{
                    $('#personnelAssigned').val(data.strEmployeeID).change();
                }
                insp = data.forInspection;
                $('#inspectTime').val(data.timeInspected);
                $('#ahardness').val(data.intAcceptHardness);
                $('#ainspectQty').val(data.intAcceptQty);
                $('#rhardness').val(data.intReworkHardness);
                $('#rinspectQty').val(data.intReworkQty);
            },
            error: function(result){
                alert('ERROR IN GETTING DATA');
            }
        });


        $("#inspection_form").find('.has-error').removeClass("has-error");
        $("#inspection_form").find('.has-success').removeClass("has-success");
        $('#inspection_form').find('.form-control-feedback').remove();
        // document.getElementById("inspection_form").reset();
        document.getElementById('inspection_form').action = "URL::to('/transaction/inspection-add')";
    });

  	$(document).on('submit', '#inspection_form', function(e){
    	table.column(0).visible(false);
    	table.column(1).visible(false);
    	table.column(2).visible(false);
    	$.ajax({
    		url: '/transaction/inspection-add',
    		type: 'POST',
    		data: {
    			insp_id: id,
    			prod_id: pid,
                inspect: insp,
    			emp_id: $('#personnelAssigned').val(),
    			time: $('#inspectTime').val(),
    			a_hardness: $('#ahardness').val(),
    			a_quantity: $('#ainspectQty').val(),
    			r_hardness: $('#rhardness').val(),
    			r_quantity: $('#rinspectQty').val(),
    		},
    		success: function(data){
                console.log(data);

    			noty({
	              type: 'success',
	              layout: 'bottomRight',
	              timeout: 3000,
	              text: '<h4><center>Inspection successfully added!</center></h4>',
	            });
                table.row(row).remove().draw();
                table.row.add([
                    data.strProdInspectionID,
                    data.strProductID,
                    data.product.details.strProductName,
                    '<a href="read-mail.html">'+ data.product.details.strProductName +'</a>',
                    data.forInspection,
                    '<button id = "btnAddInspection" name='+data.strProdInspectionID+'  class="btn btn-primary""> <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Inspection</button>',
                    data.intAcceptQty,
                    data.intReworkQty,
                ]).draw(false);
    		},
    		error: function(result){
                console.log(result);
                alert('ERROR ADDING INSPECTION');
    		}
    	});

        $('#addInspectionModal').modal('toggle');
        $('#personnelAssigned').val('first').change();
        $('#inspectTime').val();
        $('#ahardness').val();
        $('#ainspectQty').val();
        $('#rhardness').val();
        $('#rinspectQty').val();
  	});

});
