
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id']) && $_POST['id'] > 0)
{
	$sql = "UPDATE valores_envio SET ciudad='".$_POST['ciudad']."',valor='".$_POST['valor']."' WHERE id=".$_POST['id'];
	mysql_query($sql);
}




?>