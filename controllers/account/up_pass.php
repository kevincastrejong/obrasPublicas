<?php  require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
  $Id = $_SESSION['Id'];
  //validaciones
  $pass = $con->real_escape_string(htmlentities($_POST['pass']));
  $pass2 = $con->real_escape_string(htmlentities($_POST['pass2']));

  if($pass == $pass2)
  {
    $passBase = sha1($pass2);

    $up = $con->query("UPDATE usuario SET Password='$passBase', UpdateDate = now(), UpdateUserId = $Id WHERE Id=$Id ");
  
    if ($up) {
  
      header('location:../../views/partials/alerta.php?msj=Password actualizado &c=us&p=pe&t=success');
    } else {
      header('location:../../views/partials/alerta.php?msj=Password NO actualizado &c=us&p=pe&t=error');
    }
      $con->close();
  }else{
    header('location:../../views/partials/alerta.php?msj=Las contraseñas no coinciden &c=us&p=pe&t=error');
  }

} else {
    header('location:../../views/partials/alerta.php?msj=Utiliza el formulario &c=us&p=pe&t=error');
}

?>
