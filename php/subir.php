<?php

require 'conexion.php';
 
if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
    include('../includes/error0.php');
} else {
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
     
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
     
        $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
        $tipo = $_FILES['imagen']['type'];
        $fp     = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        @$data = mysql_escape_string($data);

        $resultado = mysql_query("INSERT INTO imagenes (imagen, tipo_imagen) VALUES ('$data', '$tipo')");
        if ($resultado){
             include('../includes/arriba.php');
        } else {
             include('../includes/resultado.php');
        }
    } else {
        echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
    }
}
?>