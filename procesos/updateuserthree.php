
<?php

include('../config/app_config.php');
session_start();
if(is_numeric($_SESSION['idcarrito']) && $_SESSION['idcarrito'] > 0)
{
	$sql = "UPDATE natuser SET provincia='".$_POST['provincia']."',ciudad='".$_POST['ciudad']."',direccion='".$_POST['direccion']."',referencia='".$_POST['referencia']."' WHERE id=".$_SESSION['idcarrito'];
	mysql_query($sql);
}




?>