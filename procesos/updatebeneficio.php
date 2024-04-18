
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id']) && $_POST['id'] > 0)
{
	
	if($_POST['ptocumpleanos'] > 0)
	{
		$sql = "UPDATE tipo_puntos SET puntos=".$_POST['ptocumpleanos']." WHERE id=2";
	mysql_query($sql);
	}

	if($_POST['ptoregistro'] > 0)
	{
		$sql = "UPDATE tipo_puntos SET puntos=".$_POST['ptoregistro']." WHERE id=1";
	mysql_query($sql);
	}

	if($_POST['ptodolar'] > 0)
	{
		$sql = "UPDATE tipo_puntos SET puntos=".$_POST['ptodolar']." WHERE id=3";
	mysql_query($sql);
	}
}




?>