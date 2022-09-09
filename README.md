
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



# Zaiko Kanri

Un servicio de arriendo de trajes, vestidos y accesorios generico que resuelve la necesidad de registrar productos y posteriormente reservarlos, está dirigido para PYMES que necesiten un sistema sencillo y facil de entender.

## Software stack
El proyecto Zaiko Kanri es una aplicación web que corre sobre el siguiente software:

- Ubuntu 20.04.4
- Apache 2.4.41
- PHP 7.4 (ext: curl, mysql)
- Base de Datos MySQL 8.0.29 o 5.7

## Configuraciones de Ejecución para Entorno de Desarrollo/Producción

### Git

Instalar Git

`sudo apt-get install git-all`

Al tener ya instalado git, se tiene que cambiar al directorio web document root

`cd /var/www/html/`

Clonar el repositorio

`git clone https://github.com/Benjax14/inventario.git`

### Credenciales de Base de Datos y variables de ambiente

Editar el archivo modelos/conexion.php

```
    <?php

    $db_host="url_host"; 
    $db_user="usuario";
    $db_pass="contraseña";
    $db_name="nombre_basededatos";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    ?>
```

## Docker o Maquina virtual Ubuntu LTS

### Docker

> En el repositorio se encuentra un Dockerfile que puedes utilizar y te puedes saltar la instalación de las dependencias que están más abajo.

Con una terminal situarse dentro del directorio raiz donde fue clonado este repositorio, por ej: ~/git/mi-proyecto/.
Una vez situado en la raiz del proyecto, dirigirse al directorio docker y ejecutar lo siguiente para construir la imagen docker:

`docker build -t inventario .`

Instalar el contenedor de MySql

`docker pull mysql:5.7`

Ejecutamos el siguiente comando para iniciar MySql

`docker run -p 3306:3306 --name *NombreDB* -v *URL_DB* -e MYSQL_ROOT_PASSWORD=*ContraseñaDB* -d mysql:5.7`

Una vez construida la imagen, lanzar un contenedor montando un volumen que contenga el código del repositorio, en el directorio /var/www/html del contenedor.

`docker run -dtip 8080:80 --name *NombreProyecto* -v ${PWD}:/var/www/html/inventario --link *NombreDB* inventario`

Iniciar el servicio de Apache Http Server

`service apache2 start`

Comando para ingresar a MySql y poblar con datos

`docker exec -ti basedatos /bin/bash`

### Maquina virtual Ubuntu LTS

Con una terminal situarse dentro del directorio raiz donde fue clonado este repositorio, por ej: ~/git/mi-proyecto/.
Una vez situado en la raiz del proyecto, ejecutar el siguiente comando para ejecutar el localhost

`php -S localhost:8080`

Posteriormente, puede dirigir al url que deja por defecto: http://localhost:8080

> Si el repositorio está en una carpeta más atras (Ej: ../inventario/index.php) se debe agregar a la url de http://localhost:8080

## Instalar dependencias del proyecto
Cambiar al directorio web document root (Apache) del contenedor

`cd /var/www/html/inventario`

Instalar PHP 7.4 y Apache2

`sudo apt install php-7.4 libapache2-mod-php7.4 -y`

Instalar MySql

`apt-get install -y php7.4-mysql`

Reinicie el servicio Apache

`service apache2 restart`

Ir a un navegador web y ejecutar la siguiente url .../inventario/index.php

## Construido con

- Bootstrap 4 - HTML, CSS, and JS Frontend Framework
- JavaScript - programming language

## Agradecimientos

- Mi mamita
- Mi mamita y papito