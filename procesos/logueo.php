<?php
include('../config/app_config.php');
session_start ();
 $sql="SELECT *FROM usuario_admin where usuario='".$_POST['email']."' and contrasena='".(md5($_POST['contrasena']))."'  ORDER BY id desc";
 $retry = mysql_query($sql); 
 $contador=0;
 while ($fila = mysql_fetch_assoc($retry))
 {
	$contador=$contador+1;
	$_SESSION['LOGUEO']=$fila['id'];
 }
 if($contador > 0)
 {
 	 	echo "1";
 }else
 {
   	echo "0";
 }                                      	
?>