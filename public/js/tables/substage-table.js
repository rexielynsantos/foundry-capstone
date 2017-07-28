var btnAddSubstage = $('#btnAddSubstg');
var btnEditSubstage = $('#btnEditSubstg');
var btnDeleteubsStage = $('#btnDeleteSubstge');

var tblStg = $('#substgTable').DataTable();


// TABLE ON CLICK
$('#substgTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblStg.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblStg.rows('tr.active').data().length != 0)
        {
            // btnAddPterm.hide();
            if(tblStg.rows('tr.active').data().length == 1)
            {
              btnAddSubstage.hide();
              btnEditSubstage.show();
              btnDeleteubsStage.show();
            }
            else
            {
              btnAddSubstage.hide();
              btnEditSubstage.hide();
              btnDeleteubsStage.show();
            }
        }
        else
        {
          btnAddSubstage.show();
          btnEditSubstage.hide();
          btnDeleteubsStage.hide();
        }
    });
