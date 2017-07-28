var tblprodvarr = $('#prodVarianceReactTable').DataTable();

// CHANGE TABLE NAME
$('#prodVarianceReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblprodvarr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
