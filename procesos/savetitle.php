
<?php

include('../config/app_config.php');

$sql = "UPDATE publicidad SET titulo='".$_POST['texto']."'";
mysql_query($sql);




?>