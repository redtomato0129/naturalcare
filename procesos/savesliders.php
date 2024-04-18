
<?php

include('../config/app_config.php');

$dir_subida = '../imagenes/slider/';
$extension = end(explode(".", $_FILES['archivo']['name']));
$subir=$dir_subida.$_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],$subir);


if($_FILES['archivo']['name'] != "")
{

$sql = "INSERT INTO sliders VALUES ('','".$_POST['texto']."','".$_FILES['archivo']['name']."',0)";
 
 mysql_query($sql);

echo 'sliders Agregada';
	
}


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>