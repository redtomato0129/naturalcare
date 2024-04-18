<?php
session_start();

    include('../administrador/config/app_config.php');
    {
        $scat = "SELECT *FROM categorias WHERE estado='1'";
        $rcat = mysql_query($scat);

        $scatd = "SELECT *FROM categorias WHERE estado='1'";
        $rcatd = mysql_query($scatd);

        $subcat = "SELECT *FROM subcategorias WHERE estado='1' and id=".$_GET['id'];
        $rsubcat = mysql_query($subcat);
        $fsubcat = mysql_fetch_array($rsubcat);

        
        $ruta = "../administrador/imagenes";

        $sdetalle = "SELECT *FROM productos WHERE estado='1' and id=".$_GET['id']." ORDER BY id desc LIMIT 4";
        $rdetalle = mysql_query($sdetalle);
        $fdetalle = mysql_fetch_array($rdetalle);
        $tallas = explode(":;:", $fdetalle['tallas']);
        $colores = explode(":;:", $fdetalle['colores']);

         $sultimo = "SELECT *FROM productos WHERE estado='1' and subcategoria='".$_GET['id']."' ORDER BY id desc LIMIT 12";
         $rultimo = mysql_query($sultimo);

         $scontar = "SELECT *FROM productos WHERE estado='1' and subcategoria='".$_GET['id']."'";
         $rcontar = mysql_query($scontar);
         $contador = mysql_num_rows($rcontar);
               

        
    }



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
  
    <title>Cómo comprar en Natural Care ec - Ecuador </title>
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
    

<!--facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!--facebook-->
   
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
       
        
        <div class="holder fullboxed mt-0 py-5 py-md-10 bg-cover" style="background-image:url(../images/comprar2.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <div class="text-center">
                            <p><img src="../images/logo-naturalcare-footer.png" alt="" class="img-fluid pt-20"><br><br></p>
                            <h2> Pasos para comprar en nuestra tienda online</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="holder mt-20">
            <div class="container">
                <!-- Page Title -->
                <div class="page-title page-title--blog">
                    <div class="title">
                        <h1 class="text-center">¿Cómo comprar?</h1>
                    </div>
                </div>
                <!-- /Page Title -->
                <div class="row">
                    <div class="col-md-12 aside" id="centerColumn">
                        
                        
                        
                        <div class="post-comments" id="postComments">
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"><img src="../images/paso1.jpg" alt="" class="img-fluid img-circle"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Selecciona tus productos</a></div>
                                        <div class="post-comment-text">
                                            <p>Navega por nuestro catálogo de productos, elige el/los productos de tu preferencia y da click en Agregar a la cesta para agregarlos a tu pedido.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"><img src="../images/paso2.jpg" alt="" class="img-fluid img-circle"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Revisa la cesta de compras</a></div>
                                        <div class="post-comment-text">
                                            <p>Da click en el botón de Mi cesta ubicado en la parte superior derecha de nuestro sitio web, ahí se desplegará el total de tu compra con el desglose de los artículos que deseas comprar.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"><img src="../images/paso3.jpg" alt="" class="img-fluid img-circle"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Cierra tu pedido</a></div>
                                        <div class="post-comment-text">
                                            <p>Selecciona la opción de Ir a caja cuando estés seguro de todos los detalles de tu orden. Continúa llenando los datos de facturación y envío. Da click en el botón Confirmar orden. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"><img src="../images/paso4.jpg" alt="" class="img-fluid img-circle"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Confirma tu pago</a></div>
                                        <div class="post-comment-text">
                                            <p>Realiza el pago (costo del producto + costo de envío). Tu pago lo puedes realizar por Depósito Bancario, Transferencia Electrónica y/o Tarjeta de Crédito. Al realizar tu pago por depósito bancario o transferencia electrónica, envíanos la foto de tu comprobante de pago a ventas@naturalcare-ec.com o vía WhatsApp 099 5566 900 con el número de tu pedido. Tu pedido será cancelado si no realizas tu pago en las próximas 24 horas laborales.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"><img src="../images/paso5.jpg" alt="" class="img-fluid img-circle"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Envío</a></div>
                                        <div class="post-comment-text">
                                            <p>Enviamos a través de Servientrega a cualquier parte de Ecuador, para lo cual requerimos la dirección exacta del domicilio o lugar de trabajo (calles, nomenclatura, numeración, referencias). Nota: No contamos con entregas ni procesamiento de pedidos en días no hábiles o sábados y domingos.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                   
                    </div>
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
        
        
    <div class="holder fullboxed bgcolor mt-0 pb-2 pb-sm-3 d-block d-sm-none">
            <div class="container">
                <div class="row bnr-grid">
                    <div class="col-md"><a href="https://api.whatsapp.com/send?phone=593995566900&text=Hola%2C%20quiero%20información%20sobre%20un%20producto" class="bnr-wrap">
                            <div class="bnr bnr--style-1 bnr--center bnr--middle bnr-hover-scale" data-fontratio="5.55"><img src="../images/placeholder.png" data-src="../images/franja-whatsapp.png" alt="Banner" class="lazyload"> <span class="bnr-caption"><span class="bnr-text-wrap"><span class="bnr-text3">click aquí para conversar 0995566900</span></span></span></div>
                        </a></div>
                    
                </div>
            </div>
        </div>
        
        
 
    
    
    <?php include('footer.php'); ?>
   
  
     
           
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top"><i class="icon icon-angle-up"></i></a>
   
   
    
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