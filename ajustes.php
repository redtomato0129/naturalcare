<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');

        // Listado de planes
        $consultaPlanes = "SELECT * FROM points_group  ORDER BY id asc";
        $rplanes = mysql_query($consultaPlanes);
        $fplanes = mysql_fetch_array($rplanes);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="monadecloset">
    <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.png">
    <title>Ajustes</title>
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
     <!-- multiselect CSS -->
    <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
     <!-- i check -->
     <link href="css/color.css" rel="stylesheet">
      <!-- switcher -->
      <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
 <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    
  
    
 <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
 
    <!-- Bootstrap Core CSS -->
   
   
     <link href="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    
     
  </head>

<body>
    
    <div id="wrapper">
    <?php include('menu.php'); ?>
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                
                
                <!-- breadcup-->
                <div class="row bg-title" style="background: url(imagenes/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title" style="color: #FFF;">Ajustes sobre plan de recompensas</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                  
                  
                      
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="white-box">
                    <div class="col-md-12">
                        <div class="row">
                        <!-- inicio de bloque-->
                        <?php  while($elPlan = (mysql_fetch_array($rplanes))){  ?>
                            <div class="col-md px-5 col-sm-12">
                                <h3><?php echo $elPlan['nombre'] ?></h3>
                                <div class="form-group m-b-10">
                                    <label for="x<?php echo $elPlan['nombre'] ?>">Multiplicador de puntos</label>
                                    <select class="form-control p-0 splan" id="x<?php echo $elPlan['id'] ?>" required>
                                        <option value="5">seleccione</option>
                                        <option value="50">0.5X</option>
                                        <option value="1">1X</option>
                                        <option value="11">1.5X</option>
                                        <option value="2">2X</option>
                                        <option value="22">2.5X</option>
                                        <option value="3">3X</option>
                                        <option value="33">3.5X</option>
                                        <option value="4">4X</option>
                                        <option value="44">4.5X</option>
                                        <option value="5">5X</option>
                                        <option value="55">5.5X</option>
                                        <option value="6">6X</option>
                                    </select><br>

                                    <label class="control-label m-t-20" for="min-<?php echo $elPlan['nombre'] ?>">Rango de puntos para cada plan</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-minus"></i></div>
                                            <input type="number" id="min-<?php echo $elPlan['id'] ?>" class="form-control min" placeholder="valor mínimo" value="<?php echo $elPlan['puntosminimos'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-plus"></i></div>
                                            <input type="number" id="plus-<?php echo $elPlan['id'] ?>" class="form-control plus" placeholder="valor máximo" value="<?php echo $elPlan['puntosmaximos'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h5>Puntos a acreditar por Cumpleaños</h5>
                                    <p class="text-muted font-13"><?php echo $elPlan['nombre'] ?> establecido en: 
                                        <span class="text-success"> <?php echo $elPlan['puntos_cumple'] ?> Puntos </span> 
                                    </p>

                                    <label class="control-label m-t-20" for="example-input1-group2">Establecer nuevo puntos por cumpleaños a <?php echo $elPlan['nombre'] ?> </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control pcumple" id="cumple-<?php echo $elPlan['id'] ?>" placeholder="Ingrese solo números" value="<?php echo $elPlan['puntos_cumple'] ?>" aria-describedby="basic-addon2">
                                        <span class="input-group-addon" id="basic-addon2">PUNTOS</span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary model_img completar"
                                    id="<?php echo $elPlan['id'] ?>"> <i class="fa fa-check"></i>Guardar</button>
                            </div>
                                    
                        <?php }  ?>  
                        </div>                            
                    </div>
                    </div>
                    </div>
                    
                    <hr>
                    
                    
                </div>
               
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   
   
    


    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>

    <script>
    $(document).ready    

        $('.completar').on('click', function () {
            elId = $(this).attr('id') ;
            console.log(elId);
            var xpoints = $("#x"+elId).val();
            console.log(xpoints);
            var valormin = $("#min-"+elId).val();
            console.log(valormin);
            var valormax = $("#plus-"+elId).val();
             console.log(valormax);
            var cumple = $("#cumple-"+elId).val();
            var pid = elId;
            console.log(pid);

            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('xpoints', xpoints);
            paqueteDeDatos.append('valormin', valormin);
            paqueteDeDatos.append('valormax', valormax);
            paqueteDeDatos.append('cumple', cumple);
            paqueteDeDatos.append('pid', pid);
                  
            $.ajax({
                type: "POST",
                url: "procesos/planes_crud.php",
                contentType: false,
                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                processData: false,
                cache: false, 
            }).done(function( msg ) {
                alert(msg);
                setTimeout(function() {
                   window.location.href = 'ajustes.php'; 
               }, 1000);
                  
                });
        });

    </script>

    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>

</body>

</html>
