var btnAddPr = $('#btnAddProduct');
var btnEditPr = $('#btnEditProduct');
var btnDeletePr = $('#btnDeleteProducts');
var tblProductPr = $('#productTable').DataTable();


// CHANGE TABLE NAME
$('#productTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblProductPr.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblProductPr.rows('tr.active').data().length != 0)
        {

            if(tblProductPr.rows('tr.active').data().length == 1)
            {
              btnAddPr.hide();
              btnEditPr.show();
              btnDeletePr.show();
            }
            else
            {
              btnAddPr.hide();
              btnEditPr.hide();
              btnDeletePr.show();
            }
        }
        else
        {
          btnAddPr.show();
          btnEditPr.hide();
          btnDeletePr.hide();
        }
    });
