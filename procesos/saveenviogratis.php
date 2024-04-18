
<?php

include('../config/app_config.php');

$d="DELETE FROM envio_gratis WHERE 1";
mysql_query($d);

$sql = "INSERT INTO envio_gratis VALUES ('','".$_POST['cupon']."')";
mysql_query($sql);




?>