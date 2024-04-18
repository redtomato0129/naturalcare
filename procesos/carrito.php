
<?php
session_start();
include('../config/app_config.php');

if($_POST['ordenar'] == '1')
{
	$orden = "nombre";
}else
{
	$orden = "precio";
}
 $ruta = "../administrador/imagenes";

$sultimo = "SELECT *FROM productos WHERE estado='1' and id=".$_POST['producto']."";
$rultimo = mysql_query($sultimo);
$fdetalle = mysql_fetch_array($rultimo);
if($_POST['presentacion'] == 'NO APLICA')
{
   $_POST['presentacion'] = ""; 
}

$carrito = "INSERT INTO carrito VALUES('','".$_SESSION["idcarrito"]."','".$_POST["producto"]."','".$_POST["color"]."','".$_POST["presentacion"]."','".$_POST["cantidad"]."','".$_POST["precioproducto"]."',now())";
$rcarrito = mysql_query($carrito);
 

$scarrocant = "SELECT SUM(cantidad) as cantidad FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritocant = mysql_query($scarrocant);
$fcantidad = mysql_fetch_array($rcarritocant);
$cantidad = $fcantidad['cantidad'];

$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];


$precioReal=$fdetalle['precio'];

$mostrar = '';


$tallas = explode(":;:", $fproductos['tallas']);
$mostrar.='<div class="modalchk-prd-image col"><img src="../administrador/imagenes/productos/'.$fdetalle['foto_uno'].'" alt="naturalcare Guayaquil"></div>
                        <div class="modalchk-prd-info col">
                            <h2 data-price="'.$precioReal.'" class="modalchk-title"><a>'.$fdetalle['nombre'].'</a></h2>
                            <div class="modalchk-price">$ '.number_format($_POST["precioproducto"],2).'</div>';
if($_POST['presentacion'] != "")
{
 $mostrar.='<div class="prd-options"><span class="label-options">Presentación:</span><span data="" class="prd-options-val">'.$_POST['presentacion'].'</span></div>';
}

 $mostrar.='                           <div class="prd-options"><span class="label-options">Qty:</span><span class="prd-options-val">'.$_POST['cantidad'].'</span></div>
                            <div class="shop-features-modal d-none d-sm-block"><a href="#" class="shop-feature">
                                    <div class="shop-feature-icon"><i class="icon-box3"></i></div>
                                    <div class="shop-feature-text">
                                        <div class="text1">Envío seguro</div>
                                        <div class="text2">Recíbelo en la puerta de tu casa a nivel nacional</div>
                                    </div>
                                </a></div>
                        </div>
                        <div class="shop-features-modal d-sm-none"><a href="#" class="shop-feature">
                                <div class="shop-feature-icon"><i class="icon-box3"></i></div>
                                <div class="shop-feature-text">
                                    <div class="text1">Envío seguro</div>
                                    <div class="text2">Recíbelo en la puerta de tu casa a nivel nacional</div>
                                </div>
                            </a></div>
                        <div class="modalchk-prd-actions col">
                            <h3 class="modalchk-title">Tienes <span class="custom-color">'.$cantidad.'</span> items en tu cesta</h3>
                            <div class="prd-options"><span class="label-options">Total:</span><span class="modalchk-total-price">$ '.$subtotal.'</span></div>
                            <div class="modalchk-custom"><img src="../images/payment/guaranteed.png" alt="paga onlinr"></div>
                            <div class="modalchk-btns-wrap"><a href="cesta.php" class="btn">ir a pagar </a> <a href="#" onclick="javascript:location.reload();" class="btn btn--alt" data-fancybox-close>continuar comprando</a></div>
                        </div>';

 
echo $mostrar;
	



?>