<?php
session_start();

    include('../administrador/config/app_config.php');
    if(is_numeric($_GET['id']) && $_GET['id'] > 0)
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
        $tallas = array_unique($tallas);
        $colores = explode(":;:", $fdetalle['colores']);
        $colores = array_unique($colores);

         $sultimo = "SELECT *FROM productos WHERE estado='1' and subcategoria='".$_GET['id']."' ORDER BY id desc LIMIT 0,12";
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
    <title>Categoría de productos Natural Care ec - Ecuador </title>
    
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
     <input type="hidden" name="subcategoria" id="subcategoria" value="<?php echo $_GET['id'] ?>">    
    <div class="page-content">
        
        <div class="holder mt-0">
            <div class="container">
                <!-- Two columns -->
                <!-- Page Title -->
                <div class="page-title text-center d-none d-lg-block">
                    <div class="title">
                        <h1><?php echo $fsubcat['descripcion'] ?></h1>
                    </div>
                </div>
                <!-- /Page Title -->
                <div class="row row-flex">
                    <!-- Center column -->
                    <div class="col-lg aside">
                        <div class="prd-grid-wrap">
                            <!-- Filter Row -->
                            <div class="filter-row invisible">
                                <div class="row row-1 d-lg-none align-items-center">
                                    <div class="col">
                                        <h1 class="category-title"><?php echo $fsubcat['descripcion'] ?></h1>
                                    </div>
                                    <div class="col-auto ml-auto">
                                        <div class="view-in-row d-md-none"><span data-view="data-to-show-sm-1"><i class="icon icon-view-1"></i></span> <span data-view="data-to-show-sm-2"><i class="icon icon-view-2"></i></span></div>
                                        <div class="view-in-row d-none d-md-inline"><span data-view="data-to-show-md-2"><i class="icon icon-view-2"></i></span> <span data-view="data-to-show-md-3"><i class="icon icon-view-3"></i></span></div>
                                    </div>
                                </div>
                                <div class="row row-2">
                                    <div class="col-left d-flex align-items-center">
                                        
                                        <div class="filter-button d-lg-none"><a href="#" class="fixed-col-toggle">FILTER</a></div>
                                    </div>
                                    <div class="col col-center d-none d-lg-flex align-items-center justify-content-center">
                                        <div class="view-label">Ver:</div>
                                        <div class="view-in-row"><span data-view="data-to-show-3"><i class="icon icon-view-3"></i></span> <span data-view="data-to-show-4"><i class="icon icon-view-4"></i></span></div>
                                    </div>
                                    <div class="col-right ml-auto d-none d-lg-flex align-items-center">
                                        <div class="items-count"><?php echo $contador; ?> item(s)</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /Filter Row -->
                            <!-- Products Grid -->
                            <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" id="productos">
                              
                                <?php 
                while($fproductos = mysql_fetch_array($rultimo)){ 
                     $talla = explode(":;:", $fproductos['tallas']);
                    
                     $tallas = array_unique($talla);
                      //var_dump($tallas);
        
       
                    ?> 
                  <!-------------------- PRODUCTO -------------- -->
                    <div class="prd prd-has-loader">
                        <div class="prd-inside">
                            <div class="prd-img-area"><a href="producto.php?id=<?php echo $fproductos['id'] ?>" class="prd-img"><img src="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>" data-srcset="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>" alt="Tyssot 1853" class="js-prd-img lazyload"></a>
                                 <ul class="list-options color-swatch prd-hidemobile">
                                     <?php if($fproductos['foto_uno'] != ""){ ?>
                                                <li data-image="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>">
                                                <a href="#" class="js-color-toggle"><img src="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>" data-srcset="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>" class="lazyload" alt="cuidado capilar"></a></li>
                                    <?php } ?> 
                                    <?php if($fproductos['foto_dos'] != ""){ ?>
                                                <li data-image="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_dos'] ?>">
                                                <a href="#" class="js-color-toggle"><img src="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_dos'] ?>" data-srcset="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_dos'] ?>" class="lazyload" alt="cuidado capilar"></a></li>
                                    <?php } ?> 
                                    <?php if($fproductos['foto_tres'] != ""){ ?>           
                                                <li data-image="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_tres'] ?>"><a href="#" class="js-color-toggle"><img src="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_tres'] ?>" data-srcset="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_tres'] ?>" class="lazyload" alt="productos naturales"></a></li>
                                    <?php } ?> 
                                    <?php if($fproductos['foto_cuatro'] != ""){ ?>           
                                                <li data-image="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_cuatro'] ?>"><a href="#" class="js-color-toggle"><img src="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_cuatro'] ?>" data-srcset="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_cuatro'] ?>" class="lazyload" alt="productos naturales"></a></li>
                                    <?php } ?> 
                                            </ul>
                                <div class="label-new">NUEVO</div>
                                <div class="gdw-loader"></div>
                            </div>
                            <div class="prd-info">
                                <div class="prd-tag prd-hidemobile"><a href="producto.php?id=<?php echo $fproductos['id'] ?>"><?php echo $fproductos['nombre'] ?></a></div>
                                <div class="prd-rating prd-hidemobile">
                                   <?php $cconp=0; while($fproductos['estrellas']> $cconp){ $cconp++; ?>
                                       <i class="icon-star fill"></i>
                                        <?php } ?>
                               
                                </div>
                                <div class="prd-price">
                                    <div class="price-new">$ <?php echo number_format($fproductos['precio'],2); ?></div>
                                </div>
                                <div class="prd-hover">
                                    <div class="prd-action">
                                        <a href="producto.php?id=<?php echo $fproductos['id'] ?>"><input type="hidden"> <button class="btn" ><span>Ver producto</span></button></a>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------------------FIN PRODUCTO -------------- -->
                    <?php } ?>
                                 
                         <input type="hidden" name="registros" id="registros" value="12">       
                                
                                
                            </div>
                            <br />
                            <div class="loader-wrap">
                                <div class="dots">
                                    <div class="dot one"></div>
                                    <div class="dot two"></div>
                                    <div class="dot three"></div>
                                </div>
                            </div>
                            <!-- /Products Grid -->
                            <div class="show-more d-flex mt-4 mt-md-6 justify-content-center align-items-start">
                               <a href="#" class="btn btn--alt js-product-show-more" data-load="../ajax/mas-productos.php?id=<?php echo $_GET['id'] ?>">mostrar más</a>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /Center column -->
                </div>
                <!-- /Two columns -->
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
                    <div class="col-sm-4"><a href="login.php" class="shop-feature">
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
        
        
 
    
    
    <?php include('footer.php') ?>
    
  
     
           
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
    <script type="text/javascript">
        
          function ordenar()
            {
                    var registros = document.getElementById("registros").value;
                    var ordenar = document.getElementById("ordenar").value;
                    var subcategoria = document.getElementById("subcategoria").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('registros', registros);
                    paqueteDeDatos.append('ordenar', ordenar);
                    paqueteDeDatos.append('subcategoria', subcategoria);
              
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/ordenar.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#productos").html(msg);
           
         
                }); 
            }

             function registros(cantidad)
            {
                    document.getElementById("registros").value = cantidad;
                    var ordenar = document.getElementById("ordenar").value;
                    var subcategoria = document.getElementById("subcategoria").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('registros', cantidad);
                    paqueteDeDatos.append('ordenar', ordenar);
                    paqueteDeDatos.append('subcategoria', subcategoria);
                    
              
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/ordenar.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#productos").html(msg);
           
         
                }); 
            }
    </script>
    
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