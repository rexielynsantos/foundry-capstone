var btnAddOptt = $('#btnAddOption');
var btnEditOptt = $('#btnEditOption');
var btnDeleteOptt = $('#btnDeleteOption');

var tblopt = $('#optionTable').DataTable();


// CHANGE TABLE NAME
$('#optionTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblopt.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblopt.rows('tr.active').data().length != 0)
        {

            if(tblopt.rows('tr.active').data().length == 1)
            {
              btnAddOptt.hide();
              btnEditOptt.show();
              btnDeleteOptt.show();
            }
            else
            {
              btnAddOptt.hide();
              btnEditOptt.hide();
              btnDeleteOptt.show();
            }
        }
        else
        {
          btnAddOptt.show();
          btnEditOptt.hide();
          btnDeleteOptt.hide();
        }
    });
