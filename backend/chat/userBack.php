<?php
    while($row = mysqli_fetch_assoc($query)){
        
        $sql2 = "SELECT * FROM mensaje WHERE (id_destino = {$row['id_alu']}
                OR id_origen = {$row['id_alu']}) AND (id_origen = {$outgoing_id} 
                OR id_destino = {$outgoing_id}) ORDER BY id_men DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['cuerpo_men'] : $result ="No hay mensajes disponibles.";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['id_alu'])){
            ($outgoing_id == $row2['id_alu']) ? $you = "Tú: " : $you = "";
        }else{
            $you = "";
        }
        ($row['id_estado'] == "2") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id_alu']) ? $hid_me = "hide" : $hid_me = "";
        list($nombreA, $apellidoA) = explode(' ', $row['nom_alu']);
        $output .= '<a id='.$row['id_alu'].' href="chat.php?user_id='. $row['id_alu'] .'">
                    <div class="content">
                    <img src="../assets/profile-user.png" alt="">
                    <div class="details">
                        <span>'. $nombreA. " " . $apellidoA .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>