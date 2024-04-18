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
//  $consultaHistorial = "SELECT *FROM points_history WHERE product_reference='$producto' and user_id=".$_SESSION['idusuario']." ORDER BY id desc";
   $consultaHistorial = "SELECT *FROM points_history WHERE user_id=".$_SESSION['idusuario']." and process_points=1 ORDER BY id asc";
  $rhistorial = mysql_query($consultaHistorial);
 // $fhistorial = mysql_fetch_array($rhistorial);


    $consultaHistorial2 = "SELECT *FROM puntos as a
    LEFT JOIN tipo_puntos as b on (a.tipo=b.id) WHERE a.usuario=".$_SESSION['idusuario']." ORDER BY a.id asc ";
    $rhistorial2 = mysql_query($consultaHistorial2);


    $consultaHistorial2 = "SELECT a.fecha_registro,b.descripcion,'0' as puntos_negativos,a.puntos FROM puntos as a
    LEFT JOIN tipo_puntos as b on (a.tipo=b.id)
    WHERE a.usuario=".$_SESSION['idusuario']."
    UNION ALL
    SELECT fecha as fecha_registro,descripcion,deb_points as puntos_negativos,sum_points as puntos FROM points_history WHERE user_id=".$_SESSION['idusuario']." and process_points in (1,2) ORDER BY fecha_registro asc
      ";
    $rhistorial2 = mysql_query($consultaHistorial2);

    

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
   
    <title>Consulta de Saldo - Natural Care ec</title>
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
                        <h2>Consulta de Saldo</h2>
                        <span>Tus últimas transacciones se muestran al final de la tabla.</span>
                        <div class="table-responsive">
                            <table class="table table-bordered table-order-history">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Transacción</th>
                                        <th scope="col">Debitados</th>
                                        <th scope="col">Acreditados</th>
                                        <th scope="col">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php 
                                     $neto=0;

                                    //die(var_dump($rhistorial2));
                                        while($elHistorial2 = (mysql_fetch_array($rhistorial2))){
                                            
                                            $neto = $neto+($elHistorial2['puntos']-$elHistorial2['puntos_negativos']);
                                           
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo substr($elHistorial2['fecha_registro'],0,10) ?></td>
                                            <td><?php echo $elHistorial2['descripcion'] ?></td>
                                            <td><span class="resta">(-) <?php echo $elHistorial2['puntos_negativos'] ?></span></td>
                                            <td><span class="suma">(+) <?php echo $elHistorial2['puntos'] ?></span></td>
                                            <td><?php echo $neto ?></td>
                                        </tr>
                                        <?php // } else{}; ?>
                                        
                                    <?php } ?>
                                    <?php 
                                   /*     while($elHistorial = (mysql_fetch_array($rhistorial))){
                                        ?>
                                        <?php // if ( $elHistorial['process_points'] == '1') {

                                            $neto= $neto+ ($elHistorial['sum_points'] - $elHistorial['deb_points']); 
                                        ?>
                                        <tr>
                                            <td><?php echo $elHistorial['fecha'] ?></td>
                                            <td><?php echo $elHistorial['descripcion'] ?></td>
                                            <td><span class="resta">(-) <?php echo $elHistorial['deb_points'] ?></span></td>
                                            <td><span class="suma">(+) <?php echo $elHistorial['sum_points'] ?></span></td>
                                            <td><?php echo $neto ?></td>
                                        </tr>
                                        <?php // } else{};
                                        
                                        
                                    } */?>
                                    
                                    
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                      <!--  <div class="text-right mt-2"><a href="beneficios2.php" class="btn btn--alt">Ver mi plan actual</a></div> --> 
                      
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