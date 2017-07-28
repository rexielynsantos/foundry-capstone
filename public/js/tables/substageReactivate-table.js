var tblsbstg = $('#substageActivateTable').DataTable();

// CHANGE TABLE NAME
$('#substageActivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblsbstg.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
