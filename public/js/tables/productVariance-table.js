var btnAdd = $('#btnAddProductVariance');
var btnEdit = $('#btnEditProductVariance');
var btnDelete = $('#btnDeleteProductVariance');

var tblProductVariance = $('#prodVarianceTable').DataTable();


// CHANGE TABLE NAME
$('#prodVarianceTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblProductVariance.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblProductVariance.rows('tr.active').data().length != 0)
        {

            if(tblProductVariance.rows('tr.active').data().length == 1)
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
