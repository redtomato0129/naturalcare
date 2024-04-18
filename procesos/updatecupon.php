
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id']) && $_POST['id'] > 0)
{
if(($_POST['producto'] != 0))
{
	$bandera = 1;
}else
{
	$bandera=0;
}
	 $sql = "UPDATE cupones SET tipo='".$_POST['tipo']."',valor='".$_POST['valor']."',rango='".$_POST['rango']."',detalle='".$_POST['detalle']."',superior='".$_POST['superior']."',codigo='".$_POST['codcupon']."',producto='".$_POST['producto']."',bandera=".$bandera." WHERE id=".$_POST['id'];
	 
	mysql_query($sql);

	echo 'Cupon Editado';
}


?>