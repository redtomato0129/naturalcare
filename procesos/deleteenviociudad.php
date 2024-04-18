
<?php


include('../config/app_config.php');


 $sql = "delete from ciudades where ciudad like ('".$_POST['ciudad']."') ";
 
 mysql_query($sql);


 $sql = "delete from valores_envio where ciudad like ('".$_POST['ciudad']."') ";
 
 mysql_query($sql);

echo 'Ciudad Eliminado';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>