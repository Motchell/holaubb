<?php
    /*if(texto1.length > 120){
        alert('El nombre excede los 120 caracteres permitidos.');
        var salida = false;
    }   
    if(texto2.length > 500){
        alert('La descripción excede los 500 caracteres permitidos.');
        var salida = false;
    }
    if(texto.length >=0 && texto.length <=120){
        var salida = true;     
    }*/
    include('../conexion.php');
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

            /*$hostHeader = $_SERVER['HTTP_HOST'];
            $phpHeader = 'index.php';
            $urlHeader = "https://$hostHeader/$phpHeader";        
            header("Location: $urlHeader");*/
        }
    }
    header("Location: http://localhost/holaubb/frontend/actividades.php");
    die();
?>