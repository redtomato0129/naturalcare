
<?php

include('../config/app_config.php');

$svalidar = "SELECT *FROM ciudades WHERE provincia='".strtoupper($_POST['provincia'])."' and ciudad='".strtoupper($_POST['ciudad'])."'";
$rvalidar = mysql_query($svalidar);
$validador=0;
while($fvalidar = mysql_fetch_array($rvalidar))
{
$validador++;
}

if($validador == 0)
{

$sql = "INSERT INTO ciudades VALUES ('".strtoupper($_POST['provincia'])."','".strtoupper($_POST['ciudad'])."')";
mysql_query($sql);

}else
{
	echo "00::00";
}


?>