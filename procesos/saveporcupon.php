
<?php

include('../config/app_config.php');

$d="DELETE FROM registro WHERE 1";
mysql_query($d);

$sql = "INSERT INTO registro VALUES ('','".$_POST['cupon']."')";
mysql_query($sql);




?>