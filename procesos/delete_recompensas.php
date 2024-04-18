
<?php

include('../config/app_config.php');

//borramos LOS PLANES
$sql = "DELETE FROM recompensas where id=".$_POST['id']." ";

	$go = mysql_query($sql);
	if ( $go == true) {
		echo 'el Registro fue borrado';
	} else{ echo ' No se borró el registro algo pasaaaa! ';}


?>