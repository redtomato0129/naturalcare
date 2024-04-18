<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
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
                    <div class="col-md-4">
                        <h4>Multiplicador de Puntos por Categoría</h4>
                    </div>
                    <div class="col-md-6 pull-left">
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group m-b-10">
                                      <label for="input6">bronce</label>
                                            <select class="form-control p-0" id="input6" required>
                                                <option>seleccione</option>
                                                <option>0.5X</option>
                                                <option>1X</option>
                                                <option>1.5X</option>
                                                <option>2X</option>
                                                <option>2.5X</option>
                                                <option>3X</option>
                                                <option>3.5X</option>
                                                <option>4X</option>
                                                <option>4.5X</option>
                                                <option>5X</option>
                                                <option>5.5X</option>
                                                <option>6X</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                      <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group m-b-10">
                                      <label for="input6">Plata</label>
                                            <select class="form-control p-0" id="input6" required>
                                                <option>seleccione</option>
                                                <option>0.5X</option>
                                                <option>1X</option>
                                                <option>1.5X</option>
                                                <option>2X</option>
                                                <option>2.5X</option>
                                                <option>3X</option>
                                                <option>3.5X</option>
                                                <option>4X</option>
                                                <option>4.5X</option>
                                                <option>5X</option>
                                                <option>5.5X</option>
                                                <option>6X</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                      <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group m-b-10">
                                      <label for="input6">Oro</label>
                                            <select class="form-control p-0" id="input6" required>
                                                <option>seleccione</option>
                                                <option>0.5X</option>
                                                <option>1X</option>
                                                <option>1.5X</option>
                                                <option>2X</option>
                                                <option>2.5X</option>
                                                <option>3X</option>
                                                <option>3.5X</option>
                                                <option>4X</option>
                                                <option>4.5X</option>
                                                <option>5X</option>
                                                <option>5.5X</option>
                                                <option>6X</option>
                                            </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    </div>
                    
                    <hr>
                    
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="white-box">
                    <div class="col-md-4">
                        <h4>Rango de puntos para cada plan</h4>
                    </div>
                    <div class="col-md-6 pull-left">
                            <div class="col-sm-12 col-xs-12">
                                    <form>
                                        <label class="control-label m-t-20" for="example-input1-group2">Bronce</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-minus"></i></div>
                                                <input type="number" class="form-control" placeholder="valor mínimo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-plus"></i></div>
                                                <input type="number" class="form-control" placeholder="valor máximo">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <label class="control-label m-t-20" for="example-input1-group2">Plata</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-minus"></i></div>
                                                <input type="number" class="form-control" placeholder="valor mínimo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-plus"></i></div>
                                                <input type="number" class="form-control" placeholder="valor máximo">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <label class="control-label m-t-20" for="example-input1-group2">Oro</label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-minus"></i></div>
                                                <input type="number" class="form-control" placeholder="valor mínimo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-plus"></i></div>
                                                <input type="number" class="form-control" placeholder="valor máximo">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>         
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    </div>
                    
                    <hr>
                    
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="white-box">
                    <div class="col-md-4">
                        <h4>Puntos a acreditar por Cumpleaños</h4>
                        <p class="text-muted font-13">Bronce establecido en: <span class="text-success"> 20 Puntos </span> </p>
                        <p class="text-muted font-13">Plata establecido en: <span class="text-success"> 50 Puntos </span> </p>
                        <p class="text-muted font-13">Oro establecido en: <span class="text-success"> 100 Puntos </span> </p>
                       
                    </div>
                    <div class="col-md-6 pull-left">
                            <div class="col-sm-12 col-xs-12">
                                    <form>
                                     
                                        
                                      <label class="control-label m-t-20" for="example-input1-group2">Bronce</label>
                                       <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ingrese solo números" aria-describedby="basic-addon2">
                                            <span class="input-group-addon" id="basic-addon2">PUNTOS</span>
                                        </div>
                                        
                                        
                                        <label class="control-label m-t-20" for="example-input1-group2">Plata</label>
                                       <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ingrese solo números">
                                            <span class="input-group-addon" id="basic-addon2">PUNTOS</span>
                                        </div>
                                        
                                        <label class="control-label m-t-20" for="example-input1-group2">Oro</label>
                                       <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Ingrese solo números" aria-describedby="basic-addon2">
                                            <span class="input-group-addon" id="basic-addon2">PUNTOS</span>
                                        </div>
                                       
                                    </form>
                                </div>         
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="form-actions m-b-40">
                        <button type="button" class="btn btn-primary model_img" id="completar"> <i class="fa fa-check"></i>Guardar</button>
                    </div>
                    </div>
                   
                </div>
               
            
                  
                  
                
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


         function guardar_categoria(){
          $('#completar').attr('onclick','');
          var valor = document.getElementById("cupon").value;
         
        
           if(valor){
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('cupon', valor);
            $.ajax({
            type: "POST",
            url: "procesos/saveporcupon.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Correcto!",
                    text: msg,
                    type: "success" 
                    },
                    function(){
                   location.reload();
                    });

            });

          

           }else{

             swal("Alto!","Ingresa valor de cupon" , "error");
             $('#completar').attr('onClick', 'guardar_tienda();');

           }

         
                }


     function guardar_envio(){
          $('#completar').attr('onclick','');
          var valor = document.getElementById("envio").value;
         
        
           if(valor){
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('cupon', valor);
            $.ajax({
            type: "POST",
            url: "procesos/saveenviogratis.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Correcto!",
                    text: msg,
                    type: "success" 
                    },
                    function(){
                   location.reload();
                    });

            });

          

           }else{

             swal("Alto!","Ingresa el valor para envio gratis" , "error");
             $('#completar').attr('onClick', 'guardar_tienda();');

           }

         
        }



         function guardar_subcategoria(){
          $('#completar').attr('onclick','');
          var pago = document.getElementById("pago").value;
          var descuento = document.getElementById("descuento").value;
         
        
           if(pago != '0'){
              if(descuento){
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('pago', pago);
                    paqueteDeDatos.append('descuento', descuento);
            $.ajax({
            type: "POST",
            url: "procesos/saveporpago.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Correcto!",
                    text: msg,
                    type: "success" 
                    },
                    function(){
                   location.reload();
                    });

            });

          

           }else{

             swal("Alto!","Ingrese el Descuento" , "error");
             $('#completar').attr('onClick', 'guardar_tienda();');

           }
            }else{

             swal("Alto!","Seleccione Forma de Pago" , "error");
             $('#completar').attr('onClick', 'guardar_tienda();');

           }

         
                }

  function eliminar_categoria(id){


swal({   
            title: "Deseas Eliminarlo?",   
            text: "Si elimina la categoria se eliminar los productos asociados",   
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
            url: "procesos/deletecat.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Correcto!",
                    text: msg,
                    type: "success" 
                    },
                    function(){
                    location.reload();
                    });

            });

        });

        }
        


  function eliminar_subcategoria(id){


swal({   
            title: "Deseas Eliminarlo?",   
            text: "Si elimina la subcategoria se eliminar los productos asociados",   
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
            url: "procesos/deletesubcat.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Correcto!",
                    text: msg,
                    type: "success" 
                    },
                    function(){
                    location.reload();
                    });

            });

        });

        }
        




    </script>
    
    <script src="js/cbpFWTabs.js"></script>
    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>

<!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
  
  
    
</body>

</html>
