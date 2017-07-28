var btnAddUOM = $('#btnAdduom');
var btnEditUOM = $('#btnEdituom');
var btnDeleteUOM = $('#btnDeleteuoms');

var tblUOM = $('#uomTable').DataTable();


// CHANGE TABLE NAME
$('#uomTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblUOM.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblUOM.rows('tr.active').data().length != 0)
        {

            if(tblUOM.rows('tr.active').data().length == 1)
            {
              btnAddUOM.hide();
              btnEditUOM.show();
              btnDeleteUOM.show();
            }
            else
            {
              btnAddUOM.hide();
              btnEditUOM.hide();
              btnDeleteUOM.show();
            }
        }
        else
        {
          btnAddUOM.show();
          btnEditUOM.hide();
          btnDeleteUOM.hide();
        }
    });
