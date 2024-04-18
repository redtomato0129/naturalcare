
<?php

include('../config/app_config.php');
$dir_subida = '../imagenes/publicidad/';
//$dir_subida = '../imagenes/';
//$extension = end(explode(".", $_FILES['archivo']['name']));
$subir=$dir_subida.$_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],$subir);


$sql = "UPDATE publicidad SET secciona='".$_FILES['archivo']['name']."'";
mysql_query($sql);




?>