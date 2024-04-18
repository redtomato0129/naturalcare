
<?php

include('../config/app_config.php');

$svalidar = "SELECT *FROM valores_envio WHERE ciudad='".$_POST['ciudad']."' WHERE estado='1'";
$rvalidar = mysql_query($svalidar);
$validador=0;
while($fvalidar = mysql_fetch_array($rvalidar))
{
$validador++;
}

if($validador == 0)
{

$sql = "INSERT INTO valores_envio VALUES ('','".$_POST['ciudad']."','".$_POST['valor']."','1')";
mysql_query($sql);

}else
{
	echo "00::00";
}


?>