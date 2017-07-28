var btnAddUOMType = $('#btnAdduomType');
var btnEditUOMType = $('#btnEdituomType');
var btnDeleteUOMType = $('#btnDeleteuomTypes');

var tblUOMType = $('#uomTypeTable').DataTable();


// CHANGE TABLE NAME
$('#uomTypeTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblUOMType.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblUOMType.rows('tr.active').data().length != 0)
        {

            if(tblUOMType.rows('tr.active').data().length == 1)
            {
              btnAddUOMType.hide();
              btnEditUOMType.show();
              btnDeleteUOMType.show();
            }
            else
            {
              btnAddUOMType.hide();
              btnEditUOMType.hide();
              btnDeleteUOMType.show();
            }
        }
        else
        {
          btnAddUOMType.show();
          btnEditUOMType.hide();
          btnDeleteUOMType.hide();
        }
    });
