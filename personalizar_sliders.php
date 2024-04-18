<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    
      include('config/app_config.php');
      $sadmin = "SELECT *FROM usuario_admin";
      $radmin = mysql_query($sadmin);
      $fadmin = mysql_fetch_array($radmin);

      $stiempo = "SELECT *FROM config";
      $rtiempo = mysql_query($stiempo);
      $ftiempo = mysql_fetch_array($rtiempo);
     
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
    <title>Personalizar Sliders</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!--My admin Custom CSS -->
    <link href="../plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!--dropify -->
    <link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">
    <!--dropify -->
    <link href="../plugins/bower_components/gridstack/gridstack.css" rel="stylesheet">
    
</head>

<body class="fix-sidebar">
    
    <?php include('menu.php'); ?>
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- breadcup-->
                <div class="row bg-title" style="background: url(imagenes/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title" style="color: #FFF;">Personlizar sliders</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
               </div>
            <!-- breadcup-->
                <!-- .row -->
                <div class="row">
                   
                   <div class="col-md-4 col-sm-4 ">
                       
                        <div class="panel panel-info">
                                                <div class="panel-heading">Publicar slider</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                          
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                         <div class="col-sm-12 ol-md-12 col-xs-12">
                                                           <div class="white-box ">
                                                            <h3 class="box-title">Subir imagen</h3>
                                                            <label for="input-file-now-custom-1">Dimensiones: 1900 X 720 pixeles</label>
                                                            <input type="file" id="foto" class="dropify" data-default-file="imagenes/upload3.jpg" />
                                                           </div> 
                                                         </div>
                                                         </div>
                                                         <!-- fin de bloque-->
                                                         
                                                         
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">texto de slider</label>
                                                               <input type="text" class="form-control" id="texto" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                         

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_slider()"> <i class="fa fa-check"></i>Guardar</button>
                                                            </div>


                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                        
                        
                    </div>
                    
                   
                      
                      
                    <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">Duración de slider</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                        <form>
                        <!-- inicio de bloque-->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group m-b-10">
                            <label for="input1">Escriba en milisegundos</label>
                            <input type="number" class="form-control" id="tiempo" value="<?php echo $ftiempo['tiempo'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                            </div>
                            <span>Ej: 1000 corresponde a 1 segundo</span>  
                            </div>
                        </div>
                        <!-- fin de bloque-->
                        <hr>
                        <div class="form-actions m-t-40">
                        <button type="button" class="btn btn-success model_img" id="completartimpo" onclick="guardar_tiempo()"> <i class="fa fa-check"></i>Guardar</button>
                        </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div> 
                  
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">Ordenar Sliders</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                            <h4>Ordena o Elimina desde  aquí algún slider de tu web</h4>
                                     <hr>
                                      <div class="row">
                                        <ul id="cities" class="sortable">
                                        <?php
                                        $sql2= "SELECT *FROM sliders order by orden asc";
                                        $resul2= mysql_query($sql2);

                                        while($fila2= mysql_fetch_array($resul2)){
                                             
                                         ?>
                                         
                                        <li class="ui-state-default" id="city_<?php echo $fila2['id'] ?>" >
                                        <div class="col-sm-12 col-xs-12 div-right p-b-30">
                                            <a  style="cursor: pointer;"> <img  class="img-thumbnail img-responsive" alt="attachment" src="imagenes/slider/<?php echo $fila2['slider'] ?>" width="150px" height="100px"> </a>
                                            <button type="button" class="btn btn-warning btn-circle" id="" onclick="eliminar_slider(<?php echo $fila2['id'] ?>)"><i class="fa fa-times"></i> </button>
                                        </div>
                                    </li>
                                         <?php } ?>
                                     </ul>
                                  
                                  </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                   </div>
                <!--row -->
              <!-- /.row -->
                <div class="row ">          
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Sliders en tu página principal</div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <?php
                                     $sql = "SELECT *FROM sliders order by orden asc ";
                                        $resul= mysql_query($sql);
                                        $conta=0;

                                        while($fila = mysql_fetch_array($resul)){
                                        $conta = $conta +1;
                                         ?>

                                    <div class="item"><img src="imagenes/slider/<?php echo $fila['slider'] ?>" alt="sliders" width="1920px" height="700px"></div>


                                    <?php } 
                                    if($conta == '0'){ ?>
                                      <div class="item"><img src="imagenes/slider1.jpg" alt="sliders"></div>

                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                <!-- /.row -->
                
                
                
                
               
                
                
                
                
                
               
             
                
              
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
               
               
               
            <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Personalizar <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            
                            <ul id="themecolors" class="m-t-20">
                                <li><b>Elige color superior</b></li>
                                <li><a href="javascript:void(0)" theme="default" class="default-theme working">1</a></li>
                                <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                                <li><b>fondo oscuro de menú</b></li>
                                <br/>
                                <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    
   
    
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    
    
    <script src="../plugins/bower_components/jqueryui/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
    
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
    <!-- jQuery for carousel -->
    <script src="../plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
    <script src="../plugins/bower_components/owl.carousel/owl.custom.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    
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



         function guardar_slider(){
          $('#completar').attr('onclick','');
          var texto = document.getElementById("texto").value;
        
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('archivo', $('#foto')[0].files[0]);
                    paqueteDeDatos.append('texto', texto);
              
            $.ajax({
            type: "POST",
            url: "procesos/savesliders.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Slider Cargado!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'personalizar_sliders.php';
                    });

            });

           
         
                }


                function guardar_tiempo(){
          $('#completar').attr('onclick','');
          var tiempo = document.getElementById("tiempo").value;
        
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('tiempo', tiempo);
              
            $.ajax({
            type: "POST",
            url: "procesos/savesliderstiempo.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Tiempo Actualizado!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'personalizar_sliders.php';
                    });

            });

           
         
                }
        
        

function eliminar_slider(id){
         
          
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('id', id);
              
            $.ajax({
            type: "POST",
            url: "procesos/deletesliders.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Slider eliminado!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'personalizar_sliders.php';
                    });

            });

           
         
                }





    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#cities').sortable({
            revert: true,
            opacity: 0.6, 
            cursor: 'move',
            update: function() {
                var order = $('#cities').sortable("serialize")+'&action=orderState';
                $.post("procesos/ordenar_slider.php", order, function(theResponse){
                   // $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
                });
            }
        });
    });
</script>
    
    <!-- Sparkline chart JavaScript -->
   <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <!-- Draggable-portlet -->
    <script src="../plugins/bower_components/gridstack/gridstack.js"></script>
    <script src="../plugins/bower_components/gridstack/gridstack.jQueryUI.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.grid-stack').gridstack({
            width: 12,
            alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            resizable: {
                handles: 'e, se, s, sw, w'
            }
        });
    });
    </script>
    
    
    <!-- tabs -->
    <script src="js/cbpFWTabs.js"></script>
    <script type="text/javascript">
    (function() {

        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });

    })();
    </script>
    <!--fin tabs -->
    
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    
</body>

</html>
