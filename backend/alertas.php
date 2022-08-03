<?php 
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==1){
        echo "<script> 
        alert('Se ingresó una actividad correctamente.');
        </script>";
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==2){
        echo "<script> 
        alert('Se registraron los alumnos a la actividad correctamente.');
        </script>";
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==3){
        echo "<script> 
        alert('Se editaron los registros correctamente.');
        </script>";
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==4){
        echo "<script> 
        alert('Se eliminó la actividad correctamente');
        </script>";
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==5){
        echo "<script> 
        alert('Se quitaron los alumnos de la actividad correctamente.');
        </script>";
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==6){
        echo "<script> 
        alert('No se realizaron cambios');
        </script>";
    }
?>