
<?php

include('../config/app_config.php');


if(is_numeric($_POST['id'])){
$sql = "UPDATE subcategorias SET estado='2' where id=".$_POST['id'];
mysql_query($sql);

$sq = "UPDATE productos SET estado='2' where subcategoria='".$_POST['id']."'";
mysql_query($sq);

echo 'SubCategoria Eliminada';
}


?>