var tbldeptr = $('#deptReactTable').DataTable();

// CHANGE TABLE NAME
$('#deptReactTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tbldeptr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
