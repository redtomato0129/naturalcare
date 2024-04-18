
<?php

include('../config/app_config.php');

$sql = "delete from sliders where id=".$_POST['id']."";
 
 mysql_query($sql);

echo 'sliders Agregada';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>