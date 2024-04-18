
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id'])){

$sql = "UPDATE natuser set contrasena='".md5($_POST['clave'])."' where id=".$_POST['id']." and contrasena='".$_POST['pass']."'";
mysql_query($sql);
echo "1";
}



?>