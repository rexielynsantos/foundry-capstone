var btnAdd = $('#btnAddProductType');
var btnEdit = $('#btnEditProductType');
var btnDelete = $('#btnDeleteProductTypes');

var tblProductType = $('#prodTypeTable').DataTable();


// CHANGE TABLE NAME
$('#prodTypeTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblProductType.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblProductType.rows('tr.active').data().length != 0)
        {

            if(tblProductType.rows('tr.active').data().length == 1)
            {
              btnAdd.hide();
              btnEdit.show();
              btnDelete.show();
            }
            else
            {
              btnAdd.hide();
              btnEdit.hide();
              btnDelete.show();
            }
        }
        else
        {
          btnAdd.show();
          btnEdit.hide();
          btnDelete.hide();
        }
    });
