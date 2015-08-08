<?php

$servidor = "localhost";
$usuario = "root";
$clave = "fedora";
$base_de_datos = "imagenes";

mysql_connect($servidor, $usuario, $clave) or die(mysql_error()) ;
mysql_select_db($base_de_datos) or die(mysql_error()) ;

?>
