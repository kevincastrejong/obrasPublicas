<?php
include '../conexion/conexion.php';
header('Content-Type: application/json');

$Id = $con->real_escape_string(htmlentities($_GET['Id']));
$data = array();
$sel = $con->query("SELECT * FROM ficha WHERE Id = '$Id'");
$row = mysqli_num_rows($sel);

if ($row == 1) 
{
    $userData = $sel->fetch_assoc();
    $data['status'] = 'ok';
    $data['result'] = $userData;
}
else{
    $data['status'] = 'err';
    $data['result'] = '';
}
echo json_encode($data);

$con->close();

?>