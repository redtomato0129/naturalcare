
<?php

include('../config/app_config.php');

function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
 
//Ejemplo de uso
 
//$codigo= generarCodigo(6);
$codigo= $_POST['codcupon'];
if(($_POST['producto'] != 0))
{
	$bandera = 1;
}else
{
	$bandera=0;
}

$sql = "INSERT INTO cupones VALUES ('','".$_POST['tipo']."','".$_POST['valor']."','".$_POST['rango']."','".$_POST['detalle']."',".$_POST['superior'].",'".$codigo."','1','',now(),'".$_POST['producto']."',".$bandera.")";
 
 mysql_query($sql);

echo 'Cupon '.$codigo.' creado';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>