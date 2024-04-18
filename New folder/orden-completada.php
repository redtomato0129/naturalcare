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

        $spedido = "SELECT a.*,b.nombres,b.apellidos FROM pedidos as a 
        left join natuser as b on (a.usuario=b.id) where a.id=".$_GET['id'];
        $rpedido = mysql_query($spedido);
        $fpedido = mysql_fetch_array($rpedido);
    }else
    {
       $_SESSION['flagretorno']='1';
       header('Location: login.php');
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
  
    <title>Orden completada Natural Care ec - Ecuador </title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../js/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../js/vendor/slick/slick.min.css" rel="stylesheet">
    <link href="../js/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../js/vendor/animate/animate.min.css" rel="stylesheet">
     <link href="../css/style-watches_1_light.css" rel="stylesheet">
    <link href="../fonts/icomoon/icomoon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
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
   <?php include('header.php') ?>
    
    
    
    
    
    <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><span>Orden recibida</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <h1 class="text-center">Tu orden fue finalizada con éxito</h1>
                <div class="clearfix"></div>
                
                
                     <div class="row vert-margin-double">
                     
                     
                     
                   
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Datos de envío</h3>
                                        <p><b>Nombres:</b> <?php echo $_SESSION['nombresfinal'] ?><br>
                                        <b>Apellidos:</b><?php echo $_SESSION['apellidosfinal'] ?><br>
                                        <b>Dirección:</b><?php echo $fpedido['direccione'] ?><br>
                                        <b>Provincia/ciudad:</b> <?php echo $fpedido['provinciae'] ?> - <?php echo $fpedido['ciudade'] ?></p>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Detalle de orden</h3>
                                        <p><b># pedido:</b> <?php echo str_pad($fpedido["id"], 6, "0", STR_PAD_LEFT) ?><br>
                                        <b>ID transacción:</b> <?php echo $fpedido['idtran'] ?><br>
                                        <b>Fecha:</b> <?php echo substr($fpedido['fecha'],0,10) ?><br>
                                        <b>Forma de pago:</b> <?php echo $fpedido['pago'] ?><br>
                                        <b>Valor final:</b> $<?php echo $fpedido['subtotal']+$fpedido['envio']+$fpedido['iva']-$fpedido['descuento'] ?><br>
                                    </div>
                                </div>
                            </div>
                            
                         <h5 class="text-center">  Gracias por tu compra, por favor revisa la confirmación del pedido en la Bandeja de entrada y/o Correo no deseado/Spam del correo electrónico registrado en la compra</h5>
                            
                            
                        <div class="clearfix mt-1 mt-md-2"><a href="../index.php" class="btn btn--lg w-100">Ir al inicio</a></div>
                 
                   
              
                            
                            
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