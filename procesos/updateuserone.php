
<?php

include('../config/app_config.php');
session_start();
if(is_numeric($_SESSION['idcarrito']) && $_SESSION['idcarrito'] > 0)
{
	 $sql = "UPDATE natuser SET nombres='".$_POST['nombres']."',apellidos='".$_POST['apellidos']."',telefono='".$_POST['telefono']."',celular='".$_POST['celular']."',cumple='".$_POST['cumple']."' WHERE id=".$_SESSION['idcarrito'];
	mysql_query($sql);
}




?>