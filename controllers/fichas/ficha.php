<?php
require '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    //validacion de carga correcta del archivo
    if (isset($_FILES['photoMap']) &&  isset($_FILES['evidencia']))
    {
       
            $errores = [];

            //se reciben los datos.
            $obra = htmlentities($_POST['obra']);
            $fuente = htmlentities($_POST['fuente']);
            $nObra = htmlentities($_POST['nObra']);
            $nContrato = htmlentities($_POST['nContrato']);
            $contratista = htmlentities($_POST['contratista']);
            $localidad = htmlentities($_POST['localidad']);
            $direccion = htmlentities($_POST['direccion']);
            $municipio = htmlentities($_POST['municipio']);
            $monto = htmlentities($_POST['monto']);
            $pobBeneficiada = htmlentities($_POST['pobBeneficiada']);
            $meta = htmlentities($_POST['meta']);
            $rubro = htmlentities($_POST['rubro']);
            $fechaInicio = htmlentities($_POST['fInicio']);
            $fechaTerminacion = htmlentities($_POST['fTerminacion']);
            $observaciones = htmlentities($_POST['observaciones']);
            $urlMaps = htmlentities($_POST['urlMaps']);
            $allRanges = json_decode($_POST['allRanges']); 
            
            //servidor
            //path archivos de mapa
            $uploadFileDirMap = '../../Uploads/UploadsFilesFichaMap/';
            //path archivos de evidencia
            $uploadFileDir =  '../../Uploads/UploadsFilesFicha/';

            // //local
            // //path archivos de mapa
            // $uploadFileDirMap = $_SERVER['DOCUMENT_ROOT']. '/new_obras_publicas/Uploads/UploadsFilesFichaMap/';
            // //path archivos de evidencia
            // $uploadFileDir = $_SERVER['DOCUMENT_ROOT']. '/new_obras_publicas/Uploads/UploadsFilesFicha/';

            $fileNamesEvidencia = saveFiles($_FILES['evidencia'], $uploadFileDir);
            $fileNamesMap = saveFiles($_FILES['photoMap'], $uploadFileDirMap);

            $userId = $_SESSION['Id'];
            //insertar datos mysql
            $ins = $con->query("INSERT INTO ficha VALUES ('','$obra','$nObra','$nContrato','$fuente','$contratista','$localidad','$direccion','$municipio','$monto','$pobBeneficiada','$meta','$fechaInicio','$fechaTerminacion','','','','$observaciones','$fileNamesMap', '$fileNamesEvidencia' ,'$urlMaps','$rubro',now(),now(),$userId,$userId,1)");
            //   $ins->bind_param('',$obra,$contratista,$localidad,$fechaInicio,$fechaTerminacion,$Latitud,$Longitud,$observaciones,$newFileName);
            $lastId = $con->insert_id;
            if ($ins)
            {
                foreach ($allRanges as $row) {
                    $FichaId = $lastId;
                    $fInicio = $row->fInicio;
                    $fTerminacion = $row->fTerminacion;
                    $monto = $row->monto;
                    $sql = "INSERT INTO rangos VALUES('', '$FichaId', '$fInicio', '$fTerminacion', '$monto',now(),now(),$userId,$userId,1)";
                    $con->query($sql);
                    }
                    if ($sql) {
                        header('location:../../views/partials/alerta.php?msj=Ficha registrada correctamente&c=ficha&p=insertFicha&t=success');
                    } else {
                        unlink($dest_path);
                        $sql = "Delete from ficha where Id = $lastId";
                        $con->query($sql);
                        header('location:../../views/partials/alerta.php?msj=Ocurrio un error al guardar la ficha&c=ficha&p=insertFicha&t=error');
                    }
            } 
            else 
            {
                unlink($dest_path);
                header('location:../../views/partials/alerta.php?msj=Ocurrio un error al guardar la ficha&c=ficha&p=insertFicha&t=error');
            }   
            $ins->close();
            $con->close();

     }
    else
    {
        header('location:../../views/partials/alerta.php?msj=Ocurrio un error al cargar el archivo&c=ficha&p=insertFicha&t=error');
    }
}
else 
{
    header('location:../../views/partials/partials/alerta.php?msj=Utiliza el formulario &c=cli&p=in&t=error');
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
