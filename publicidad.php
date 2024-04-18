<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    
      include('config/app_config.php');
      $sadmin = "SELECT *FROM usuario_admin";
      $radmin = mysql_query($sadmin);
      $fadmin = mysql_fetch_array($radmin);

    $scat = "SELECT *FROM subcategorias WHERE estado='1'";
    $rcat = mysql_query($scat);
     
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
    <title>Sección destacada</title>
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
    
    <link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
   
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    
    
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
    
    <div id="wrapper">
        
       <?php include('menu.php'); ?>
        <!-- final Left navbar-header -->
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- breadcup-->
                <div class="row bg-title" style="background: url(imagenes/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title" style="color: #FFF;">Sección de línea destacada en home</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
               </div>
            <!-- breadcup-->
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">gestiona lo siguiente:</div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="imagenes/imagenes_secundarias.jpg" alt="sliders"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    
                
                    
                    
                    <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">título de sección</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                <div class="form-group m-b-10">
                                  <label for="input1">ingresa el texto</label>
                                  <input type="text" class="form-control" id="titulo" required><span class="highlight"></span> <span class="bar"></span>
                                </div>
                                <hr>
                                 <div class="form-actions m-t-40">
                                  <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_titulo()"> <i class="fa fa-check"></i>Guardar</button>
                                 </div>
                            </div>
                        </div>
                    </div>
                   </div>
                   
                   
                   
                   <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">Sección A</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                <div class="row">
                    <div class="col-md-12 mg-bottom-20">
                        <span>ingresa la foto a continuación</span>
                        <input type="file" id="foto" class="dropify" data-default-file=" imagenes/upload_slider.jpg" />
                        <label for="input-file-now-custom-1">Tamaño: 8000 x 933 pixeles</label>
                    </div>
                            <hr>
                                 <div class="form-actions m-t-40">
                                  <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_a()"> <i class="fa fa-check"></i>Guardar</button>
                                 </div>      
                                </div>
                            </div>
                           
                        </div>
                    </div>
                   </div>
                   
                   
                   <div class="col-md-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">Sección B</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                
                                
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                              
                                     
                                    <div class="col-xs-12">
                                     <div class="form-group ">
                                      <label for="input6">Sub-Categoria</label>
                                            <select class="form-control p-0" id="categoria" onchange="buscar_pro()" required>
                                               <option value="0" selected="selected">SELECCIONE</option>
                                              <?php 
                                              while($fcat = mysql_fetch_array($rcat)){
                                              ?>
                                              <option value="<?php echo $fcat['id'] ?>"><?php echo $fcat['descripcion']; ?></option>
                                              <?php } ?>
                                             </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                     </div>
                                     
                                     
                                     <div class="col-xs-12" id="pro">
                                     <div class="form-group">
                                     <label for="input6">Elije 4 productos</label>
                                     <select class="select2 m-b-10 select2-multiple" id="productos" multiple="multiple" data-placeholder="Seleccione solo 4 productos">
                                   <option value="0" >SELECCIONE</option>
                                   
                                   </select>
                                     </div>
                                  
                                    </div>
                                        <hr>
                                 <div class="form-actions m-t-40">
                                  <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_b()"> <i class="fa fa-check"></i>Guardar</button>
                                 </div>
                                     
                                </div>
                                </div>
                                     
                                     
                                  
                                     
                                  
                                     
                                   
                                     
                                 
                                     <!-- fin de bloque-->
                                     
                                     
                        </div>
                    </div>
                   </div>
                   
                   
                <!-- /.row -->
                
            
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
    
    
  
  
  
  
     <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });
        // For select 2

        $(".select2").select2();
    

        // For multiselect

        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });

        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });

    });

         function guardar_titulo(){
          //$('#completar').attr('onclick','');
          var texto = document.getElementById("titulo").value;
        
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('texto', texto);
              
            $.ajax({
            type: "POST",
            url: "procesos/savetitle.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Titulo Guardado!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                  // window.location.href = '.php';
                    });

            });

           
         
                }


         function guardar_a(){
          
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('archivo', $('#foto')[0].files[0]);
                   
              
            $.ajax({
            type: "POST",
            url: "procesos/savea.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Foto Cargada!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                     });

            });

           
         
                }

         function buscar_pro()
            {
                    var cat = document.getElementById("categoria").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('pais', cat);
              
            $.ajax({
            type: "POST",
            url: "procesos/buscar_prop.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#pro").html(msg);
                     $(".select2").select2({
                        maximumSelectionLength: 4
                });
           
         
                }); 
            }


            function guardar_b(){
                 var productos = ':;:';
            $('#productos option:selected').each(function(){
            productos += $(this).val() + ':;:'; 
            });
            fin = productos.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
          
          
                 var texto = productos;
        
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('texto', texto);
       
                   
              
            $.ajax({
            type: "POST",
            url: "procesos/saveb.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Productos Cargados!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                     });

            });

           
         
                }
        
        
    </script>
    
   
   
   
   
   
   
   
   
    
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    
</body>

</html>
