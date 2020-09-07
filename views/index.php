<?php
require '../controllers/conexion/conexion.php';
if(isset($_SESSION['Logged']))
{
  if($_SESSION['Role'] == 1 || $_SESSION['Role'] == 2 || $_SESSION['Role'] == 3)
  {
    $sel = $con->query("SELECT * FROM rubros");
    $row = mysqli_num_rows($sel);

?>
<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Obras Publicas |</title>

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
                <center><h3>Avance de Obra</h3></center>
              </div>
            </div>
            <form class="form-horizontal form-label-left" action="../controllers/reports/insertReport.php" method="POST" enctype="multipart/form-data" novalidate>
                      </p>
                      <span class="section"><span id="avance" class="navbar-right">Avance total de obra 0%</span></span>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Fuente de recurso
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Contratista
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Numero de obra
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Numero de contrato
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Direccion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Municipio
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Monto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Poblacion Beneficiada
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Fecha de inicio
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avance">Fecha de Terminacion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="avance" class="form-control col-md-7 col-xs-12" name="avance">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gasto">Gasto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gasto" class="form-control col-md-7 col-xs-12" name="gasto">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gasto">URL de ubicacion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gasto" class="form-control col-md-7 col-xs-12" name="gasto">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observaciones
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="observaciones" class="form-control col-md-7 col-xs-12" name="observaciones"></textarea>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label for="evidencia" class="control-label col-md-3 col-sm-3 col-xs-12">Evicencia</label>
                        <label>
                            <div class="popup-gallery">
                              <?php
                                $imagenes = explode(";", $f['Evidence']);
                                $longitud = count($imagenes);
                                if($imagenes[0] != null){
                              ?>
                              <!-- <a href="<?php echo 'http://localhost:90/new_obras_publicas/Uploads/UploadsFilesFicha/' . $imagenes[0]?>" title="<?php echo $imagenes[0]?>">
                                    <img src="<?php echo 'http://localhost:90/new_obras_publicas/Uploads/UploadsFilesFicha/' . $imagenes[0]?>" width="75" height="75">
                              </a> -->
                              <a href="<?php echo '../Uploads/UploadsFilesFicha/' . $imagenes[0]?>" title="<?php echo $imagenes[0]?>">
                                    <img src="<?php echo '../Uploads/UploadsFilesFicha/' . $imagenes[0]?>" width="75" height="75">
                              </a>
                              <?php 
                                }
                                else{
                                  ?>
                                  <a href="http://bosquelya.com/img/no-disponible.png" title="no hay archivos">
                                    <img src="http://bosquelya.com/img/no-disponible.png" width="75" height="75">
                                  </a>
                                  <?php

                                }
                                for($i=1; $i<$longitud -1; $i++){
                                  ?>
                                    <!-- <a style="display:none" href="<?php echo 'http://localhost:90/new_obras_publicas/Uploads/UploadsFilesFicha/' . $imagenes[$i]?>" title="<?php echo $imagenes[$i]?>">
                                      <img src="<?php echo 'http://localhost:90/new_obras_publicas/Uploads/UploadsFilesFicha/' . $imagenes[$i]?>" width="75" height="75">
                                    </a> -->
                                    <a style="display:none" href="<?php echo '../Uploads/UploadsFilesFicha/' . $imagenes[$i]?>" title="<?php echo $imagenes[$i]?>">
                                      <img src="<?php echo '../Uploads/UploadsFilesFicha/' . $imagenes[$i]?>" width="75" height="75">
                                    </a>
                                    <?php 
                                }
                              ?>
                            </div>
                        </label>
                      </div>
                    </form>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <center><h2>Grafica de lineas</h2></center>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <center><h2>Grafica de barras</h2></center>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="mybarChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page content -->
  <?php require 'partials/footer.php' ?>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<?php 
  }
  else 
  {
    header('location:home.php');
  }
}
else{
  header('location:../index.php');
}
?>

