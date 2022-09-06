
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    
</head>
<body>
    <?php
        include('./header.php');
        include_once('../backend/conexion.php');
    ?>



    <div class="wrapper mx-auto my-5">
        <section class="chat-area">
        <header>
            <?php 
            if(isset($_GET['user_id'])){
                $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
                $sql = mysqli_query($con, "SELECT * FROM alumno WHERE id_alu = {$user_id}");
                
                if(mysqli_num_rows($sql) > 0){
                    $sql = mysqli_query($con, "SELECT * FROM alumno WHERE id_alu = {$_SESSION['id']}");
                        if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                        }
                }else{
                    header("location: ../usuarios.php");
                }
            }
            
            ?>
            <a href="usuarios.php" class="back-icon black"><i class="fas fa-arrow-left"></i></a>
            <img src="../assets/profile-user.png" alt="">
            <div class="details">
            <span>
            <?php
                $nomAlu = mysqli_query($con, "SELECT * FROM alumno WHERE id_alu = {$user_id}");
                $rows = mysqli_fetch_assoc($nomAlu);
                list($nombreA, $apellidoA) = explode(' ', $rows['nom_alu'] );
                echo $nombreA. " " .$apellidoA
            ?>
            </span>
                <p>
                    <?php 
                        if($rows['id_estado'] == 1){
                            echo "Online";
                        }else{
                            echo "Offline";
                        }
                    ?>
                </p>
            </div>
        </header>
        <div class="chat-box">
            
        </div>
        <form action="#" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Ingresa un mensaje aquí..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
        </section>
        </div>
        
        <script src="../js/chat.js"></script>
    
</body>
</html>