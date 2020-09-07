$(document).ready(function(){

    $('#send-user-update').click(function(){
        $('#form-user').submit();
    });

    $('#send-pass-update').click(function(){
        $('#form-pass').submit();
    });
    
    $('#foto').change(function(){
        $('#form-foto').submit();
    });
});

function getUser(e){
    if($(e).data('id') != '')
    {   
        console.log($(e).data('id'));
        $('#modal-user').modal('show');
        // $.ajax({
        //     data: { Id : rubros.val() },
        //     url:   '../controllers/reports/fichasInfo.php',
        //     type:  'GET',
        //     dataType: 'json',
        //     beforeSend: function () 
        //     {
        //         rubros.prop('disabled', true);
        //     },
        //     success:  function (r) 
        //     {
        //         rubros.prop('disabled', false);
        //         obras.prop('disabled', false);
        //         console.log(r);

        //          $(r).each(function(i, v){ // indice, valor
        //              obras.append('<option value="' + v.Id + '">' + v.Obra + '</option>');
        //          })
        //     },
        //     error: function()
        //     {
        //         alert('Ocurrio un error en el servidor ..');
        //         rubros.prop('disabled', false);
        //     }
        // });
    }
    else
    {
        console.log('no hay id');
    }
}
