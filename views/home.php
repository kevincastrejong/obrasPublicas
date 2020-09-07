<?php
session_start();
if(isset($_SESSION['Logged'])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Obras Publicas | </title>

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
        
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                <center><h1>BIENVENIDO AL SISTEMA DE CONTROL DE OBRAS</h1></center>
                <center><h2>DE LA SECRETARIA DE OBRAS PUBLICAS DEL ESTADO DE MORELOS</h2></center>
                <center><img src="images/obrasmor.jpg"></center>
              </div>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>    
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
else{
  header('location:../index.php');
}
?>

