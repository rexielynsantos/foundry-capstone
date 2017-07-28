var tblmatr = $('#materialReactTable').DataTable();

// CHANGE TABLE NAME
$('#materialReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblmatr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
