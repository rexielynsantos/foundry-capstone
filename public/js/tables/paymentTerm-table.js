var btnAddPterm = $('#btnAddPterm');
var btnEditPterm = $('#btnEditPterm');
var btnDeletePterm = $('#btnDeletePterms');

var tblPterm = $('#ptTable').DataTable();


// TABLE ON CLICK
$('#ptTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblPterm.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblPterm.rows('tr.active').data().length != 0)
        {
            // btnAddPterm.hide();
            if(tblPterm.rows('tr.active').data().length == 1)
            {
              btnAddPterm.hide();
              btnEditPterm.show();
              btnDeletePterm.show();
            }
            else
            {
              btnAddPterm.hide();
              btnEditPterm.hide();
              btnDeletePterm.show();
            }
        }
        else
        {
          btnAddPterm.show();
          btnEditPterm.hide();
          btnDeletePterm.hide();
        }
    });
