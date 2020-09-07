<?php
    include '../conexion/conexion.php';
    header('Content-Type: application/json');

    $id = $con->real_escape_string(htmlentities($_GET['Id']));
    $myArray = array();

    if ($result = $con->query("SELECT f.Id, f.Obra FROM ficha f where Rubro = $id and Active = 1")) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
        echo json_encode($myArray);
    }
?>