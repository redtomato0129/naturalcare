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
   
    <title>Se un distribuidor de productos Natural Care ec - Ecuador </title>
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
            
        </div>
        <div class="holder mt-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-11 col-md-11">
                        <h2 class="text-center pt-sm-1">SE UN DISTRIBUIDOR</h2>
                        <div class="form-wrapper">
                            <p class="text-center pb-sm-1"><strong>Quieres llevar nuestros productos de bienestar en su tienda?</strong><br>
Completa nuestro formulario de solicitud y uno de nuestros Ejecutivos de cuenta revisará tu envío
</p>
                            
                            
                <form action="#">
                    <div class="row">
                        <div class="col-md-5">
                           <div class="form-group pb-sm-2">
                             <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required>
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <input type="text" id="empresa" class="form-control" placeholder="Empresa" required>
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <input type="email" id="email" class="form-control" placeholder="Email" required>
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <input type="number" id="telefono" class="form-control" placeholder="Teléfono" required>
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <input type="text" id="direccion" class="form-control" placeholder="Dirección" required>
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <input type="text" id="provincia" class="form-control" placeholder="Provincia" required>
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <input type="text" id="web" class="form-control" placeholder="Página web">
                           </div>
                           
                           <div class="form-group pb-sm-2">
                             <textarea class="form-control textarea--height-100" id="mensaje" placeholder="Enviar mensaje" required></textarea>
                           </div>
                         
                        </div>
                        
                        <div class="col-md-7">
                          <label class="control-label text-uppercase">  <strong>En qué tipo de comercio clasifica tu tienda:</strong></label>    	
                            <div class="row">
                               
                                <div class="col-sm-6">
                                    <label class="radio-inline p-0">
                                     <div class="radio radio-info">
                                         <input type="radio" name="comercio" id="radio1" value="Estudio de Yoga">
                                        <label for="radio1">Estudio de Yoga</label>
                                     </div>
                                   </label>
                                
                                   
                              
                                  <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio2" value="Gimnasio">
                                    <label for="radio2">Gimnasio </label>
                                   </div>
                                  </label>
                              
                                     
                                
                                   <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio3" value="Peluquería">
                                    <label for="radio3">Peluquería </label>
                                   </div>
                                   </label>
                                    
                                    
                             
                                    <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio4" value="Consultorio quiropráctic">
                                    <label for="radio4">Consultorio quiropráctico </label>
                                   </div>
                                   </label>
                            
                                    
                                   
                                  
                                     <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio5" value="Complejo de spa">
                                    <label for="radio5">Complejo de spa</label>
                                   </div>
                                   </label>
                                  
                                    
                                   
                                     <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio6" value="Gimnasio corporativo">
                                    <label for="radio6">Gimnasio corporativo</label>
                                   </div>
                                   </label>
                            </div>
                                                             
                                <div class="col-sm-6">
                                  <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio7" value="Tienda de salud/abarrotes">
                                    <label for="radio7">Tienda de salud/abarrotes</label>
                                   </div>
                                   </label>
                                    
                                     <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio8" value="Tienda de café/té">
                                    <label for="radio8">Tienda de café/té</label>
                                   </div>
                                   </label>
                                    
                                     <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio9" value="Restaurante">
                                    <label for="radio9">Restaurante</label>
                                   </div>
                                   </label>
                                    
                                     <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio10" value="Tienda de belleza">
                                    <label for="radio10">Tienda de belleza</label>
                                   </div>
                                   </label>
                                    
                                     <label class="radio-inline">
                                   <div class="radio radio-info">
                                    <input type="radio" name="comercio" id="radio11" value="Otros">
                                    <label for="radio11">Otros</label>
                                   </div>
                                   </label>
                                </div>
                                
                            </div> 
                                
                            <hr>
                            <label class="control-label text-uppercase">  <strong>¿Cómo supiste de nosotros?</strong></label>    	  
                            <div class="row">
                                <div class="col-sm-6">
                                    <input id="formcheckoutRadio1" value="Boca a boca" name="supiste" type="radio"  class="radio" checked="checked">
                                    <label for="formcheckoutRadio1">Boca a boca</label>
                                    <input id="formcheckoutRadio2" value="Buscador" name="supiste" type="radio" class="radio">
                                    <label for="formcheckoutRadio2">Buscador</label>
                                    <input id="formcheckoutRadio3" value="Redes sociales" name="supiste" type="radio" class="radio">
                                    <label for="formcheckoutRadio3">Redes sociales</label>
                                </div>
                                
                                <div class="col-sm-6">
                                    <input id="formcheckoutRadio4" value="Representante de ventas" name="supiste" type="radio"  class="radio" checked="checked">
                                    <label for="formcheckoutRadio4"> Representante de ventas</label>
                                    <input id="formcheckoutRadio5" value="Sitio web de Natural Care Ec" name="supiste" type="radio" class="radio">
                                    <label for="formcheckoutRadio5">Sitio web de Natural Care Ec</label>
                                    <input id="formcheckoutRadio6" value="Otro" name="supiste" type="radio" class="radio">
                                    <label for="formcheckoutRadio6">Otro</label>
                                </div>
                            </div>
                               
                                
                                
                            <hr>
                            <label class="control-label text-uppercase">  <strong>¿Actualmente vendes productos de salud / bienestar / acondicionamiento físico en tu tienda?</strong></label>   
                                  <div class="row">
                                   <div class="col-sm-6">
                                   <input id="formcheckoutRadio7" value="SI" name="vendes" type="radio" class="radio" checked="checked">
                                   <label for="formcheckoutRadio7">Si</label>
                                   </div>
                                   
                                   <div class="col-sm-6">
                                   <input id="formcheckoutRadio8" value="NO" name="vendes" type="radio" class="radio">
                                   <label for="formcheckoutRadio8">No</label>
                                   </div>
                                    </div>
                        
                        <div class="card card--grey">
                                <div class="card-body">
                                    <div class="g-recaptcha" data-sitekey="6LfeJMYUAAAAAPhvS6p9ytPD3HWf3owYaaZ8X8iA"></div>
                                   
                                </div>
                         </div>  
                         
                         
                    </div>
                
            
                          
                        
                        </div>
                         <div class="text-center"><button type="button" class="btn btn-sm step-next" onclick="enviardatos()">Enviar datos</button></div>   
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
   
              
  <?php include('footer.php') ?>
   <script type="text/javascript">
     function enviardatos()
     {
      var nombres = document.getElementById("nombre").value;
      var empresa = document.getElementById("empresa").value;
      var email = document.getElementById("email").value;
      var telefono = document.getElementById("telefono").value;
      var direccion = document.getElementById("direccion").value;
      var provincia = document.getElementById("provincia").value;
      var web = document.getElementById("web").value;
      var mensaje = document.getElementById("mensaje").value;
      var comercio = $('input:radio[name=comercio]:checked').val();
      var supiste = $('input:radio[name=supiste]:checked').val();
      var vendes = $('input:radio[name=vendes]:checked').val();
      if(nombres){
        if(email){
          if(telefono){
             swal({   
            title: "Enviando tus datos",   
            text: "Espera por favor",   
            
             imageUrl: "carga.gif",
            showConfirmButton: false 
        });
      var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('nombres', nombres);
            paqueteDeDatos.append('empresa', empresa);
            paqueteDeDatos.append('email', email);
            paqueteDeDatos.append('telefono', telefono);
            paqueteDeDatos.append('direccion', direccion);
            paqueteDeDatos.append('provincia', provincia);
            paqueteDeDatos.append('web', web);
            paqueteDeDatos.append('mensaje', mensaje);
            paqueteDeDatos.append('comercio', comercio);
            paqueteDeDatos.append('supiste', supiste);
            paqueteDeDatos.append('vendes', vendes);
            paqueteDeDatos.append('response', grecaptcha.getResponse());
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/sentmail.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {

                        if(msg == 1)
                        {
                            swal({ 
                                        title: "Correcto!",
                                        text: "Recibimos tus datos",
                                        type: "success" 
                                        },
                                        function(){
                                        location.reload();
                                        });
                        }else
                        {
                             swal({ 
                                        title: "Alto!",
                                        text: "Recapcha invalido",
                                        type: "error" 
                                        },
                                        function(){
                                        //location.reload();
                                        });
                        }
                    });
                          }else
                {
                    swal("Alto!","Ingrese tu telefono" , "error");
                        $('#completar').attr('onClick', 'enviardatos();');
                }
                 }else
                {
                    swal("Alto!","Ingrese un email" , "error");
                        $('#completar').attr('onClick', 'enviardatos();');
                }
                 }else
                {
                    swal("Alto!","Ingresa tu nombre" , "error");
                        $('#completar').attr('onClick', 'enviardatos();');
                }
     }
   </script>
    
    
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

</html>