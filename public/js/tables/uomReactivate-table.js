var tbluomr = $('#uomReactivateTable').DataTable();

// CHANGE TABLE NAME
$('#uomReactivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tbluomr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
