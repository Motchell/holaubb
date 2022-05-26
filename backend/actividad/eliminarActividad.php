<?php
    include('../conexion.php');
    if(isset($_GET['id_act'])){
        $idAct = $_GET['id_act'];
        $eliminarActSQL="DELETE FROM actividad WHERE id_act = '$idAct';";
        $eliminarAct = mysqli_query($con, $eliminarActSQL);

        header("Location: http://localhost/holaubb/frontend/actividades.php");
    }
?>