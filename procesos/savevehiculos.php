
<?php

echo include('../config/app_config.php');



$sql = "INSERT INTO vehiculos VALUES ('','".$_POST['marca']."','".$_POST['modelo']."','".$_POST['version']."','".$_POST['anio']."','".$_POST['oancho']."','".$_POST['oaro']."','".$_POST['operfil']."','".$_POST['aancho']."','".$_POST['aaro']."','".$_POST['aperfil']."','1',now())";
mysql_query($sql);
	



?>