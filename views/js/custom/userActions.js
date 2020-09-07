$(document).ready(function(){
    $('#send-user-update').click(function(){
        $('#form-update-user').submit();
    });

});

function updateUser(e)
{
    if($(e).data('id') != '')
    {   
        $.ajax({
            data: { Id : $(e).data('id') },
            url:   './../controllers/users/getUser.php',
            type:  'GET',
            dataType: 'json',
            beforeSend: function () 
            {
            },
            success:  function (r) 
            {
                if(r.status === 'ok'){
                    $('#name').val(r.result.Name);
                    $('#email').val(r.result.Email);
                    $('#id').val($(e).data('id'));
                    $('#modal-update-user').modal('show');
                }
            },
            error: function()
            {
                swal({
                    'type': 'error',
                    'title': 'Error en la operación'
                });
            }
        });
        
    }
    else
    {
        console.log('no hay id');
    }
}