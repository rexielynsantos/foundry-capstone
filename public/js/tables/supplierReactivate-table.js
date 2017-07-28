var tblsupplier = $('#supplierActivateTable').DataTable();

// CHANGE TABLE NAME
$('#supplierActivateTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblsupplier.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }
    });
