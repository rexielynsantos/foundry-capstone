var btnAddMaterial = $('#btnAddMaterial');
var btnEditMaterial = $('#btnEditMaterial');
var btnDeleteMaterial = $('#btnDeleteMaterials');

var tblMaterial = $('#materialTable').DataTable();


// CHANGE TABLE NAME
$('#materialTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblMaterial.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblMaterial.rows('tr.active').data().length != 0)
        {

            if(tblMaterial.rows('tr.active').data().length == 1)
            {
              btnAddMaterial.hide();
              btnEditMaterial.show();
              btnDeleteMaterial.show();
            }
            else
            {
              btnAddMaterial.hide();
              btnEditMaterial.hide();
              btnDeleteMaterial.show();
            }
        }
        else
        {
          btnAddMaterial.show();
          btnEditMaterial.hide();
          btnDeleteMaterial.hide();
        }
    });
