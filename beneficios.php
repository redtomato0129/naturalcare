<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    $suer = "SELECT count(*) as ctauser FROM natuser WHERE estado='1'";
    $ruser = mysql_query($suer);
    $fuser = mysql_fetch_array($ruser);
    $conuser = $fuser['ctauser'];

    $spro = "SELECT count(*) as ctapro FROM productos WHERE estado='1'";
    $rpro = mysql_query($spro);
    $fpro = mysql_fetch_array($rpro);
    $conpro = $fpro['ctapro'];

//HISTORIAL DE PUNTOS
        $consultaPlanes = "SELECT * FROM points_group  ORDER BY id asc";
        $rplanes = mysql_query($consultaPlanes); $qplanes = mysql_query($consultaPlanes);
        $splanes = mysql_query($consultaPlanes); $dplanes = mysql_query($consultaPlanes);
        $fplanes = mysql_fetch_array($rplanes);

        $sql2="SELECT *FROM tipo_puntos where id in (2)";
        $retry2 = mysql_query($sql2); 
        $fptos = mysql_fetch_array($retry2);
        $sql3="SELECT *FROM tipo_puntos where id in (1)";
        $retry3 = mysql_query($sql3); 
        $fptos2 = mysql_fetch_array($retry3);
        $sql4="SELECT *FROM tipo_puntos where id in (3)";
        $retry4 = mysql_query($sql4); 
        $fptos3 = mysql_fetch_array($retry4);
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
    <title>Crear Beneficios</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
       <link href="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    
     <link href="../plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
      <!-- switcher -->
      <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
 <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
     
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
                        <h4 class="page-title" style="color: #FFF;">Gestionar Beneficios</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                
         
    
         
        
           <!-- /.row -->
                <div class="row">
                  
                    
                      
                         <div class="white-box">   

                             
                              <?php  $plancumple = mysql_fetch_array($splanes);   ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> 
                                    <label>Puntos Asignados por cumpleaños</label>
                                     </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"> 
                                 <input type="text" name="ptocumpleanos" id="ptocumpleanos" class="form-group" value="<?php echo $fptos['puntos']; ?>" />   
                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6"> 
                                    <label>Puntos Asignados por registro</label>
                                     </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"> 
                                 <input type="text" name="ptoregistro" id="ptoregistro" class="form-group" value="<?php echo $fptos2['puntos']; ?>" />   
                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6"> 
                                    <label>En ventas: Cantidad de Puntos a dar  por $1</label>
                                     </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"> 
                                 <input type="text" name="ptodolar" id="ptodolar" class="form-group" value="<?php echo $fptos3['puntos']; ?>" />   
                                    
                                </div>


                                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6"> 
                                    <input type="button" name="BtnBeneficio" id="BtnBeneficio" value="Registrar" class="btn btn-success" onclick="eliminar()" />
                                </div>

                            </div>
                    </div> 
                </div>
                    
                    
                
                <!--row -->
            
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
    
    <!-- icheck -->
    <script src="../plugins/bower_components/icheck/icheck.min.js"></script>
    <script src="../plugins/bower_components/icheck/icheck.init.js"></script>
    
        <!-- bt-switch -->
    <script src="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }),
                $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }),
                $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>
   
  

    <script>
function eliminar(id){

    var ptocumpleanos = $('#ptocumpleanos').val();
    var ptoregistro = $('#ptoregistro').val();
    var ptodolar = $('#ptodolar').val();
         
        swal({   
            title: "Deseas Actualizar?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo actualizarlo!",   
            closeOnConfirm: false 
        }, function(){   
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('ptocumpleanos', ptocumpleanos);
                    paqueteDeDatos.append('ptoregistro', ptoregistro);
                    paqueteDeDatos.append('ptodolar', ptodolar);
                    paqueteDeDatos.append('id', '1');
              
            $.ajax({
            type: "POST",
            url: "procesos/updatebeneficio.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Beneficios Actualizados!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'beneficios.php';
                    });

            });
                           });

           
         
                }
</script>


    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
