<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous"
    > -->
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
    <div class="container containerProfile mt-5">
        <div class="card cardProfile">
            <div class="card-header card-headerProfile">
                <div class="img">
                    <img src="/holaubb/assets/profile-user.png">
                </div>
            </div>
            <div class="card-tittle">
                <h2><?php echo $row['nom_alu'];?></h2>
                <p><?php echo $row['gen_alu'];?></p>
            </div>
            <div class="content mb-3">
                <p><?php echo $row['carrera_alu'];?></p>
                <p><?php echo $row['correo_alu'];?></p>
                <p style="text-align: justify;"><?php echo $row['autodesc_alu'];?></p>
            </div>
        </div>
    </div>
    
</body>
</html>