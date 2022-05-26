<?php
require_once('backend\conexion.php');

$rut = $_POST["rut_alu"];
$query = "SELECT * FROM alumno WHERE rut_alu='$rut'";
$alumno = mysqli_query($con, $query);

echo "mysqli_num_rows($alumno)";

$queryTutor = "SELECT * FROM alumno INNER JOIN tutor ON alumno.id_alu=tutor.id_tutor WHERE rut_alu='$rut'";
$tutor = mysqli_query($con, $queryTutor);

$hostHeader = $_SERVER['HTTP_HOST'];
$urlHeader = "https://$hostHeader/holaubb/";
echo "$hostHeader";

if (mysqli_num_rows($alumno) == 1) {

  // sesión usuario header('Location: ../index.php');
  session_id("usuario");
  session_start();
  $fila = mysqli_fetch_array($alumno);
  $_SESSION['id'] = $fila['id_alu'];
  $_SESSION['nombre'] = $fila['nom_alu'];
  if(mysqli_num_rows($tutor)>0){
    while($row = mysqli_fetch_array($tutor)){
        if($row['id_tutor'] == $_SESSION['id']){
          $_SESSION['esAdmin'] = $row['id_tutor'] == $_SESSION['id']? True : False;  
        }
    }
  }else{
    $_SESSION['esAdmin'] = false;
  } 

  session_write_close();
  header("Location: $urlHeader/frontend/inicio.php");

} else {
  session_id("notlogged");
	session_start();
	$_SESSION['mensaje'] = 'Usuario incorrecto.';
	$_SESSION['sub_mensaje'] = 'Por favor inténtelo nuevamente.';
	$_SESSION['tipo'] = 'danger';
	session_write_close();
	header("Location: $urlHeader/index.php");
}

/*$hostHeader = $_SERVER['HTTP_HOST'];
            $phpHeader = 'index.php';
            $urlHeader = "https://$hostHeader/$phpHeader";        
            header("Location: $urlHeader");*/