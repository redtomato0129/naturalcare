
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id']) && $_POST['id'] > 0)
{
	$sql = "UPDATE productos_presentacion SET producto='".$_POST['producto']."',presentacion='".$_POST['presentacion']."',precio='".$_POST['valor']."' WHERE id=".$_POST['id'];
	mysql_query($sql);

	$ucarr = "UPDATE carrito SET precio='".$_POST['valor']."' WHERE producto='".$_POST['producto']."' and presentacion='".$_POST['presentacion']."'";
	mysql_query($ucarr);
}




?>