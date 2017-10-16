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
	var tbl4 =  $('#tbl4').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl5 =  $('#tbl5').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl6 =  $('#tbl6').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl7 =  $('#tbl7').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl8 =  $('#tbl8').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl9 =  $('#tbl9').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl10 =  $('#tbl10').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl11 =  $('#tbl11').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl12 =  $('#tbl12').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });
	var tbl13 =  $('#tbl13').DataTable({
	    "searching": false,
	    "ordering": false,
	    "paging": false,
	 });

//1-6
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00001'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl1',
					type: 'POST',
					data: {
						stage_id: 'ST00001',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
						// for(var x = 0; x < data.length; x++){
							tbl1.row.add([
								dataa[0],
								dataa[1],
								dataa[2],
								dataa[3],
								dataa[3],
								dataa[4],
							]).draw(true);
						// }
					},
					error: function(data){
						alert('substage_error1');
					}
				})
			}
		},
		error: function(data){
			alert('product_error1');
		}
	});
//2-7
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00002'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl2',
					type: 'POST',
					data: {
						stage_id: 'ST00002',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
						// for(var x = 0; x < data.length; x++){
							tbl2.row.add([
								dataa[0],
								dataa[1],
								dataa[2],
								dataa[3],
								dataa[4],//qa
								dataa[4],
								dataa[5],
							]).draw(true);
						// }
					},
					error: function(data){
						alert('substage_error2');
					}
				})
			}
		},
		error: function(data){
			alert('product_error2');
		}
	});
//3-13
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00003'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl3',
					type: 'POST',
					data: {
						stage_id: 'ST00003',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
						// for(var x = 0; x < data.length; x++){
							tbl3.row.add([
								dataa[0],
								dataa[1],
								dataa[2],
								dataa[3],
								dataa[4],//qa
								dataa[5],
								dataa[6],
								dataa[7],
								dataa[8],
								dataa[9],
								dataa[10],
								dataa[10],
								dataa[11],
							]).draw(true);
						// }
					},
					error: function(data){
						alert('substage_error3');
					}
				})
			}
		},
		error: function(data){
			alert('product_error3');
		}
	});
//4-5
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00004'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl4',
					type: 'POST',
					data: {
						stage_id: 'ST00004',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl4.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error4');
					}
				})
			}
		},
		error: function(data){
			alert('product_error4');
		}
	});
//5
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00005'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl5',
					type: 'POST',
					data: {
						stage_id: 'ST00005',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl5.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error5');
					}
				})
			}
		},
		error: function(data){
			alert('product_error5');
		}
	});
//6
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00006'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl6',
					type: 'POST',
					data: {
						stage_id: 'ST00006',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl6.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error6');
					}
				})
			}
		},
		error: function(data){
			alert('product_error6');
		}
	});
//7
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00007'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl7',
					type: 'POST',
					data: {
						stage_id: 'ST00007',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl7.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error7');
					}
				})
			}
		},
		error: function(data){
			alert('product_error7');
		}
	});
//8
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00008'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl8',
					type: 'POST',
					data: {
						stage_id: 'ST00008',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl8.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error8');
					}
				})
			}
		},
		error: function(data){
			alert('product_error8');
		}
	});
//9
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00009'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl9',
					type: 'POST',
					data: {
						stage_id: 'ST00009',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl9.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error9');
					}
				})
			}
		},
		error: function(data){
			alert('product_error9');
		}
	});
//10
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00010'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl10',
					type: 'POST',
					data: {
						stage_id: 'ST00010',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl10.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error10');
					}
				})
			}
		},
		error: function(data){
			alert('product_error10');
		}
	});
//11
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00011'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl11',
					type: 'POST',
					data: {
						stage_id: 'ST00011',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl11.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error11');
					}
				})
			}
		},
		error: function(data){
			alert('product_error11');
		}
	});
//12
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00012'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl12',
					type: 'POST',
					data: {
						stage_id: 'ST00012',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl12.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error12');
					}
				})
			}
		},
		error: function(data){
			alert('product_error12');
		}
	});
//13
	$.ajax({
		url: '/transaction/monitoring-tbl',
		type: 'POST',
		data: {
			stage_id: 'ST00013'
		},
		success: function(data){
			console.log(data);
			for(var i = 0; i < data.length; i++){
				$.ajax({
					url: '/transaction/monitoring-tbl13',
					type: 'POST',
					data: {
						stage_id: 'ST00013',
						prod_id: data[i].strProductID,
						prod_name: data[i].strProductName,
					},
					success: function(dataa){
						console.log(dataa);
							tbl13.row.add([
								dataa[0],
								// dataa[1],
								dataa[2],
								dataa[2],
								dataa[3],
							]).draw(true);
					},
					error: function(data){
						alert('substage_error13');
					}
				})
			}
		},
		error: function(data){
			alert('product_error13');
		}
	});

})