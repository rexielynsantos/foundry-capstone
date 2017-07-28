var btnAddSupplier = $('#btnAddSupplier');
var btnEditSupplier = $('#btnEditSupplier');
var btnDeleteSupplier = $('#btnDeleteSuppliers');
// var btnDeleteSupplier = $('#btnDeleteSupplier');
var tblsupl = $('#supplierTable').DataTable();


// CHANGE TABLE NAME
$('#supplierTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblsupl.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblsupl.rows('tr.active').data().length != 0)
        {

            if(tblsupl.rows('tr.active').data().length == 1)
            {
              btnAddSupplier.hide();
              btnEditSupplier.show();
              btnDeleteSupplier.show();
            }
            else
            {
              btnAddSupplier.hide();
              btnEditSupplier.hide();
              btnDeleteSupplier.show();
            }
        }
        else
        {
          btnAddSupplier.show();
          btnEditSupplier.hide();
          btnDeleteSupplier.hide();
        }
    });
