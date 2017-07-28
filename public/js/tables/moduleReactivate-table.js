var tblmodr = $('#modReactTable').DataTable();

// CHANGE TABLE NAME
$('#modReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblmodr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
