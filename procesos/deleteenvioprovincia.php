
<?php


include('../config/app_config.php');


$sql = "delete from provincias where id=".$_POST['id']." ";
 
 mysql_query($sql);



$sql = "delete from ciudades where provincia like ('".$_POST['provincia']."') ";
 
 mysql_query($sql);

echo 'Ciudad Eliminado';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>