<?php
    include('../conexion.php');
    $hostHeader = $_SERVER['HTTP_HOST'];
    $urlHeader = "http://$hostHeader/holaubb";
    if(isset($_GET['id_act'])){
        $idAct = $_GET['id_act'];
        $eliminarActSQL="DELETE FROM actividad WHERE id_act = '$idAct';";
        $eliminarAct = mysqli_query($con, $eliminarActSQL);

        header("Location: $urlHeader/frontend/actividades.php");
    }
?>