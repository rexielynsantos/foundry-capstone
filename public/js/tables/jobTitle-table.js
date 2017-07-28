var btnAddjobTitle = $('#btnAddJob');
var btnEditjobTitle = $('#btnEditJob');
var btnDeletejobTitle = $('#btnDeleteJo');

var tbljob = $('#jobTitleTable').DataTable();


// CHANGE TABLE NAME
$('#jobTitleTable tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tbljob.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tbljob.rows('tr.active').data().length != 0)
        {

            if(tbljob.rows('tr.active').data().length == 1)
            {
              btnAddjobTitle.hide();
              btnEditjobTitle.show();
              btnDeletejobTitle.show();
            }
            else
            {
              btnAddjobTitle.hide();
              btnEditjobTitle.hide();
              btnDeletejobTitle.show();
            }
        }
        else
        {
          btnAddjobTitle.show();
          btnEditjobTitle.hide();
          btnDeletejobTitle.hide();
        }
    });
