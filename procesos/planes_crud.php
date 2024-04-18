
<?php

include('../config/app_config.php');



	//ACTUALIZAMOS LOS PLANES
	$sql = "UPDATE points_group SET 
	puntos_multiplicador='".$_POST['xpoints']."',
	puntosminimos='".$_POST['valormin']."',
	puntosmaximos='".$_POST['valormax']."',
	puntos_cumple='".$_POST['cumple']."' 

	WHERE id=".$_POST['pid'];

	$go = mysql_query($sql);
	if ( $go == true) {
		echo ' Registro agregado';
	} else{ echo ' No se agregó el registro algo pasaaaa! ';}


?>