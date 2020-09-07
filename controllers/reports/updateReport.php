<?php
include '../conexion/conexion.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $Id = $con->real_escape_string(htmlentities($_POST['id']));
  $Avance = $con->real_escape_string(htmlentities($_POST['avance']));
  $Observaciones = $con->real_escape_string(htmlentities($_POST['observaciones']));
  $Gasto = $con->real_escape_string(htmlentities($_POST['gasto']));
  $UrlFiles = $con->real_escape_string(htmlentities($_POST['url']));

  $data = array();
  $userUpdate = $_SESSION['Id'];

  $up = $con->query("UPDATE reportes SET Avance='$Avance', Observaciones='$Observaciones', Gasto='$Gasto', UrlFiles='$UrlFiles', UpdateDate = now(), UpdateUserId = $userUpdate WHERE Id='$Id'");

  if ($up) {
      header('location:../../views/partials/alerta.php?msj=Datos actualizados&c=us&p=viewReports&t=success');
  } else {
    header('location:../../views/partials/alerta.php?msj=Los datos no pudieron ser actualizados&c=us&p=viewReports&t=error');
  } //end if interno


} else {
  header('location:../../views/partials/alerta.php?msj=Utiliza el formulario&c=us&p=viewReports&t=error');
}

$con->close();
?>