<?php
session_start();
include('../administrador/config/app_config.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="productos para el cuidado personal, cuidado capilar elaborados a base de estractos de origen natural">
    <meta name="author" content="cremas, jabones artesanales, shampoo gardenia, gel reductor, tratamiento capilar, tratamiento corporal, exfoliantes, jabón de aloe vera, jabón de romero">
    <title>Ingresa o regístrate en Natural Care ec - Ecuador </title>
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
                    <div class="col-sm-6 col-md-4">
                        <div id="loginForm">
                            <h2 class="text-center">Cambiar accesos</h2>
                            <div class="form-wrapper">
                                <p>Por favor ingresa una nueva contraseña </p>
                                <form action="#">
                                    <div class="form-group"><input type="password" id="clave" class="form-control" placeholder="Ingresa nueva Contraseña"></div>
                                    <div class="form-group"><input type="password" id="clavedos" class="form-control" placeholder="Repite Contraseña"></div>
                                    
                                    <div class="clearfix"></div> <a onclick="claves();"><button type="button" class="btn">Guardar</button></a>
                                </form>
                            </div>
                        </div>
                      
                    <div class="col-divider"></div>
                  
                    
                 
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        
    </div>
</div>  
   
    
<?php include('footer.php'); ?>
    
    <input type="hidden" id="id" value="<?php echo $_GET['xdf']; ?>">
    <input type="hidden" id="pass" value="<?php echo $_GET['hdgdhd']; ?>">
    
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

    function claves()
    {
        
        var clave = document.getElementById("clave").value;
        var nueva = document.getElementById("clavedos").value;
        var id = document.getElementById("id").value;
        var pass = document.getElementById("pass").value;
        if(nueva == clave)
        {

                    if(clave)
                    {
                        $('.modal').modal('show');
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('clave', clave);
                        paqueteDeDatos.append('id', id);
                        paqueteDeDatos.append('pass', pass);
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/reset.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {

                                        if(msg == 1)
                                        {
                                            $('.modal').modal('hide');
                                            swal({ 
                                                        title: "Correcto!",
                                                        text: "Contraseña actualizada",
                                                        type: "success" 
                                                        },
                                                        function(){
                                                        window.location.href='../index.php';
                                                        });

                                        }
                                    });
                   }else
                   {
                     swal("Alto!","Ingresa una contraseña" , "error");
                     $('#completar').attr('onClick', 'claves();');
                     $('.modal').modal('hide');
                    }
               }else
               {
                 swal("Alto!","Las contraseñas no coinciden" , "error");
                 $('#completar').attr('onClick', 'claves();');
                  $('.modal').modal('hide');
               }
           
         
               
    }


    function olvido()
    {
        var emailolvido = document.getElementById("emailolvido").value;
        if(emailolvido)
         {
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