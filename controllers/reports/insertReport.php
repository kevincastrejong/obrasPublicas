<?php
    include '../conexion/conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      if (isset($_FILES['evidencia']))
      {
        $avance = htmlentities($_POST['avance']);
        $observaciones = htmlentities($_POST['observaciones']);
        $gasto = htmlentities($_POST['gasto']);
        $obra = htmlentities($_POST['obra']);

        $errores = [];

        function validaRequerido($valor){
          return !(trim($texto) == '');
        }
        if (!validaRequerido($avance)) {
          $errores[] = 'El campo avance es obligatorio.';
        }
        if (!validaRequerido($observaciones)) {
          $errores[] = 'El campo observaciones es obligatorio.';
        }
        if (!validaRequerido($gasto)) {
          $errores[] = 'El campo gasto es obligatorio.';
        }
        if (!validaRequerido($obra)) {
          $errores[] = 'El campo obra es obligatorio.';
        }

        if($errores)
        {
          //servidor
          //path archivos de evidencia
          $uploadFileDir =  '../../Uploads/UploadsFilesReports/';
          
          //local
          //path archivos 
          // $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/new_obras_publicas/Uploads/UploadsFilesReports/';
          
          //guardar archivos
          $fileNamesEvidencia = saveFiles($_FILES['evidencia'], $uploadFileDir);

          $userId = $_SESSION['Id'];
          //insertar datos mysql
          $ins = $con->query("INSERT INTO reportes VALUES ('','$avance','$observaciones','$gasto','$fileNamesEvidencia',$obra ,now() , now() , $userId , $userId, 1)");
        //   $ins->bind_param('',$obra,$contratista,$localidad,$fechaInicio,$fechaTerminacion,$Latitud,$Longitud,$observaciones,$newFileName);
          if ($ins)
          {
              header('location:../../views/partials/alerta.php?msj=reporte registrado correctamente&c=us&p=insertReport&t=success');
          } 
          else 
          {
              header('location:../../views/partials/alerta.php?msj=Ocurrio un error al guardar el reporte&c=us&p=insertReport&t=error');
          }   
          $ins->close();
          $con->close();
        
        }
        else
        {
          header('location:../../views/partials/alerta.php?msj=Llena todos los campos&c=us&p=insertReport&t=error');
        }
      }
      else{
        header('location:../../views/partials/alerta.php?msj=Ocurrio un error al subir los archivos.&c=us&p=insertReport&t=error');
      }
    }
    else 
    {
      header('location:../../views/partials/alerta.php?msj=Utiliza el formulario&c=us&p=insertReport&t=error');
    }
function saveFiles($files, $uploadFileDir){
  $fileNames = "";

    foreach($files['tmp_name'] as $key => $tmp_name)
    {
        $fileTmpPath = $files['tmp_name'][$key];
        $fileName = $files['name'][$key];
        $fileSize = $files['size'][$key];
        $fileType = $files['type'][$key];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        $newName = generateFileName($fileName, $fileExtension);
        $fileNames = $fileNames . $newName . ";";

        move_uploaded_file($fileTmpPath, $uploadFileDir . $newName);
        
        //bajar calidad de imagen
        $image = new Imagick($uploadFileDir . $newName);
        $image->thumbnailImage(400,600);
        $image->writeImage($uploadFileDir . $newName);

    }
    return $fileNames;
  }
  
  function generateFileName($fileName, $fileExtension){
      //se eliminan espacios en blanco y caracteres especiales en el nombre del archivo.
      return md5(time() . $fileName) . '.' . $fileExtension;
  }
  
?>
