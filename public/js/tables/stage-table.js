var btnAddStage = $('#btnAddStage');
var btnEditStage = $('#btnEditStage');
var btnDeleteStage = $('#btnDeleteStages');

var tblStage = $('#stageTable').DataTable();


// TABLE ON CLICK
$('#stageTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblStage.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblStage.rows('tr.active').data().length != 0)
        {
            // btnAddPterm.hide();
            if(tblStage.rows('tr.active').data().length == 1)
            {
              btnAddStage.hide();
              btnEditStage.show();
              btnDeleteStage.show();
            }
            else
            {
              btnAddStage.hide();
              btnEditStage.hide();
              btnDeleteStage.show();
            }
        }
        else
        {
          btnAddStage.show();
          btnEditStage.hide();
          btnDeleteStage.hide();
        }
    });
