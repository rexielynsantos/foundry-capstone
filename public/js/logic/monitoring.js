$(document).ready(function(){

	// var table = $("#monitoringTable").DataTable({
	// 	"searching": false,
	// 	"ordering": false,
	// 	"paging": true,
	// });

	var table1 = $('#addMaterialsTable').DataTable({
		"searching": false,
		"ordering": false,
		"paging": false,
	});

$('#stage').change(function(){
    // if(clear == 0){
      $.ajax({
            url: '/transaction/monitoring-stage',
            type: 'POST',
            data: {
              stage_id: $('#stage').val()
            },
            success: function(data)
            {
            	console.log(data);
              $("#substage").empty();
              if(data['substage'].length == 0){
                $(`<option value="first" selected disabled>No substage to be selected</option>`).appendTo("#substage");
              }
              else{
                $(`<option value="first" selected disabled>Select a Sub-Stage</option>`).appendTo("#substage");

                for(var i = 0; i < data['substage'].length; i++)
                {
                  $(`<option value=`+data['substage'][i].strSubStageID+`>`+data['substage'][i].strSubStageName+`</option>`).appendTo("#substage");
                }
              }

            },
            error: function(result)
            {
              alert('getSubstageError');
            }
        });
    // }
  });

$('#joborderNo').change(function(){
    // if(clear == 0){
      $.ajax({
            url: '/transaction/monitoring-jobProduct',
            type: 'POST',
            data: {
              job_id: $('#joborderNo').val()
            },
            success: function(data)
            {
            	console.log(data);
              // table1.clear();
              // table1.draw();
              // for(var i = 0; i < data['job'].length; i++){
              // 	table1.row.add([
              // 		data['job'][i].strProductID,
              // 		data['job'][i].
              // 	]).draw(false);
              // }
              if(data['substage'].length == 0){
                $(`<option value="first" selected disabled>No substage to be selected</option>`).appendTo("#substage");
              }
              else{
                $(`<option value="first" selected disabled>Select a Sub-Stage</option>`).appendTo("#substage");

                for(var i = 0; i < data['substage'].length; i++)
                {
                  $(`<option value=`+data['substage'][i].strSubStageID+`>`+data['substage'][i].strSubStageName+`</option>`).appendTo("#substage");
                }
              }

            },
            error: function(result)
            {
              alert('getSubstageError');
            }
        });
    // }
  });

// $('#substage').change(function(){
//     // if(clear == 0){
//       $.ajax({
//             url: '/transaction/monitoring-substage',
//             type: 'POST',
//             data: {
//               sustage_id: $('#substage').val()
//             },
//             success: function(data)
//             {
//             	console.log(data);
              
//               }

//             },
//             error: function(result)
//             {
//               alert('getSubstageError');
//             }
//         });
//     // }
//   });


});