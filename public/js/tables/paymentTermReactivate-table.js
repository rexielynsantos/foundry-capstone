var tblptermr = $('#ptermReactTable').DataTable();

// CHANGE TABLE NAME
$('#ptermReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblptermr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
