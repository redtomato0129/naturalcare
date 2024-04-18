
<?php

include('../config/app_config.php');

$sql = "INSERT INTO productos_presentacion VALUES ('','".$_POST['producto']."','".$_POST['presentacion']."','".$_POST['valor']."','1')";
mysql_query($sql);


$ucarr = "UPDATE carrito SET precio='".$_POST['valor']."' WHERE producto='".$_POST['producto']."' and presentacion='".$_POST['presentacion']."'";
mysql_query($ucarr);



?>