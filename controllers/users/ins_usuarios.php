<?php
    include '../conexion/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

      if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK)
      {
        
        $Email = $con->real_escape_string(htmlentities($_POST['email']));
        $Name = $con->real_escape_string(htmlentities($_POST['name']));
        $pass1 = $con->real_escape_string(htmlentities($_POST['password']));
        $Role = $con->real_escape_string(htmlentities($_POST['role']));

        $sel = $con->query("SELECT Id FROM usuario WHERE Email='".$Email."'");
        $row = mysqli_num_rows($sel);
        if ($row == 0) 
        {
          $errores = [];

          function validaRequerido($valor){
            return !(trim($texto) == '');
          }

          //el password se encuentra registrado

          if (!validaRequerido($Email)) {
            $errores[] = 'El campo Email es obligatorio.';
          }
          if (!validaRequerido($Name)) {
              $errores[] = 'El campo Nombre es obligatorio.';
          }
          if (!validaRequerido($pass1)) {
              $errores[] = 'El campo Password es obligatorio.';
          }
          if (!validaRequerido($Role)) {
              $errores[] = 'El campo Nivel es obligatorio.';
          }
          if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
            header('location:../../views/partials/alerta.php?msj=El Email no es valido&c=us&p=in&t=error');
          }
          elseif(!$errores){
            header('location:../../views/partials/alerta.php?msj=Revise que los campos esten correctos&c=us&p=in&t=error');
          }
          else
          {

          //se trata el archivo subido por el usuario.
          $fileTmpPath = $_FILES['photo']['tmp_name'];
          $fileName = $_FILES['photo']['name'];
          $fileSize = $_FILES['photo']['size'];
          $fileType = $_FILES['photo']['type'];
          $fileNameCmps = explode(".", $fileName);
          $fileExtension = strtolower(end($fileNameCmps));

          $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

          if (in_array($fileExtension, $allowedfileExtensions)) 
          {
            //se eliminan espacios en blanco y caracteres especiales en el nombre del archivo.
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            //se guarda el archivo en la ruta
            $uploadFileDir = '../../Uploads/ImgProfile/';
            $uploadFileDirDB = 'ImgProfile/'.$newFileName;
            $dest_path = $uploadFileDir . $newFileName;
            $password = sha1($pass1);

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
              $userId = $_SESSION['Id'];
              //insertar datos mysql
              $ins = $con->query("INSERT INTO usuario VALUES ('','$password','$Name','$Email', $Role ,'$uploadFileDirDB', 1 ,now() , now() , $userId , $userId)");
            //   $ins->bind_param('',$obra,$contratista,$localidad,$fechaInicio,$fechaTerminacion,$Latitud,$Longitud,$observaciones,$newFileName);
              if ($ins)
              {
                  header('location:../../views/partials/alerta.php?msj=usuario registrado correctamente&c=us&p=in&t=success');
              } 
              else 
              {
                  unlink($dest_path);
                  header('location:../../views/partials/alerta.php?msj=Ocurrio un error al registrar al usuario&c=us&p=in&t=error');
              }   
              $ins->close();
              $con->close();
            }
            else
            {
              header('location:../../views/partials/alerta.php?msj=Ocurrio un error al guardar la imagen&c=us&p=in&t=error');
            }

        }
        else
        {
          header('location:../../views/partials/alerta.php?msj=Archivo no valido.&c=us&p=in&t=error');
        }
      }
      }
      else
      {
        header('location:../../views/partials/alerta.php?msj=El Email ya existe en la base de datos&c=us&p=in&t=error');
      }

      }
      else
      {
        header('location:../../views/partials/alerta.php?msj=Selecciona un archivo&c=us&p=in&t=error');
      }
    }else {
      header('location:../../views/partials/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
    }


    ?>
