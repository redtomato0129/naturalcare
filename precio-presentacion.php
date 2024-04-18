<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    $scat = "SELECT *FROM subcategorias WHERE estado='1'";
    $rcat = mysql_query($scat);

    $spropre = "SELECT a.*,b.nombre as producto,c.descripcion as categoria FROM productos_presentacion as a
    LEFT JOIN productos as b ON (a.producto=b.id)
    LEFT JOIN subcategorias as c ON (b.subcategoria = c.id)
    WHERE a.estado='1'";
    $rpropre = mysql_query($spropre);
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
    <title>Asociar precio y presentación</title>
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
                            <div class="panel-heading">Asociar valores a tipo de medidas/presentación</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                               <form>
                         
                                     <hr>
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group m-b-40">
                                      <label for="input6">Sub-Categoría</label>
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
                                     </div>
                                     <!-- fin de bloque-->
                                   
                                   <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9" id="pro">
                                            <div class="form-group m-b-40">
                                             <label for="input6">Productos</label>
                                            <select class="form-control p-0" id="producto" onchange="buscar_presentacion()" required>
                                                <option>SELECCIONE</option>
                                                </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9" id="pre">
                                            <div class="form-group m-b-40">
                                      <label for="input6">Presentación</label>
                                            <select class="form-control p-0" id="presentacion" required>
                                                <option>SELECCIONE</option>
                                                
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
                                            <input type="text" class="form-control" id="valor" placeholder="solo números" onKeyPress="return soloNumeros(event)" required="">
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                   
                              
                                 
                                       
                               
                                     
                                              
                                        <hr>
                                        <div class="form-actions m-t-40">
                                       <input type="button" class="btn btn-success model_img" onclick="guardar_precio()" id="completar" value="GUARDAR PRECIO" />
                                        </div>
                                        
                                       
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-lg-7 col-sm-12">
                      
                            
                          
                                 <div class="white-box">
                                     <h3 class="box-title">Productos con precios asociados a medida/presentación</h3>
                                     <hr>
                            <div class="table-responsive">
                                <table class="table product-overview" id="myTable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Sub-Categoría</th>
                                            <th>Producto</th>
                                            <th>Presentación</th>
                                            <th>Precio</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php while($fpropre = mysql_fetch_array($rpropre)){ ?>
                                        <tr>
                                            <td><?php echo $fpropre['categoria'] ?></td>
                                            <td><?php echo $fpropre['producto'] ?></td>
                                            <td><?php echo $fpropre['presentacion'] ?></td>
                                            <td>$<?php echo number_format($fpropre['precio'],2) ?></td>
                                            <td><a href="precio-presentacion_edit.php?id=<?php echo $fpropre['id'] ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Editar"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Borrar" data-toggle="tooltip" onclick="eliminar(<?php echo $fpropre['id'] ?>)" ><i class="ti-trash"></i></a>
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

         function buscar_pro()
            {
                    var cat = document.getElementById("categoria").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('pais', cat);
              
            $.ajax({
            type: "POST",
            url: "procesos/buscar_pro.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#pro").html(msg);
           
         
                }); 
            }

            function buscar_presentacion()
            {
                    var pro = document.getElementById("producto").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('pais', pro);
              
            $.ajax({
            type: "POST",
            url: "procesos/buscar_presentacion.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#pre").html(msg);
           
         
                }); 
            }


           function guardar_precio()
            {
              var producto = document.getElementById('producto').value;
              var presentacion = document.getElementById('presentacion').value;
              var valor = document.getElementById('valor').value;
              
              var paqueteDeDatos = new FormData();
              if(producto != '0'){
                  if(presentacion != '0'){
                    if(valor != ''){
                        paqueteDeDatos.append('producto', producto);
                        paqueteDeDatos.append('presentacion', presentacion);
                        paqueteDeDatos.append('valor', valor);
                    
                    $.ajax({
                    type: "POST",
                    url: "procesos/savepreci.php",
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
                                         window.location.href='precio-presentacion.php'
                                        });
                   
                 
                        }); 
              }else{
            swal("Alto!","Ingresa un precio" , "error");
            $('#completar').attr('onClick', 'guardar_precio();');
            
           }
            }else{
            swal("Alto!","Seleciona una Presentacion" , "error");
            $('#completar').attr('onClick', 'guardar_precio();');
            
           }
            }else{
            swal("Alto!","Seleciona un Producto" , "error");
            $('#completar').attr('onClick', 'guardar_precio();');
            
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
            url: "procesos/deletepropre.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Precio Inactivo!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'precio-presentacion.php';
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
