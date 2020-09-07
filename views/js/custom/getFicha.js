$(document).ready(function(){

    $('#send-ficha-update').click(function(){
        $('#newFicha').submit();
    });

});

function getFicha(e)
{
    if($(e).data('id') != '')
    {   
        $.ajax({
            data: { Id : $(e).data('id') },
            url:   './../controllers/fichas/getFicha.php',
            type:  'GET',
            dataType: 'json',
            beforeSend: function () 
            {
            },
            success:  function (r) 
            {
                if(r.status === 'ok'){
                    $('#obra').val(r.result.Obra);
                    $('#nObra').val(r.result.nObra);
                    $('#nContrato').val(r.result.nContrato);
                    $('#fuente').val(r.result.Fuente);
                    $('#rubro').val(r.result.Rubro);
                    $('#contratista').val(r.result.Contratista);
                    $('#localidad').val(r.result.Localidad);
                    $('#direccion').val(r.result.Direccion);
                    $('#municipio').val(r.result.Municipio);
                    $('#monto').val(r.result.Monto);
                    $('#pobBeneficiada').val(r.result.PobBeneficiada);
                    $('#meta').val(r.result.Meta);
                    $('#fInicio').val(r.result.FechaInicio);
                    $('#fTerminacion').val(r.result.FechaTerminacion);
                    $('#descripcion').val(r.result.Descripcion);
                    $('#antecedentes').val(r.result.Antecedentes);
                    $('#objetivo').val(r.result.Objetivo);
                    $('#observaciones').val(r.result.Observaciones);
                    $('#id').val($(e).data('id'));

                    $('#modal-ficha').modal('show');
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