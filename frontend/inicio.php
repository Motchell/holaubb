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


    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">

    <title>Inicio</title>
</head>
<body>

    <script src ="../js/jquery-3.0.0.min.js"> </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/moment.min.js"></script>
    <script type="text/javascript" src="../js/fullcalendar.min.js"></script>
    <script src='../locales/es.js'></script>

    <?php
        include('./header.php');
        include_once('../backend/conexion.php');
        //Query Actividad
        $id_t= $_SESSION['id'];
        $queryAct = "SELECT *, DATE_FORMAT(fecha_ini, '%d-%m-%Y %H:%i') as feIni, DATE_FORMAT(fecha_fin, '%d-%m-%Y %H:%i') as feFin
        FROM actividad INNER JOIN asignar ON actividad.id_act=asignar.id_act WHERE id_tutorado= $id_t";
        $alumno = mysqli_query($con, $queryAct);
        $numact = mysqli_num_rows($alumno);
        //Query Evento
        $id_alu = $_SESSION['id'];
        $queryEvent = "SELECT * FROM evento INNER JOIN agendar ON evento.id_event=agendar.id_event WHERE id_alu= $id_alu";
        $resulEventos = mysqli_query($con, $queryEvent);
    ?>

    <?php if ((isset($_GET['denialPermission']) == true)) : ?>
        <div class="modal fade" id="denied" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ALERTA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span>No tienes los permisos correspondientes.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif?>

    <?php  
        include('modalNuevoEvento.php');
        include('modalUpdateEvento.php');
    ?>
 <!-- Agenda -->
    <script>
    $(document).ready(function() {
        $("#calendar").fullCalendar({
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            locale: 'es',
            height:650,
            defaultView: "month",
            navLinks: true, 
            editable: true,
            eventLimit: true, 
            selectable: true,
            selectHelper: false,

        //Nuevo Evento
            select: function(start, end){
                $("#exampleModal").modal('toggle');
                $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
                var valorFechaFin = end.format("DD-MM-YYYY");
                var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
                $('input[name=fecha_fin').val(F_final);
            },
    
            events: [
                <?php while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
                    ,{
                    _id: '<?php echo $dataEvento['id_event']; ?>',
                    title: '<?php echo $dataEvento['titulo_event']; ?>',
                    start: '<?php echo $dataEvento['fecha_ini']; ?>',
                    end:   '<?php echo $dataEvento['fecha_fin']; ?>',
                    color: '<?php echo $dataEvento['color_event']; ?>'
                    },
                <?php } ?>
            ],

        //Eliminar Evento
            eventRender: function(event, element) {
                element
                    .find(".fc-content")
                    .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
                //Eliminar evento
                element.find(".closeon").on("click", function() {
                    var pregunta = confirm("Deseas Borrar este Evento?");   
                    if (pregunta) {
                        $("#calendar").fullCalendar("removeEvents", event._id);
                        $.ajax({
                            type: "POST",
                            url: 'deleteEvento.php',
                            data: {id:event._id},
                            success: function(datos){
                                $(".alert-danger").show();
                                setTimeout(function () { $(".alert-danger").slideUp(500); }, 3000);
                            }
                        });
                    }
                });
            },

        //Moviendo Evento Drag - Drop
            eventDrop: function (event, delta) {
                var idEvento = event._id;
                var start = (event.start.format('DD-MM-YYYY'));
                var end = (event.end.format("DD-MM-YYYY"));
                $.ajax({
                    url: 'drag_drop_evento.php',
                    data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
                    type: "POST",
                    success: function (response) {
                        //$("#respuesta").html(response);
                    }
                });
            },

        //Modificar Evento del Calendario 
            eventClick:function(event){
                var idEvento = event._id;
                $('input[name=idEvento').val(idEvento);
                $('input[name=evento').val(event.title);
                $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
                $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));
                $("#modalUpdateEvento").modal('toggle');
            },
        });
    //Oculta mensajes de Notificacion
        setTimeout(function () {
            $(".alert").slideUp(300);
        }, 3000); 
    });
    </script>
    
    <!-- CONTAINER -->
    <div class="container mt-5">
        <div class="row">
            <div class="col msjs">
                <?php include('msjs.php'); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9 mt-3">
                <div class="card" style="background-color:#9FA7B4">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <?php if (!($_SESSION["esAdmin"]) && $numact>0) : ?>   
        <div class="row justify-content-center">
            <div class="col-md-9 mt-3">
                <div class="card">
                    <div id='calendar'></div>
                    <div class="card-header">
                        <p><strong> Tienes <?php echo $numact?> actividad(es) en curso </strong></p>
                    </div>
                    <div class="resp-table p-4">
                        <table class="table table-responsive align-middle align-text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Término</th>
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
    </div>
</body>


<script>
    $(document).ready(function() {
        $('#denied').modal('toggle')
    });
</script>
</html>