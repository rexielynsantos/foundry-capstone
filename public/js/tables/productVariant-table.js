var btnAdd = $('#btnAddProductVariant');
var btnEdit = $('#btnEditProductVariant');
var btnDelete = $('#btnDeleteProductVariants');

var tblProductVariant = $('#prodVariantTable').DataTable();


// CHANGE TABLE NAME
$('#prodVariantTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblProductVariant.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblProductVariant.rows('tr.active').data().length != 0)
        {

            if(tblProductVariant.rows('tr.active').data().length == 1)
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
