
<?php

include('../config/app_config.php');

$dir_subida = '../imagenes/subcategorias/';

if(is_numeric($_POST['id']))
{

$sql = "UPDATE subcategorias SET categoria='".$_POST['categoria']."',descripcion='".$_POST['nombre']."'";

if($_FILES['archivo']['name']!= ""){
$sql.= ",foto='".$_FILES['archivo']['name']."'";
$subir=$dir_subida.$_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],$subir);
}
$sql .= " WHERE id=".$_POST['id'];

mysql_query($sql);
echo 'Sub-Categoria Editada';
}


?>