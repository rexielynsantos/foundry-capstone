var btnAddMatspec = $('#btnAddMat');
var btnEditMatspec = $('#btnEditMat');
var btnDeleteMatspec = $('#btnDeleteMats');

var tblmatspec = $('#matSpecTable').DataTable(
  {
    "select":true,
  });


// CHANGE TABLE NAME
$('#matSpecTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblmatspec.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblmatspec.rows('tr.active').data().length != 0)
        {

            if(tblmatspec.rows('tr.active').data().length == 1)
            {
              btnAddMatspec.hide();
              btnEditMatspec.show();
              btnDeleteMatspec.show();
            }
            else
            {
              btnAddMatspec.hide();
              btnEditMatspec.hide();
              btnDeleteMatspec.show();
            }
        }
        else
        {
          btnAddMatspec.show();
          btnEditMatspec.hide();
          btnDeleteMatspec.hide();
        }
    });
