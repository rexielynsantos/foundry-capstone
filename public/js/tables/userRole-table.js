var btnAddUserRole = $('#btnAddUserRole');
var btnEditUserRole = $('#btnEditUserRole');
var btnDeleteUserRole = $('#btnDeleteRole');

var tblUserRole = $('#userRoleTable').DataTable();


// CHANGE TABLE NAME
$('#userRoleTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblUserRole.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblUserRole.rows('tr.active').data().length != 0)
        {

            if(tblUserRole.rows('tr.active').data().length == 1)
            {
              btnAddUserRole.hide();
              btnEditUserRole.show();
              btnDeleteUserRole.show();
            }
            else
            {
              btnAddUserRole.hide();
              btnEditUserRole.hide();
              btnDeleteUserRole.show();
            }
        }
        else
        {
          btnAddUserRole.show();
          btnEditUserRole.hide();
          btnDeleteUserRole.hide();
        }
    });
