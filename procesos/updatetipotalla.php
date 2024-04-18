
<?php

include('../config/app_config.php');


if(is_numeric($_POST['id']))
{
	$sql = "UPDATE tipos_tallas SET tipo_talla='".$_POST['talla']."' WHERE id=".$_POST['id'];
	mysql_query($sql);
}
echo 'Talla Editada';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>