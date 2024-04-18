<?php
include('../config/app_config.php');
session_start ();
 $sql="SELECT *FROM natuser where  email='".$_POST['email']."' and contrasena='".(md5($_POST['contrasena']))."'  ORDER BY id desc";
 $retry = mysql_query($sql); 
 $contador=0;
 while ($fila = mysql_fetch_assoc($retry))
 {
	$contador=$contador+1;
	$scarrito = "UPDATE carrito set carro='".$fila['id']."' where carro='".$_SESSION['idcarrito']."'";
	mysql_query($scarrito);
	$scarritocupon = "UPDATE carrito_cupon set carro='".$fila['id']."' where carro='".$_SESSION['idcarrito']."'";
	mysql_query($scarritocupon);
	$_SESSION['idcarrito']=$fila['id'];
	$_SESSION['idusuario']=$fila['id']; 
	$_SESSION['nombres']=$fila['nombres']; 
 }
 if($contador > 0)
 {
 	 echo "1";
 }else
 {
   	echo "0";
 }                                      	
?>