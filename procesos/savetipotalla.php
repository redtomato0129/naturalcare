
<?php

include('../config/app_config.php');



$sql = "INSERT INTO tipos_tallas VALUES ('','".$_POST['talla']."','1')";
 
 mysql_query($sql);

echo 'Talla Agregada';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>