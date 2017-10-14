$(document).ready(function(){
	var table =  $('#monitoringTable').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	  });
	alert('prod');
	$.ajax({
		url: '/transaction/monitoring',
		type: 'GET',
		success: function(data){
			console.log(data);
			alert('success');
			// for(var i = 0; i < data.length; i++){
				
			// }
			// table.row.add([
			// 	$('#head').val('head')
			// ]).draw(true);
		},
		error: function(data){

		}
	});

})