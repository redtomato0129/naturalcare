<?php
session_start();

    include('../administrador/config/app_config.php');
    if((is_numeric($_SESSION["idcarrito"]) && $_SESSION["idcarrito"] > 0 && $_SESSION["idcarrito"] < 500000) || ($_SESSION['idcarrito']>1500000 && $_SESSION['idcarrito']<1900000))
    {
        $_SESSION['flagretorno']='0';
        $scat = "SELECT *FROM categorias WHERE estado='1'";
        $rcat = mysql_query($scat);

        $scatd = "SELECT *FROM categorias WHERE estado='1'";
        $rcatd = mysql_query($scatd);

        
        $ruta = "../administrador/imagenes";

        $sdetalle = "SELECT *FROM productos WHERE estado='1' and id=".$_GET['id']." ORDER BY id desc LIMIT 4";
        $rdetalle = mysql_query($sdetalle);
        $fdetalle = mysql_fetch_array($rdetalle);
        $tallas = explode(":;:", $fdetalle['tallas']);
        $colores = explode(":;:", $fdetalle['colores']);

        $spublicidad = "SELECT *FROM publicidad";
        $rpublicidad = mysql_query($spublicidad);
        $fpublicidad = mysql_fetch_array($rpublicidad);
        $pproductos = explode(":;:", $fpublicidad['seccionb']);

        $sslider = "SELECT *from sliders";
        $rslider = mysql_query($sslider);

        $scarritoc = "SELECT a.*,b.foto_uno ,b.nombre FROM carrito as a
        LEFT JOIN productos as b ON (a.producto = b.id)
        where carro='".$_SESSION["idcarrito"]."'";
        $rcarritoc = mysql_query($scarritoc);

        $datuser = "SELECT *FROM natuser where id=".$_SESSION['idcarrito'];
        $rdatosu = mysql_query($datuser);
        $fusuario = mysql_fetch_array($rdatosu);

         $spedido = "SELECT a.* FROM pedidos as a 
    
    WHERE a.id=".$_GET['id'];
    $rpedido = mysql_query($spedido);
    $fpedido = mysql_fetch_array($rpedido);
        switch ($fpedido['estado']) {
            case '1':
            $etiqueta = "orden-recibida";
            $mensaje = "orden recibida";
            $visita1 = "visited";
            $visita2 = "";
            $visita3 = "";
            break;
            case '2':
            $etiqueta = "solicitado";
            $mensaje = "entregado al courier";
            $visita1 = "visited";
            $visita2 = "visited";
            $visita3 = "";
            break;
            case '3':
            $etiqueta = "entregado";
            $mensaje = "Entregado con éxito";
            $visita1 = "visited";
            $visita2 = "visited";
            $visita3 = "visited";
            break;
            case '4':
            $etiqueta = "cancelado";
            $mensaje = "Cancelado";
            break;
            }


    }else
    {
       $_SESSION['flagretorno']='1';
       header('Location: login.php');
    }
$envio = 0;
$sql = "Select *from valores_envio where ciudad like ('%".trim($fusuario['ciudad'])."%') and estado='1'";
$r= mysql_query($sql);
$result = mysql_fetch_array($r);
if($result['valor'] > 0){
    $envio = $result['valor'];
}

$descuento = 0;
$scupon = "select b.* from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="productos para el cuidado personal, cuidado capilar elaborados a base de estractos de origen natural">
    <meta name="author" content="cremas, jabones artesanales, shampoo gardenia, gel reductor, tratamiento capilar, tratamiento corporal, exfoliantes, jabón de aloe vera, jabón de romero">
       <meta name="robots" content="index,all">
    <meta name="revisit-after" content="5 days">

    <title>Detalle de pedido - Natural Care ec</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../js/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../js/vendor/slick/slick.min.css" rel="stylesheet">
    <link href="../js/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../js/vendor/animate/animate.min.css" rel="stylesheet">
     <link href="../css/style-watches_1_light.css" rel="stylesheet">
    <link href="../fonts/icomoon/icomoon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
     <!-- estilos custom -->
    <link href="../css/estilos.css" rel="stylesheet">
    
     <!-- estilos de tracking -->
     <link rel="stylesheet" href="../css/tracking/style.css">
	<script src="..js/tracking/modernizr.js"></script> 
	
	     <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154164370-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154164370-1');
</script>
<!-- fin - Google Analytics -->
	
</head>

<body class="is-dropdn-click">
    <?php include('header.php'); ?>
  
  
  
    <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="detalle-cuenta.php">Mi cuenta</a></li>
                    <li><span>Detalle de pedido</span></li>
                </ul>
            </div>
        </div>
        
        
        
        
        <div class="holder mt-0">
            <div class="container">
                <h1 class="text-center">Detalle de compra</h1>
                
                             
                           
                           
                           
                <div class="row">
                   
                   
                    <div class="col-md-6">
                       
                       <section>
                                <nav>
                                  <ol class="cd-multi-steps text-top">
                                        <li class="<?php echo $visita1 ?>"><a href="#0">orden recibida</a></li>
                                        <li class="<?php echo $visita2 ?>"><a href="#0">entregado al courier</a></li>
                                        <li class="<?php echo $visita3 ?>"><em>entregado con éxito</em></li>
                                    </ol>
                               </nav>
                            </section>
                       
                        <div class="cart-table">
                           
                           
                           <?php  $sdetalle = "SELECT a.* ,d.foto_uno,d.nombre,d.precio FROM pedido_detalle as a
                                                                   LEFT JOIN pedidos as b ON (b.id=a.pedido)
                                                                   
                                                                   LEFT JOIN productos as d ON (d.id=a.producto)
                                                                   WHERE b.id=".$fpedido['id']; 
                                                      $rdetalle = mysql_query($sdetalle);
                                                      while($fdetalle = mysql_fetch_array($rdetalle)){
                                                ?>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><a href="#"><img src="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>" alt=""></a></div>
                                <div class="cart-table-prd-name">
                                    <h2><a href="#"><?php echo $fdetalle['nombre'] ?> </a></h2>
                                    <?php if($fdetalle['presentacion']!= "NO APLICA"){ ?>
                                    <h5><a href="#">Presentación <?php echo $fdetalle['presentacion'] ?></a></h5>
                                      <?php } ?>
                                    <?php if($fdetalle['color']!= ""){ ?>
                                    <h5>Color:<span class="cuadro-color" style="background-color: <?php echo $fdetalle['color'] ?>"> </span> &nbsp;</h5>
                                    <?php } ?>
                                </div>
                                <div class="cart-table-prd-qty"><span>qty:</span> <b> <?php echo $fdetalle['cantidad'] ?></b></div>
                                <div class="cart-table-prd-price"><span>precio:</span> <b>$ <?php echo number_format(($fdetalle['precio']*$fdetalle['cantidad']),2) ?></b></div>
                               </div>
                             <?php } ?>
                           
                             
                             <div class="cart-table-total">
                                <div class="row">
                                   <div class="col-sm-auto"><a href="historial-pedidos2.php" class="btn"><i class="icon-angle-left"></i><span>Regresar</span></a></div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6  cuadro-resumen">
                            <h2 class="d-md-none">Resumen de orden</h2>
                           <table class="table table-bordered">
                              <thead>
                                <tr>
                                    <th scope="col-xs-6"><b># de orden</b></th>
                                  <th scope="col-xs-6"> <?php echo str_pad($fpedido['id'], 6, "0", STR_PAD_LEFT) ?></th>
                                </tr>
                                
                                <tr>
                                    <th scope="col-xs-6"><b># de guia courier</b></th>
                                  <th scope="col-xs-6"> <?php echo ($fpedido['guia']) ?></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row"><b>fecha de pedido</b></th>
                                  <td> <?php echo substr($fpedido['fecha'],0,10) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Enviado a</b></th>
                                  <td><?php echo $fpedido['direccione'] ?><br>
                                  <?php echo $fpedido['provinciae'] ?> - <?php echo $fpedido['ciudade'] ?></td>
                                  </tr>
                                <tr>
                                    <th scope="row"><b>forma de pago</b></th>
                                  <td><?php echo $fpedido['pago'] ?></td>
                                </tr>
                                 <tr>
                                    <th scope="row"><b>Subtotal</b></th>
                                  <td>$<?php echo number_format(($fpedido['subtotal']),2) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Descuento</b></th>
                                  <td>$<?php echo number_format(($fpedido['descuento']),2) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Puntos Canjeados</b></th>
                                  <td><?php echo number_format(($fpedido['puntos_canjeados']),0) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><b>Envío</b></th>
                                  <td>$<?php echo number_format(($fpedido['envio']/1.15),2) ?></td>
                                </tr>
                               
                                <tr>
                                    <th scope="row"><b>Iva</b></th>
                                  <td>$<?php echo number_format((($fpedido['iva'])+(($fpedido['envio']/1.15)*0.15)),2) ?></td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><b>Total</b></th>
                                  <td>$<?php echo number_format(($fpedido['subtotal']+$fpedido['iva']+$fpedido['envio']-$fpedido['descuento']),2) ?></td>
                                </tr>
                              </tbody>
                            </table>
                            
                          
                            
                            
                            <div class="mt-2"></div>
                    </div>
                        
                </div>
            </div>
        </div>
        
        
        
        
        
    </div>
    
 
   <?php include('footer.php'); ?>
  
  
    
    <script src="../js/vendor/jquery/jquery.min.js"></script>
    <script src="../js/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/vendor/slick/slick.min.js"></script>
    <script src="../js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
    <script src="../js/vendor/instafeed/instafeed.min.js"></script>
    <script src="../js/vendor/countdown/jquery.countdown.min.js"></script>
    <script src="../js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../js/vendor/ez-plus/jquery.ez-plus.min.js"></script>
    <script src="../js/vendor/tocca/tocca.min.js"></script>
    <script src="../js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.min.js"></script>
    <script src="../js/vendor/isotope/jquery.isotope.min.js"></script>
    <script src="../js/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="../js/vendor/cookie/jquery.cookie.min.js"></script>
    <script src="../js/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../js/vendor/lazysizes/lazysizes.min.js"></script>
    <script src="../js/vendor/lazysizes/ls.bgset.min.js"></script>
    <script src="../js/vendor/form/jquery.form.min.js"></script>
    <script src="../js/vendor/form/validator.min.js"></script>
    <script src="../js/vendor/slider/slider.js"></script>
    <script src="../js/app.js"></script>
    
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5debc01d43be710e1d210734/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>