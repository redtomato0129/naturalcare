
<?php


include('../config/app_config.php');


$sql = "UPDATE valores_envio SET estado='2' where id=".$_POST['id']." ";
 
 mysql_query($sql);

echo 'Envio Eliminado';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>