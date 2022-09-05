<?php 
    if(isset($_GET['sendActividad'])){
        $actId = $_GET['sendActividad'];
    }

    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==1){

?>
    <div class="modal fade" id="sendAct" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actividad registrada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span>Se ingresó la actividad correctamente.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
            </div>
        </div>
    </div>
<?php
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==2){
?>
    <div class="modal fade" id="sendAct" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alumno(s) registrado(s)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span>Se añadieron el/los alumno(s) a la actividad correctamente.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
            </div>
        </div>
    </div>
<?php
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==3){
?>
    <div class="modal fade" id="sendAct" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actividad editada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span>Se editó la actividad correctamente.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
            </div>
        </div>
    </div>
<?php
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==4){
?>
    <div class="modal fade" id="sendAct" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actividad eliminada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span>Se eliminó la actividad correctamente.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
            </div>
        </div>
    </div>
<?php
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==5){
?>
    <div class="modal fade" id="sendAct" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alumno(s) quitado(s)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span>Se eliminaron el/los alumno(s) de la actividad correctamente.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
            </div>
        </div>
    </div>
<?php
    }
    if(isset($_GET['sendActividad']) && $_GET['sendActividad']==6){        
?>
    <div class="modal fade" id="sendAct" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actividad intacta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <span>No se registraron cambios.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" name="Aceptar">Aceptar</button>
                    </div>
            </div>
        </div>
    </div>
<?php
    }
?>