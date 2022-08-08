<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous"
    >
</head>
<?php
    include('./header.php');
    include_once('../backend/conexion.php');
    $alumnos = "SELECT id_alu, nom_alu, correo_alu, carrera_alu, gen_alu, autodesc_alu
    FROM alumno WHERE id_alu = $_SESSION[id]";
    $alu = mysqli_query($con, $alumnos);
    $row = mysqli_fetch_array($alu);
?>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="img">
                    <img src="/holaubb/assets/profile-user.png">
                </div>
            </div>
            <div class="content">
                <h2><?php echo $row['nom_alu'];?></h2>
                <p style="text-align: justify;"><?php echo $row['autodesc_alu'];?></p>
                <p><?php echo $row['carrera_alu'];?></p>
                <p><?php echo $row['correo_alu'];?></p>
                <p><?php echo $row['gen_alu'];?></p>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>