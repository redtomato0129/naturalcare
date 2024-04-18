<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.png">
    <title>Ingresar - Administrador</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                
                <div class="user-profile">
                    <div><img src="imagenes/logo-naturalcare3.png" alt="logo" ></div>
                   
                </div>
                
                
                <form class="form-horizontal form-material" id="loginform">
                    <h3 class="box-title m-b-20">Ingresar al Administrador</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" id="email" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" id="contrasena" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Olvidó su contraseña?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="button" id="completar" onclick="login()">Ingresar</button>
                        </div>
                    </div>
                    
                    
                </form>
                <form class="form-horizontal" id="recoverform" action="index.php">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Reestablecer Contraseña</h3>
                          
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="button" id="completar2" onclick="recuperar()">Resetear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--alerts CSS -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
     <!-- Sweet-Alert  -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
     <script>
    
      function login()
      {
          $('#completar').attr('onclick','');
       
          var email = document.getElementById("email").value;
          var contrasena = document.getElementById("contrasena").value;
                if(email)
                {

                    if(contrasena)
                    {

                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('email', email);
                        paqueteDeDatos.append('contrasena', contrasena);
                        $.ajax({
                        type: "POST",
                        url: "procesos/logueo.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {

                                        if(msg == 1)
                                        {
                                            location.href='index.php';
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

     function recuperar(){
          $('#completar2').attr('onclick','');
       
            
            var paqueteDeDatos = new FormData();
                                       

            //alert(editor);
            $.ajax({
            type: "POST",
            url: "procesos/recuperar.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                          //  alert(msg);

                            
                               swal({ 
                    title: "Correcto!",
                    text: "Enviamos el link a tu correo registrado",
                    type: "success" 
                    },
                    function(){
                    location.reload();
                    });

     
            
            });

        

           

}
        

</script>
</body>

</html>
