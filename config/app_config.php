<?php



$servidor = "localhost"; 

$usuario = "natujwoc_dev"; 

$contrasenha = "TP@U%_KN]l&9"; 

$BD = "natujwoc_web";



$conexion = @mysql_connect($servidor, $usuario, $contrasenha);
mysql_set_charset('utf8', $conexion);

if (!$conexion) {

die('<strong>No pudo conectarse:</strong> ' . mysql_error());

}

mysql_select_db($BD, $conexion) or die(mysql_error($conexion));

session_start();




?>