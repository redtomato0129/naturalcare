
<?php

include('../config/app_config.php');

$dir_subida = '../imagenes/subcategorias/';
//$dir_subida = '../imagenes/';
//$extension = end(explode(".", $_FILES['archivo']['name']));
$subir=$dir_subida.$_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],$subir);


$sql = "INSERT INTO subcategorias VALUES ('','".$_POST['categoria']."','".$_POST['nombre']."','".$_FILES['archivo']['name']."','1',0)";
mysql_query($sql);
echo 'Sub-Categoria Creada';



?>