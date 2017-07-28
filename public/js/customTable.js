$(document).ready(function(){
  $('#product_table').DataTable();
})

var tblProduct = $('#product_table').DataTable();
    $('#btnAddProduct').prop('disabled', '');
    $('#btnEditProduct').prop('disabled', 'disabled');
    $('#btnDeleteroduct').prop('disabled','disabled');

// TABLE ON CLICK
$('#product_table tbody').on('click', 'tr', function()
    {
        if(!$(this).hasClass('active') && tblProduct.rows().data().length > 0)
        {
            $(this).addClass('active');
        }
        else
        {
            $(this).removeClass('active');
        }

        if(tblProduct.rows('tr.active').data().length != 0)
        {
            $('#btnAddProduct').prop('disabled', 'disabled');
            if(tblProduct.rows('tr.active').data().length == 1)
            {
                $('#btnEditProduct').prop('disabled','');
                $('#btnDeleteroduct').prop('disabled','');
                $('#btnAddProduct').prop('disabled', 'disabled');
            }
            else
            {
                $('#btnDeleteroduct').prop('disabled','');
                $('#btnEditProduct').prop('disabled', 'disabled');
                $('#btnAddProduct').prop('disabled', 'disabled');
            }
        }
        else
        {
            $('#btnEditProduct').prop('disabled', 'disabled');
            $('#btnDeleteroduct').prop('disabled', 'disabled');
            $('#btnAddProduct').prop('disabled','');
        }
    });
