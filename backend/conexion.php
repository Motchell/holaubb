<?php
echo "eco 1 ";
$db_host = "mysqltrans.face.ubiobio.cl";
$db_user = "G12taller";
$db_pass = "G12taller1102";
$db_name = "G12taller_bd";
echo "eco 2 ";

$conn = mysql_connect("$db_host", "$db_user", "$db_pass");
mysql_select_db("$db_name");
echo "eco 3 ";
/*$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    echo "No se pudo conectar a la base de datos.";
}*/
?>