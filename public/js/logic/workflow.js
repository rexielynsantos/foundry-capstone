$(document).ready(function(){ 
    var draftArray = [];
    var reviewArray = [];
    var revisionArray = [];
    var revisedArray = [];
    var aprrovedArray = [];
    var expiredArray = [];
    
    var allArray = [];

    var tblworkflow = $('#tblworkflow').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "cache": false,
    });

    $('#select_workflow').on('change', function(){
        $('#hiddentableworkflow').show();        
        id = $('#select_workflow option:selected').val();
        $.ajax({
            url: '/maintenance/workflow-modules',
            type: 'POST',
            data: {
                module_id: id
            },
            success: function(result)
            {                   
                $('#draftID').val(result.Draft.strWorkflowID);
                // $('#draft1').prop('checked', result.Draft.boolDraftIsChecked);
                $('#draft2').prop('checked', result.Draft.boolForReviewIsChecked);                
                $('#draft3').prop('checked', result.Draft.boolForRevisionIsChecked);
                $('#draft4').prop('checked', result.Draft.boolRevisedIsChecked);
                $('#draft5').prop('checked', result.Draft.boolApprovedIsChecked);
                $('#draft6').prop('checked', result.Draft.boolExpiredIsChecked);

                $('#reviewID').val(result.Review.strWorkflowID);
                $('#review1').prop('checked', result.Review.boolDraftIsChecked);
                // $('#review2').prop('checked', result.Review.boolForReviewIsChecked);                
                $('#review3').prop('checked', result.Review.boolForRevisionIsChecked);
                $('#review4').prop('checked', result.Review.boolRevisedIsChecked);
                $('#review5').prop('checked', result.Review.boolApprovedIsChecked);
                $('#review6').prop('checked', result.Review.boolExpiredIsChecked);

                $('#revisionID').val(result.Revision.strWorkflowID);
                $('#revision1').prop('checked', result.Revision.boolDraftIsChecked);
                $('#revision2').prop('checked', result.Revision.boolForReviewIsChecked);                
                // $('#revision3').prop('checked', result.Revision.boolForRevisionIsChecked);
                $('#revision4').prop('checked', result.Revision.boolRevisedIsChecked);
                $('#revision5').prop('checked', result.Revision.boolApprovedIsChecked);
                $('#revision6').prop('checked', result.Revision.boolExpiredIsChecked);

                $('#reviseID').val(result.Revised.strWorkflowID);
                $('#revise1').prop('checked', result.Revised.boolDraftIsChecked);
                $('#revise2').prop('checked', result.Revised.boolForReviewIsChecked);                
                $('#revise3').prop('checked', result.Revised.boolForRevisionIsChecked);
                // $('#revise4').prop('checked', result.Revised.boolRevisedIsChecked);
                $('#revise5').prop('checked', result.Revised.boolApprovedIsChecked);
                $('#revise6').prop('checked', result.Revised.boolExpiredIsChecked);

                $('#approveID').val(result.Approved.strWorkflowID);
                $('#approve1').prop('checked', result.Approved.boolDraftIsChecked);
                $('#approve2').prop('checked', result.Approved.boolForReviewIsChecked);                
                $('#approve3').prop('checked', result.Approved.boolForRevisionIsChecked);
                $('#approve4').prop('checked', result.Approved.boolRevisedIsChecked);
                // $('#approve5').prop('checked', result.Approved.boolApprovedIsChecked);
                $('#approve6').prop('checked', result.Approved.boolExpiredIsChecked);

                $('#expiredID').val(result.Expired.strWorkflowID);
                $('#expired1').prop('checked', result.Expired.boolDraftIsChecked);
                $('#expired2').prop('checked', result.Expired.boolForReviewIsChecked);                
                $('#expired3').prop('checked', result.Expired.boolForRevisionIsChecked);
                $('#expired4').prop('checked', result.Expired.boolRevisedIsChecked);
                $('#expired5').prop('checked', result.Expired.boolApprovedIsChecked);
                // $('#expired6').prop('checked', result.Expired.boolExpiredIsChecked);
                
            },
            error: function(result) {
                alert('No ID found!');        
            }
        });
    });

    $('#btnUpdateWorkflow').click(function(){
        id = $('#select_workflow option:selected').val();          
        for(var i = 1; i <= 6; i++)
            {
                draftArray[i] = $(`#draft`+i).is(':checked');       
                reviewArray[i] = $(`#review`+i).is(':checked');       
                revisionArray[i] = $(`#revision`+i).is(':checked');       
                revisedArray[i] = $(`#revise`+i).is(':checked');      
                aprrovedArray[i] = $(`#approve`+i).is(':checked');       
                expiredArray[i] = $(`#expired`+i).is(':checked');
            }

            draftArray[0] = $('#draftID').val();
            reviewArray[0] = $('#reviewID').val();
            revisionArray[0] = $('#revisionID').val();
            revisedArray[0] = $('#reviseID').val();
            aprrovedArray[0] = $('#approveID').val();
            expiredArray[0] = $('#expiredID').val();            

            // allArray[0] = draftArray;
            // allArray[1] = reviewArray;
            // allArray[2] = revisionArray;
            // allArray[3] = revisedArray;
            // allArray[4] = aprrovedArray;
            // allArray[5] = expiredArray;                

        $.ajax({
            url: '/maintenance/workflow-update',
            type: 'POST',
            data: {
                module_id     : id,
                draftArray    : draftArray,
                reviewArray   : reviewArray,
                revisionArray : revisionArray,
                revisedArray  : revisedArray,
                aprrovedArray : aprrovedArray,
                expiredArray  : expiredArray
            },
            success: function(result)
            {         
                noty({
                    type: 'success',
                    layout: 'bottomRight',
                    timeout: 3000,
                    text: '<h4><center>Workflow successfully updated!</center></h4>',
                    });
            },
            error: function(result) {
                alert('No ID found!');        
            }
        });

        
    });

});

