<?php
include '../conexion/conexion.php';

$Id = $con->real_escape_string(htmlentities($_GET['id']));

$userUpdate = $_SESSION['Id'];

$up = $con->query("UPDATE usuario SET Active = 0, UpdateDate = now(), UpdateUserId = $userUpdate WHERE Id='$Id'");

if ($up) {
  header('location:../../views/partials/alerta.php?msj=Usuario eliminado&c=us&p=in&t=success');
} else {
  header('location:../../views/partials/alerta.php?msj=El nivel del usuario no pudo ser eliminado&c=us&p=in&t=error');
} //end if interno


 $con->close();

?>
