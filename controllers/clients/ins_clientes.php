<?php
include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
  $nombre = htmlentities($_POST['nombre']);
  $direccion = htmlentities($_POST['direccion']);
  $telefono = htmlentities($_POST['telefono']);
  $correo = htmlentities($_POST['email']);
  $asesor = $_SESSION['nombre'];

  $id='';

  //insertar datos mysql
  $ins = $con->prepare("INSERT INTO clientes VALUES (?,?,?,?,?,?)");
  $ins->bind_param('isssss',$id,$nombre,$direccion,$telefono,$correo,$asesor);


  if ($ins->execute()) {
    header('location:../../views/partials/alerta.php?msj=Cliente registrado&c=cli&p=in&t=success');
  } else {
    header('location:../../views/partials/alerta.php?msj=Cliente no pudo ser registrado &c=cli&p=in&t=error');
  }


  $ins->close();
  $con->close();
}else {
  header('location:../../views/partials/alerta.php?msj=Utiliza el formulario &c=cli&p=in&t=error');
}

 ?>
