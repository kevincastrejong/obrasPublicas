var montoTotal = 0;
var anterior = 0;
$(document).ready(function(){
    //arreglo para guardar los rangos
    var rangos = [];
    var diferenciaMeses = 0;

    $("#monto").blur(function(){
      if($('#monto') != ""){
        montoTotal = $('#monto').val();
      }
    });

    //si la fecha de terminacion cambia 
    $("#fTerminacion").blur(function(){
      setInputsRanges();
    });

    // //envio de formulario
     $("#btnFicha").click(function(){
      for(var i = 1; i <= diferenciaMeses; i++)
      {      
        var montoxr = $('#rango'+i).val(); 
        rangos[i-1].monto = montoxr;
      }
      $('#allRanges').val(JSON.stringify(rangos));
      $('#newFicha').submit();
     });

    //crea los inputs para todos los rangos
    function setInputsRanges(){
      //obtenemos las fechas introducidas por el usuario
      var fInicio = $('#fInicio').val();
      var fTerminacion = $('#fTerminacion').val();
      //validacion que las fechas sean correctas
      if(fInicio != "" && fTerminacion != ""){
        //moment 
        var momentI = moment(fInicio);
        var momentT = moment(fTerminacion);
        // aumenta los años
        var j = 1;
        //obtiene el año de inicio
        var anio = momentI.year();
        //mes de inicio
        var mes = momentI.month() +1;
        //Limpiamos el div por si tenia contenido
        $("#rangos").empty();
        //limpiamos el arreglo
        rangos = [];
        //obtenemos numero de meses de diferencia
        diferenciaMeses = momentT.diff(momentI, 'months') +1;
        if(momentI.get('date') > momentT.get('date')){
          diferenciaMeses ++;
        }
        //diferenciaMeses = (momentT.month()+1) - (momentI.month()+1) +1;

        if(diferenciaMeses > 1){ //si los meses de las fechas que introduce el usuario son diferentes
          
          for(var i = 1; i <= diferenciaMeses; i++)
          {
            if(i === 1){
              var primerDia = momentI;
              var ultimoDia = moment(momentI.clone().endOf('month'));
              rangos.push({id: 'rango'+i ,fInicio: primerDia.format('YYYY-MM-DD'), fTerminacion: ultimoDia.format('YYYY-MM-DD'), monto: ''});
              campo = '<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rango'+i+'">'+primerDia.format('DD-MM-YYYY')+' al '+ultimoDia.format('DD-MM-YYYY')+'<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input id="rango'+i+'" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="rango'+i+'" placeholder="Monto '+i+'" required="required" type="number" onblur="Calculate(this)" onclick="Calculate2(this)"></div></div>';
              $("#rangos").append(campo);
              if(mes === 12)
              {
                mes = 1;
                anio = anio + 1;
              }
              else{
                mes ++;
              }
            }
            if(i > 1 && i < diferenciaMeses){
              var date = anio+'-'+mes+'-01';
              var primerDia = moment(date);
              var ultimoDia = moment(primerDia.clone().endOf('month'));
              // var primerDia = new Date(anio, mesActual, 1).toISOString().substring(0, 10);
              // var ultimoDia = new Date(anio, mesActual + 1, 0).toISOString().substring(0, 10);
              rangos.push({id: 'rango'+i ,fInicio: primerDia.format('YYYY-MM-DD'), fTerminacion: ultimoDia.format('YYYY-MM-DD'), monto: ''});
              campo = '<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rango'+i+'">'+primerDia.format('DD-MM-YYYY')+' al '+ultimoDia.format('DD-MM-YYYY')+'<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input id="rango'+i+'" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="rango'+i+'" placeholder="Monto '+i+'" required="required" type="number" onblur="Calculate(this)" onclick="Calculate2(this)"></div></div>';
              $("#rangos").append(campo);
              if(mes === 12)
              {
                mes = 1;
                anio = anio + 1;
              }
              else{
                mes ++;
              }
            }   
            if(i === diferenciaMeses){
              var primerDia = moment(anio+'-'+mes+'-01');
              var ultimoDia = moment(anio+'-'+mes+'-'+momentT.get('date'));
              // var primerDia = new Date(anio, dateTerminacion.getMonth(), 1).toISOString().substring(0, 10);
              // var ultimoDia = new Date(anio,dateTerminacion.getMonth(),momentT.get('date')).toISOString().substring(0, 10);
              rangos.push({id: 'rango'+i ,fInicio: primerDia.format('YYYY-MM-DD'), fTerminacion: ultimoDia.format('YYYY-MM-DD'), monto: ''});
              campo = '<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="rango'+i+'">'+primerDia.format('DD-MM-YYYY')+' al '+ultimoDia.format('DD-MM-YYYY')+'<span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><input id="rango'+i+'" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="rango'+i+'" placeholder="Monto '+i+'" required="required" type="number" onblur="Calculate(this)" onclick="Calculate2(this)"></div></div>';
              $("#rangos").append(campo);
            } 
          }
          console.log(rangos);
        }
        else{
          var monto = $('#monto').val();
          // console.log(monto);
          rangos.push({fInicio: momentI.format('YYYY-MM-DD'), fTerminacion: momentT.format('YYYY-MM-DD'), monto: monto});
          console.log(rangos);
        }
      }
      else{
        console.log('las fechas son necesarias')
      }
    }
   });
   
   function Calculate (e){
     if($('#monto').val() != "")
     {
      if($(e).val() != "" && $(e).data( 'status') != 'true')
      {
      console.log(montoTotal);
      var m = $(e).val();
      montoTotal = montoTotal - m;
      $(e).data( 'status', 'true' );
      console.log(montoTotal);
      }else{
        montoTotal = parseInt(montoTotal) + parseInt(anterior);
        $(e).data( 'status', 'true' );
        console.log(montoTotal);
      }
     }
  };

  function Calculate2 (e){
    if($('#monto').val() != "")
    {
     if($(e).val() != "")
     {
      anterior = $(e).val();
     }else{
       anterior = 0;
     }
    }
 };