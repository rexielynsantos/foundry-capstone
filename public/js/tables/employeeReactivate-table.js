var tblempr = $('#empReactTable').DataTable();

// CHANGE TABLE NAME
$('#empReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblempr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
