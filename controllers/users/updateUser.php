
<?php
include '../conexion/conexion.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $Id = $con->real_escape_string(htmlentities($_POST['id']));
  $Name = $con->real_escape_string(htmlentities($_POST['name']));
  $Email = $con->real_escape_string(htmlentities($_POST['email']));

  $data = array();
  $userUpdate = $_SESSION['Id'];

  $up = $con->query("UPDATE usuario SET Name='$Name', Email='$Email', UpdateDate = now(), UpdateUserId = $userUpdate WHERE Id='$Id'");

  if ($up) {
      header('location:../../views/partials/alerta.php?msj=Datos actualizados&c=us&p=viewUsers&t=success');
  } else {
    header('location:../../views/partials/alerta.php?msj=Los datos no pudieron ser actualizados&c=us&p=viewUsers&t=error');
  } //end if interno


} else {
  header('location:../../views/partials/alerta.php?msj=Utiliza el formulario&c=us&p=viewUsers&t=error');
}

$con->close();
?>