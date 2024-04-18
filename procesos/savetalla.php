
<?php

include('../config/app_config.php');

$sql = "INSERT INTO tallas VALUES ('','".$_POST['talla']."','".$_POST['tipo']."','1')";
 
 mysql_query($sql);

echo 'Talla Agregada';

?>