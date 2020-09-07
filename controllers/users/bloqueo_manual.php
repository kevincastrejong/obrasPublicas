<?php
include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));
 
$userUpdate = $_SESSION['Id'];

if ($bloqueo == 1) {
  $up = $con->query("UPDATE usuario SET Active = 0, UpdateDate = now(), UpdateUserId = $userUpdate WHERE id = $id");
  if ($up) { //if interno
    header('location:../../views/partials/alerta.php?msj=El usuario ha sido bloqueado&c=us&p=viewUsers&t=success');
  }else {
      header('location:../../views/partials/alerta.php?msj=El usuario no ha podido ser bloqueado&c=us&p=viewUsers&t=error');
  } // cierre if interno

} else {
  $up = $con->query("UPDATE usuario SET Active = 1, UpdateDate = now(), UpdateUserId = $userUpdate WHERE id = $id");
  if ($up) { //if interno
    header('location:../../views/partials/alerta.php?msj=El usuario ha sido desbloqueado&c=us&p=viewUsers&t=success');
  }else {
      header('location:../../views/partials/alerta.php?msj=El usuario no ha podido ser desbloqueado&c=us&p=viewUsers&t=error');
  } // cierre if interno

}

$con->close();

?>
