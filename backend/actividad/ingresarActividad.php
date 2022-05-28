
<?php
    session_id("usuario");
    session_start();
    session_write_close();
    $hostHeader = $_SERVER['HTTP_HOST'];
    $urlHeader = "http://$hostHeader/holaubb";

    include('../conexion.php');
    if(!empty($_POST["nomAct"]) && !empty($_POST["descAct"]) && !empty($_POST["fechaIni"] && !empty($_POST["fechaFin"]))) {
        if(strlen($_POST["nomAct"])<=120 && strlen($_POST["descAct"])<=500){
            $nom_act = $_POST["nomAct"];
            $descAct = $_POST["descAct"];
            $fechaIni = $_POST["fechaIni"];
            $fechaFin= $_POST["fechaFin"];

            $ingresarActSQL="INSERT INTO actividad (id_tutor, nom_act, desc_act, fecha_ini, fecha_fin) VALUES
            ($_SESSION[id],'".$nom_act."','".$descAct."','".$fechaIni."','".$fechaFin."');";
        
            $ingresarAct = mysqli_query($con, $ingresarActSQL);
            unset($_POST["nom_Act"]);
            unset($_POST["descAct"]);
            unset($_POST["fechaIni"]);
            unset($_POST["fechaFin"]);

        }
    }
    header("Location: $urlHeader/frontend/actividades.php");
    die();
?>