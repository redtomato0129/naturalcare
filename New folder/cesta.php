<?php
session_start();
//$_SESSION['puntoscanjeados']=0;
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
        $fdetalle = mysql_fetch_array($rdetalle);s
        $tallas = explode(":;:", $fdetalle['tallas']);
        $colores = explode(":;:", $fdetalle['colores']);

        $spublicidad = "SELECT *FROM publicidad";
        $rpublicidad = mysql_query($spublicidad);
        $fpublicidad = mysql_fetch_array($rpublicidad);
        $pproductos = explode(":;:", $fpublicidad['seccionb']);

        $sslider = "SELECT *from sliders";
        $rslider = mysql_query($sslider);

        $scarritoc = "SELECT a.*,b.foto_uno ,b.nombre,b.points_val FROM carrito as a
        LEFT JOIN productos as b ON (a.producto = b.id)
        where carro='".$_SESSION["idcarrito"]."'";
        $rcarritoc = mysql_query($scarritoc);

        $spointsGroup = "SELECT *FROM points_group WHERE estado='1'";
        $rpointsGroup = mysql_query($spointsGroup);
        $fpointsGroup = mysql_fetch_array($rpointsGroup);        

        $idUser = $_SESSION['idusuario'];
        $sPointsUser = "SELECT *FROM natuser WHERE estado='1' and id='$idUser' ORDER BY id desc LIMIT 4";
        $rPointsUser = mysql_query($sPointsUser);
        $pointsUser = mysql_fetch_array($rPointsUser);
        //Listado de recompensas
        $getRecompensas = "SELECT * FROM puntos_descuentos WHERE estado='1' order by puntos asc";
        $rRecompensas = mysql_query($getRecompensas); 
          
    }

$descuento = 0;
$scupon = "select b.* from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);


$scupon22 = "select a.* from carrito_puntos as a
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon22 = mysql_query($scupon22);
$fcupon22 = mysql_fetch_array($rcupon22);




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


        if($fcupon22['id'] > 0)
        {
            $descuento = $fcupon22['valor'];
            $_SESSION['puntoscanjeados'] = $fcupon22['puntos'];

        }else
        {
            $descuento = $fcupon22['valor'];
        }

/*
    if($_SESSION['puntoscanjeados'] > 0 &&  $cantidad<2)
    {
        echo "<script>
        swal({ 
            title: 'Alto!',
            text: 'Debes agregar al menos un producto de pago para canjear tus puntos',
            type: 'error' 
            },
            function(){
            history.back();
            });
        </script>";
    }
*/
        

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
                        <?php while($fcarroc = mysql_fetch_array($rcarritoc)){ //recorremos cada producto en el carrito
                                $realPrice = $fcarroc['producto']; //tomamos id del producto
                                $sPrecioReal = "SELECT *FROM productos WHERE estado='1' and id='$realPrice' ORDER BY id desc LIMIT 4";
                                $rPrecioReal = mysql_query($sPrecioReal);
                                $PrecioReal = mysql_fetch_array($rPrecioReal); //tomamos el precio original del producto
                             ?>
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


                                <div class="cart-table-prd-price">
                                     
                                    
                                    <?php if( (number_format($fcarroc['precio'],2)) != "0.00"){ ?>
                                        <span>precio:</span> <b>$ <?php echo number_format($fcarroc['precio'],2) ?></b>
                                    <?php


                                     } else{  ?>
                                        <span class="valor-tachado">precio: $<?php echo $PrecioReal['precio']; $_SESSION['puntoscanjeados']=$puntoscanjeados=$puntoscanjeados+$fcarroc['points_val']; ?></span><br>
                                        <span class="free">CANJEADO POR PUNTOS</span>
                                    <?php } ?>
                                </div>
                                <?php  if($_SESSION['puntoscanjeados'] > 0 &&  $cantidad>2)
                                { ?>
                                <div class="cart-table-prd-action"><a href="#" class="icon-cross" onclick="eliminaritem(<?php echo $fcarroc['id']; ?>)"></a></div>
                                <?php }else{ ?>
                                    <?php  if($_SESSION['puntoscanjeados'] > 0 &&  $cantidad<=2)
                                { ?>
                                <?php }else{ ?>
                                 <div class="cart-table-prd-action"><a href="#" class="icon-cross" onclick="eliminaritem(<?php echo $fcarroc['id']; ?>)"></a></div>
                                <?php } ?>

                                <?php } ?>
                            </div>
                        <?php } ?>
                           
                            <div class="cart-table-total">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="#" onclick="eliminarcarrito()" class="btn btn--alt"><i class="icon-cross"></i><span>Vaciar cesta</span></a> 
                                        <a href="#" onclick="javascript:location.reload();" class="btn btn--grey"><i class="icon-repeat"></i><span>Actualizar cesta</span></a>
                                    </div>
                                    <div class="col-sm-auto"><a href="../index.php" class="btn btn--alt"><i class="icon-angle-left"></i><span>Continuar comprando</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" name="validacioncantidad" id="validacioncantidad" value="<?php echo $cantidad  ?>">
                        <input type="hidden" name="validacionpuntoscanjeados" id="validacionpuntoscanjeados" value="<?php echo $puntoscanjeados  ?>">
                        <?php 
                        if($_SESSION['idusuario']>0 && $_SESSION['idusuario']<500000){ //validamos la sesion
                            if ( $pointsUser['status_beneficio'] != "2" ){  ?>
                        <div class="card card--grey">
                            <div class="card-body">
                                <h3>TIENE DISPONIBLE <?php echo $pointsUser['points'] ?> PUNTOS</h3>
                                 <?php if(!($_SESSION['puntoscanjeados'] > 0) && !($fcupon22['id'] > 0) ){ ?>
                                <div class="form-flex">
                                    <div class="form-group select-wrapper">
                                        <input type="hidden" id="carroId" value="<?php echo $_SESSION["idcarrito"]; ?>">
                                        <select class="form-control" id="restaPuntos">
                                        <option value="0">SELECCIONE..</option>
                                <?php  
                                
                                while($laRecompensa = (mysql_fetch_array($rRecompensas))){ 
                                    if(!($_SESSION['puntoscanjeados'] > 0) ){
                                        if( ($pointsUser['points']) < ($laRecompensa['puntos']) ){
                                        } else{
                                    ?>
                                        <option value="<?php echo $laRecompensa['dolares'] ?>::<?php echo $laRecompensa['puntos'] ?>::<?php echo $laRecompensa['minimo'] ?>" id="<?php echo $laRecompensa['id'] ?>">$<?php echo $laRecompensa['dolares'] ?> DE DESCUENTO (<?php echo $laRecompensa['puntos'] ?> PUNTOS)</option>
                                <?php
                                       } // fin validador de puntos necesarios para el canje
                                    }
                                    else { 

                                     } // fin validador de subtotal minimo
                                } //fin while
                                ?>  
                                        </select>
                                    </div>
                                <a href="#" id="aplicarRecompensa">
                                    <button type="button" data-fancybox data-src="#modalRecompensa" class="btn btn--form btn--alt">Aplicar</button>
                                </a> 
                                </div>

                                   <?php }else
                                   { ?>
                                    <input type="hidden" name="restaPuntos" id="restaPuntos" value="0">
                                  <?php } ?>
                                <a href="#" data-fancybox data-src="#modalError" class="d-none" >Modal error 1</a>
                            </div>
                        </div>
                        <div class="divisor"></div>
                        <?php }else { ?>

                            <input type="hidden" name="restaPuntos" id="restaPuntos" value="0">
                   <?php }
                        }else{ ?>
  <input type="hidden" name="restaPuntos" id="restaPuntos" value="0">
                      <?php  }  //fin de la sesion ?>
                        <table class="table table-hover">
                          <tbody>
                            <tr><th scope="row">Subtotal sin iva</th>
                              <td class="derecha" id="subtotalCart" data-valor="<?php echo number_format($subtotal,2); ?>">$<?php echo number_format($subtotal,2); ?></td>
                            </tr>

                            <tr><th scope="row">Descuento (-)</th>
                              <td class="derecha">$<?php echo number_format($descuento,2);  ?></td>
                            </tr>
                              <tr>
                                  <th scope="row">Puntos Canjeados (-)</th>
                                  <td class="derecha"><?php
                                    if($fcupon22['id'] > 0)
                                    {
                                       $puntoscanjeados= $_SESSION['puntoscanjeados'];

                                    }

                                   echo number_format($puntoscanjeados,0) ?></td>
                                </tr>
                            
                            <tr><th scope="row">Envío</th>
                              <td class="derecha">Calculado en el siguiente paso</td>
                            </tr>
                            <!-- <tr>
                              <th scope="row">Iva 12% (+)</th>
                              <td class="derecha">$10.00</td>
                            </tr> -->
                          </tbody>
                        </table>
                        <div class="card-total-sm">
                            <div class="float-right">SUBTOTAL <span class="card-total-price">$<?php echo number_format(($subtotal-$descuento),2); ?></span></div>
                        </div>
                        <div class="divisor"></div>
                        <a>
                            <button class="btn btn--full btn--lg" onclick="continuarcompra()">finalizar compra  <i class="icon-angle-right"></i> </button>
                        </a>        
                    </div>
                </div>
            </div>
        </div>
      
        
    </div>
    
    
    
   <?php include('footer.php'); ?>
   
   
      <!-- ventana modal de Puntos -->
    <div id="modalRecompensa" class="modal--checkout" style="display: none;">
        <div class="modal-header">
            <div class="modal-header-title"><i class="icon icon-check-box"></i><span>Canje por recompensas</span></div>
        </div>
        <div class="modal-content text-center">
            <div class="modal-body text-center">
                <div class="modalchk-prd">
                    <div class="row h-font">
                        
                       
                        <div class="modalchk-prd-actions col text-center">
                            <h3 class="modalchk-title">Al aplicar sus puntos por descuento estos serán debitados automáticamente.   <br>
                            ¿Desea proceder a aplicarlos? </h3> 
                            <p id="info">
                                
                            </p>
                            <div class="modalchk-btns-wrap modalchk-btns-wrap2 text-center">
                                <a href="#" id="aplicarPuntos" class="btn">Si, Deseo Aplicar </a> 
                                <a href="#" class="btn btn--alt" data-fancybox-close>Aún no</a></div>
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
        var resPuntos22 = $('#restaPuntos').val();
        var resPuntos2 = resPuntos22.split("::");
        resPuntos = resPuntos2[1];

        $("#aplicarRecompensa").on("click" , function() {
            var resPuntos22 = $('#restaPuntos').val();
            var resPuntos2 = resPuntos22.split("::");
            resPuntos = resPuntos2[1];
             $('#aplicarPuntos').attr("data-resPoints", resPuntos);
            console.log(resPuntos);
        });

        $("#aplicarPuntos").on("click" , function() {

            var validacioncantidad = document.getElementById("validacioncantidad").value;
           
            if(validacioncantidad > 0){
            
            subTotal = $('#subtotalCart').data('valor');
            var id = document.getElementById('carroId').value;
            var resPuntos22 = $('#restaPuntos').val();
            var resPuntos2 = resPuntos22.split("::");
            resPuntos = resPuntos2[0];
            newSubTotal = parseInt(subTotal) - parseInt(resPuntos) ;
            console.log(resPuntos); console.log(subTotal); console.log(parseFloat(newSubTotal));
           // alert(subTotal);
            //alert(resPuntos2[2]);
            if(parseInt(subTotal)>=parseInt(resPuntos2[2])){
            var datosRecompensa = new FormData();
            datosRecompensa.append('puntos', resPuntos22);
            datosRecompensa.append('newsubtotal', parseFloat(newSubTotal));
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/descuento_recompensa_crud2.php",
            contentType: false,
                data: datosRecompensa, // Al atributo data se le asigna el objeto FormData.
                processData: false,
                cache: false, 
                 }).done(function( msg ) {
                    console.log(msg);
                    location.reload();
                    // $('#ciu').html(msg);

                });  
             }else
             {
                  swal("Alto!","La compra minima para el canje es $"+resPuntos2[2] , "error");
                
                 return false;
             }
       
             }else{
                swal("Alto!","Debes tener al menos un producto de pago para canjear tus puntos" , "error");
                
                 return false;
             }
        });

        function eliminarcarrito() {
            var paqueteDeDatos = new FormData();
            $.ajax({
                type: "POST",
                url: "../administrador/procesos/deletecar.php",
                contentType: false,
                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                processData: false,
                cache: false, 
            })
            .done(function( msg ) {
                location.reload(); //recarga despues de borrar un item
            }); 
        }

        function buscarciudad(id){
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

    function continuarcompra()
    {
         subTotal = $('#subtotalCart').data('valor');
         var resPuntos22 = $('#restaPuntos').val();
            var resPuntos2 = resPuntos22.split("::");
            resPuntos = resPuntos2[0];
            newSubTotal = parseInt(subTotal) - parseInt(resPuntos) ;
            console.log(resPuntos); console.log(subTotal); console.log(parseFloat(newSubTotal));
            if(!resPuntos2[2]>0)
            {
             resPuntos2[2]=0;   
            }
            

            if(subTotal>=resPuntos2[2])
            {
                
                window.location.href ="checkout.php";
            }else
            {
                 swal("Alto!","Para aplicar el canje de puntos debes cumplir con la compra minima para el canje es $"+resPuntos2[2] , "error");
            }

    }
    </script>
    
       <!--Start of Tawk.to Script
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
</script>-->
<!--End of Tawk.to Script--> 
    
</body>

</html>