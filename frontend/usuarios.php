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
            <section class="users">
            <header>
                <div class="content">
                <?php 
                    $sql = mysqli_query($con, "SELECT * FROM alumno WHERE id_alu = {$_SESSION['id']}");
                    if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                    list($nombreA, $apellidoA) = explode(' ', $row['nom_alu']);
                    }
                ?>
                <img src="../assets/profile-user.png">
                <div class="details">
                    <span><?php echo $nombreA. " " .$apellidoA ?></span>
                    <p>
                        <?php 
                            if($row['id_estado'] == 1){
                                echo "Online";
                            }else{
                                echo "Offline";
                            }
                        ?>
                    </p>
                    
                </div>
                </div>
            </header>
            <div class="search">
                <span class="text">Selecciona a un usuario para chatear...</span>
                <input type="text" placeholder="Introduce un nombre para buscar">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            </div>
            </section>
    </div>

    <script src="../js/usuarios.js"></script>
</body>
</html>