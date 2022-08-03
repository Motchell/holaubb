<?php
    include('../conexion.php');
    $hostHeader = $_SERVER['HTTP_HOST'];
    $urlHeader = "http://$hostHeader/holaubb";

    if(isset($_POST['regAlu']) && isset($_GET['id_act'])) {
        $idAct = $_GET['id_act'];        
        if(is_array($_POST['alumnosArr'])){
            foreach($_POST['alumnosArr'] as $key => $idValue){
                $ingresarAluSQL ="INSERT INTO asignar (id_tutorado, id_act) VALUES (".$idValue.",".$idAct.");";
                $ingresarAlu = mysqli_query($con, $ingresarAluSQL);
            }
            header("Location: $urlHeader/frontend/actividades.php?sendActividad=2");
        }
    }else if(isset($_POST['delAlu']) && isset($_GET['id_act'])) {
        $idAct = $_GET['id_act'];        
        if(is_array($_POST['alumnosArr'])){
            foreach($_POST['alumnosArr'] as $key => $idValue){
                $quitarAluSQL ="DELETE FROM asignar WHERE id_tutorado = ".$idValue.";";
                $quitarAlu = mysqli_query($con, $quitarAluSQL);
            }
            header("Location: $urlHeader/frontend/actividades.php?sendActividad=5");
        }
    }
?>