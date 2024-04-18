
<?php

include('../config/app_config.php');



	//ACTUALIZAMOS LOS PLANES
	$sql = "UPDATE carrito SET 
	puntos_multiplicador='".$_POST['idCarrito']."',

	WHERE id=".$_POST['idCarrito'];

	$go = mysql_query($sql);
	if ( $go == true) {
		echo ' Registro agregado';
	} else{ echo ' No se agregó el registro algo pasaaaa! ';}


?>