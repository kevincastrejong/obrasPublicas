<?php  require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
  $Id = $_SESSION['Id'];
  //validaciones
  $nombre = $con->real_escape_string(htmlentities($_POST['name']));
  $correo = $con->real_escape_string(htmlentities($_POST['email']));

  $up = $con->query("UPDATE usuario set Name = '$nombre', Email = '$correo', UpdateDate = now(), UpdateUSerId = $Id WHERE Id = $Id ");

  if ($up) {
    $_SESSION['Name'] = $nombre;
    $_SESSION['Email'] = $correo;

    header('location:../../views/partials/alerta.php?msj=Datos actualizados &c=pe&p=pe&t=success');
  } else {
    header('location:../../views/partials/alerta.php?msj=Datos no actualizados &c=pe&p=pe&t=error');
  }
    $con->close();
} else {
    header('location:../../views/partials/alerta.php?msj=Utiliza el formulario &c=pe&p=pe&t=error');
}

?>
