
<?php

include('../config/app_config.php');

$sql = "UPDATE publicidad SET seccionb='".$_POST['texto']."'";
mysql_query($sql);




?>