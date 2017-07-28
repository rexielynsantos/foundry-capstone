var btnAddEmps = $('#btnAddEmp');
var btnEditEmps = $('#btnEditEmp');
var btnDeleteEmps = $('#btnDeleteEmpl');

var tblemps = $('#empTable').DataTable();


// CHANGE TABLE NAME
$('#empTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblemps.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblemps.rows('tr.active').data().length != 0)
        {

            if(tblemps.rows('tr.active').data().length == 1)
            {
              btnAddEmps.hide();
              btnEditEmps.show();
              btnDeleteEmps.show();
            }
            else
            {
              btnAddEmps.hide();
              btnEditEmps.hide();
              btnDeleteEmps.show();
            }
        }
        else
        {
          btnAddEmps.show();
          btnEditEmps.hide();
          btnDeleteEmps.hide();
        }
    });
