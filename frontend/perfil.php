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
    if(isset($_GET['user'])){
        $profile_id = $_GET['user'];
        $alumnoBusqueda = "SELECT * FROM alumno WHERE id_alu = $profile_id;";
        $aluBus = mysqli_query($con, $alumnoBusqueda);
    }
?>
<body>
    <div class="container containerProfile mt-5">
        <div class="card cardProfile">
            <?php if(!isset($_GET['user'])){
                $alumnos = "SELECT id_alu, nom_alu, correo_alu, carrera_alu, gen_alu, autodesc_alu
                FROM alumno WHERE id_alu = $_SESSION[id]";
                $alu = mysqli_query($con, $alumnos);
                $row = mysqli_fetch_array($alu);
            ?>
                <div class="card-header card-headerProfile">
                    <div class="img">
                        <img src="/holaubb/assets/profile-user.png">
                    </div>
                </div>
                <div class="card-tittle">
                    <h2><?php echo utf8_encode($row['nom_alu']);?></h2>
                    <p><?php echo utf8_encode($row['gen_alu']);?></p>
                </div>
                <div class="content mb-3">
                    <p><?php echo utf8_encode($row['carrera_alu']);?></p>
                    <p><?php echo utf8_encode($row['correo_alu']);?></p>
                    <p style="text-align: justify;"><?php echo utf8_encode($row['autodesc_alu']);?></p>
                </div>
            <?php
            }else if(isset($_GET['user']) && mysqli_num_rows($aluBus)==1){
                $row = mysqli_fetch_array($aluBus);
            ?>
                <div class="card-header card-headerProfile">
                    <div class="img">
                        <img src="/holaubb/assets/profile-user.png">
                    </div>
                </div>
                <div class="card-tittle">
                    <h2><?php echo utf8_encode($row['nom_alu']);?></h2>
                    <p><?php echo $row['gen_alu'];?></p>
                </div>
                <div class="content mb-3">
                    <p><?php echo utf8_encode($row['carrera_alu']);?></p>
                    <p><?php echo utf8_encode($row['correo_alu']);?></p>
                    <p style="text-align: justify;"><?php echo utf8_encode($row['autodesc_alu']);?></p>
                </div>
            <?php
            }else{
            ?>
            <div class="row justify-content-center">
                <div class="col align-self-center">
                    <div class="card-header card-headerProfile">
                        <img class="danger-signal" src="/holaubb/assets/danger-sing.png" alt="">
                        <h2>No se ha encontrado el perfil.</h2>
                    </div>     
                </div>
            </div>
                       
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    
</body>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</html>