
<?php


include('../config/app_config.php');


$sql = "delete from carrito_cupon where carro='".$_POST['id']."' ";
 
mysql_query($sql);

/*

$sq = "update cupones set estado='2' where codigo='".$_POST['codigo']."'";
 
mysql_query($sq);*/

echo '1';


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>