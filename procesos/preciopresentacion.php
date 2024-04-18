
<?php

include('../config/app_config.php');


$sql = "Select *from productos_presentacion where producto='".$_POST['id']."' and presentacion='".$_POST['presentacion']."' and estado='1'";
$result= mysql_query($sql);
$fdatos = mysql_fetch_array($result);

if($fdatos['id'] > 0){
 echo "".number_format($fdatos['precio'],2);
}else
{
 echo "".number_format($_POST['precio'],2);
}


	



?>