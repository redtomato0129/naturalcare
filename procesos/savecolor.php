
<?php

include('../config/app_config.php');



if($_POST['idcolor'] > 0)
{

$sql = "UPDATE colores SET nombre='".$_POST['nombrecolor']."', color='".$_POST['color']."' WHERE id=".$_POST['idcolor'];
 
mysql_query($sql);

echo 'Color Editado';

}else
{
$sql = "INSERT INTO colores VALUES ('','".$_POST['nombrecolor']."','".$_POST['color']."','1')";
 
mysql_query($sql);

echo 'Color Agregado';
}



?>