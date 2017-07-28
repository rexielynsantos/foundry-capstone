var btnAddmd = $('#btnAddModule');
var btnEditmd = $('#btnEditModule');
var btnDeletemd = $('#btnDeleteModules');

var tblMod = $('#modTable').DataTable();


// CHANGE TABLE NAME
$('#modTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblMod.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblMod.rows('tr.active').data().length != 0)
        {

            if(tblMod.rows('tr.active').data().length == 1)
            {
              btnAddmd.hide();
              btnEditmd.show();
              btnDeletemd.show();
            }
            else
            {
              btnAddmd.hide();
              btnEditmd.hide();
              btnDeletemd.show();
            }
        }
        else
        {
          btnAddmd.show();
          btnEditmd.hide();
          btnDeletemd.hide();
        }
    });
