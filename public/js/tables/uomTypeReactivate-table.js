var tbluomtyper = $('#uomTypeReactivateTable').DataTable();

// CHANGE TABLE NAME
$('#uomTypeReactivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tbluomtyper.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
