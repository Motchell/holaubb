<?php 
    session_start();
    if(isset($_SESSION['id'])){
        include_once "../conexion.php";
        $outgoing_id = $_SESSION['id'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO mensaje (id_destino, id_origen, cuerpo_men)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../../holaubb/usuarios.php");
    }
?>