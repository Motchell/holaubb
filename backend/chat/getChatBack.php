<?php 
    session_start();
    if(isset($_SESSION['id'])){
        include_once "../conexion.php";
        $outgoing_id = $_SESSION['id'];
            $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
            $output = "";
            $sql = "SELECT * FROM mensaje LEFT JOIN alumno ON alumno.id_alu = mensaje.id_origen
                    WHERE (id_origen = $outgoing_id AND id_destino = $incoming_id)
                    OR (id_origen = $incoming_id AND id_destino = $outgoing_id) ORDER BY id_men";
            $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['id_origen'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['cuerpo_men'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="../assets/profile-user.png" alt="">
                                <div class="details">
                                    <p>'. $row['cuerpo_men'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíes uno aparecerá aquí.</div>';
        }
        
        echo $output;
    }else{
        header("location: ../holaubb/usuarios.php");
    }
?>