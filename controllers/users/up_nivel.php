<?php
  include '../conexion/conexion.php';
  header('Content-Type: application/json');

  $Id = $con->real_escape_string(htmlentities($_POST['Id']));
  $Role = $con->real_escape_string(htmlentities($_POST['Role']));
  $userUpdate = $_SESSION['Id'];

  $up = $con->query("UPDATE usuario SET Role='$Role', UpdateDate = now(), UpdateUserId = $userUpdate WHERE Id='$Id'");

  if ($up) {
    echo 1;
  } else {
    header('location:../../views/partials/alerta.php?msj=El nivel del usuario no pudo ser actualizado&c=us&p=viewUsers&t=error');
  } //end if interno


  $con->close();
?>
