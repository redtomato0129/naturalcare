
<?php

include('../config/app_config.php');

$s = "SELECT *FROM usuario_admin WHERE id='1' and contrasena='".($_POST['act'])."'";
$r = mysql_query($s);
$f = mysql_fetch_array($r);
if(is_numeric($f['id']) && $f['id'] > 0)
{

$sql = "UPDATE usuario_admin set contrasena='".md5($_POST['rep'])."' ";
mysql_query($sql);
echo "1";

}else
{
	echo "00::00";
}



?>