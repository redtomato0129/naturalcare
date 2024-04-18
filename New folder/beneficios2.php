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

    // Listado de planes
    $consultaPlanes = "SELECT * FROM points_group  ORDER BY id asc";
        $rplanes = mysql_query($consultaPlanes); $qplanes = mysql_query($consultaPlanes);
        $splanes = mysql_query($consultaPlanes); $dplanes = mysql_query($consultaPlanes);
        $fplanes = mysql_fetch_array($rplanes);
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
   
    <title>Beneficios de plan recompensas - Natural Care ec</title>
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
        
        <div class="holder mt-20">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="text-center">LOS VIP GANAN AÚN MÁS</h2>
                        <div class="form-wrapper">
                            <p class="text-center">¡Cuanto más compres, más ventajas exclusivas desbloquearás!</p>

                      <div class="table-responsive">
                            <table class="table table-bordered table-order-history">
<thead class="titulo-beneficios">
  
    <tr>
      <th scope="col">BENEFICIOS</th>
        <?php  while($planames = (mysql_fetch_array($qplanes))){ if ( $planames['estado'] == '0') {} else{  ?>
        <td class="text-center planes" scope="col"><?php echo $planames['nombre'];
            if (($fusuario['points']) >= ($planames['puntosminimos']) && ($fusuario['points']) <= ($planames['puntosmaximos'])){
                // echo ' aplica '.$fusuario['points']; 
            ?>

            <br><span class="text-center estado-activo p-1" style="top: 8px; position: relative; font-size: 9px;">Su Plan Actual</span>
            <?php
            } else{ 
                if(($fusuario['points']) >=! ($planames['puntosminimos']) && ($fusuario['points']) <=! ($planames['puntosmaximos'])){
                // if (($planames['puntosmaximos']) >= ($fusuario['points'])){
                }   else{
                 } ?>
        </td> <?php }
            }
        }  ?>
    </tr>
  </thead>
  <tbody class="caracteristicas">

    <tr>
      <th scope="row" style="height:4em;">Multiplicador de Puntos
      <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
    <?php  while($planxp = (mysql_fetch_array($rplanes))){  ?>
        <td class="text-center plan-<?php echo $planxp['nombre'] ?> "><?php if ( $planxp['puntos_multiplicador'] == '0' ) { echo '0'; } 
        else{ echo $planxp['puntos_multiplicador']; } ?> x</td> <?php } ?>
    </tr>
    <tr>
      <th scope="row" style="height:4em">Bono de Cumpleaños
     <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
    <?php  while($plancumple = (mysql_fetch_array($splanes))){ if ( $plancumple['estado'] == '0') {} else{  ?>
    <td class="text-center plan-<?php echo $plancumple['nombre'] ?>"><?php echo $plancumple['puntos_cumple']; ?> Puntos</td> <?php } } 
    ?>
    </tr>

    <tr>
      <th scope="row" style="height:4em">Bono por Registro de cuentas
     <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
    <?php  while($planreg = (mysql_fetch_array($dplanes))){ if ( $planreg['estado'] == '0') {} else{  ?>
    <td class="text-center plan-<?php echo $planreg['nombre'] ?>"><?php echo $planreg['puntos_registro']; ?> Puntos</td> <?php } } 
    ?>
    </tr>    
     
    <!-- Características quemadas -->
<!--     <tr>
      <th scope="row" style="height:4em">Acceso anticipado a las ventas</th>
      <td class="text-center plan-bronce" >-</td>
      <td class="text-center plan-plata"><img src="../images/isotipo.svg"></td>
      <td class="text-center plan-oro"><img src="../images/isotipo.svg"></td>
    </tr>
    <tr>
      <th scope="row" style="height:4em">Sorteo de Mercancía</th>
      <td class="text-center plan-bronce" >-</td>
      <td class="text-center plan-plata"><img src="../images/isotipo.svg"></td>
      <td class="text-center plan-oro"><img src="../images/isotipo.svg"></td>
    </tr> -->
  </tbody>
</table>
 </div>
<div class="text-left mt-2"><a href="consulta-saldo2.php" class="btn btn--alt">Regresar</a></div>
                       
                       
                       
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

</html>