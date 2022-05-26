<?php
    include('../conexion.php');

    

    
    if(!empty($_POST["text_coment"]) && !empty($_POST["idProd"]) && (strlen($_POST["text_coment"])>=30 && strlen($_POST["text_coment"])<=1000)) {        
        $txtCom = $_POST["text_coment"];
        $valo = $_POST["valoracion"];
        $idProd = $_POST["idProd"];

        $CrearcomentarioSql="INSERT INTO comentario (text_coment, valoracion) VALUES ('$txtCom',".$valo.");";
        $Crearcomentario = mysqli_query($con, $CrearcomentarioSql);
        $idComent = mysqli_query($con,"SELECT * FROM comentario;");
        while($row = mysqli_fetch_array($idComent)) {
            $newDataRow = 0;
            $dataRow = $row['id_coment'];
            if($dataRow>$newDataRow){
                $newDataRow = $dataRow;
            } 
        }
        $LinkearcomentarioSql="INSERT INTO existe_en (id_coment, id_prod) VALUES (".$newDataRow.",".$idProd.")";
        $Linkearcomentario= mysqli_query($con, $LinkearcomentarioSql);
        $num_prod = $idProd;
        unset($_POST["idProd"]);
        unset($_POST["valoracion"]);
        unset($_POST["text_coment"]);
        $hostHeader = $_SERVER['HTTP_HOST'];
        $phpHeader = 'verProducto.php';
        $urlHeader = "https://$hostHeader/$phpHeader?id_prod=$num_prod";
        //header("Location: $urlHeader");
        header("Location: http://localhost/emprendedoresg2/verProducto.php?id_prod=$num_prod");
        die();
    }
?>