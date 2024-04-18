
<?php
include('../config/app_config.php');

if(is_numeric($_POST['id']))
{
	$sql = "UPDATE tallas SET estado='2' where id=".$_POST['id']." ";
	mysql_query($sql);
	echo 'Talla Eliminada';
}

/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>