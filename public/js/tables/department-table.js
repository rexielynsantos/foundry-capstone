var btnAddDept = $('#btnAddDept');
var btnEditDept = $('#btnEditDept');
var btnDeleteDept = $('#btnDeleteDeprt');

var tbldept = $('#deptTable').DataTable(
  {
    "select":true,
  });


// CHANGE TABLE NAME
$('#deptTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tbldept.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tbldept.rows('tr.active').data().length != 0)
        {

            if(tbldept.rows('tr.active').data().length == 1)
            {
              btnAddDept.hide();
              btnEditDept.show();
              btnDeleteDept.show();
            }
            else
            {
              btnAddDept.hide();
              btnEditDept.hide();
              btnDeleteDept.show();
            }
        }
        else
        {
          btnAddDept.show();
          btnEditDept.hide();
          btnDeleteDept.hide();
        }
    });
