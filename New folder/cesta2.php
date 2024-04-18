<?php
session_start();

    include('../administrador/config/app_config.php');
    if(is_numeric($_SESSION["idcarrito"]) && $_SESSION["idcarrito"] > 0)
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
    }

$descuento = 0;
$scupon = "select b.* from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);


if($subtotal > 120)
{   
    $envio = 0;
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
    <title>Mi cesta - Natural Care ec</title>
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
    
     <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
 
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
    
    <?php 
    if($cantidad == 0)
    {
        echo "<script>
        swal({ 
            title: 'Alto!',
            text: 'No tienes productos en tu cesta',
            type: 'error' 
            },
            function(){
            history.back();
            });
        </script>";
    }

	    if($fcupon['id'] > 0)
	{
		if($fcupon['tipo'] == '1')
		{
			$descuento =(($subtotal*$fcupon['valor'])/100);

		}else
		{
			$descuento = $fcupon['valor'];
		}
	}

    ?>
    
    <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><span>Cesta</span></li>
                </ul>
            </div>
        </div>
        
        <div class="holder mt-0">
            <div class="container">
                <h1 class="text-center">Resumen de cesta</h1>
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart-table">
                            <?php while($fcarroc = mysql_fetch_array($rcarritoc)){ ?>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><a href="#"><img src="<?php echo $rutac ?>/productos/<?php echo $fcarroc['foto_uno'] ?>" alt=""></a></div>
                                <div class="cart-table-prd-name">
                                    <h2><a href="#"><?php echo $fcarroc['nombre'] ?></a></h2>
                                    <?php if($fcarroc['presentacion'] != "")
                                    { ?>
                                    <h5><a href="#">Presentación <?php echo $fcarroc['presentacion'] ?></a></h5>
                                <?php  } ?>
                                    
                                </div>
                                <div class="cart-table-prd-qty"><span>qty:</span> <b><?php echo $fcarroc['cantidad'] ?></b></div>
                                <div class="cart-table-prd-price"><span>precio:</span> <b>$ <?php echo number_format($fcarroc['precio'],2) ?></b></div>
                                <div class="cart-table-prd-action"><a href="#" class="icon-cross" onclick="eliminaritem(<?php echo $fcarroc['id']; ?>)"></a></div>
                            </div>
                        <?php } ?>
                           
                            <div class="cart-table-total">
                                <div class="row">
                                    <div class="col-sm"><a href="#" onclick="eliminarcarrito()" class="btn btn--alt"><i class="icon-cross"></i><span>Vaciar cesta</span></a> <a href="#" onclick="javascript:location.reload();" class="btn btn--grey"><i class="icon-repeat"></i><span>Actualizar cesta</span></a></div>
                                    <div class="col-sm-auto"><a href="../index.php" class="btn btn--alt"><i class="icon-angle-left"></i><span>Continuar comprando</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" >
                       
                            <div class="card card--grey">
                                <div class="card-body">
                                    <h3>TIENE DISPONIBLE 110 PUNTOS</h3>
                                    
                                    <div class="form-flex">
                                    <div class="form-group select-wrapper">
                                        <input type="hidden" id="carroId" value="<?php echo $_SESSION["idcarrito"]; ?>">
                                        <select class="form-control" id="restaPuntos">
                                        <option value="0">SELECCIONE..</option>
                                <?php  
                                
                                while($laRecompensa = (mysql_fetch_array($rRecompensas))){ 
                                    if( (number_format($subtotal)) >= ($laRecompensa['min_uso']) ){
                                        if( ($pointsUser['points']) < ($laRecompensa['min_uso']) ){
                                        } else{
                                    ?>
                                        <option value="<?php echo $laRecompensa['valor_usd'] ?>" id="<?php echo $laRecompensa['id'] ?>"><?php echo $laRecompensa['descripcion'] ?></td>
                                <?php
                                        } // fin validador de puntos necesarios para el canje
                                    }
                                    else {  } // fin validador de subtotal minimo
                                } //fin while
                                ?>  
                                        </select>
                                    </div>
                                <a href="#" id="aplicarRecompensa">
                                    <button type="button" data-fancybox data-src="#modalRecompensa" class="btn btn--form btn--alt">Aplicar</button>
                                </a> 
                                </div>
                                   
                                   
                                    <a href="#"> <button type="button" data-fancybox data-src="#modalRecompensa" class="btn btn--form btn--alt">Aplicar</button></a> <br>
                                    <a href="#" data-fancybox data-src="#modalError" >Modal error 1</a>
                                </div>
                            </div>
                            
                            
                            <div class="divisor"></div>
                            
                            
                            
                            
                            <table class="table table-hover">
                              
                              <tbody>
                                <tr>
                                  <th scope="row">Subtotal sin iva</th>
                                  <td class="derecha">$50.00</td>
                                </tr>
                                
                                <tr>
                                  <th scope="row">Descuento (-)</th>
                                  <td class="derecha">$10.00</td>
                                </tr>
                                
                                <tr>
                                  <th scope="row">Envío</th>
                                  <td class="derecha">Calculado en el siguiente paso</td>
                                </tr>
                                
                                <tr>
                                  <th scope="row">Iva 12% (+)</th>
                                  <td class="derecha">$10.00</td>
                                </tr>
                              
                              </tbody>
                            </table>
                            <div class="card-total-sm">
                                <div class="float-right">total <span class="card-total-price">$ 40.00</span></div>
                            </div>
                            
                            <div class="divisor"></div>
                            
                            <a href="checkout.php">   <button class="btn btn--full btn--lg">finalizar compra  <i class="icon-angle-right"></i> </button></a>
                            
                      
                          
                            
                            
                    
                       
                       
                     
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="holder mt-0">
            <div class="container">
                <h1 class="text-center">Resumen de cesta</h1>
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart-table">
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><a href="#"><img src="../images/producto1.jpg" alt=""></a></div>
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Shampoo de Gardenia</a></h2>
                                    <h5><a href="#">Presentación 250 ml</a></h5>
                                    
                                </div>
                                <div class="cart-table-prd-qty"><span>qty:</span> <b>1</b></div>
                                <div class="cart-table-prd-price">
                                <span class="valor-tachado">precio: $ 15.00</span>
                                <span class="free">Canjeado por puntos</span>
                                </div>
                                <div class="cart-table-prd-action"><a href="#" class="icon-cross"></a></div>
                            </div>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><a href="#"><img src="../images/producto2.jpg" alt=""></a></div>
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Jabón de carbón activado</a></h2>
                                    <h5><a href="#">Presentación 200gr</a></h5>
                                    
                                </div>
                                <div class="cart-table-prd-qty"><span>qty:</span> <b>1</b></div>
                                <div class="cart-table-prd-price"><span>precio:</span> <b>$ 10.00</b></div>
                                <div class="cart-table-prd-action"><a href="#" class="icon-cross"></a></div>
                            </div>
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image"><a href="#"><img src="../images/producto3.jpg" alt=""></a></div>
                                <div class="cart-table-prd-name">
                                    <h2><a href="#">Kit capilar</a></h2>
                                    <h5><a href="#">Presentación 200ml</a></h5>
                                    </div>
                                <div class="cart-table-prd-qty"><span>qty:</span> <b>1</b></div>
                                <div class="cart-table-prd-price"><span>precio:</span> <b>$ 15.00</b></div>
                                <div class="cart-table-prd-action"><a href="#" class="icon-cross"></a></div>
                            </div>
                           
                        </div>
                    </div>
          
                </div>
            </div>
        </div>
      
        
    </div>
    
    
    
   <?php include('footer.php'); ?>
   
   
   
   
      <!-- ventana modal de Puntos -->
    <div id="modalRecompensa" class="modal--checkout" style="display: none;">
        <div class="modal-header">
            <div class="modal-header-title"><i class="icon icon-check-box"></i><span>¿Estás seguro en canejar puntos?</span></div>
        </div>
        <div class="modal-content text-center">
            <div class="modal-body text-center">
                <div class="modalchk-prd">
                    <div class="row h-font">
                        
                       
                        <div class="modalchk-prd-actions col text-center">
                            <h3 class="modalchk-title">Al aplicar sus puntos estos serán debitados automáticamente, 
                            ¿Desea proceder a aplicarlos?</h3> 
                           
                            <div class="modalchk-btns-wrap modalchk-btns-wrap2 text-center"><a href="#" class="btn">Si, Deseo Aplicar </a> <a href="#" class="btn btn--alt" data-fancybox-close>Aún no</a></div>
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
            <div>Oops! El monto total de su cesta es menor que el monto requerido para canjear por recompensa</div>
        </div>
    </div>
     <!-- ventana modal de puntos insuficientes -->
     
   
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
   
     <script type="text/javascript">
        function eliminarcarrito()
        {

                    var paqueteDeDatos = new FormData();
                   
                  
              
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/deletecar.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                        location.reload();
           
         
                }); 
        }
        function buscarciudad(id)
    {
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('pais', id);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/buscarcitys.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            $('#ciu').html(msg);
                        });
    }

       function valorciudad(id)
    {
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('pais', id);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/valorcity.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            $('#resum').html(msg);
                        });
    }
      function cupon()
    {
    	
    	var codigo = document.getElementById('codigo').value;
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('codigo', codigo);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/savecarcupon.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            if(msg == 1)
                        {
                             location.reload();
                        }else
                        {
                             swal({ 
                                        title: "Alto!",
                                        text: "Cupon invalido",
                                        type: "error" 
                                        },
                                        function(){
                                        //location.reload();
                                        });
                        }
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