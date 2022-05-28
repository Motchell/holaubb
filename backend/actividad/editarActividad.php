<?php

    include('../conexion.php');
    $hostHeader = $_SERVER['HTTP_HOST'];
    $urlHeader = "http://$hostHeader/holaubb";
    if(!empty($_POST["nomActEdit"]) && !empty($_POST["descActEdit"]) && !empty($_POST["fechaIniEdit"] && !empty($_POST["fechaFinEdit"]))) {       
        if(strlen($_POST["nomActEdit"])<=120 && strlen($_POST["descActEdit"])<=500){
            $id_actEdit = $_GET["id_act"];
            $nom_actEdit = $_POST["nomActEdit"];
            $descActEdit = $_POST["descActEdit"];
            $fechaIniEdit = $_POST["fechaIniEdit"];
            $fechaFinEdit = $_POST["fechaFinEdit"];

            $EditarActSQL="UPDATE actividad SET nom_act='$nom_actEdit', desc_act='$descActEdit',
            fecha_ini='$fechaIniEdit', fecha_fin='$fechaFinEdit' WHERE id_act = $id_actEdit AND id_tutor = 1;";
        
            $EditarAct = mysqli_query($con, $EditarActSQL);

            $newNom = $nom_actEdit;
            unset($_POST["nom_ActEdit"]);
            unset($_POST["descActEdit"]);
            unset($_POST["fechaIniEdit"]);
            unset($_POST["fechaFinEdit"]);

        }
    }
    header("Location: $urlHeader/frontend/actividades.php");
    die();
?>