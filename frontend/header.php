<?php
session_id("usuario");
session_start();
session_write_close();

if (!isset($_SESSION['nombre'])) {
	session_destroy();

	session_id("notlogged");
	session_start();
	$_SESSION['mensaje'] = 'Por favor inicie sesión antes de ingresar.';
	$_SESSION['sub_mensaje'] = 'Muchas gracias.';
	$_SESSION['tipo'] = 'danger';
	session_write_close();
	header('Location: ../index.php');
}
header('Content-Type: text/html; charset=UTF-8');
?>

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
    <style type="text/css">
        <?php
            $css = file_get_contents('../css/styles.css');
            echo $css;
        ?>
    </style>
</head>
<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light header-color container-bg">
        <div class="container-fluid justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-around" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    
                    <a class="navbar-brand align-self-center texto-bar me-5-md"><h1 class="letras-auto">HolaUBB<img class="img-size" src="/holaubb/assets/hello2.png"></h1></a>
                    
                    <a class="nav-link texto-bar align-self-center ms-5-md" id="inicio" href="/holaubb/frontend/inicio.php" title="Inicio"><img class="img-size" src="/holaubb/assets/hogar.png"></a>
                    <?php if ($_SESSION["esAdmin"]) : ?>
                        <a class="nav-link texto-bar align-self-center" id="actividad" href="/holaubb/frontend/actividades.php" title="Actividades"><img class="img-size" src="/holaubb/assets/activities.png"></a>
				    <?php endif; ?>
                    <a class="nav-link texto-bar align-self-center" id="chat" href="/holaubb/frontend/chat.php" title="Chats"><img class="img-size" src="/holaubb/assets/chat.png"></a>
                    <a class="nav-link texto-bar align-self-center" id="perfil" href="/holaubb/frontend/perfil.php" title="Perfil"><img class="img-size" src="/holaubb/assets/profile-user.png"></a>
                    <a class="nav-link texto-bar align-self-center" id="configurar" href="/holaubb/frontend/config.php" title="Configuración"><img class="img-size" src="/holaubb/assets/settings.png"></a>
                    <a class="nav-link texto-bar align-self-center" id="exit" href="/holaubb/backend/login/cerrarSesion.php" title="Cerrar Sesión"><img class="img-size" src="/holaubb/assets/logout.png"></a>
                    
                </div>
            </div>
        </div>
    </nav>
</header>
    <!--SCRIPTS ÚTILES-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</html>