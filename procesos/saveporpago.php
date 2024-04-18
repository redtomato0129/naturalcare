
<?php

include('../config/app_config.php');

$d="DELETE FROM descuentos WHERE 1";
mysql_query($d);

$sql = "INSERT INTO descuentos VALUES ('','".$_POST['pago']."','".$_POST['descuento']."')";
mysql_query($sql);




?>