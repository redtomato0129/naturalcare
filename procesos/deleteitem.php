
<?php


include('../config/app_config.php');

if(is_numeric($_POST['id']) && $_POST['id'] > 0){


$consultaProducto = "SELECT *FROM carrito WHERE id=".$_POST['id']." ";
$rconsulta = mysql_query($consultaProducto);
$fconsulta = mysql_fetch_array($rconsulta);
$producto= $fconsulta['producto'];
$precioProducto= $fconsulta['precio'];

if(($precioProducto) != "00.00" ){

  //el borrar producto que estaba antes
  $sql = "DELETE FROM carrito where id=".$_POST['id']." ";
  mysql_query($sql);

}else{
  $consultaHistorial = "SELECT *FROM points_history WHERE product_reference='$producto' and user_id=".$_SESSION['idusuario']." ORDER BY id desc";
  $rhistorial = mysql_query($consultaHistorial);
  $fhistorial = mysql_fetch_array($rhistorial);
  $historial= $fhistorial['id'];
  $historialPuntos= $fhistorial['deb_points'];


  $idUser = $_SESSION['idusuario'];
  $sPointsUser = "SELECT *FROM natuser WHERE estado='1' and id='$idUser' ORDER BY id desc LIMIT 4";
  $rPointsUser = mysql_query($sPointsUser);
  $pointsUser = mysql_fetch_array($rPointsUser);
  $puntosUsuario = $pointsUser['points'];
  $devolverPuntos= $historialPuntos+($puntosUsuario); 

  //ACTUALIZAMOS LOS PUNTOS DEL USUARIO a su estado normal
    $sqlUser = "UPDATE natuser SET points='$devolverPuntos' WHERE id=".$_SESSION['idusuario'];
    $ugo = mysql_query($sqlUser);
    if ( $ugo == true) { echo 'Puntos Actualizados '; } else{ echo ' No se actualizaron los puntos algo pasaaaa! ';}
  //borramos el registro de history points
  $borrarRegistro = "DELETE FROM points_history where id='$historial' ";
  mysql_query($borrarRegistro);
  echo $devolverPuntos;

  //el borrar producto que estaba antes
  $sql = "DELETE FROM carrito where id=".$_POST['id']." ";
  mysql_query($sql);

}

}


/* 
  echo "<script>jQuery(function(){swal(\"¡Bien!\", \"Condición cumplida\", \"success\");});</script>";


*/

?>