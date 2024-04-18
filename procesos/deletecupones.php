
<?php


include('../config/app_config.php');


$sql = "UPDATE cupones SET estado='3' where id=".$_POST['id']." ";
 
mysql_query($sql);

echo 'Cupon Eliminado';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>