<?php
    include('../conexion.php');
    $hostHeader = $_SERVER['HTTP_HOST'];
    $urlHeader = "http://$hostHeader/holaubb";
    if(isset($_GET['id_act']) && isset($_POST['delAlu'])){
        $idAct = $_GET['id_act'];

        $consultarAsignaSQL = "SELECT * FROM asignar WHERE id_act = '$idAct';";
        $consultarAsigna = mysqli_query($con, $consultarAsignaSQL);
        
        if(mysqli_num_rows($consultarAsigna) > 0){
            $eliminarAsignadosSQL = "DELETE FROM asignar WHERE id_act = '$idAct';";
            $eliminarAsignados = mysqli_query($con, $eliminarAsignadosSQL);
        }
        
        $eliminarActSQL="DELETE FROM actividad WHERE id_act = '$idAct';";
        $eliminarAct = mysqli_query($con, $eliminarActSQL);

        header("Location: $urlHeader/frontend/actividades.php?sendActividad=4");
    }else if(isset($_POST['dontDelAlu']) && isset($_GET['id_act'])){
        header("Location: $urlHeader/frontend/actividades.php?sendActividad=6");
    }
?>