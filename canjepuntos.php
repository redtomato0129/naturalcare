<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    $suer = "SELECT * FROM puntos_descuentos WHERE estado='1' order by puntos asc";
    $ruser = mysql_query($suer);
    
   
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
    <title>Canje de puntos</title>
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
                        <h4 class="page-title" style="color: #FFF;">Gestionar Canje</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                
         
    
        
        
         <!-- inicio de bloque-->
                                     
                                     <!-- fin de bloque-->
                                     
                                     
        
           <!-- /.row -->
                <div class="row">
                  
                    
                        <div class="white-box">
                         <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                         	 <h3 class="box-title">Configurar descuentos</h3>
                   			 <hr>
                                   
                                   <div class="row">
                                        <div class="col-md-3">
                                        <div class="form-group m-b-40">
                                        <label>VALOR EN DOLARES</label>
                                            <input type="text" name="ptodolares" id="ptodolares" class="form-group" value="" /> <span class="highlight"></span> <span class="bar"></span>
                                           
                                       </div>
                                       </div>
                                        
                                         <div class="col-md-3">
                                             <div class="form-group m-b-40">
                                               <label>VALOR EN PUNTOS</label>
                                            <input type="text" name="pto" id="pto" class="form-group" value="" /><span class="highlight"></span> <span class="bar"></span>
                                          </div>
                                        </div>
                                        
                                         <div class="col-md-3">
                                             <div class="form-group m-b-40">
                                               <label>MÍNIMO</label>
                                            <input type="number" name="minimo" id="minimo" class="form-group" value="" /><span class="highlight"></span> <span class="bar"></span>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    
                            </div>
                               


                                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6"> 
                                    <input type="button" name="BtnBeneficio" id="BtnBeneficio" value="Registrar" class="btn btn-success" onclick="eliminar()" />
                                </div>

                            </div> 


                                                     <div class="white-box col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                         <h3 class="box-title">Descuentos Configurados</h3>
                                                         <hr>
                                                <div class="table-responsive">
                                                    <table class="table product-overview" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Descuento</th>
                                                               
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                        <?php   while ($fila = mysql_fetch_array($ruser)){ ?>
                                           
                                        <tr>
                                            <td>$<?php echo $fila['dolares'] ?> DE DESCUENTO (<?php echo $fila['puntos'] ?> PUNTOS) MINIMO DE COMPRA $<?php echo $fila['minimo'] ?></td>
                                           
                                            <td>
                                            <div class="btn-group m-r-10">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Acción <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                       
                                        <li style="cursor: pointer;"><a onclick="eliminarpto(<?php echo $fila['id'] ?>)"  >Eliminar</a></li>
                                         </ul>
                                </div>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                        
                                    
                                                       </tbody>
                                                    </table><br><br>
                                                </div>
                                            </div>



                    </div> 
                </div>  </div>
                    
                    
                
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

    var ptodolares = $('#ptodolares').val();
    var pto = $('#pto').val();
    var minimo = $('#minimo').val();
   
         
        swal({   
            title: "Deseas Registrarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo Registrarlo!",   
            closeOnConfirm: false 
        }, function(){   
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('ptodolares', ptodolares);
                    paqueteDeDatos.append('pto', pto);
                    paqueteDeDatos.append('minimo', minimo);
                    paqueteDeDatos.append('metodo', 'insert');
                    
            $.ajax({
            type: "POST",
            url: "procesos/updatebeneficiocanje.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Beneficios Insertados!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'canjepuntos.php';
                    });

            });
                           });

           
         
                }


                function eliminarpto(id){

 
   
         
        swal({   
            title: "Deseas Eliminarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo Eliminarlo!",   
            closeOnConfirm: false 
        }, function(){   
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('id', id);
                    paqueteDeDatos.append('metodo', 'borrar');
                    
            $.ajax({
            type: "POST",
            url: "procesos/updatebeneficiocanje.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Beneficios Eliminados!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'canjepuntos.php';
                    });

            });
                           });

           
         
                }
</script>


    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
