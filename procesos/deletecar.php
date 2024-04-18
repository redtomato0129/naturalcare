
<?php


include('../config/app_config.php');

if(is_numeric($_SESSION["idcarrito"]) && $_SESSION["idcarrito"] > 0){

$sql = "DELETE FROM carrito where carro='".$_SESSION["idcarrito"]."' ";
 
mysql_query($sql);


}


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>