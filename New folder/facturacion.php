<?php 
include('../administrador/config/app_config.php');
if(is_numeric($_SESSION["idcarrito"]) && $_SESSION["idcarrito"] > 0 && $_SESSION["idcarrito"] < 500000)
{
  if($_SESSION['flagretorno'] == '1')
  {
    header('Location: checkout.php');
  }  

    $datuser = "SELECT *FROM natuser where id=".$_SESSION['idcarrito'];
    $rdatosu = mysql_query($datuser);
    $fusuario = mysql_fetch_array($rdatosu);
}

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
   
    <title>Mis datos de facturación - Natural Care ec</title>
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
                    <li><span>Mi cuenta</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 aside aside--left">
                       <?php include('menu.php'); ?>
                        
                    </div>
                    <div class="col-md-9 aside">
                        <h2>Detalle de mi cuenta</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Datos de facturación</h3>
                                        <p><b>RUC/CI:</b>  <?php echo $fusuario['ruc'] ?><br>
                                        <b>Nombre/Razón social:</b>  <?php echo $fusuario['razon'] ?> <br>
                                        <b>Dirección:</b>  <?php echo $fusuario['direccionf'] ?><br>
                                        <b>Teléfono:</b>  <?php echo $fusuario['telefonof'] ?><br>
                                       
                                        <div class="mt-2 clearfix"><a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i>Editar</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 d-none" id="updateDetails">
                            <div class="card-body">
                                <h3>Actualizar datos</h3>
                                <div class="row mt-2">
                                    <div class="col-sm-6"><label class="text-uppercase">RUC/CI:</label>
                                        <div class="form-group"><input type="text" id="ruc" value=" <?php echo $fusuario['ruc'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                    <div class="col-sm-6"><label class="text-uppercase">Nombre/Razón social:</label>
                                        <div class="form-group"><input type="text" id="razon" value=" <?php echo $fusuario['razon'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                     <div class="col-sm-6"><label class="text-uppercase">Dirección:</label>
                                        <div class="form-group"><input type="text" id="direccionf" value=" <?php echo $fusuario['direccionf'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                      <div class="col-sm-6"><label class="text-uppercase">Teléfono:</label>
                                        <div class="form-group"><input type="text" id="telefonof" value=" <?php echo $fusuario['telefonof'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                   
                                </div>
                                 
                                <div class="mt-2"><button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancelar</button> <button type="button" onclick="actualizardos()" class="btn ml-1">Actualizar</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    
    function actualizardos()
    {
         var ruc = document.getElementById("ruc").value;
         var razon = document.getElementById("razon").value;
         var direccionf = document.getElementById("direccionf").value;
         var telefonof = document.getElementById("telefonof").value;
        
        if(ruc)
                {

                    if(razon)
                    {

                        if(direccionf)
                    {
                          if(telefonof)
                    {
                     
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('ruc', ruc);
                        paqueteDeDatos.append('razon', razon);
                        paqueteDeDatos.append('direccionf', direccionf);
                        paqueteDeDatos.append('telefonof', telefonof);
                        
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/updateuserdos.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {
                                         swal({ 
                                                        title: "Correcto!",
                                                        text: "Datos Actualizados",
                                                        type: "success" 
                                                        },
                                                        function(){
                                                        location.reload();
                                                        });
                                    });
                      }else
                   {
                     swal("Alto!","Ingresa una Teléfono" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
                   
                    }else
                   {
                     swal("Alto!","Ingresa una direccion de facturacion" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
                    }else
                   {
                     swal("Alto!","Ingresa la razon social" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
               }else
               {
                 swal("Alto!","Ingresa un ruc o cedula" , "error");
                 $('#completar').attr('onClick', 'login();');
               }
    }

</script>

</html>