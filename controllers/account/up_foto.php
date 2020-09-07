<?php require '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
  $Id = $_SESSION['Id'];
  $foto = $_SESSION['Photo'];

//codigo para subir imagen
 $extension = '';
 $archivo = $_FILES['foto']['tmp_name'];
 $nombreArchivo = $_FILES['foto']['name'];
 $info = pathinfo($nombreArchivo);

 if ($archivo != '') {
   $extension = $info['extension'];
   if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
     unlink('../../Uploads/'.$foto);
     $newFileName = md5(time() . $fileName) . '.' . $extension;

     $uploadFileDir = '../../Uploads/ImgProfile/';
     $dest_path = $uploadFileDir . $newFileName;
     move_uploaded_file($archivo,$dest_path);
     $saveIn = 'ImgProfile/' . $newFileName;

     $up = $con->query("UPDATE usuario SET Photo='$saveIn', UpdateDate = now(), UpdateUserID = $Id WHERE Id=$Id ");

     if ($up) {
       //actualizar variable de session
       $_SESSION['Photo'] = $saveIn;
       header('location:../../views/partials/alerta.php?msj=Foto de perfil actualizada &c=pe&p=pe&t=success');
     } else {
       header('location:../../views/partials/alerta.php?msj=La foto de pefil no pudo ser actualizada &c=pe&p=pe&t=error');
     }
   } else {
     header('location:../../views/partials/alerta.php?msj=El formato no es valido &c=pe&p=pe&t=error');
     exit;
   }
 } else {
   header('location:../../views/partials/alerta.php?msj=No se detecto ninguna foto para actualizar &c=pe&p=pe&t=error');
 }


  $con->close();
} else {
    header('location:../../views/partials/alerta.php?msj=Utiliza el formulario &c=pe&p=pe&t=error');
}

?>
