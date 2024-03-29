
# Hola UBB

Este es un proyecto dirigido a los estudiantes recién ingresados
en la universidad del Bío-Bío, el que también será manipulado por
tutores de las respectivas carreras. Ésta aplicación entrega herramientas
que pueden ser usadas en cualquier momento.



## Software Stack

El proyecto web está trabajado sobre la siguiente lista de software:

- Ubuntu: 20.04
- PHP: 7.4.28 
- Apache: 2.4.53 (Debian)
- MySQL: 8.0.28


## Configuraciones de Ejecución para Entorno de Desarrollo/Producción
### Git

Instalar Git:

* sudo apt-get install git-all 

Cambiar de directorio al siguiente:

* cd /var/www/html

Clonar repo:

* git clone https://github.com/Motchell/holaubb.git

### Credenciales de Base de Datos y Variables de Ambiente

Editar archivo backend/conexion.php
```
    <?php
    $db_host="url_host"; 
    $db_user="usuario";
    $db_pass="contraseña";
    $db_name="nombre_basededatos";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    ?>
```

### Docker

Una vez dentro de una terminal, ir al directorio raíz donde 
se hizo el clone. Se debe ejecutar la siguiente serie de comandos para el
funcionamiento correcto del Docker:

* docker build -t holaubb .
* docker pull mysql: 8.0
* docker run -p 3306:3306 --name *dbName* -v *dbUrl* -e MYSQL_ROOT_PASSWORD=*dbPassword* -d mysql:8.0

En el directorio /var/www/html del contenedor hacer:

* docker run -dtip 8080:80 --name *ProyectName* -v ${PWD}:/var/www/html/holaubb --link *dbName* holaubb

Cambiar permisos para permitir la correcta ejecución de la aplicación en entorno local

* chmod -R 777 holaubb/

Arrancar el servicio de Apache http Server con

* service apache2 start

Para ingresar a MySql y poblar:

* docker exec -i -t *dbName* /bin/bash

### Maquina virtual Ubuntu LTS

En caso de utilizarse, dirigirse al directorio donde anteriormente se clonó el repositorio e iniciar con:

* php -S localhost:8080

Ahora, puede ir a la url por defecto http://localhost:8080

## Instalar dependencias del proyecto

Instalar PHP 7.4 y Apache2

* sudo apt install php-7.4 libapache2-mod-php7.4 -y

Instalar MySql

* apt-get install -y php7.4-mysql

Reiniciar servicio Apache

* service apache2 restart

## Construido sobre
* PHP 7.4
* JavaScript

## Integrantes
* Amanda Acevedo
* Mitchell Hidalgo