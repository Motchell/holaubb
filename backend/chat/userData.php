<?php
    session_start();
    include_once('../conexion.php');
    $outgoing_id = $_SESSION['id'];
    $sql = "SELECT * FROM alumno WHERE NOT id_alu = {$outgoing_id} ORDER BY id_alu DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "userBack.php";
    }
    echo $output;
?>