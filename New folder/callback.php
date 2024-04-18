
<?php

$payload = file_get_contents('php://input');
var_dump($payload);
json_decode($payload);
var_dump($payload);
session_start();

include('../administrador/config/app_config.php');


$json = json_decode($payload,true);

foreach ($json["transaction"] as $k => $v) {
	if($k == 'authorization_code') {
   echo $_SESSION['autorizacion']= $autorizacion=$v;
}

if($k == 'id') {
    $id=$v;
}
}

echo $sql = "insert into pymentez values(0,'".$id."','".($autorizacion)."','".$payload."')  ";
mysql_query($sql);


echo "exito";

?>


