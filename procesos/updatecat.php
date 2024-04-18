
<?php

include('../config/app_config.php');

if(is_numeric($_POST['id']))
{
$sql = "UPDATE categorias set descripcion='".$_POST['nombre']."' WHERE id=".$_POST['id'];
mysql_query($sql);
echo 'Categoria Editada';
}


?>