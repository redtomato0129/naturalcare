
<?php

include('../config/app_config.php');
session_start();
if(is_numeric($_SESSION['idcarrito']) && $_SESSION['idcarrito'] > 0)
{
	$sql = "UPDATE natuser SET ruc='".$_POST['ruc']."',direccionf='".$_POST['direccionf']."',razon='".$_POST['razon']."',telefonof='".$_POST['telefonof']."' WHERE id=".$_SESSION['idcarrito'];
	mysql_query($sql);
}




?>