<?php
session_start();
if($_SESSION['idusuario']>0 && $_SESSION['idusuario']<500000)
{
    $_SESSION['idcarrito'] =$_SESSION['idusuario'];
}else
{
       if(($_SESSION['idcarrito']>500000 && $_SESSION['idcarrito']<900000) || ($_SESSION['idcarrito']>1500000 && $_SESSION['idcarrito']<1900000))
    {
        $_SESSION['idcarrito'] =$_SESSION['idcarrito'];
    }else
    {
        $_SESSION['idcarrito'] =  rand(500000,900000);
}
}

$scarrocant = "SELECT SUM(cantidad) as cantidad FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritocant = mysql_query($scarrocant);
$fcantidad = mysql_fetch_array($rcarritocant);
$cantidad = $fcantidad['cantidad'];
if(!isset($cantidad))
{
    $cantidad =0;
}

$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];

$scarrito = "SELECT a.*,b.foto_uno ,b.nombre FROM carrito as a
LEFT JOIN productos as b ON (a.producto = b.id)
where carro='".$_SESSION["idcarrito"]."'";
$rcarrito = mysql_query($scarrito);
$rutac = "../administrador/imagenes";
$_SESSION["idcarrito"];

$senviogratis = "SELECT *FROM envio_gratis";
$renviogratis = mysql_query($senviogratis);
$fenviogratis = mysql_fetch_array($renviogratis);


$scarrocsumenvi = "SELECT SUM((b.envio)) as sumenvio FROM carrito as a
LEFT JOIN productos as b ON (a.producto=b.id)
WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosumenvi = mysql_query($scarrocsumenvi);
$fsumaenvi = mysql_fetch_array($rcarritosumenvi);

?>
 <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
 <div class="body-preloader">
        <div class="loader-wrap">
            <div class="dots">
                <div class="dot one"></div>
                <div class="dot two"></div>
                <div class="dot three"></div>
            </div>
        </div>
    </div>
  
    

      <header class="hdr global_width hdr_sticky hdr-mobile-style2">
       
        <!-------------- Mobile Menu -------------------->
        <div class="mobilemenu js-push-mbmenu">
            <div class="mobilemenu-content">
                <div class="mobilemenu-close mobilemenu-toggle">CERRAR</div>
                <div class="mobilemenu-scroll">
                    <div class="mobilemenu-search"></div>
                    <div class="nav-wrapper show-menu">
                        <div class="nav-toggle"><span class="nav-back"><i class="icon-arrow-left"></i></span> <span class="nav-title"></span></div>
                        <ul class="nav nav-level-1">
                          
                           <li><a href="../index.php">Inicio</a></li>
                           <?php while($fcat = mysql_fetch_array($rcat)){ ?>
                            <li><a href="#"><?php echo $fcat['descripcion'] ?><span class="menu-label menu-label--color1">SALE</span></a><span class="arrow"></span>
                                <ul class="nav-level-2">
                                   <?php 
                                   $ssub = "SELECT *FROM subcategorias WHERE estado='1' and categoria='".$fcat['id']."' order by orden asc";
                                   $rsub = mysql_query($ssub);
                                   while($fsub = mysql_fetch_array($rsub)){ 

                                   ?>
                                    <li><a href="categoria.php?id=<?php echo $fsub['id'] ?>" title=""><?php echo $fsub['descripcion'] ?></a></li>
                                   <?php } ?>
                                    
                                </ul>
                            </li>
                            <?php } ?>
                           <li><a href="como-comprar.php">¿Cómo comprar?</a></li> 
                          </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--------- /Mobile Menu -------------->
        
        
        <div class="hdr-mobile show-mobile">
            <div class="hdr-content">
                <div class="container">
                    <!-- Menu Toggle -->
                    <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon icon-menu"></i></a></div>
                    <!-- /Menu Toggle -->
                    <div class="logo-holder"><a href="../index.php" class="logo"><img src="../images/logo-naturalcare.png" srcset="../images/logo-naturalcare.png 2x" alt=""></a></div>
                    <div class="hdr-mobile-right">
                        <div class="hdr-topline-right links-holder"></div>
                        <div class="minicart-holder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-desktop hide-mobile">
            <div class="hdr-topline">
                <div class="container">
                    <div class="row">
                        <div class="col-auto hdr-topline-left">
                            
                           
                        </div>
                        <div class="col hdr-topline-center">
                            <div class="custom-text"><span>ENVÍO GRATIS</span> EN COMPRAS SUPERIORES A $<?php echo number_format($fenviogratis['valor'],0) ?></div>
                            <div class="custom-text"><a href="https://api.whatsapp.com/send?phone=59399 5566 900&text=Hola%2C%20quiero%20información%20sobre%20un%20producto" target="_blank"> <i class="icon icon-mobile"></i><b>ESCRÍBENOS 099 5566 900</b></a>  </div>
                        </div>
                        <div class="col-auto hdr-topline-right links-holder">
                           
                            
                            <!-- Header cuenta -->
                            <div class="dropdn dropdn_account @@classes"><a href="#" class="dropdn-link"><i class="icon icon-person mr-1"></i>
                                <?php if($_SESSION['idusuario']>0 && $_SESSION['idusuario']<500000) { ?>
                                    <span>Hola <?php echo $_SESSION['nombres'] ?></span></a>
                                <?php  } else{  echo ' ACCEDER</a>';  } ?>

                                <div class="dropdn-content">
                                    <div class="container">
                                        <div class="dropdn-close">CERRAR</div>
                                        <ul>
                                            <?php if($_SESSION['idusuario']>0 && $_SESSION['idusuario']<500000)
                                            { ?>
                                            <li><a href="detalle-cuenta.php"><i class="icon icon-person-fill"></i><span>Mi cuenta</span></a></li>
                                             <li><a href="salir.php"><i class="icon icon-close"></i><span>Salir</span></a></li>
                                        <?php }else{ ?>
                                            <li><a href="login.php"><i class="icon icon-lock"></i><span>Ingresar</span></a></li>
                                            <li><a href="crear-cuenta.php"><i class="icon icon-person-fill-add"></i><span>Registrarme</span></a></li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Header Account -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="hdr-content hide-mobile">
                <div class="container">
                    <div class="row">
                        <div class="col-auto logo-holder"><a href="../index.php" class="logo"><img src="../images/logo-naturalcare3.png" srcset="logo-naturalcare3.png 2x" alt=""></a></div>
                        <!--navigation-->
                        <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                        <div class="nav-holder">
                            <div class="hdr-nav">
                               
                               <!--mmenu-->
                                <ul class="mmenu mmenu-js">
                                   
                                   <li><a href="../index.php">Inicio </a></li>
                                   
                                   <?php while($fcat = mysql_fetch_array($rcatd)){ ?>
                               
                                    <li class="mmenu-item--mega"><a href="#"><?php echo $fcat['descripcion'] ?><span class="menu-label menu-label--color4">SALE</span></a>
                                        <div class="mmenu-submenu mmenu-submenu-with-sublevel">
                                            <div class="mmenu-submenu-inside">
                                                <div class="container">
                                                    
                                                    <div class="mmenu-cols column-6">
                                                         <?php 
                                   $ssub = "SELECT *FROM subcategorias WHERE estado='1' and categoria='".$fcat['id']."' order by orden asc";
                                   $rsub = mysql_query($ssub);
                                   while($fsub = mysql_fetch_array($rsub)){ 

                                   ?>
                                    
                                   
                                                           <div class="mmenu-col">
                                                            <h3 class="submenu-title"><a  href="categoria.php?id=<?php echo $fsub['id'] ?>"><?php echo $fsub['descripcion'] ?></a></h3>
                                                            <div class="submenu-img"><a  href="categoria.php?id=<?php echo $fsub['id'] ?>"><img src="../administrador/imagenes/subcategorias/<?php echo $fsub['foto'] ?>" data-src="../administrador/imagenes/subcategorias/<?php echo $fsub['foto'] ?>" class="lazyload" alt=""></a>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        
                                                      
                                                       
                                                          
                                                    </div>
                                                    <div class="mmenu-bottom">
                                                        <div class="custom-text"><span>DESCUENTO</span> EN TU PRIMERA COMPRA</div>
                                                        <div class="custom-text"><span>100%</span> Sitio seguro </div>
                                                        <div class="custom-text"><span>24/7</span> asistencia online</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <li><a href="como-comprar.php">¿Cómo comprar?</a></li>
                                   
                                    
                                 
                                </ul>
                                <!--/mmenu-->
                                
                                
                            </div>
                        </div>
                        <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                        <!--//navigation-->
                        <div class="col-auto minicart-holder">
                            <div class="minicart minicart-js"><a href="#" class="minicart-link"><i class="icon icon-handbag"></i> <span class="minicart-qty"><?php echo $cantidad; ?></span> <span class="minicart-title">Mi cesta</span> <span class="minicart-total">$<?php echo number_format($subtotal,2) ?></span></a>
                                <?php if($cantidad == 0){ ?>
                                    <div class="minicart-drop">
                                    <div class="container">
                                        <div class="minicart-drop-close"><i class="icon icon-cross"></i></div>
                                        <div class="minicart-drop-content">
                                            <div class="cart-empty mx-auto">
                                                <div class="cart-empty-icon"><i class="icon icon-handbag"></i></div>
                                                <div class="cart-empty-text">
                                                    <h3 class="cart-empty-title">TU CESTA ESTÁ VACÍA</h3>
                                                    <p>Sabemos que hay cosas fabulosas que te gustarán!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="minicart-drop">
                                    <div class="container">
                                        <div class="minicart-drop-close">CERRAR</div>
                                        <div class="minicart-drop-content">
                                            <h3>Productos en mi cesta:</h3>
                                            <?php while($fcarro = mysql_fetch_array($rcarrito)){ ?>
                                            
                                            <div class="minicart-prd">
                                                <div class="minicart-prd-image"><a href="#"><img src="<?php echo $rutac ?>/productos/<?php echo $fcarro['foto_uno'] ?>" data-srcset="<?php echo $rutac ?>/productos/<?php echo $fcarro['foto_uno'] ?>" class="lazyload" alt="productos naturales en Ecuador"></a></div>
                                                <div class="minicart-prd-name">
                                                    <h2><a href="#"><?php echo $fcarro['nombre']  ?></a></h2>
                                                    <h5><a href="#">Presentación: <?php echo $fcarro['presentacion']; ?></a></h5>
                                                </div>
                                                <div class="minicart-prd-qty"><span>qty:</span> <b><?php echo $fcarro['cantidad'] ?></b></div>
                                                <div class="minicart-prd-price"><span>precio:</span> <b>$ <?php echo number_format($fcarro['precio'],2) ?></b></div>
                                                <div class="minicart-prd-action"><a href="#" onclick="eliminaritem(<?php echo $fcarro['id']; ?>)" class="icon-cross js-product-remove"></a></div>
                                            </div>
                                            <?php } ?>

                                                <div class="minicart-drop-total">
                                                <div class="float-right"><span class="minicart-drop-summa"><span>Subtotal:</span> <b>$ <?php echo number_format($subtotal,2) ?></b></span>
                                                    <div class="minicart-drop-btns-wrap">
                                                    
                                                    <a href="cesta.php" class="btn btn--alt"><i class="icon-handbag"></i><span>Ver todo</span></a></div>
                                                </div>
                                                <div class="float-left"><a href="cesta.php" class="btn btn--alt"><i class="icon-handbag"></i><span>ver todo</span></a></div>
                                            </div>                                        

                                           
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-holder compensate-for-scrollbar">
            <div class="container">
                <div class="row"><a href="#" class="mobilemenu-toggle show-mobile"><i class="icon icon-menu"></i></a>
                    <div class="col-auto logo-holder-s"><a href="../index.php" class="logo"><img src="../images/logo-naturalcare.png" srcset="../images/logo-naturalcare.png 2x" alt=""></a></div>
                    <!--navigation-->
                    <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                    <div class="nav-holder-s"></div>
                    <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                    <!--//navigation-->
                    <div class="col-auto minicart-holder-s"></div>
                </div>
            </div>
        </div>
    </header>
    <script type="text/javascript">
        function eliminaritem(id)
        {

                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('id', id);
                  
              
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/deleteitem.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                        location.reload();
           
         
                }); 
        }
    </script>
     <script type="text/javascript">
            function soloNumeros(e){

          key = e.keyCode ? e.keyCode : e.which

  // backspace

  if (key == 8) return true

  // 0-9

  if (key > 47 && key < 58) {

    if (field.value == "") return true

    regexp = /.[0-9]{2}$/

    return !(regexp.test(field.value))

  }

  // .

  if (key == 46) {

    if (field.value == "") return false

    regexp = /^[0-9]+$/

    return regexp.test(field.value)

  }

  // other key

  return false

      }

      function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
        </script>