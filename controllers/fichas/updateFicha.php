<?php
include '../conexion/conexion.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $Id = $con->real_escape_string(htmlentities($_POST['id']));

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
    // $fechaInicio = htmlentities($_POST['fInicio']);
    // $fechaTerminacion = htmlentities($_POST['fTerminacion']);
    $descripcion = htmlentities($_POST['descripcion']);
    $antecedentes = htmlentities($_POST['antecedentes']);
    $objetivo = htmlentities($_POST['objetivo']);
    $observaciones = htmlentities($_POST['observaciones']);

  $data = array();
  $userUpdate = $_SESSION['Id'];

  $up = $con->query("UPDATE ficha SET Obra='$obra', nObra=$nObra, nContrato=$nContrato, Fuente=$fuente, Contratista='$contratista', Localidad='$localidad', Direccion='$direccion', Municipio='$municipio', Monto=$monto, PobBeneficiada=$pobBeneficiada, Meta='$meta', Descripcion='$descripcion', Antecedentes='$antecedentes', Objetivo='$objetivo', Observaciones='$observaciones', Rubro=$rubro, UpdateDate = now(), UpdateUserId = $userUpdate WHERE Id='$Id'");

  if ($up) {
      header('location:../../views/partials/alerta.php?msj=Datos actualizados&c=us&p=viewFichas&t=success');
  } else {
    header('location:../../views/partials/alerta.php?msj=Los datos no pudieron ser actualizados&c=us&p=viewFichas&t=error');
  } //end if interno


} else {
  header('location:../../views/partials/alerta.php?msj=Utiliza el formulario&c=us&p=viewFichas&t=error');
}

$con->close();
?>