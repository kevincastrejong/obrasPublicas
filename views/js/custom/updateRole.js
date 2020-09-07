$(document).ready(function(){
    $('#send-user-update').click(function(){
        $('#form-user').submit();
    });
});

function updateRole(e){
    if($(e).val() != '')
    {   
        $.ajax({
            data: {Id: $(e).data('id'), Role: $(e).val()},
            url:   './../controllers/users/up_nivel.php',
            type:  'POST',
            dataType: 'json',
            beforeSend: function () 
            {
                
            },
            success:  function (r) 
            {
                swal(
                    'Operación exitosa',
                    'Rol modificado correctamente',
                    'success'
                );
            },
            error: function(e)
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
        console.log('no hay cambio');
    }
}