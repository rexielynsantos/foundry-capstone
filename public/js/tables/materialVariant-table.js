var btnAdd = $('#btnAddMaterialVariant');
var btnEdit = $('#btnEditMaterialVariant');
var btnDelete = $('#btnDeleteMaterialVariants');

var tblMaterialVariant = $('#matVariantTable').DataTable();


// CHANGE TABLE NAME
$('#matVariantTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblMaterialVariant.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblMaterialVariant.rows('tr.active').data().length != 0)
        {

            if(tblMaterialVariant.rows('tr.active').data().length == 1)
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
