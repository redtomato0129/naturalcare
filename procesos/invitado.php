<?php
include('../config/app_config.php');
session_start();

$nuevo=rand(1500000,1900000);
$scarrito = "UPDATE carrito set carro='".$nuevo."' where carro='".$_SESSION['idcarrito']."'";
	mysql_query($scarrito);
	$scarritocupon = "UPDATE carrito_cupon set carro='".$nuevo."' where carro='".$_SESSION['idcarrito']."'";
	mysql_query($scarritocupon);
	
	$_SESSION['idcarrito']=$nuevo;
	$_SESSION['invitado']="1";
                               	
?>