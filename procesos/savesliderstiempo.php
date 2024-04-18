
<?php

include('../config/app_config.php');
$d="DELETE FROM config WHERE 1";
$rd = mysql_query($d);

$sql = "INSERT INTO config VALUES ('',".$_POST['tiempo'].")";
mysql_query($sql);

echo '';

?>