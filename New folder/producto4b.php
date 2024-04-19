<?php
session_start();

    include('../administrador/config/app_config.php');
    if(is_numeric($_GET['id']) && $_GET['id'] > 0)
    {
        $scat = "SELECT *FROM categorias WHERE estado='1'";
        $rcat = mysql_query($scat);

        $scatd = "SELECT *FROM categorias WHERE estado='1'";
        $rcatd = mysql_query($scatd);

        
        $ruta = "../administrador/imagenes";

        $sdetalle = "SELECT *FROM productos WHERE estado='1' and id=".$_GET['id']." ORDER BY id desc LIMIT 4";
        $rdetalle = mysql_query($sdetalle);
        $fdetalle = mysql_fetch_array($rdetalle);
        $tallas = explode(":;:", $fdetalle['tallas']);
       
        $tallas = array_unique($tallas);
        $colores = explode(":;:", $fdetalle['colores']);
        $colores = array_unique($colores);

       
        $spublicidad = "SELECT *FROM publicidad";
        $rpublicidad = mysql_query($spublicidad);
        $fpublicidad = mysql_fetch_array($rpublicidad);
        $pproductos = explode(":;:", $fpublicidad['seccionb']);

        $sslider = "SELECT *from sliders";
        $rslider = mysql_query($sslider);
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
    
    <title>Detalle de productos Natural Care ec - Ecuador </title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    
    <link href="../js/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../js/vendor/slick/slick.min.css" rel="stylesheet">
    <link href="../js/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../js/vendor/animate/animate.min.css" rel="stylesheet">
    
    <link href="../fonts/icomoon/icomoon.css" rel="stylesheet">
   
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="../css/style-producto.css" rel="stylesheet">
    <link href="../css/filtro-color.css" rel="stylesheet">
        <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .loader {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 9999; /* Ensure it's on top of other content */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            justify-content: center;
            align-items: center;
        }

        .loader::after {
            content: ' ';
            width: 20px;
            height: 20px;
            position: absolute; /* Changed from fixed to absolute */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Center the spinner */
            border-radius: 50%;
            border-left-color: white;
            border-width: 6px;
            border-style: solid;
            border-top-color: gray;
            border-right-color: white;
            border-bottom-color: gray;
            box-sizing: content-box;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
   
</head>

<body class="is-dropdn-click">
<?php include('header.php'); ?>
  
    
    <div class="page-content">
       <!-- /MIGAS DE PAN-->
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><span>detalle de producto</span></li>
                </ul>
            </div>
        </div>
        <!-- /FIN MIGAS DE PAN-->
        
        
        
        
        <div class="holder mt-0">
           <div class="container">
                <div class="row prd-block prd-block--mobile-image-first js-prd-gallery" id="prdGallery100">
                    <div class="col-md-6 col-xl-5">
                        <div class="fixed-col_container">
                            <div class="fstart"></div>
                            <div class="fixed-wrapper">
                                <div class="fixed-scroll">
                                    <div class="fixed-col_content">
                                        <div class="prd-block_info js-prd-m-holder mb-2 mb-md-0"></div><!-- Product Gallery -->
                                        <div class="prd-block_main-image main-image--slide js-main-image--slide">
                                            <div class="prd-block_main-image-holder js-main-image-zoom" data-zoomtype="inner">
                                                <div class="prd-block_main-image-video js-main-image-video"><video loop muted preload="metadata" controls>
                                                        <source src="#"></video>
                                                    <div class="gdw-loader"></div>
                                                </div>
                                                  <?php if($fdetalle['foto_uno'] != ""){ ?>
                                                <div class="prd-has-loader">
                                                    <div class="gdw-loader"></div><img src="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>" class="zoom" alt="" data-zoom-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>">
                                                </div>
                                                <?php  } ?>
                                                <div class="prd-block_main-image-next slick-next js-main-image-next">NEXT</div>
                                                <div class="prd-block_main-image-prev slick-prev js-main-image-prev">PREV</div>
                                            </div>

                                        <?php if($fdetalle['foto_uno'] != ""){ ?>
                                            <div class="prd-block_main-image-links">
                                            <a href="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>" class="prd-block_zoom-link"><i class="icon icon-zoomin"></i></a></div>
                                             <?php  } ?>
                                        </div>
                                        <div class="product-previews-wrapper">
                                            <div class="product-previews-carousel" id="previewsGallery100">
                                                 <?php if($fdetalle['foto_uno'] != ""){ ?>
                                                <a href="#" data-value="Silver" data-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>" data-zoom-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>"><img src="../administrador/imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>" alt=""></a>
                                                <?php  } ?>
                                                 <?php if($fdetalle['foto_dos'] != ""){ ?>
                                                <a href="#" data-value="Silver" data-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_dos'] ?>" data-zoom-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_dos'] ?>"><img src="../administrador/imagenes/productos/<?php echo $fdetalle['foto_dos'] ?>" alt=""></a>
                                                <?php  } ?>
                                                 <?php if($fdetalle['foto_tres'] != ""){ ?>
                                                <a href="#" data-value="Silver" data-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_tres'] ?>" data-zoom-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_tres'] ?>"><img src="../administrador/imagenes/productos/<?php echo $fdetalle['foto_tres'] ?>" alt=""></a>
                                                <?php  } ?>
                                                 <?php if($fdetalle['foto_cuatro'] != ""){ ?>
                                                <a href="#" data-value="Silver" data-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_cuatro'] ?>" data-zoom-image="../administrador/imagenes/productos/<?php echo $fdetalle['foto_cuatro'] ?>"><img src="../administrador/imagenes/productos/<?php echo $fdetalle['foto_cuatro'] ?>" alt=""></a>
                                                <?php  } ?>
                                                
                                                
                                                
                                            </div>
                                            
                                              <div class="text-center"><a href="#escribir-resena" class="btn-decor">Escribir reseña</a></div>
                                            
                                             <div class="prd-safecheckout topline">
                                <h3 class="h2-style">Págalo con tu tarjeta preferida</h3><img src="../images/tarjetas.png" alt="" class="img-fluid">
                            </div>
                                      
                                    
                                       
                                       
                                        </div>
                                        <!-- /Product Gallery -->
                                    </div>
                                </div>
                            </div>
                            <div class="fend"></div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="prd-block_info">
                            <div class="js-prd-d-holder prd-holder">
                                <div class="prd-block_title-wrap">
                                    <h1 class="prd-block_title"><?php echo $fdetalle['nombre'] ?></h1>
                                    <div class="prd-block__labels"><span class="prd-label--new">NUEVO</span></div>
                                </div>
                                <div class="prd-block_info-top">
                                    <div class="product-sku">Cod: <span><?php echo $fdetalle['codigo'] ?></span></div>
                                    <div class="prd-rating"><a href="#" class="prd-review-link">
                                         <?php $cconp=0; while($fdetalle['estrellas']> $cconp){ $cconp++; ?>
                                       <i class="icon-star fill"></i>
                                        <?php } ?> <span>en calidad</span></a></div>
                                    </div>
                                <div class="prd-block_description topline">
                                    <p><?php echo $fdetalle['descripcion'] ?></p>
                                </div>
                            </div>
                            
                            
                     <?php $flagcolor=0; if(count($colores) > 1){ ?>       
                    <h4>colores disponibles:</h4>
                                <div class="filter-color">
                                <ul class="check-box-list">
                                 <?php   for($i=0;$i<count($colores);$i++){                                   
                                       if($colores[$i] != ":;:"  && $colores[$i] != "" )
                                       { $flagcolor=1; ?>
                                        <li>
                                        <input type="radio" id="colores<?php echo $i; ?>" value="<?php echo $colores[$i]; ?>" name="colores" />
                                        <label style="background:<?php echo $colores[$i]; ?>;" for="colores<?php echo $i; ?>"><span class="button"></span></label>   
                                    </li>
                                  <?php } }  ?>

                                   
                                   
                                    
                                </ul>
                            </div>
                        <?php } ?>
                            <!-- ./filter color -->
                           
                           <input type="hidden" name="flagcolor" id="flagcolor" value="<?php echo $flagcolor ?>">
                           
                           
                           
                            
                            <div class="prd-block_options topline">
                                
                               
                                <?php if($tallas[1] == 'NO APLICA'){ ?>
                                    <input type="hidden" name="valpresen" id="valepresen" value="1" />
                                <?php }else{ ?>
                                <div class="sidebar-block_content"><label class="text-uppercase">Presentación:</label>
                                <div class="form-group select-wrapper">
                                    <select class="form-control" id="presentacion" onchange="preciopresentacion(<?php echo number_format($fdetalle['precio'],2); ?>,<?php echo ($_GET['id']); ?>,this.value)">
                                        <option value="0" selected="selected">Seleccione</option>
                                              <?php
                                                 sort($tallas);
                                                 for($i=0;$i<=count($tallas);$i++){
                                        
                                       if($tallas[$i] != ":;:"  && $tallas[$i] != "" )
                                       { ?>
                                         <option value="<?php echo $tallas[$i] ?>" ><?php echo $tallas[$i] ?></option>
                                      <?php } } ?>
                                        
                                     </select>
                                </div>
                              <input type="hidden" name="valpresen" id="valepresen" value="0" />
                            </div>
                        <?php } ?>
                                
                                
                                <div class="prd-block_qty"><span class="option-label">Qty:</span>
                                    <div class="qty qty-changer">
                                        <fieldset><input type="button" value="&#8210;" class="decrease"> <input type="text" class="qty-input" value="1" id="cantidad" data-min="1" data-max="10"> <input type="button" value="+" class="increase"></fieldset>
                                    </div><span class="option-label">max <span class="qty-max">10</span> item(s)</span>
                                </div>
                            </div>
                            <div class="prd-block_actions topline">
                                <div class="prd-block_price" id="preciodiv"><span class="prd-block_price--actual">$<?php echo number_format($fdetalle['precio'],2); ?></span> </div>
                             <!--   <div class="btn-wrap"><button class="btn btn--add-to-cart" data-fancybox data-src="#modalCheckOut"><i class="icon icon-handbag"></i><span>Agregar a la cesta</span></button></div>-->
                             <div class="btn-wrap"><button class="btn btn--add-to-cart" onclick="carrito();" ><i class="icon icon-handbag"></i><span>Agregar a la cesta</span></button>

                             </div>
                             <a id="disparar" data-fancybox data-src="#modalCheckOut"></a>
                             <input type="hidden" id="precioproducto" value="<?php echo number_format($fdetalle['precio'],2); ?>" />  
                             <input type="hidden" id="producto" value="<?php echo $_GET['id']; ?>" />   
                            </div>
                            
                          
                           
                           
                        </div>
                    </div>
                    
                    <!-- /sección de puntos-->
                    <div class="col-xl-3 mt-3 mt-xl-0 sidebar-product">
                        <div class="shop-features-style4"><a href="#" class="shop-feature">
                               
                              <div class="promo-text">
                                  <div><span class="text2 titulo-plan">PLAN DE PUNTOS </span></div>
                              </div>
                              <div class="clearfix"></div>
                             
                            </a>
                            <div class="shop-feature">
                                <div class="shop-feature-icon"><i class="icon-arrow-left-circle"></i></div>
                                <div class="shop-feature-text">
                                   <div class="text2">Valor en Puntos</div>
                                     <div class="text1">250 PUNTOS</div>
                                     
                                       
                                </div>
                               
                            </div>
                              <div class="shop-feature-text shop-feature2 mt-3">
                                   <div class="text2">Tus puntos actuales: 200 Puntos</div>
                                </div>
                          
                            
                           
                           <button type="button" data-fancybox data-src="#modalPuntos"  class="btn btn-block btn-outline btn-outline-info mt-3">¡CANJEAR AHORA!</button><br>
                           
                           <a href="#" data-fancybox data-src="#modalError" >Modal error 1</a>
                          </div>
                        
                    </div>
                    <!-- /fin sección de puntos-->
                    
                    
                </div>
                <div class="ymax"></div>
               
            </div>
           
             <!-- /SEWERYN- START REVIEW BLOCK -->
           <div class="holder mt-2 mt-sm-5">
                <div class="container">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs product-tab">
                        <li class="nav-item"><a href="#Tab1" class="nav-link" data-toggle="tab">Reseñas</a></li>
                        <li class="nav-item"><a href="#Tab2" class="nav-link" data-toggle="tab">Detalles</a></li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                       
                       <div role="tabpanel" class="tab-pane fade" id="Tab1" style="width: 100%">
                           
                           
                           
                           <div class="row">
                    <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                        <div class="card-body card-body-rating border">
                            <div class="prd-rating-value text-success">4.0</div>
                            <div class="prd-rating justify-content-center"><i class="icon-star fill"></i><i class="icon-star fill"></i><i class="icon-star fill"></i><i class="icon-star fill"></i><i class="icon-star"></i></div>
                            <div>Basadp en 3 reseñas</div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card-body card-body-progress">
                            <div class="row">
                                <div class="col-3">
                                    <h6>5 Estrellas</h6>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width:80%"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6>(10)</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6>4 Estrellas</h6>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width:70%"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6>(2)</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6>3 Estrellas</h6>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width:10%"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6>(1)</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6>2 Estrellas</h6>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" style="width:10%"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6>(1)</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6>1 Estrellas</h6>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" style="width:10%"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6>(1)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                        <div class="review-write">
                            <a href="#" class="btn btn--lg js-show-form" data-form="#writeReview"><i class="icon-pencil"></i><span>Escribe una reseña</span></a>
                            <br>
                            <small>Comparta su experiencia con este producto</small>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-none" id="writeReview">
                    <h3>Escribir reseña</h3>
                    <div class="row mt-2" id="escribir-resena">
                        <div class="col-sm-6">
                            <label class="text-uppercase">Su nombre:</label>
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="text-uppercase">¿En qué rango de edad está usted?</label>
                            <div class="form-group select-wrapper">
                                <select name="rango-edad" class="form-control">
                                    <option value="18-25 años">18-25 años</option>
                                    <option value="26-35 años">26-35 años</option>
                                    <option value="36-45 años">36-45 años</option>
                                    <option value="46-55 años">46-55 años</option>
                                    <option value="55 +">55 +</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="text-uppercase">Resume tu comentario en un título</label>
                            <div class="form-group">
                                <input type="text" name="titulo" class="form-control" placeholder="un título breve..">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label class="text-dark">Reseña</label>
                            <textarea class="form-control textarea--height-100" name="message" placeholder="Escribe tu reseña aquí por favor" data-required-error="Please fill the field" required></textarea>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-6">
                                <label class="text-uppercase">Agrega fotos <small>(opcional)</small></label>
                                <div>
                                    <p class="text-muted m-t-5">Foto principal</p>
                                    <input accept="image/*" type="file" id="archivo1" name="Foto_principal" value="" data-parsley-id="0521">
                                </div>
                                <div>
                                    <p class="text-muted m-t-5">Foto 2</p>
                                    <input accept="image/*" type="file" id="archivo2" name="Foto2" value="" data-parsley-id="0522">
                                </div>
                                <div>
                                    <p class="text-muted m-t-5">Foto 3</p>
                                    <input accept="image/*" type="file" id="archivo3" name="Foto3" value="" data-parsley-id="0523">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <ul class="seccion-fotos">
                                    <li><img class="fotos-clientes" id="img1" src=""></li>
                                    <li><img class="fotos-clientes" id="img2" src=""></li>
                                    <li><img class="fotos-clientes" id="img3" src=""></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-6">
                                <p>Puntaje del 1 al 5</p>
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="5">
                                    <label for="radio1">★</label>
                                    <input id="radio2" type="radio" name="estrellas" value="4">
                                    <label for="radio2">★</label>
                                    <input id="radio3" type="radio" name="estrellas" value="3">
                                    <label for="radio3">★</label>
                                    <input id="radio4" type="radio" name="estrellas" value="2">
                                    <label for="radio4">★</label>
                                    <input id="radio5" type="radio" name="estrellas" value="1">
                                    <label for="radio5">★</label>
                                </p>
                            </div>

                            <div class="col-sm-6">
                                <label class="text-uppercase">¿Recomendarías este producto?</label>
                                <div class="form-group select-wrapper">
                                    <select name="recomendar" class="form-control">
                                        <option value="1">SI <div class="yes"></div></option>
                                        <option value="0">NO <div class="NO"></div></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="reset" class="btn btn--alt js-close-form" data-form="#writeReview">boton temporal (close)</button>
                            <button type="button" onclick="saveReview();" class="btn ml-1">Publicar reseña</button>
                        </div>

                    <div id="sa-resena"></div>
                    </div>
                </div>
                
                           
                           
                           
            <div id="reviewContainer">
                <div id = "productReviews">
                </div>
                <div class="text-center"><a href="#" class="btn-decor">Cargar más reseñas</a></div>
            </div>
                        </div>
                      
                        <div role="tabpanel" class="tab-pane fade" id="Tab2">
                            
                            <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                        <tbody>
                                            <?php if($fdetalle['uso'] != ""){ ?>
                                            <tr>
                                                
                                                <td>Modo de uso:</td>
                                                <td><?php echo $fdetalle['uso'] ?></td>
                                            </tr>
                                        <?php  } ?>
                                        <?php if($fdetalle['beneficio'] != ""){ ?>
                                            <tr>
                                                <td>Beneficios:</td>
                                                <td><?php echo $fdetalle['beneficio'] ?></td>
                                            </tr>
                                             <?php  } ?>
                                        <?php if($fdetalle['frecuencia'] != ""){ ?>
                                            <tr>
                                                <td>Frecuencia:</td>
                                                <td><?php echo $fdetalle['frecuencia'] ?></td>
                                            </tr>
                                            <?php  } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                        </div>
                          
                       
                    </div>
                </div>
            </div> 
             <!-- /SEWERYN- END REVIEW BLOCK -->
        
        
        
        
        </div>
        
        <div class="holder">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style">Te podría interesar</h2>
                    
                              
                              
                              
                </div>
                <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2" data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                    
                <?php 
                $sultimo = "SELECT *FROM productos WHERE estado='1' and categoria='".$fdetalle['categoria']."' ORDER BY id desc LIMIT 10";
                $rultimo = mysql_query($sultimo);
                while($fproductos = mysql_fetch_array($rultimo)){ 
                     $tallas = explode(":;:", $fproductos['tallas']);
                      $tallas = array_unique($tallas);
       
       
                    ?> 
                  <!-------------------- PRODUCTO -------------- -->
                    <div class="prd prd-has-loader">
                        <div class="prd-inside">
                            <div class="prd-img-area"><a href="producto.php?id=<?php echo $fproductos['id'] ?>" class="prd-img"><img src="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>" data-srcset="<?php echo $ruta ?>/productos/<?php echo $fproductos['foto_uno'] ?>" alt="Tyssot 1853" class="js-prd-img lazyload"></a>
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
                                    <div class="prd-options prd-hidemobile"><span class="label-options">Presentación:</span>
                                        <ul class="list-options size-swatch">
                                            <?php   for($i=0;$i<=count($tallas);$i++){
                                        
                                       if($tallas[$i] != ":;:"  && $tallas[$i] != "" )
                                       { ?>
                                         <li><span><?php echo $tallas[$i] ?></span></li>
                                      <?php } } ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------------------FIN PRODUCTO -------------- -->
                    <?php } ?>
                                
                             
                    
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
        
        
    </div>
   
    
  
 <?php include('footer.php'); ?>
    
    
    
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top"><i class="icon icon-angle-up"></i></a>
   
    
    
     <!-- ventana modal de producto agregado a la cesta -->
    <div id="modalCheckOut" class="modal--checkout" style="display: none;">
        <div class="modal-header">
            <div class="modal-header-title"><i class="icon icon-check-box"></i><span>Producto agregado exitosamente!</span></div>
        </div>
        <div class="modal-content">
            <div class="modal-body">
                <div class="modalchk-prd">
                    <div class="row h-font" id="detallecompra">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- fin de ventana modal de producto agregado a la cesta -->
     
     
     
      <!-- ventana modal de Puntos -->
    <div id="modalPuntos" class="modal--checkout" style="display: none;">
        <div class="modal-header">
            <div class="modal-header-title"><i class="icon icon-check-box"></i><span>¿Estás seguro en canjear Puntos?</span></div>
        </div>
        <div class="modal-content text-center">
            <div class="modal-body">
                <div class="modalchk-prd">
                    <div class="row h-font">
                        
                       
                        <div class="modalchk-prd-actions col">
                            <h3 class="modalchk-title">Actualmente tiene <strong>110 Puntos</strong> disponibles.
                            Este producto cuesta 100 puntos para canjear.</h3>
                           
                            <div class="modalchk-btns-wrap modalchk-btns-wrap2"><a href="#" class="btn">Si, Deseo Canjear </a> <a href="#" class="btn btn--alt" data-fancybox-close>Aún no</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- fin de ventana modal de Puntos -->
    
   
    <!-- ventana modal de puntos insuficientes -->
    <div id="modalError" class="modal-info modal--error" data-animation-duration="700" style="display: none;">
        <div class="modal-text"><i class="icon icon-error modal-icon-info"></i>
            <div>Oops! Parece que no tiene los puntos suficientes para canjear este producto</div>
        </div>
    </div>
     <!-- ventana modal de puntos insuficientes -->
     
     
     
         <!-- modal image -->
    <div id="modalImage" class="modal-info modal--error" data-animation-duration="700" style="display: none;">
        <img class="img-fluid" src="../images/example2.jpg" >
     </div>
     <!-- modal image -->
     
    <div class="loader" id="loader"></div>
    
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
     <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    
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
<script type="text/javascript">
    function carrito()
    {
        var valpre = document.getElementById("valepresen").value;
        var precioproducto = document.getElementById("precioproducto").value;
        var producto = document.getElementById("producto").value;
        var presentacion ="";
        if(valpre == 0){
        presentacion = document.getElementById("presentacion").value;
        }else
        {
           presentacion = "NO APLICA"; 
        }

        
        var color = "";
        var cantidad = document.getElementById("cantidad").value;

        var flagcolor = "";
        
        flagcolor = document.getElementById("flagcolor").value;
    
        if(flagcolor == 0)
        {
          color = ":";
        }else
        {
           $("input:radio:checked").each(function() {
            color += ($(this).val())+'';
        });
        }

        if(presentacion != "0"){
            if(color != ""){
        $('#disparar').click();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('precioproducto', precioproducto);
        paqueteDeDatos.append('producto', producto);
        paqueteDeDatos.append('presentacion', presentacion);
        paqueteDeDatos.append('color', color);
        paqueteDeDatos.append('cantidad', cantidad);

        
              
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/carrito.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#detallecompra").html(msg);

           
         
                }); 

                   } else{ 
                        swal("Alto!","Seleccione un color" , "error");
                        $('#completar').attr('onClick', 'guardar_pedido();');


       }
                     } else{ 
                        swal("Alto!","Seleccione la presentación" , "error");
                        $('#completar').attr('onClick', 'guardar_pedido();');


       }
    }

    function preciopresentacion(precio,id,presentacion)
    {
       
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('id', id);
        paqueteDeDatos.append('precio', precio);
        paqueteDeDatos.append('presentacion', presentacion);
               
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/preciopresentacion.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                        document.getElementById("precioproducto").value = msg;
                        $("#preciodiv").html('<span class="prd-block_price--actual">$'+msg+'</span>');
         
                }); 
    }

    $(document).ready(function() {
        fetchReviews();

        window.onload = function() {
           $(document).ready(function() {
               $('.js-show-form').click(function(e) {
                   e.preventDefault();
                   
                    let isSessionValid = "<?php echo $_SESSION['idcarrito']; ?>";
                    if (!isNaN(isSessionValid) && isSessionValid > 0 &&　isSessionValid < 500000) {
                        $('#writeReview').removeClass('d-none');
                    } else {
                        window.location.href = "/paginas/login.php";
                    }
               });
            });
        }
        function handleFileSelect(event) {
            const input = event.target;
            const file = input.files[0];

            if (file) {
                if (file.type.split('/')[0] !== 'image') {
                    // Not an image file - handle the case (e.g., show an alert)
                    alert('Please select an image file (JPG, PNG, GIF).');
                    
                    // Clear the input value
                    this.value = '';
                    return;
                }
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgId = input.id.replace('archivo', 'img');
                    const imgElement = document.getElementById(imgId);
                    imgElement.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
        // Assign the handleFileSelect function to each file input
        $('#archivo1, #archivo2, #archivo3').change(handleFileSelect);


        
    });

    function saveReview() {

        const name = $('input[name="nombre"]').val();
        const ageRange = $('select[name="rango-edad"]').val();
        const title = $('input[name="titulo"]').val();
        const reviewText = $('textarea[name="message"]').val();
        const rating = $('input[name="estrellas"]:checked').val();
        const recommend = $('select[name="recomendar"]').val();
        const producto = $('#producto').val();

        if(name === '' || ageRange === '' || title === '' || reviewText === '' || !rating || recommend === '') {
            alert('Por favor, rellene todos los campos obligatorios');
            return false;
        }
        
        // Prepare form data
        const formData = new FormData();
        formData.append('type', "addReview");
        formData.append('name', name);
        formData.append('ageRange', ageRange);
        formData.append('title', title);
        formData.append('reviewText', reviewText);
        formData.append('rating', rating);
        formData.append('recommend', recommend);
        formData.append('producto', producto);
        
        // Add image files to the form data
        for (let i = 1; i <= 3; i++) {
            const input = $(`#archivo${i}`)[0];
            
            if (input.files.length > 0) {
                const file = input.files[0];
                formData.append(`image${i}`, file);
            }
        }
        
        setLoader(true);

        $.ajax({
            type: "POST",
            url: "../administrador/procesos/review.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false 
        }).done(function(msg) {
            document.getElementById("sa-resena").innerText = msg;
        }).fail(function () {
            // Handle AJAX request failure
            document.getElementById("sa-resena").innerText = "server error";
        }).always(function () {
            // Hide rotating spinner in both success and failure cases
            setLoader(false);
        });
    }

    function setLoader(flag) {
        if (flag)
            document.getElementById('loader').style.display = 'flex';
        else
            document.getElementById('loader').style.display = 'none';

    }

    function fetchReviews() {
        const formData = new FormData();
        formData.append('type', 'getReviewsByProducto');
        formData.append('producto', $('#producto').val());

        $.ajax({
            type: "POST",
            url: "../administrador/procesos/review.php",
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                if (data && data.length > 0) {
                    data.forEach(function(review) {
                        var reviewItem = `
                        <div class="review-item">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="circulo-inicial"><span class="inicial">${review.author.charAt(0)}</span></div>
                                </div>
                                <div class="col-md">
                                    <h4 class="review-item_author">${review.author}</h4>
                                    <span>Edad: ${review.ageRange}</span>
                                </div>
                                <div class="col-md-auto">
                                    <div class="review-item_date"><small>${convertDate(review.date)}</small></div>
                                    <div class="review-item_rating">${generateRatingStars(review.rating)}</div>
                                </div>
                            </div>
                            <p><strong>${review.title}</strong></p>
                            <p>${review.reviewText}</p>
                            <ul class="seccion-fotos">
                                ${generateImages(review.images)}
                            </ul>
                            <div class="row pt-2">
                                <div class="col-md-auto">
                                    <div style="display: flex; align-items: center;">
                                        <small style="margin-right: 10px;">Recomendarías este producto?</small>

                                        <div class="${review.recommend == '1' ? 'yes' : 'no'}" style="top: 0;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comment respuesta">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="post-comment-author-img"><img src="${review.respond ? review.respond.imagenes : ""}" alt="" class="img-fluid"></div>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author">${review.respond ? review.respond.user : ""}</div>
                                        <div class="post-comment-date"><small>${review.respond ? convertDate(review.respond.reply_date) : ""}</small></div>
                                        <div class="post-comment-text">
                                            <p>${review.respond ? review.respond.description : ""}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        $('#productReviews').append(reviewItem);
                    });
                }
            },
            error: function() {
                console.error("Error fetching reviews.");
            }
        });
    }

    function convertDate(inputDate) {
        var parts = inputDate.split(/[- :]/);
        var year = parts[0];
        var month = parts[1];
        var day = parts[2];
        var monthNames = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

        // Format the date in the desired output format
        var formattedDate = day + " de " + monthNames[parseInt(month) - 1] + " de " + year;
        return formattedDate;
    }

    function generateRatingStars(rating) {
        const maxStars = 5;
        let starsHTML = "";
        
        for (let i = 1; i <= maxStars; i++) {
            const starClass = (i <= rating) ? "fill" : "";
            starsHTML += `<i class="icon-star ${starClass}"></i>`;
        }
        
        return starsHTML;
    }

    function generateImages(images) {
        if (images === "") return "";
        var imageHTML = '';
        var images = images.split(',');
        images.forEach(function(image) {
            imageHTML += `<li><a href="#" data-fancybox data-src="#modalImage"><img class="fotos-clientes" src="${image}" ></a></li>`;
        });
        return imageHTML;
    }

</script>


</html>