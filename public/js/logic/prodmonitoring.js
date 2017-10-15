$(document).ready(function(){
	var tbl1 =  $('#tbl1').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl2 =  $('#tbl2').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl3 =  $('#tbl3').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	$.ajax({
		url: '/transaction/monitoring-tbl1',
		type: 'POST',
		data: {
			stage_id: 'ST00001'
		},
		success: function(data){
			console.log(data);
			// alert('success');
			for(var i = 0; i < data.length; i++){
				tbl1.row.add([
					data[i].strProductName,
					'',
					'',
					'',
					'',
				]).draw(true);
			}
			
		},
		error: function(data){

		}
	});
	$.ajax({
		url: '/transaction/monitoring-tbl1',
		type: 'POST',
		data: {
			stage_id: 'ST00002'
		},
		success: function(data){
			console.log(data);
			// alert('success');
			for(var i = 0; i < data.length; i++){
				tbl2.row.add([
					data[i].strProductName,
					'',
					'',
					'',
					'',
				]).draw(true);
			}
			
		},
		error: function(data){

		}
	});
	$.ajax({
		url: '/transaction/monitoring-tbl1',
		type: 'POST',
		data: {
			stage_id: 'ST00003'
		},
		success: function(data){
			console.log(data);
			// alert('success');
			for(var i = 0; i < data.length; i++){
				tbl3.row.add([
					data[i].strProductName,
					'',
					'',
					'',
					'',
				]).draw(true);
			}
			
		},
		error: function(data){

		}
	});

})