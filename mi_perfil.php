<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    
      include('config/app_config.php');
      $sadmin = "SELECT *FROM usuario_admin";
      $radmin = mysql_query($sadmin);
      $fadmin = mysql_fetch_array($radmin);
     
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.png">
    <title>Mi perfíl</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!--upload foto -->
    <link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">
   
</head>

<body class="fix-sidebar fix-header">
    
    <div id="wrapper">
        
    <?php include('menu.php'); ?>    
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                
                <!-- breadcup-->
                <div class="row bg-title" style="background: url(imagenes/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title" style="color: #FFF;">Mi perfíl</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
               </div>
            <!-- breadcup-->
            
            <div class="row">
                    <div class="col-lg-12 col-md-12">
                    <h2>Edita desde aquí tus datos de acceso y correo para recuperar contraseña</h2>
                    </div>
            </div>
            
                <!-- row -->
                <div class="row">
                    
                    <div class="col-lg-8 col-md-12">
                        <div class="white-box">
                            <!-- .tabs -->
                            <ul class="nav customtab nav-tabs" role="tablist">
                                
                                
                                <li role="presentation" class="nav-item"><a href="#banco" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Cambiar email</span></a></li>
                                
                                <li role="presentation" class="nav-item"><a href="#contrasena" class="nav-link" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-lock"></i></span> <span class="hidden-xs">Cambiar Contraseña</span></a></li>
                            </ul>
                            <!-- /.tabs -->
                            <div class="tab-content">
                               
                                
                                
                                <!-- .tabs 1 -->
                                <div class="tab-pane active" id="banco">
                                    
                                    
                                    <h3>Cambiar correo de contacto</h3>
                                    
                                    <form class="form-horizontal form-material">
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Correo Actual</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="correo" name="correo" required="" value="<?php echo $fadmin['email'] ?>" disabled="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Contraseña </label>
                                            <div class="col-md-7">
                                                <input type="password" id="clave" value="password" class="form-control form-control-line" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Nuevo correo</label>
                                            <div class="col-md-7">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="nuevo Email">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Repetir nuevo correo</label>
                                            <div class="col-md-7">
                                                <input type="email" id="emailcon" name="emailcon" class="form-control" placeholder="nuevo Email">
                                            </div>
                                        </div>
                                       
                                        <div class="form-actions m-t-40">
                                      <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_email()"> <i class="fa fa-check"></i>ACTUALIZAR</button>
                                    </div>
                                    </form>
                                    
                                </div>
                                <!-- /.tabs3 -->
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <!-- .tabs 2 -->
                                <div class="tab-pane" id="contrasena">
                                    <h3>Cambiar contraseña de acceso</h3>
                                    
                                    <form class="form-horizontal form-material">
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Contraseña Actual</label>
                                            <div class="col-md-7">
                                                <input type="password" value="password" id="passa" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Contraseña Nueva</label>
                                            <div class="col-md-7">
                                                <input type="password" value="password" id="passn" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-8">Repetir Contraseña Nueva</label>
                                            <div class="col-md-7">
                                                <input type="password" value="password" id="passr" class="form-control form-control-line">
                                            </div>
                                        </div>
                                       
                                        <div class="form-actions m-t-40">
                                      <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_contra()"> <i class="fa fa-check"></i>ACTUALIZAR</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tabs4-->
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
               
              
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
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
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- jQuery file upload -->
    <script src="../plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });

    function guardar_email()
            {
              var clave = document.getElementById('clave').value;
              var email = document.getElementById('email').value;
              var emailcon = document.getElementById('emailcon').value;
              
              var paqueteDeDatos = new FormData();
              if(clave != ''){
                  if(email == emailcon){
                    
                        paqueteDeDatos.append('clave', clave);
                        paqueteDeDatos.append('email', email);
                        
                    
                    $.ajax({
                    type: "POST",
                    url: "procesos/updatedatos.php",
                    contentType: false,
                                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                processData: false,
                                cache: false, 
                                 }).done(function( msg ) {
                                    if(msg.trim() == "00::00")
                          {
                            swal("Alto!","La contraseña actaul no es correcta" , "error");
                             $('#completar').attr('onClick', 'guardar_email();');
                          }else
                          {
                           swal({ 
                                        title: "Correcto!",
                                        text: "",
                                        type: "success" 
                                        },
                                        function(){
                                         window.location.href='mi_perfil.php'
                                        });
                            }
                 
                        }); 

              }else{
            swal("Alto!","Los email no coinciden" , "error");
            $('#completar').attr('onClick', 'guardar_email();');
            
           }
            }else{
            swal("Alto!","Ingrese la contraseña actual" , "error");
            $('#completar').attr('onClick', 'guardar_email();');
            
           }
            }





function guardar_contra()
            {
              var passa = document.getElementById('passa').value;
              var passn = document.getElementById('passn').value;
              var passr = document.getElementById('passr').value;
              
              var paqueteDeDatos = new FormData();
              if(passa != ''){
                  if(passn == passr){
                    
                        paqueteDeDatos.append('clave', passa);
                        paqueteDeDatos.append('passn', passn);
                        
                    
                    $.ajax({
                    type: "POST",
                    url: "procesos/updatepass.php",
                    contentType: false,
                                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                processData: false,
                                cache: false, 
                                 }).done(function( msg ) {
                                    if(msg.trim() == "00::00")
                          {
                            swal("Alto!","La contraseña actaul no es correcta" , "error");
                             $('#completar').attr('onClick', 'guardar_contra();');
                          }else
                          {
                           swal({ 
                                        title: "Correcto!",
                                        text: "",
                                        type: "success" 
                                        },
                                        function(){
                                         window.location.href='mi_perfil.php'
                                        });
                            }
                 
                        }); 

              }else{
            swal("Alto!","Los contraseñas no coinciden" , "error");
            $('#completar').attr('onClick', 'guardar_contra();');
            
           }
            }else{
            swal("Alto!","Ingrese la contraseña actual" , "error");
            $('#completar').attr('onClick', 'guardar_contra();');
            
           }
            }


    </script>
</body>

</html>
