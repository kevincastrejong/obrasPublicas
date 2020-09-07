<?php
include '../conexion/conexion.php';

//comprobar que todo se envia por post
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
  $email = $con->real_escape_string(htmlentities($_POST['Username']));
  $password = $con->real_escape_string(htmlentities($_POST['Password']));


  //si existen espacios enviamos alertas
  if($email == null && $password == null){
    header('location:../../views/partials/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
  } 
  else 
  {
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
      header('location:../../views/partials/alerta.php?msj=El Email no es valido&c=us&p=in&t=error');
    }
    else
    {
    $pass = sha1($password);
    //consulta a la base de datos
    $sel = $con->query("SELECT Id, Name, Role, Email, Photo, Password  FROM usuario WHERE Email='".$email."' AND Password='".$pass."' AND Active = 1 ");
    $row = mysqli_num_rows($sel);

    if ($row == 1) 
    {
       if ($var = $sel-> fetch_assoc() ) 
       {
         $Id = $var['Id'];
         $Name = $var['Name'];
         $Role = $var['Role'];
         $Email = $var['Email'];
         $Photo = $var['Photo'];
         $Password = $var['Password'];
       }

       //validar para que el usuario pueda entrar al logeo 
       if ($Email == $email && $Password == $pass && ($Role == 1 || $Role == 2 || $Role == 3 || $Role == 4)) 
       {
         // si todo es correcto, creamos variables de session
         $_SESSION['Logged'] = true;
         $_SESSION['Id'] = $Id;
         $_SESSION['Name'] = $Name;
         $_SESSION['Role'] = $Role;
         $_SESSION['Email'] = $Email;
         $_SESSION['Photo'] = $Photo;
         header('location:../../views/partials/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
       } 
        else 
        {
         header('location:../../views/partials/alerta.php?msj=No tienes el permiso para entrar&c=salir&p=salir&t=error');
        }
    } 
    else 
    {
      header('location:../../views/partials/alerta.php?msj=Usuario y/o contraseña erroneo&c=salir&p=salir&t=error');
    }
  }
  }

}
else 
{
  //en caso de que los datos no lleguen por post el usuario va de salida
  header('location:../../views/partials/alerta.php?msj=Utiliza el Formulario&c=salir&p=salir&t=error');
}


?>
