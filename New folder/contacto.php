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
   
   
    <title>Contacto, Natural Care ec - Ecuador </title>
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
          
        </div>
        <div class="holder mt-0">
            <div class="container">
                <!-- Page Title -->
                <div class="page-title text-center">
                    <div class="title">
                        <h1>Contáctenos</h1>
                    </div>
                </div>
                <!-- /Page Title -->
                <div class="row vert-margin-double justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <h2>Centro de Distribución Costa y Galápagos</h2>
                        <p>Correo Electrónico: ventas@naturalcare-ec.com<br>
                        WhatsApp: 099 5566 900</p>
                        <div class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0713018171987!2d-79.89896718473085!3d-2.126262037720157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d38aac8ed8f%3A0xa9123fd5f8ca191f!2sSauces%206%2C%20Guayaquil!5e0!3m2!1ses-419!2sec!4v1572873664236!5m2!1ses-419!2sec" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
                       
                    </div>
                    <div class="col-sm-6 col-lg-4 offset-lg-1">
                        <h2>Centro de Distribución Sierra y Oriente</h2>
                        <p>Correo Electrónico: ventas@naturalcare-ec.com<br>
                        WhatsApp: 099 5566 900</p>
                        <div class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.765937761586!2d-78.55148683473887!3d-0.29359928543283653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d598a7558bc88b%3A0xced68b40d279ff3a!2sQuitumbe%2C%20Quito%20170146!5e0!3m2!1ses-419!2sec!4v1572873754525!5m2!1ses-419!2sec" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
                    </div>
                </div>
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