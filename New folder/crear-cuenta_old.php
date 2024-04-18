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
    
   
    <title>Crear cuenta en Natural Care ec - Ecuador </title>
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
     <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
  
<style>
.steps-progress .nav-tabs:not(.tab-category) > li {
    max-width: 33%;
}  
    
    .form-wrapper > * .form-group {
    margin: 1px 0 0;
}
    
    .form-group {
    margin-bottom: 1rem;
}
    
</style>

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
                    <li><span>Crear cuenta</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-11 col-md-11">
                        <h2 class="text-center">CREA TU CUENTA </h2>
                        <div class="form-wrapper">
                            <p>Te tomará solo un minuto, y tendrás multiples ventajas</p>
                            
                            
                            
                    <div class="row">
                        <div class="col-md-9">
                            <div class="steps-progress">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#step1" data-step="1"><span>01.</span><span>Info Personal</span></a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#step2" data-step="2"><span>02.</span><span>Datos de envío</span></a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#step3" data-step="3"><span>03.</span><span>Info de Acceso</span></a></li>
                                    
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 25%;"></div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="step1">
                                    <div class="tab-pane-inside">
                                       
                                        <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">Nombres:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloLetras(event)" id="nombres" maxlength="20" class="form-control"></div>
                                            </div>
                                            <div class="col-sm-6"><label class="text-uppercase">Apellidos:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloLetras(event)"  id="apellidos" maxlength="20" class="form-control"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-2">
                                            <div class="col-sm-4"><label class="text-uppercase">Número celular:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloNumeros(event)" id="celular" maxlength="12" class="form-control"></div>
                                            </div>
                                            <div class="col-sm-4"><label class="text-uppercase">Número fijo:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloNumeros(event)"  id="telefono" maxlength="14" class="form-control"></div>
                                            </div>
                                            
                                            <div class="col-sm-4"><label class="text-uppercase">CI/RUC:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloNumeros(event)" id="ruc" maxlength="14" class="form-control"></div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                           <div class="row mt-2">
                                            
                                               <div class="row"><h3>Datos de facturación</h3></div>
                                               <div class="col-sm-4"><label class="text-uppercase">RAZON SOCIAL:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloLetras(event)" id="razon" maxlength="100" class="form-control"></div>
                                            </div>
                                            <div class="col-sm-4"><label class="text-uppercase">DIRECCION FACT:</label>
                                                <div class="form-group"><input type="text"  id="direccionf" maxlength="100" class="form-control"></div>
                                            </div>
                                            <div class="col-sm-4"><label class="text-uppercase">TELEFONO FACT:</label>
                                                <div class="form-group"><input type="text" onKeyPress="return soloNumeros(event)" id="telefonof" maxlength="100" class="form-control"></div>
                                            </div>
                                        </div>


                                        <div class="mt-2"></div>
                                      
                                       
                                        <div class="text-right"><button type="button" class="btn btn-sm step-next">Continuar</button></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="step2">
                                    <div class="tab-pane-inside">
                                   
                                         <div class="row">
                                            <div class="col-sm-6"><label class="text-uppercase">Provincia:</label>
                                                <div class="form-group select-wrapper"><select class="form-control" id="provincia" onchange="buscarciudad(this.value)">
                                                        <option value="<?php echo $fusuario['provincia'] ?>"><?php echo $fusuario['provincia'] ?></option>
                                                       <?php $sprov = "SELECT *FROM provincias";
                                                        $rpro = mysql_query($sprov);
                                                        while($fpro = mysql_fetch_array($rpro)){
                                                        ?>
                                                        <option value="<?php echo $fpro['provincia'] ?>"><?php echo $fpro['provincia'] ?></option>
                                                       <?php } ?>
                                                        
                                                    </select></div>
                                            </div>
                                            <div class="col-sm-6" id="ciu">
                                                <label class="text-uppercase">Ciudad:</label>
                                                <div class="form-group select-wrapper"><select id="ciudad" class="form-control">
                                                        <option value="<?php echo $fusuario['ciudad'] ?>"><?php echo $fusuario['ciudad'] ?></option>
                                                        
                                                    </select></div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">Dirección exacta:</label>
                                                <div class="form-group">
                                                <textarea class="form-control textarea--height-100" id="direccion" name="message" data-required-error="indica bien tu dirección" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6"><label class="text-uppercase">Referencias:</label>
                                                <div class="form-group">
                                                <textarea class="form-control textarea--height-100" id="referencia" name="message" data-required-error="que queda cerca de tu dirección" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mt-2"></div>
                                        <div class="text-right"><button type="button" class="btn btn-sm step-next">Continuar</button></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="step3">
                                    <div class="tab-pane-inside">
                                        
                                         <div class="row mt-2">
                                            <div class="col-sm-4"><label class="text-uppercase">Usuario:</label>
                                                <div class="form-group"><input type="text" id="email" class="form-control" placeholder="Ingresa tu email"></div>
                                            </div>
                                            
                                            <div class="col-sm-4"><label class="text-uppercase">indica una contraseña</label>
                                                <div class="form-group">
                                                <input type="password" class="form-control" id="contrasena" placeholder="usa una fácil de recordar">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4"><label class="text-uppercase">Repetir contraseña:</label>
                                                <div class="form-group">
                                                <input type="password" class="form-control" id="repcontrasena" placeholder="usa una fácil de recordar">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                      
                                         <br>
                                        <div class="clearfix"><input id="terminos" name="terminos" type="checkbox" >
                                       
                                         <label for="terminos">Acepta usted los <a href="terminos-y-condiciones.php" target="_blank">términos y condiciones</a> junto con las <a href="politicas.php" target="_blank"> políticas de envío</a>    de este sitio web</label></div>
                                        
                                        <div class="mt-2"></div>
                                        <div class="clearfix mt-1 mt-md-2">
                                         <a  onclick="crear_cuenta();" class="btn btn--lg w-100"> Crear cuenta</a>    
                                         
                                         
                                      
                                               
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                                
                                
                             </div>
                               
                        </div>
                        
                        
                        
                        
                    </div>
               
            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        
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
   

    function buscarciudad(id)
    {
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('pais', id);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/buscarcity.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            $('#ciu').html(msg);
                        });
    }
    function crear_cuenta()
    {   
         var nombres = document.getElementById("nombres").value;
         var apellidos = document.getElementById("apellidos").value;
         var telefono = document.getElementById("telefono").value;
         var celular = document.getElementById("celular").value;
         var ruc = document.getElementById("ruc").value;
         var razon = document.getElementById("razon").value;
         var direccionf = document.getElementById("direccionf").value;
         var telefonof = document.getElementById("telefonof").value;
         var provincia = document.getElementById("provincia").value;
         var ciudad = document.getElementById("ciudad").value;
         var direccion = document.getElementById("direccion").value;
         var referencia = document.getElementById("referencia").value;
         var email = document.getElementById("email").value;
         var contrasena = document.getElementById("contrasena").value;
         var repcontrasena = document.getElementById("repcontrasena").value;
          var emailvali = validarEmail(email);
         
         if(nombres)
         {
            if(apellidos)
            {
                if(celular)
                {
                    if(celular)
                    {
                        if(ruc)
                        {
                            if(razon)
                            {
                                if(direccionf)
                                {
                                    if(provincia)
                                    {
                                        if(ciudad)
                                        {
                                            if(direccion)
                                            {
                                                if(emailvali == true)
                                                {
                                                    if(contrasena==repcontrasena)
                                                    {
                                                        if(contrasena)
                                                        {
                                                             if(referencia)
                                                        {
                                                            if( $('#terminos').prop('checked') ) {
                                                            $('.modal').modal('show');
                                                            var paqueteDeDatos = new FormData();
                                                                paqueteDeDatos.append('nombres', nombres);
                                                                paqueteDeDatos.append('apellidos', apellidos);
                                                                paqueteDeDatos.append('telefono', telefono);
                                                                paqueteDeDatos.append('celular', celular);
                                                                paqueteDeDatos.append('ruc', ruc);
                                                                paqueteDeDatos.append('razon', razon);
                                                                paqueteDeDatos.append('direccionf', direccionf);
                                                                paqueteDeDatos.append('provincia', provincia);
                                                                paqueteDeDatos.append('ciudad', ciudad);
                                                                paqueteDeDatos.append('direccion', direccion);
                                                                paqueteDeDatos.append('email', email);
                                                                paqueteDeDatos.append('contrasena', contrasena);
                                                                paqueteDeDatos.append('referencia', referencia);
                                                               
                                                                $.ajax({
                                                                type: "POST",
                                                                url: "../administrador/procesos/saveuser.php",
                                                                contentType: false,
                                                                            data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                                                            processData: false,
                                                                            cache: false, 
                                                                             }).done(function( msg ) {

                                                                             if(msg.trim() == "00::00")
                                                                              {
                                                                                swal("Alto!","Ya existe el email registrado" , "error");
                                                                                 $('#completar').attr('onClick', 'crear_cuenta();');
                                                                              }else
                                                                              {
                                                                                  swal({ 
                                                                                title: "Correcto!",
                                                                                text: "Cuenta Creada",
                                                                                type: "success" 
                                                                                },
                                                                                function(){
                                                                              location.href='detalle-cuenta.php';
                                                                                });
                                                                              }

                                                                            });
                                                                        }else
                                                        {
                                                             swal("Alto!","Acepte los términos y condiciones" , "error");
                                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                                        }
                                                          }else
                                                        {
                                                             swal("Alto!","Ingrese una Referencia" , "error");
                                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                                        }
                                                        }else
                                                        {
                                                             swal("Alto!","Ingrese Contraseñas" , "error");
                                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                                        }
                                                    }else
                                                    {
                                                        swal("Alto!","Las Contraseñas no coinciden" , "error");
                                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                                    }
                                                }else
                                                {
                                                     swal("Alto!","Ingrese email válido" , "error");
                                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                                }
                                            }else
                                            {
                                                swal("Alto!","Ingrese dirección exacta" , "error");
                                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                            }
                                        }else
                                        {
                                            swal("Alto!","Seleccione ciudad" , "error");
                                                $('#completar').attr('onClick', 'crear_cuenta();');
                                        }
                                    }else
                                    {
                                        swal("Alto!","Seleccione Provincia" , "error");
                                        $('#completar').attr('onClick', 'crear_cuenta();');
                                    }
                                }else
                                {
                                     swal("Alto!","Ingrese dirección de facturación" , "error");
                                    $('#completar').attr('onClick', 'crear_cuenta();');
                                }
                            }else
                            {
                                 swal("Alto!","Ingrese Razón social" , "error");
                                $('#completar').attr('onClick', 'crear_cuenta();');
                            }
                        }else
                        {
                             swal("Alto!","Ingrese RUC/Cédula" , "error");
                            $('#completar').attr('onClick', 'crear_cuenta();');
                        }
                    }else
                    {
                         swal("Alto!","Ingrese Celular" , "error");
                        $('#completar').attr('onClick', 'crear_cuenta();');
                    }
                }else
                {
                    swal("Alto!","Ingrese número celular" , "error");
                        $('#completar').attr('onClick', 'crear_cuenta();');
                }
            }else
            {
                 swal("Alto!","Ingrese apellidos" , "error");
                    $('#completar').attr('onClick', 'crear_cuenta();');
            }
         }else
         {
             swal("Alto!","Ingrese nombres" , "error");
                $('#completar').attr('onClick', 'crear_cuenta();');
         }
            
      
    }

    function validarEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
</script>




</html>