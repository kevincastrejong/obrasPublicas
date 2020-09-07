<?php
include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));
 
$userUpdate = $_SESSION['Id'];

if ($bloqueo == 1) {
  $up = $con->query("UPDATE ficha SET Active = 0, UpdateDate = now(), UpdateUserId = $userUpdate WHERE id = $id");
  if ($up) { //if interno
    header('location:../../views/partials/alerta.php?msj=La ficha se dio de baja&c=us&p=viewFichas&t=success');
  }else {
      header('location:../../views/partials/alerta.php?msj=Error al dar de baja la ficha&c=us&p=viewFichas&t=error');
  } // cierre if interno

} else {
  $up = $con->query("UPDATE ficha SET Active = 1, UpdateDate = now(), UpdateUserId = $userUpdate WHERE id = $id");
  if ($up) { //if interno
    header('location:../../views/partials/alerta.php?msj=La ficha ha sido reactivada&c=us&p=viewFichas&t=success');
  }else {
      header('location:../../views/partials/alerta.php?msj=Error al reactivar la ficha&c=us&p=viewFichas&t=error');
  } // cierre if interno

}

$con->close();

?>