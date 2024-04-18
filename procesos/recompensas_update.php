
<?php

include('../config/app_config.php');



	//ACTUALIZAMOS LOS PLANES
	$sql = "UPDATE recompensas SET 
	descripcion='".$_POST['descripcion']."',
	valor_usd='".$_POST['valor_usd']."',
	pts_equiv='".$_POST['pts_equiv']."',
	max_uso='".$_POST['max_uso']."',
	min_uso='".$_POST['min_uso']."' 

	WHERE id=".$_POST['id'];

	$go = mysql_query($sql);
	if ( $go == true) {
		echo ' Registro actualizado';
	} else{ echo ' No se actualizó el registro algo pasaaaa! ';}


?>