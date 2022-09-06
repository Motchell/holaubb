<?php
    session_id("usuario");
    session_start();
    session_write_close();
    date_default_timezone_set("America/Santiago");
    setlocale(LC_ALL,"es_ES");
    $hostHeader = $_SERVER['HTTP_HOST'];
    $urlHeader = "http://$hostHeader/holaubb";

include('../conexion.php');
                        
$idEvento         = $_POST['idEvento'];

$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];

$UpdateProd = ("UPDATE evento 
    SET titulo_event ='$evento',
        fecha_ini ='$fecha_inicio',
        fecha_fin ='$fecha_fin',
        color_event ='$color_evento'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:$urlHeader/frontend/inicio.php");
die();
?>