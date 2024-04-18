
<?php

include('../config/app_config.php');


switch ($_POST['metodo']) {
	case 'insert':
		 $sql = "insert into puntos_descuentos (dolares,puntos,minimo,estado) values('".$_POST['ptodolares']."',".$_POST['pto'].",'".$_POST['minimo']."',1)";
		mysql_query($sql);
		break;
	case 'borrar':
		 $sql = "delete from puntos_descuentos where id=".$_POST['id']."";
		mysql_query($sql);
		break;
	
	
}






?>