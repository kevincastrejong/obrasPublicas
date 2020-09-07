<?php
require '../controllers/conexion/conexion.php';
if(isset($_SESSION['Logged'])){
  $sel = $con->query("SELECT * FROM rubros");
  $row = mysqli_num_rows($sel);

  $sel2 = $con->query("SELECT * FROM fuente");
  $row2 = mysqli_num_rows($sel);
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
                <center><h3>Registro de Fichas</h3></center>
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

                    <form id="newFicha" action="../controllers/fichas/ficha.php" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                      </p>
                      <span class="section">Informacion de la Ficha</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="obra">Obra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="obra" class="form-control col-md-7 col-xs-12" name="obra" placeholder="Obra" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nObra">Numero de obra</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nObra" class="form-control col-md-7 col-xs-12"  name="nObra" placeholder="Numero de obra" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nContrato">Numero de contrato <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nContrato" class="form-control col-md-7 col-xs-12"  name="nContrato" placeholder="Numero de contrato" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fuente del recurso</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="fuente" class="form-control col-md-7 col-xs-12" required="required">
                            <option value="" selected>Elige una fuente</option>
                            <?php while($f = $sel2->fetch_assoc()){ ?>
                               <option value="<?php echo $f['Id'] ?>"><?php echo $f['Name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Rubro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="rubro" class="form-control col-md-7 col-xs-12" required="required">
                            <option value="" selected>Elige un rubro</option>
                            <?php while($f = $sel->fetch_assoc()){ ?>
                               <option value="<?php echo $f['Id'] ?>"><?php echo $f['Name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contratista">Contratista <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="contratista" class="form-control col-md-7 col-xs-12"  name="contratista" placeholder="Contratista" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="localidad">Localidad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="localidad" class="form-control col-md-7 col-xs-12" name="localidad" placeholder="Localidad" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Dirección</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="direccion" class="form-control col-md-7 col-xs-12" name="direccion" placeholder="Dirección" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="municipio">Municipio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="municipio" class="form-control col-md-7 col-xs-12" name="municipio" placeholder="Municipio" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monto">Monto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="monto" class="form-control col-md-7 col-xs-12" name="monto" placeholder="Monto" required="required" type="number">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pobBeneficiada">Poblacion beneficiada <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pobBeneficiada" class="form-control col-md-7 col-xs-12" name="pobBeneficiada" placeholder="Poblacion beneficiada" required="required" type="number">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meta">Meta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="meta" class="form-control col-md-7 col-xs-12" name="meta" placeholder="Meta" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="fInicio" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Inicio<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fInicio" type="date" name="fInicio" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="fTerminacion" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Terminación<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fTerminacion" type="date" name="fTerminacion" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div id="rangos" class="item form-group">
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="observaciones" class="form-control col-md-7 col-xs-12" name="observaciones" placeholder="Observaciones" required="required"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urlMaps">Url de ubicacion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="urlMaps" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="urlMaps" placeholder="Url de ubicacion" required="required" type="url">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="photoMap" class="control-label col-md-3 col-sm-3 col-xs-12">Croquis de ubicacion<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="photoMap[]" type="file" name="photoMap[]" class="form-control col-md-7 col-xs-12" multiple="multiple" accept=".png, .jpg, .jpeg" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="evidencia" class="control-label col-md-3 col-sm-3 col-xs-12">Evicencia</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="evidencia[]" type="file" name="evidencia[]" class="form-control col-md-7 col-xs-12" multiple="multiple" accept=".png, .jpg, .jpeg" required="required">
                        </div>
                      </div>
                      <input type="hidden" name="allRanges" id="allRanges" />
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="btnFicha" type="button" class="btn btn-success">Registrar</button>
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
    <!-- moment js manejo de fechas -->
    <script src="../vendors/moment/moment.js"></script>
    <script src="./js/custom/dates.js"></script>
  </body>
</html>
<?php 
}
else{
  header('location:../index.php');
}
?>