<?php
session_id("usuario");
session_start();
session_write_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Inicio</title>
</head>
<body>
<?php
        include('./header.php');
        include_once('../backend/conexion.php');
        $id_t= $_SESSION['id'];
        $query = "SELECT * FROM actividad INNER JOIN asignar ON actividad.id_act=asignar.id_act WHERE id_tutorado= $id_t";
        $alumno = mysqli_query($con, $query);
        $numact = mysqli_num_rows($alumno);
        
    ?>

    <?php if (!($_SESSION["esAdmin"]) && $numact>0) : ?>

                  
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-9 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <p>Tienes <?php echo $numact?> en curso</p>
                        </div>
                        <div class="resp-table p-4">
                        <table class="table table-responsive align-middle align-text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Termino</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($rows = mysqli_fetch_array($alumno)){
                                    $id_act = $rows['id_act'];
                                    $nom_act = $rows['nom_act'];
                                    $desc_act = $rows['desc_act'];
                                    $fecha_ini = $rows['fecha_ini'];
                                    $fecha_fin = $rows['fecha_fin'];
                            ?>
                            <tr>
                                <td><?php echo "$nom_act"?></td>
                                <td><?php echo "$desc_act"?></td>
                                <td><?php echo "$fecha_ini"?></td>
                                <td><?php echo "$fecha_fin"?></td>
                            </tr>
                        <?php
                            }
                        ?> 
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</body>
</html>