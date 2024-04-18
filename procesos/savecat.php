
<?php

include('../config/app_config.php');

$sql = "INSERT INTO categorias VALUES ('','".$_POST['nombre']."','','1')";
mysql_query($sql);
echo 'Categoria Creada';



?>