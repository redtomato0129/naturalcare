
<?php

include('../config/app_config.php');

$svalidar = "SELECT *FROM provincia WHERE provincia='".$_POST['provincia']."'";
$rvalidar = mysql_query($svalidar);
$validador=0;
while($fvalidar = mysql_fetch_array($rvalidar))
{
$validador++;
}

if($validador == 0)
{

$sql = "INSERT INTO provincias VALUES ('','".strtoupper($_POST['provincia'])."')";
mysql_query($sql);

}else
{
	echo "00::00";
}


?>