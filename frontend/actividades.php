<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
    <title>Actividades</title>
    <style type="text/css">
        <?php
            $css = file_get_contents('css/styles.css');
            echo $css;
        ?>
    </style>
    
</head>
<body>
    <!--Inicio php-->
    <?php
        include('./header.php');
        include_once('../backend/conexion.php');
        $actividades = "SELECT id_act, nom_act, desc_act, fecha_ini, fecha_fin,
        DATE_FORMAT(fecha_ini, '%d-%m-%Y %T') as feIni, DATE_FORMAT(fecha_fin, '%d-%m-%Y %T') as feFin
        FROM actividad WHERE id_tutor = $_SESSION[id]";
        $act = mysqli_query($con, $actividades);
    ?>
    <!--Fin php-->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-3">
                <div class="card">
                    <div class="card-header">
                        <p>Añadir actividad</p>
                    </div>
                    <form class="p-4" method="POST" action="/holaubb/backend/actividad/ingresarActividad.php" onsubmit="return validarChar(nomAct.value, descAct.value);">
                        <div class="mb-3">
                            <label class="form-label">Nombre de la actividad: </label>
                            <input type="text" class="form-control" name="nomAct" autofocus
                            onkeypress="return (event.charCode != 39 && event.charCode != 34 && event.charCode != 168 && event.charCode !=180)"
                            >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción: </label>
                            <input type="text ajustable" class="form-control" name="descAct" autofocus
                            onkeypress="return (event.charCode != 39 && event.charCode != 34 && event.charCode != 168 && event.charCode !=180)"
                            >
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Fecha de inicio</label>
                                <input type="datetime-local" class="form-control" name="fechaIni" autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Fecha de término</label>
                                <input type="datetime-local" class="form-control" name="fechaFin" autofocus>
                            </div>
                        </div>
                        <div class="mb-3">      
                            <input type="submit" class="btn btn-primary" value="Ingresar actividad">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="card">
                    <div class="card-header">
                        Lista de actividades
                    </div>
                    <div class="p-4">
                        <table class="table table-responsive align-middle align-text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Termino</th>
                                    <th scope="col" colspan="2">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($rows = mysqli_fetch_array($act)){
                                    $id_act = $rows['id_act'];
                                    $nom_act = $rows['nom_act'];
                                    $desc_act = $rows['desc_act'];
                                    $fecha_iniEdit = $rows['fecha_ini'];
                                    $fecha_finEdit = $rows['fecha_fin'];
                                    $fecha_ini = $rows['feIni'];
                                    $fecha_fin = $rows['feFin'];

                                    $tutorados = "SELECT * FROM tutorado INNER JOIN alumno ON tutorado.id_tutorado=alumno.id_alu WHERE id_tutor = $_SESSION[id]";
                                    $tuto = mysqli_query($con, $tutorados);
                            ?>
                            <tr>
                                <td><?php echo "$nom_act"?></td>
                                <td><?php echo "$desc_act"?></td>
                                <td><?php echo "$fecha_ini"?></td>
                                <td><?php echo "$fecha_fin"?></td>
                                <td>
                                    <a class="bttn-bg" data-bs-toggle="modal" data-bs-target="#ModalAddTutorado<?php echo$id_act?>"><img class="bttn-size" src="/holaubb/assets/add-group.png"></a>
                                    <a class="bttn-bg" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo$id_act?>"><img class="bttn-size" src="/holaubb/assets/edit-button.png"></a>   
                                    <a class="bttn-bg" href="/holaubb/backend/actividad/eliminarActividad.php?id_act=<?php echo$id_act?>"><img class="bttn-size" src="/holaubb/assets/bin.png"></a>
                                </td>
                            </tr>

                            <!--MODAL EDIT-->
                            
                            <div class="modal fade" id="ModalEdit<?php echo$id_act?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edición de actividad: <?php echo $nom_act?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="" method="POST" action="/holaubb/backend/actividad/editarActividad.php?id_act=<?php echo $id_act?>" onsubmit="return validarChar(nomActEdit.value, descActEdit.value);">
                                        
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nombre de la actividad: </label>
                                                <input type="text" class="form-control" name="nomActEdit" value="<?php echo "$nom_act"?>" autofocus
                                                onkeypress="return (event.charCode != 39 && event.charCode != 34 && event.charCode != 168 && event.charCode !=180)"
                                                >
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Descripción: </label>
                                                <input type="text" class="form-control" name="descActEdit" value="<?php echo "$desc_act"?>" autofocus
                                                onkeypress="return (event.charCode != 39 && event.charCode != 34 && event.charCode != 168 && event.charCode !=180)"
                                                >
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Fecha de inicio</label>
                                                <input type="datetime-local" class="form-control" value="<?php echo "$fecha_iniEdit"?>" name="fechaIniEdit" autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Fecha de término</label>
                                                <input type="datetime-local" class="form-control" value="<?php echo "$fecha_finEdit"?>" name="fechaFinEdit" autofocus>
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" value="cambiar-actividad">Guardar cambios</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--MODAL AÑADIR TUTORADOS-->

                            <div class="modal fade" id="ModalAddTutorado<?php echo$id_act?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Añadir tutorados a la actividad: <?php echo $nom_act?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="/holaubb/backend/actividad/linkearTutorado.php?id_act=<?php echo $id_act?>">
                                        
                                        <div class="modal-body">
                                            <?php
                                                while($rowsT = mysqli_fetch_array($tuto)){
                                                    $nom_tutorado = $rowsT['nom_alu'];
                                                    $id_tutorado = $rowsT['id_tutorado'];                                                    
                                            ?>
                                                <div class="m-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input box-chk" type="checkbox" name="flexCheckDefault<?php echo$id_tutorado?>">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            <?php echo $nom_tutorado ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="selects();" value="selCheckBoxes">Seleccionar todos</button>
                                            <button type="submit" class="btn btn-primary" value="realizar-cambios">Realizar cambios</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <?php
                                }
                            ?> 
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/holaubb/js/validaciones.js"></script>
</html>