
<?php

include('../config/app_config.php');



	//INSERTAMOS EL REGISTRO DE LA OPERACIÓN
	$sql = "INSERT INTO recompensas VALUES (
	'',
	'".$_POST['descripcion']."',
	'".$_POST['valor_usd']."',
	'".$_POST['pts_equiv']."',
	'".$_POST['min_uso']."',
	'".$_POST['max_uso']."'
	)";

	$go = mysql_query($sql);
	if ( $go == true) {
		echo ' Registro agregado';
	} else{ echo ' No se agregó el registro algo pasaaaa! ';}


?>