var tblptyper = $('#prodTypeReactTable').DataTable();

// CHANGE TABLE NAME
$('#prodTypeReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblptyper.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
