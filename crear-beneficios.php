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
                
         
    
         
          <div class="row d-none">
              
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Gestionar beneficios</h3>
                             <div class="vtabs">
                                <ul class="nav tabs-vertical">
                                    <li class="tab nav-item active">
                                        <a data-toggle="tab" class="nav-link" href="#beneficios1" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Beneficios</span> </a>
                                    </li>
                                    <li class="tab nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#tipoatributos2" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Tipo de atributos</span> </a>
                                    </li>
                                    <!-- <li class="tab nav-item">
                                        <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#atributos3"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Agregar atributos</span> </a>
                                    </li> -->
                                </ul>
                                <div class="tab-content">
                                    <div id="beneficios1" class="tab-pane active">
                                    <p>Ingrese el nombre del beneficio y en que planes será incluidos</p><br>    
                               <form>
                        
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group m-b-10">
                                        <label for="input1">Descripción</label>
                                           <input type="text" class="form-control" id="input1" required><span class="highlight"></span> <span class="bar"></span>
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                    
                                     
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group m-t-10">
                                        <label>Planes</label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input type="checkbox" class="check" id="checkbox-1" data-checkbox="icheckbox_flat-purple">
                                                    <label for="flat-checkbox-1">PLAN BRONCE</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="check" id="checkbox-2" checked data-checkbox="icheckbox_flat-purple">
                                                    <label for="flat-checkbox-2">PLAN PLATA</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" class="check" id="checkbox-3" checked data-checkbox="icheckbox_flat-purple">
                                                    <label for="flat-checkbox-3">PLAN ORO</label>
                                                </li>
                                                
                                            </ul>
                                            
                                        </div>
                                    </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                         <hr>
                                        <div class="form-actions m-t-40">
                                         <button type="submit" class="btn btn-primary model_img" id="sa-success2"> <i class="fa fa-check"></i>Registrar</button>
                                        </div>
                                        
                                       
                                    </form>
                                 
                                  
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="tipoatributos2" class="tab-pane">
                                       <p>Según los planes elegidos en el punto anterior agregue los atributos respectivos a cada plan</p><br>
                                        
                                        <form class="form">
                               
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-2 col-form-label">BRONCE</label>
                                    <div class="col-4">
                                        <select class="form-control p-0" id="input6" required="">
                                                <option>seleccione</option>
                                                <option>Multiplicador</option>
                                                <option>suma de Puntos</option>
                                                <option>Envío gratis</option>
                                                <option>etc</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control p-0" id="input6" required="">
                                                <option>seleccione</option>
                                                <option>1X</option>
                                                <option>2X</option>
                                                <option>3X</option>
                                                <option>etc</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-2 col-form-label">PLATA</label>
                                    <div class="col-4">
                                        <select class="form-control p-0" id="input6" required="">
                                                 <option>seleccione</option>
                                                <option>Multiplicador</option>
                                                <option>suma de Puntos</option>
                                                <option>Envío gratis</option>
                                                <option>etc</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control p-0" id="input6" required="">
                                                <option>seleccione</option>
                                                <option>100 PUNTOS</option>
                                                <option>200 PUNTOS</option>
                                                <option>300 PUNTOS</option>
                                                <option>etc</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-2 col-form-label">ORO</label>
                                    <div class="col-4">
                                        <select class="form-control p-0" id="input6" required="">
                                                 <option>seleccione</option>
                                                <option>Multiplicador</option>
                                                <option>suma de Puntos</option>
                                                <option>Envío gratis</option>
                                                <option>Si o No</option>
                                                <option>etc</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control p-0" id="input6" required="">
                                                <option>seleccione</option>
                                                <option>SI </option>
                                                <option>NO</option>
                                        </select><span class="highlight"></span> <span class="bar"></span>
                                    </div>
                                </div>
                         
                                
                            </form>
                                   
                                        
                                        
                                          
                                        <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-primary model_img" id="sa-success2"> <i class="fa fa-check"></i>Guardar</button>
                                        </div>  
                                    
                                       
                                        
                                        
                                    </div>
                                    <!--  <div id="atributos3" class="tab-pane">
                                       
                                      
                                   
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
     
           <!-- /.row -->
                <div class="row">
                  
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                      
                            
                          
                                 <div class="white-box">
                                     <h3 class="box-title">Lo publicado</h3>
                                     <div class="table-responsive">
                            <table class="table table-bordered table-order-history">
  <thead class="titulo-beneficios">
  
    <tr>
      <th scope="col">BENEFICIOS</th>
        <?php  while($planames = (mysql_fetch_array($qplanes))){ if ( $planames['estado'] == '0') {} else{  ?>
        <th class="text-center planes" scope="col"><?php echo $planames['nombre']; ?></td> <?php }
        }  ?>
      <!-- <th class="text-center planes" scope="col">BRONCE <span class="rango">0 - 150 PUNTOS</span></th>
      <th class="text-center planes" scope="col">PLATA <span class="rango">151 - 400 PUNTOS</span></th>
      <th class="text-center planes" scope="col">ORO <span class="rango">+401 PUNTOS</span></th> -->
    </tr>
  </thead>
  <tbody class="caracteristicas">

    <?php /* 
        while($elPlan = (mysql_fetch_array($rplanes))){
        ?>
        <tr>
            <th scope="row" style="height:4em;">Multiplicador de Puntos
            <!-- <span class="accion"><a href="#">Editar</a>  | <a href="#">Eliminar</a> </span> -->
            <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
            </th>
            <td class="text-center plan-bronce"><?php echo $elPlan['puntos_multiplicador'] ?>x</td>
            <td class="text-center plan-plata"><?php echo $elPlan['puntos_cumple'] ?> puntos</td>
            <td class="text-center plan-oro"><?php echo $elPlan['puntos_registro'] ?>x</td>
        </tr>
    <?php } */ ?>

    <tr>
      <th scope="row" style="height:4em;">Multiplicador de Puntos
      <!-- <span class="accion"><a href="#">Editar</a>  | <a href="#">Eliminar</a> </span> -->
      <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
    <?php  while($planxp = (mysql_fetch_array($rplanes))){  ?>
        <td class="text-center plan-<?php echo $planxp['nombre'] ?> "><?php if ( $planxp['puntos_multiplicador'] == '0' ) { echo '0'; } 
        else{ echo $planxp['puntos_multiplicador']; } ?> x</td> <?php } ?>
   

    </tr>
    <tr>
      <th scope="row" style="height:4em">Bono de Cumpleaños
    <!-- <span class="accion"><a href="#">Editar</a>  | <a href="#">Eliminar</a> </span> -->
     <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
    <?php  while($plancumple = (mysql_fetch_array($splanes))){ if ( $plancumple['estado'] == '0') {} else{  ?>
    <td class="text-center plan-<?php echo $plancumple['nombre'] ?>"><?php echo $plancumple['puntos_cumple']; ?> Puntos</td> <?php } } 
    ?>
    </tr>

    <tr>
      <th scope="row" style="height:4em">Bono por Registro de cuentas
    <!-- <span class="accion"><a href="#">Editar</a>  | <a href="#">Eliminar</a> </span> -->
     <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
    <?php  while($planreg = (mysql_fetch_array($dplanes))){ if ( $planreg['estado'] == '0') {} else{  ?>
    <td class="text-center plan-<?php echo $planreg['nombre'] ?>"><?php echo $planreg['puntos_registro']; ?> Puntos</td> <?php } } 
    ?>
    </tr>    
<!-- ejemplo
    <tr>
      <th scope="row" style="height:4em">Bono por Registro de cuentas
    <span class="accion"><a href="#">Editar</a>  | <a href="#">Eliminar</a> </span> 
     <div class="bt-switch"><input type="checkbox" checked  data-on-color="primary" data-size="mini" /></div>
      </th>
      <td class="text-center plan-bronce">100 Puntos</td>
      <td class="text-center plan-plata">100 Puntos</td>
      <td class="text-center plan-oro">100 Puntos</td>
    </tr> 
 -->     
    </tr>
  </tbody>
</table>
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
         
        swal({   
            title: "Deseas Eliminarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo eliminarlo!",   
            closeOnConfirm: false 
        }, function(){   
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('id', id);
              
            $.ajax({
            type: "POST",
            url: "procesos/deletepro.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Producto Inactivo!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'publicar_productos.php';
                    });

            });
                           });

           
         
                }
</script>


    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
