
<?php

include('../config/app_config.php');

$dir_subida = '../imagenes/productos/';
$extension = end(explode(".", $_FILES['archivo']['name']));
$subir=$dir_subida.$_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],$subir);

$subir_dos=$dir_subida.$_FILES['archivo_dos']['name'];
move_uploaded_file($_FILES['archivo_dos']['tmp_name'],$subir_dos);

$subir_tres=$dir_subida.$_FILES['archivo_tres']['name'];
move_uploaded_file($_FILES['archivo_tres']['tmp_name'],$subir_tres);

$subir_cuatro=$dir_subida.$_FILES['archivo_cuatro']['name'];
move_uploaded_file($_FILES['archivo_cuatro']['tmp_name'],$subir_cuatro);



$svalidar = "SELECT *FROM productos WHERE codigo='".$_POST['codigo']."'";
//var_dump(die($svalidar));
$rvalidar = mysql_query($svalidar);
$validador=0;
while($fvalidar = mysql_fetch_array($rvalidar))
{
$validador++;
}




if($validador == 0)
{
	if($_FILES['archivo']['name'] != "")
	{

	$sql = "INSERT INTO productos VALUES ('','".$_POST['nombre']."','".$_POST['codigo']."','".$_POST['descripcion']."','".$_POST['precio']."','".$_POST['categoria']."','".$_POST['subcategoria']."','".$_POST['tallas']."','".$_POST['colores']."','".$_POST['uso']."','".$_POST['beneficios']."','".$_POST['frecuencia']."','".$_FILES['archivo']['name']."','".$_FILES['archivo_dos']['name']."','".$_FILES['archivo_tres']['name']."','".$_FILES['archivo_cuatro']['name']."','".$_POST['puntos']."','1',now(),'".$_POST['envio']."','".$_POST['plan']."','".$_POST['points']."')";
	$go = mysql_query($sql);
	// var_dump($sql);
	if ( $go == true) {
		echo 'Agregada';
	} else{ echo 'No se agregó';}
	//echo 'secundarias Agregada';
		
	}
}else
{
	echo "00::00";
}



?>