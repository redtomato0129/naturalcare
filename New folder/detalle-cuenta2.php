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
   
    <title>Mis datos personales - Natural Care ec</title>
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
                        <?php include('menu2.php'); ?>
                       
                        
                    </div>
                    <div class="col-md-9 aside">
                        <h2>Detalle de mi cuenta</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Información Personal</h3>
                                        <p><b>Nombres:</b> <?php echo $fusuario['nombres'] ?><br>
                                        <b>Apellidos:</b> <?php echo $fusuario['apellidos'] ?><br>
                                        <b>E-mail:</b> <?php echo $fusuario['email'] ?><br>
                                        <b>Celular:</b> <?php echo $fusuario['celular'] ?><br>
                                        <b>Fecha Cumpleaños:</b> ---------<br>
                                        <b>Convencional:</b> <?php echo $fusuario['telefono'] ?>
                                        </p>
                                        <div class="mt-2 clearfix"><a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i>Editar</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 d-none" id="updateDetails">
                            <div class="card-body">
                                <h3>Actualizar datos</h3>
                                <div class="row mt-2">
                                    <div class="col-sm-6"><label class="text-uppercase">Nombres:</label>
                                        <div class="form-group"><input type="text" id="nombres" value="<?php echo $fusuario['nombres'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                    <div class="col-sm-6"><label class="text-uppercase">Apellidos:</label>
                                        <div class="form-group"><input type="text" id="apellidos" value="<?php echo $fusuario['apellidos'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                     <div class="col-sm-6"><label class="text-uppercase">Teléfono celular:</label>
                                        <div class="form-group"><input type="text" id="celular" value="<?php echo $fusuario['celular'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                    <div class="col-sm-6"><label class="text-uppercase">Teléfono convencional:</label>
                                        <div class="form-group"><input type="text" id="telefono" value="<?php echo $fusuario['telefono'] ?>" class="form-control" placeholder=""></div>
                                    </div>
                                </div>
                                
                                
                                <div class="row mt-2">
                                           <label class="text-uppercase">Fecha Cumpleaños:</label>
                                            <div class="col-sm-2"><label class="text-uppercase">Dia:</label>
                                                <div class="form-group select-wrapper"><select class="form-control">
                                                        <option value="United States">01</option>
                                                        <option value="Canada">02</option>
                                                        <option value="China">03</option>
                                                        <option value="India">etc</option>
                                                        <option value="Italy">etc</option>
                                                        <option value="Mexico">etc</option>
                                                    </select></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="text-uppercase">Mes:</label>
                                                <div class="form-group select-wrapper"><select class="form-control">
                                                        <option value="United States">Enero</option>
                                                        <option value="AL">Febrero</option>
                                                        <option value="AK">Marzo</option>
                                                        <option value="AZ">etc</option>
                                                        <option value="AR">etc</option>
                                                        <option value="CA">etc</option>
                                                    </select></div>
                                            </div>
                                            
                                            <div class="col-sm-3">
                                                <label class="text-uppercase">Año:</label>
                                                <div class="form-group select-wrapper"><select class="form-control">
                                                        <option value="United States">2020</option>
                                                        <option value="AL">2019</option>
                                                        <option value="AK">2018</option>
                                                        <option value="AZ">etc</option>
                                                        <option value="AR">etc</option>
                                                        <option value="CA">etc</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                
                                
                                <div class="mt-2"><button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancelar</button> <button type="button" onclick="actualizaruno()" class="btn ml-1">Actualizar</button></div>
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
    
    function actualizaruno()
    {
         var nombres = document.getElementById("nombres").value;
         var apellidos = document.getElementById("apellidos").value;
         var telefono = document.getElementById("telefono").value;
         var celular = document.getElementById("celular").value;
        if(nombres)
                {

                    if(apellidos)
                    {

                        if(telefono)
                    {
                         if(celular)
                    {
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('nombres', nombres);
                        paqueteDeDatos.append('apellidos', apellidos);
                        paqueteDeDatos.append('telefono', telefono);
                        paqueteDeDatos.append('celular', celular);
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/updateuserone.php",
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
                     swal("Alto!","Ingresa una celular" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
                    }else
                   {
                     swal("Alto!","Ingresa un telefono" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
                    }else
                   {
                     swal("Alto!","Ingresa apellidos" , "error");
                     $('#completar').attr('onClick', 'login();');
                    }
               }else
               {
                 swal("Alto!","Ingresa nombres" , "error");
                 $('#completar').attr('onClick', 'login();');
               }
    }

</script>

</html>