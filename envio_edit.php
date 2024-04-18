<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    if(is_numeric($_GET['id']) && $_GET['id'] > 0)
    {
        $spro = "SELECT *FROM provincias";
        $rpro = mysql_query($spro);

        $senvio = "SELECT a.*,b.provincia FROM valores_envio AS a 
        LEFT JOIN ciudades AS b ON (a.ciudad=b.ciudad)
        WHERE a.estado='1'";
        $renvio = mysql_query($senvio);

        $senvioedit = "SELECT a.*,b.provincia FROM valores_envio AS a 
        LEFT JOIN ciudades AS b ON (a.ciudad=b.ciudad)
        WHERE a.estado='1' and a.id=".$_GET['id'];
        $renvioedit = mysql_query($senvioedit);
        $fenvioedit = mysql_fetch_array($renvioedit);
    }


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
    <title>Envío</title>
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
    <link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Popup CSS -->
    <link href="../plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
     <!-- i check -->
     <link href="../plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
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
                        <h4 class="page-title" style="color: #FFF;">Panel de Administración</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">Manejar Valores de envío</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                               <form>
                         
                                     <hr>
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group m-b-40">
                                      <label for="input6">Elige la provincia</label>
                                            <select class="form-control p-0" id="provincia" onchange="ciudades();" required>
                                                <option value="<?php echo $fenvioedit['provincia']; ?>"><?php echo $fenvioedit['provincia']; ?></option>
                                                <?php
                                                  while($fprovincia = mysql_fetch_array($rpro)){
                                                ?>
                                                <option value="<?php echo $fprovincia['provincia'] ?>"><?php echo $fprovincia['provincia'] ?></option>
                                              <?php } ?>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                   
                                   <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9" id="ciu">
                                            <div class="form-group m-b-40">
                                            <label for="input6">Elige la ciudad</label>
                                            <select class="form-control p-0" id="ciudad" required>
                                                <option value="<?php echo $fenvioedit['ciudad']; ?>"><?php echo $fenvioedit['ciudad']; ?></option>
                                                
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                   
                                   <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group m-b-40">
                                            <label for="input6">Indique el valor</label>
                                            <input type="text" class="form-control" id="valor" value="<?php echo $fenvioedit['valor']; ?>" placeholder="solo números" onKeyPress="return soloNumeros(event)" required="">
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                   
                              
                                 
                                       
                               
                                     
                                              
                                        <hr>
                                        <div class="form-actions m-t-40">
                                       <input type="button" class="btn btn-success model_img" onclick="guardar_envio()" id="completar" value="GUARDAR ENVIO" />
                                        </div>
                                        
                                       
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-lg-7 col-sm-12">
                      
                            
                          
                                 <div class="white-box">
                                     <h3 class="box-title">Ciudades con costos de envío publicados</h3>
                                     <hr>
                            <div class="table-responsive">
                                <table class="table product-overview" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Provincia</th>
                                            <th>Ciudad</th>
                                            <th>tarifa</th>
                                            <th>Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php while($fenvio = mysql_fetch_array($renvio)){ ?>
                                        <tr>
                                            <td><?php echo $fenvio['id']; ?></td>
                                            <td><?php echo $fenvio['provincia']; ?></td>
                                            <td><?php echo $fenvio['ciudad']; ?></td>
                                            <td>$<?php echo number_format($fenvio['valor'],2); ?></td>
                                           <td><a href="envio_edit.php?id=<?php echo $fenvio['id'] ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Editar"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Borrar" data-toggle="tooltip" onclick="eliminar(<?php echo $fenvio['id'] ?>)" ><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                      <?php } ?>
                                        
                                        
                                        
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    
                            
                            
                       
                    </div>
                    
                    
                 </div>
                <!--row -->
                
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"  />
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   
   
    
   
    
    <!-- Magnific popup JavaScript -->
    <script src="../plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    
  


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
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    
     
 <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
  
    
    <!-- jQuery file upload -->
    <script src="../plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
<!-- color picker -->
    <script src="js/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="js/colorpicker/docs.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="js/theme.js"></script>

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


            function ciudades()
            {
                    var cat = document.getElementById("provincia").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('pais', cat);
              
            $.ajax({
            type: "POST",
            url: "procesos/buscar_city.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#ciu").html(msg);
           
         
                }); 
            }

              function guardar_envio()
            {
              var provincia = document.getElementById('provincia').value;
              var ciudad = document.getElementById('ciudad').value;
              var valor = document.getElementById('valor').value;
              var id = document.getElementById('id').value;
              
              var paqueteDeDatos = new FormData();
              if(provincia != '0'){
                  if(ciudad != '0'){
                    if(valor != ''){
                        paqueteDeDatos.append('provincia', provincia);
                        paqueteDeDatos.append('ciudad', ciudad);
                        paqueteDeDatos.append('valor', valor);
                        paqueteDeDatos.append('id', id);
                    
                    $.ajax({
                    type: "POST",
                    url: "procesos/updatenvio.php",
                    contentType: false,
                                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                processData: false,
                                cache: false, 
                                 }).done(function( msg ) {
                           swal({ 
                                        title: "Correcto!",
                                        text: "",
                                        type: "success" 
                                        },
                                        function(){
                                         window.location.href='envio.php'
                                        });
                   
                 
                        }); 
              }else{
            swal("Alto!","Ingresa un valor" , "error");
            $('#completar').attr('onClick', 'guardar_producto();');
            
           }
            }else{
            swal("Alto!","Seleciona una Ciudad" , "error");
            $('#completar').attr('onClick', 'guardar_producto();');
            
           }
            }else{
            swal("Alto!","Seleciona una Provincia" , "error");
            $('#completar').attr('onClick', 'guardar_producto();');
            
           }
            }




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
            url: "procesos/deleteenvio.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Envio Inactivo!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'envio.php';
                    });

            });
                           });

           
         
                }
    </script>

<!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
  
  <!-- icheck estilos -->
    <script src="../plugins/bower_components/icheck/icheck.min.js"></script>
    <script src="../plugins/bower_components/icheck/icheck.init.js"></script>
    
</body>

</html>
