
<?php
session_start();
/* Función */



include('../config/app_config.php');


$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];

$datos = "SELECT *FROM usuario_admin";
$rdatos = mysql_query($datos);
$fdatos = mysql_fetch_array($rdatos);

$arreglopuntos = explode("::", $_POST['puntos']);
$valor = $arreglopuntos[0];
$puntos = $arreglopuntos[1];
$sql = "INSERT INTO carrito_puntos VALUES ('','".$_SESSION['idcarrito']."','".$puntos."',now(),'".$valor."')";
$res=mysql_query($sql);
if($res == true)
{
	
	echo "1";
	$secu = "SELECT `AUTO_INCREMENT` as valor
				FROM  INFORMATION_SCHEMA.TABLES
				WHERE TABLE_SCHEMA = 'natujwoc_web'
				AND   TABLE_NAME   = 'points_history' ";
				$rsecu = mysql_query($secu);
				$fsecu = mysql_fetch_array($rsecu);

	$ipto = "INSERT INTO points_history VALUES (
				".$fsecu['valor'].",
				now(),
				0,
				".$puntos.",
				0,
				".$_SESSION["idcarrito"].",
				'Compra en sitio web',
				0,
				0
				)";
				mysql_query($ipto);
}

		


		








?>