
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id'])){
$sql = "UPDATE categorias SET estado='2' where id=".$_POST['id'];
mysql_query($sql);

$sq = "UPDATE productos SET estado='2' where categoria='".$_POST['id']."'";
mysql_query($sq);

echo 'Categoria Eliminada';
}


?>