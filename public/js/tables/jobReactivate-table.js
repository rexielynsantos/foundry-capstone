var tbljbrct = $('#jobTitleReactivateTable').DataTable();

// CHANGE TABLE NAME
$('#jobTitleReactivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tbljbrct.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
