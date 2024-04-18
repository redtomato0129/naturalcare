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
    <title>Historial de pedidos - Natural Care ec</title>
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
                    <li><a href="../index.php">Inicio</a></li>
                    <li><span>Mi Cuenta</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 aside aside--left">
                       <?php include('menu.php'); ?>
                    </div>
                    <div class="col-md-9 aside">
                        <h2>Historial de pedidos</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-order-history">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs" scope="col">#</th>
                                        <th scope="col">Número de orden</th>
                                        <th scope="col">fecha</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $spedido = "SELECT a.* FROM pedidos as a 
                                                       LEFT JOIN natuser as b on (a.usuario=b.id) 
                                                       where b.id=".$_SESSION['idcarrito'];
                                                $rpedido = mysql_query($spedido);
                                                $contador = 0;
                                               while($fpedido = mysql_fetch_array($rpedido)){
                                                $contador++;
                                                switch ($fpedido['estado']) {
                                                    case '1':
                                                        $etiqueta = "orden-recibida";
                                                        $mensaje = "orden recibida";
                                                    break;
                                                    case '2':
                                                        $etiqueta = "courier";
                                                        $mensaje = "entregado al courier";
                                                    break;
                                                    case '3':
                                                        $etiqueta = "entregado";
                                                        $mensaje = "Entregado con éxito";
                                                    break;
                                                    case '4':
                                                        $etiqueta = "cancelado";
                                                        $mensaje = "Cancelado";
                                                    break;
                                                    
                                                    
                                                }
                                        ?>
                                    
                                    
                                    <tr>
                                        <td class="hidden-xs"><?php echo $contador; ?></td>
                                        <td><b><?php echo str_pad($fpedido['id'], 6, "0", STR_PAD_LEFT) ?></b> <a href="detalle-pedido.php?id=<?php echo ($fpedido['id']) ?>" class="ml-1">Ver detalle</a></td>
                                        <td><?php echo substr($fpedido['fecha'],0,10) ?></td>
                                        <td><span class="label label-<?php echo $etiqueta; ?> font-weight-100"><?php echo $mensaje; ?></span></td>
                                        <td><span class="color">$<?php echo number_format(($fpedido['subtotal']+$fpedido['iva']+$fpedido['envio']-$fpedido['descuento']),2) ?></span></td>
                                        </tr>
                                   
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

 
  
   <footer class="page-footer footer-style-6 global_width">
        <div class="footer-top container">
            <div class="row lined pb-md-2 pt-lg-3">
                <div class="col-md-12 col-lg py-2 py-lg-0 text-center text-lg-left">
                    <div class="footer-block">
                        <div class="footer-logo"><a href="#"><img src="../images/logo-footer.svg" class="img-fluid" alt=""></a></div>
                        <ul class="social-list">
                            <li><a href="https://www.facebook.com/naturalcareecu/" target="_blank" class="icon icon-facebook"></a></li>
                            <li><a href="https://www.instagram.com/naturalcare_ec/" target="_blank" class="icon icon-instagram"></a></li>
                           </ul>
                           
                      
                    </div>
                </div>
                <div class="col-md col-lg">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>ACERCA DE</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="nosotros.html">Nosotros</a></li>
                                <li><a href="como-comprar.html">Cómo comprar</a></li>
                                <li><a href="preguntas-frecuentes.html">Preguntas frecuentes</a></li>
                                <li><a href="politicas.html">Políticas</a></li>
                                <li><a href="terminos-y-condiciones.html">Términos y condiciones</a></li>
                                <li><a href="crear-cuenta.html">Crear mi cuenta</a></li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md col-lg">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>COMUNÍCATE</h4>
                            <div class="toggle-arrow"></div>
                        </div>
                        <div class="collapsed-content">
                            <ul class="contact-list">
                                <li><i class="icon-phone"></i><span><span class="h6-style">Llámanos:</span><span>(593) 990499-789</span></span></li>
                                <li><i class="icon-mail-envelope1"></i><span><span class="h6-style">E-mail:</span><span><a href="mailto:ventas@naturalcare-ec.com">ventas@naturalcare-ec.com</a></span></span></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md col-lg pb-3 pb-md-0 text-center-sm">
                    <div class="footer-block">
                        <div class="title">
                            <h4>Sitio seguro</h4>
                        </div>
                        <div class="subscribe-wrap">
                            <img src="../images/comodo.png" alt="certificado ssl">
                        </div>
                        <div class="title">
                            <h4>Aceptamos:</h4>
                        </div>
                        <div class="payment-icons">
                        <img src="../images/payment/payment-card-visa.png" alt="">
                        <img src="../images/payment/payment-card-mastecard.png" alt="">
                        <img src="../images/payment/payment-card-discover.png" alt="">
                        <img src="../images/payment/payment-card-american-express.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="footer-bottom container">
            <div class="row lined py-2 py-md-3">
                
                <div class="col-md-8 col-lg-8 footer-copyright">
                    <p class="footer-copyright-text"><span>© Copyright 2020</span> <a href="#">Naturalcare ec</a> &nbsp; &nbsp;
                    <a href="terminos-y-condiciones.html">Terms & condiciones</a></p>
                </div>
                <div class="col-md-auto">
                    
                </div>
                <div class="col-md-auto ml-lg-auto hidden-xs">
                     <p class="footer-copyright-text desarrollo-web"><span>Developed by: <a href="https://www.estudionovaidea.com" target="_blank">Estudio Novaidea</a></span></p>
                </div>
            </div>
        </div>
        
        
    </footer>
    
   
    
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