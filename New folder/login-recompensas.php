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
   
    <title>Plan de Recompensas Naturalcare ec - Ecuador </title>
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
                    <li><span>Ingresar</span></li>
                </ul>
            </div>
        </div>
           
           <div class="holder mt-0">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-sm-12 col-md-4 ">
                        <div id="loginForm">
                            <h2 class="text-center">Ingresar</h2>
                            <div class="form-wrapper">
                                <p>Si tienes una cuenta con nosotros, inicia sesión</p>
                                <form action="#">
                                    <div class="form-group"><input type="text" id="email" class="form-control" placeholder="Ingresa tu email"></div>
                                    <div class="form-group"><input type="password" id="clave" class="form-control" placeholder="Contraseña"></div>
                                    <p class=""><a href="#" class="js-toggle-forms">¿Olvidaste tu contraseña?</a></p>
                                    <div class="clearfix"></div> <a onclick="loginuser();"><button type="button" class="btn">Ingresar</button></a>
                                </form>
                            </div>
                        </div>
                        <div id="recoverPasswordForm" class="d-none">
                            <h2 class="text-center">RESETEAR TU CONTRASEÑA</h2>
                            <div class="form-wrapper">
                                <p>Te enviaremos un correo electrónico para restablecer la contraseña.</p>
                                <form action="#">
                                    <div class="form-group"><input type="text" id="emailolvido" class="form-control" placeholder="correo electrónico"></div>
                                    <div class="btn-toolbar"><a href="#"  class="btn btn--alt js-toggle-forms">Cancelar</a> <button class="btn ml-1" onclick="olvido();">Reestablecer</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-wrapper">
                           <a href="crear-cuenta.php" class="btn">REGISTRARME</a>
                            <p>Al crear una cuenta en nuestra tienda, podrás pasar por el proceso de pago más rápido, rastrear tus pedidos y más.</p>
                        </div>
                    </div>
                    
                     <div class="col-divider"></div>
                    
                    <div class="col-sm-6 col-md-4 mt-3 mt-sm-0">
                        <strong class="text-center">Tus compras en Natural Care Ec te pueden dar grandes beneficios, este es tu pase de acceso a recompensas exclusivas</strong>
                        <div class="form-wrapper">
                           <h3 class="h-lined">Natu Puntos</h3>
                           <p>Gana más puntos para diferentes acciones y convierte esos puntos en increíbles recompensas.</p><br>
                           <div class="clearfix"></div>
                           <h3 class="h-lined">Formas de Ganar</h3>
                           <ul class="list list--marker-squared">
                                    <li>Registrarse</li>
                                    <li>Hacer un pedido</li>
                                    <li>Celebrar tu cumpleaños</li>
                                </ul><br>
                            <h3 class="h-lined">Formas de Canjear</h3>
                            <ul class="list list--marker-squared">
                                    <li>Descuento en el pedido</li>
                                    <li>Productos Gratis</li>
                                    <li>Celebrar tu cumpleaños</li>
                                </ul><br>
                           <div class="clearfix"></div>
                        </div>
                        <br><br>
                        
                        
                        
                    </div>
                    
                    
                    
                 
                    
                </div>
            </div>
        </div>
    </div>
    
    
   
    
<?php include('footer.php'); ?>
    
    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        
    </div>
</div>  
    
    
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
</body>
<script type="text/javascript">
	function invitado()
	{
		 var paqueteDeDatos = new FormData();
                          
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/invitado.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                         	location.href='checkout.php';
                        });
	}

    function loginuser()
    {
        var usuario = document.getElementById("email").value;
        var clave = document.getElementById("clave").value;
        if(usuario)
                {

                    if(clave)
                    {
                        $('.modal').modal('show');
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('email', usuario);
                        paqueteDeDatos.append('contrasena', clave);
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/loginuser.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {

                                        if(msg == 1)
                                        {
                                            location.href='detalle-cuenta.php';
                                        }else
                                        {
                                             swal({ 
                                                        title: "Alto!",
                                                        text: "Usuario o contraseña incorrectos",
                                                        type: "error" 
                                                        },
                                                        function(){
                                                        location.reload();
                                                        });
                                        }
                                    });
                   }else
                   {
                     swal("Alto!","Ingresa una contraseña" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
               }else
               {
                 swal("Alto!","Ingresa un email" , "error");
                 $('#completar').attr('onClick', 'login();');
               }
           
         
               
    }


    function olvido()
    {
      //  alert("entro")
        
        var emailolvido = document.getElementById("emailolvido").value;
        if(emailolvido)
         {$('.modal').modal('show');
                  var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('email', emailolvido);
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/olvido.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {
                                        $('.modal').modal('hide');
                                        if(msg == 1)
                                        {
                                            swal({ 
                                                        title: "Alto!",
                                                        text: "Email Enviado",
                                                        type: "success" 
                                                        },
                                                        function(){
                                                         location.href='login.php';
                                                        });
                                           
                                        }else
                                        {
                                             swal({ 
                                                        title: "Alto!",
                                                        text: "Usuario incorrectos",
                                                        type: "error" 
                                                        },
                                                        function(){
                                                        //location.reload();
                                                        });
                                        }
                                    });
                   }else
                   {
                     swal("Alto!","Ingresa un email" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
              
              
    }

</script>

</html>