<?php
require '../controllers/conexion/conexion.php';
if(isset($_SESSION['Logged'])){
  $sel = $con->query("SELECT * FROM rubros");
  $row = mysqli_num_rows($sel);
?>
<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Obras Publicas| </title>

     <!-- Bootstrap -->
     <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
  <?php require 'partials/menus.php'?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="">
              <div class="title_left">
                <center><h3>Registro de Reporte</h3></center>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="../controllers/reports/insertReport.php" method="POST" enctype="multipart/form-data" novalidate>
                      </p>
                      <span class="section">Informacion del reporte <span id="avance" class="navbar-right">Avance total de obra 0%</span></span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Rubro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="rubro" name="rubro" class="form-control col-md-7 col-xs-12" required="required">
                            <option value="" selected>Elige un rubro</option>
                            <?php while($f = $sel->fetch_assoc()){ ?>
                            <option value="<?php echo $f['Id'] ?>"><?php echo $f['Name'] ?></option>
                            <?php } ?>
                        </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Obra</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="obra" name="obra" class="form-control col-md-7 col-xs-12" required="required">
                            <option value="" selected>Elige una obra</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Avance <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance" placeholder="Avance" required="required" type="number">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="observaciones" class="form-control col-md-7 col-xs-12" name="observaciones" placeholder="Observaciones" required="required"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gasto">Gasto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gasto" class="form-control col-md-7 col-xs-12" name="gasto" placeholder="Gasto" required="required" type="number">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="evidencia" class="control-label col-md-3 col-sm-3 col-xs-12">Evicencia</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="evidencia[]" type="file" name="evidencia[]" class="form-control col-md-7 col-xs-12" multiple="multiple" accept=".png, .jpg, .jpeg" required="required">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Registrar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
    <?php require 'partials/footer.php' ?>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	  <script>
        $(document).ready(function(){
            // Bloqueamos el SELECT de los cursos
            $("#obra").prop('disabled', true);

            // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
            $("#rubro").change(function(){
                // Guardamos el select de rubros
                var rubros = $(this);
                // Guardamos el select de obras
                var obras = $('#obra');

                obras.find('option').remove();
                obras.append('<option value="">Elige una obra</option>');
                if($(this).val() != '')
                {   
                    $.ajax({
                        data: { Id : rubros.val() },
                        url:   '../controllers/reports/fichasInfo.php',
                        type:  'GET',
                        dataType: 'json',
                        beforeSend: function () 
                        {
                            rubros.prop('disabled', true);
                        },
                        success:  function (r) 
                        {
                            rubros.prop('disabled', false);
                            obras.prop('disabled', false);
                            console.log(r);

                             $(r).each(function(i, v){ // indice, valor
                                 obras.append('<option value="' + v.Id + '">' + v.Obra + '</option>');
                             })
                        },
                        error: function()
                        {
                            alert('Ocurrio un error en el servidor ..');
                            rubros.prop('disabled', false);
                        }
                    });
                }
                else
                {
                    obras.find('option').remove();
                    obras.append('<option value="">Elige una obra</option>');
                    obras.prop('disabled', true);
                }
            });

            $("#obra").change(function(){
              if($(this).val() != '')
                {
                  $.ajax({
                      data: { Id : $(this).val() },
                      url:   '../controllers/fichas/fichaAvance.php',
                      type:  'GET',
                      dataType: 'json',
                      beforeSend: function () 
                      {
                          
                      },
                      success:  function (r) 
                      {
                          if(r.status === 'ok'){
                            console.log(r.result.avanceTotal);
                              $('#avance').text('Avance total de obra' + ' ' + r.result.avanceTotal + '%');
                          }
                      },
                      error: function()
                      {
                        console.log('ocurrio un error en el servidor');
                      }
                  });
                }
                else{
                  console.log('no hay id');
                }
            });
        })
    </script>
  </body>
</html>
<?php 
}
else{
  header('location:../index.php');
}
?>