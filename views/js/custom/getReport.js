$(document).ready(function(){

    $('#send-report-update').click(function(){
        $('#form-report').submit();
    });

});

function getReport(e)
{
    if($(e).data('id') != '')
    {   
        // console.log($(e).data('id'));
        // $('#modal-report').modal('show');
        $.ajax({
            data: { Id : $(e).data('id') },
            url:   './../controllers/reports/getReport.php',
            type:  'GET',
            dataType: 'json',
            beforeSend: function () 
            {
            },
            success:  function (r) 
            {
                if(r.status === 'ok'){
                    $('#avance').val(r.result.Avance);
                    $('#observaciones').val(r.result.Observaciones);
                    $('#gasto').val(r.result.Gasto);
                    $('#url').val(r.result.UrlFiles);
                    $('#id').val($(e).data('id'));
                    $('#modal-report').modal('show');
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