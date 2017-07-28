var tblstgreact = $('#stageReactivateTable').DataTable();

// CHANGE TABLE NAME
$('#stageReactivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblstgreact.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
