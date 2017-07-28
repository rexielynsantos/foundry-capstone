var tblemp = $('#userRoleActivateTable').DataTable();

// CHANGE TABLE NAME
$('#userRoleActivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblemp.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
