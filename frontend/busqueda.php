<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
    include('./header.php');
    include_once('../backend/conexion.php');
    $result = $_GET['result'];
    $search = "SELECT * FROM alumno WHERE nom_alu LIKE '%$result%'";
    $buscar = mysqli_query($con, $search);
?>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <h3>Resultados de la búsqueda</h3>
                    </div>
                
                    <div class="card-body">
                        <?php if(isset($_GET['search']) && $_GET['result'] !="" && mysqli_num_rows($buscar)>0){
                            while($rows = mysqli_fetch_array($buscar)){
                                $alu_id = $rows['id_alu'];
                                $alu_name = $rows['nom_alu'];
                                $alu_gen = $rows['gen_alu'];
                                $alu_carr = $rows['carrera_alu'];
                        
                        ?>
                        <div class="list-group">
                            <a href="/holaubb/frontend/perfil.php?user=<?php echo $alu_id?>" class="list-group-item list-group-item-action text-reset" aria-current="true">
                                <div class="row align-items-center">
                                    <div class="col-1">
                                        <img src="../assets/profile-user.png" class="profile-search"alt="">
                                    </div>
                                    <div class="col-4">
                                        <?php echo utf8_encode($alu_name);?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo utf8_encode($alu_gen);?>
                                    </div>
                                    <div class="col-3">
                                        <?php echo utf8_encode($alu_carr);?>
                                    </div>
                                </div>
                                
                            </a>
                        </div>
                        <?php
                            }
                        }else{
                        ?>
                            <p class="card-text">No se han encontrado resultados con esa búsqueda.</p>
                        <?php    
                        }
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</html>