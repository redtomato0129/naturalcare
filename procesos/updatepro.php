
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




$sql = "UPDATE productos SET nombre='".$_POST['nombre']."'
		,codigo='".$_POST['codigo']."'
		,precio='".$_POST['precio']."'
		,descripcion='".$_POST['descripcion']."'
		,categoria='".$_POST['categoria']."'
		,subcategoria='".$_POST['subcategoria']."'
		,tallas='".$_POST['tallas']."'
		,uso='".$_POST['uso']."'
		,frecuencia='".$_POST['frecuencia']."'
		,beneficio='".$_POST['beneficios']."'
		,estrellas='".$_POST['puntos']."'
		,colores='".$_POST['colores']."'
		,points_val='".$_POST['points']."'
		,points_group_id='".$_POST['plan']."'
		,envio=".$_POST['envio']."";



if($_FILES['archivo']['name'] != "")
{

$sql.= ",foto_uno='".$_FILES['archivo']['name']."'";
}


if($_FILES['archivo_dos']['name'] != "")
{

$sql.= ",foto_dos='".$_FILES['archivo_dos']['name']."'";
}

if($_FILES['archivo_tres']['name'] != "")
{

$sql.= ",foto_tres='".$_FILES['archivo_tres']['name']."'";
}

if($_FILES['archivo_cuatro']['name'] != "")
{

$sql.= ",foto_cuatro='".$_FILES['archivo_cuatro']['name']."'";
}

echo $sql .= " WHERE id=".$_POST['id'];
mysql_query($sql);


$ucarr = "UPDATE carrito SET precio='".$_POST['precio']."' WHERE producto='".$_POST['id']."' and presentacion=''";
mysql_query($ucarr);




?>