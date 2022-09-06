<?php
    session_start();
    include_once "../conexion.php";

    $outgoing_id = $_SESSION['id'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    $sql = "SELECT * FROM alumno WHERE NOT id_alu = {$outgoing_id} AND (nom_alu LIKE '%{$searchTerm}%')";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "userBack.php";
    }else{
        $output = 'No se encuentran alumnos';
    }
    echo $output;
?>