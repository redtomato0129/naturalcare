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
   
    <title>Sobre Nosotros Natural Care ec - Ecuador </title>
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
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="../index.php">Home</a></li>
                    <li><span>Nosotros</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <!-- Page Title -->
                <div class="page-title page-title--blog">
                    <div class="title">
                        <h1>Sobre nosotros</h1>
                    </div>
                </div>
                <!-- /Page Title -->
                <div class="row">
                    <div class="col-md-9 aside" id="centerColumn">
                        <div class="post-full">
                           
                        
                            <div class="post-img"><img src="../images/nosotros.jpg" alt=""></div>
                            <div class="post-text">
                                <p>Somos una Tienda Online de productos naturales que promueven salud, bienestar y un estilo de vida activo. Cada producto está hecho precisamente para proporcionar beneficios y soluciones a problemas corporales que nuestros clientes enfrentan a diario.

Ofrecemos productos que realmente hacen lo que anuncian. Nuestro principal objetivo es ayudar a que nuestros clientes encuentren los productos adecuados para ellos y darles todo el apoyo que necesitan para ver los resultados que desean.  Cuando nuestros clientes ganan, nosotros ganamos.
</p>
                                <blockquote>
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="blockquote-author-img"><img src="../images/pages/blockquote-author.png" alt="" class="img-fluid"></div>
                                        </div>
                                        <div class="col">
                                            <p>Más que productos, ofrecemos un estilo de vida.</p>
                                            
                                        </div>
                                    </div>
                                </blockquote>
                                
                                <h3>Historia</h3>
                                <p>Natural Care Ec nace en Ecuador en el año 2015 como una opción de salud y bienestar alternativa ante la evidente proliferación que existe en el mercado de productos de belleza y cuidado personal elaborados a base a componentes químicos, que con el uso periódico generan efectos adversos y de a poco van deteriorando nuestra apariencia, nuestra salud y nuestro medioambiente, por ende nos hemos enfocado en aprovechar al máximo los fabulosos beneficios que brindan las extensas propiedades de la naturaleza, proporcionando productos elaborados a base de extractos de origen natural que aportan una gran cantidad de vitaminas y minerales, ayudando a maximizar nuestra belleza y salud de forma natural y duradera.</p>
                            </div>
                           
                        </div>
                        <div class="post-comments" id="postComments">
                            <h3 class="h2-style">Filosofía corporativa</h3>
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Misión</a></div>
                                        <div class="post-comment-text">
                                            <p>Proporcionar productos de belleza y cuidado personal elaborados a base de extractos naturales que permitan mejorar la salud y belleza de nuestros clientes.</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Visión</a></div>
                                        <div class="post-comment-text">
                                            <p>Convertirnos en la primera tienda Online del Ecuador distribuidora de productos naturales de belleza y cuidado personal.</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="post-comment">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><a href="#">Valores corporativos</a></div>
                                        <div class="post-comment-text">
                                            <p>Integridad, Confiabilidad, Transparencia, Respeto y Compromiso.</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                          
                        </div>
                      
                    </div>
                    <div class="col-md-3 aside aside--right" id="sideColumn">
                      
                       
                        <div class="aside-block-delimiter"></div>
                        <div class="aside-block">
                           <h2 class="text-uppercase">Post en fanspage</h2>
                           <!--caja de facebook-->
                            <div class="block left-module">
                            <div class="fb-page" data-href="https://www.facebook.com/naturalcareecu/" data-tabs="timeline" data-height="450px" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/naturalcareecu/"
                            class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/naturalcareecu/">Naturalcare</a></blockquote></div>
                            </div>
                            <!-- fin caja de facebook-->
                           
                           
                           
                           
                           
                        </div>
                     
                        <div class="aside-block-delimiter"></div>
                        <div class="aside-block">
                            <h2 class="text-uppercase">Síguenos</h2>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/naturalcareecu/" target="_blank" class="icon icon-facebook"></a></li>
                                <li><a href="https://www.instagram.com/naturalcare_ec/" target="_blank" class="icon icon-instagram"></a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    <div class="holder mt-0">
            <div class="container">
                <div class="row no-gutters shop-features-style2-2">
                    <div class="col-sm-4"><a href="#" class="shop-feature">
                            <div class="shop-feature-icon"><i class="icon-box3"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">Envíos garantizados</div>
                                <div class="text2">Entregamos a todos los cantones de Ecuador</div>
                            </div>
                        </a></div>
                    <div class="col-sm-4"><a href="login.html" class="shop-feature">
                            <div class="shop-feature-icon"><i class="icon-arrow-left-circle"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">Tracking de envío</div>
                                <div class="text2">Controla el estado de tus pedidos</div>
                            </div>
                        </a></div>
                    <div class="col-sm-4"><a href="#" class="shop-feature">
                            <div class="shop-feature-icon"><i class="icon-call"></i></div>
                            <div class="shop-feature-text">
                                <div class="text1">24/7 Asistencia</div>
                                <div class="text2">Comunícate a nuestro número de whatsapp</div>
                            </div>
                        </a></div>
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