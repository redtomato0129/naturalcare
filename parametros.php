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
    <title>Parámetros</title>
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
                        <h4 class="page-title" style="color: #FFF;">Parametros Generales</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                   <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <section>
                                <div class="sttabs tabs-style-bar">
                                    <nav>
                                        <ul>
                                            <li><a href="#section-bar-1" class="sticon ti-layers"><span>Registro</span></a></li>
                                            <li><a href="#section-bar-2" class="sticon ti-layers"><span>Pagos</span></a></li>
                                            <li><a href="#section-bar-3" class="sticon ti-layers"><span>Envio</span></a></li>
                                            <li><a href="#section-bar-4" class="sticon ti-layers"><span>Cupón reseñas</span></a></li>
                                            </ul>
                                    </nav>
                                    <div class="content-wrap">
                                        <section id="section-bar-1">
                                                <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Gestionar Registro</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                               <h3>Porcentaje del Cup&oacute;n de descuento al registrarse</h3>
                                                         <hr>
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Porcentaje</label>
                                                               <input type="number" class="form-control" id="cupon" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                         

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               
                                                            <button type="button" class="btn btn-success model_img" onclick="guardar_categoria()"> <i class="fa fa-check"></i>Guardar</button>
                                                            </div>


                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-lg-7 col-sm-6">



                                                     <div class="white-box">
                                                         <h3 class="box-title">Porcentaje de Registro</h3>
                                                         <hr>
                                                <div class="table-responsive">
                                                    <table class="table product-overview" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Valor</th>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                        $sql = "SELECT *FROM registro";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $fila['valor'] ?>%</td>
                                           
                                            
                                        </tr>
                                        
                                       <?php } ?>
                                        





                                                       </tbody>
                                                    </table><br><br>
                                                </div>
                                            </div>




                                        </div>


                                     </div>
                                    <!--row -->
                
                                        </section>

                                        <section id="section-bar-2">
                                                <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Descuento en dep/transferencia</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                               
                                                          <!-- inicio de bloque-->
                                                          <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Categoria</label>
                                                               <select class="form-control p-0" id="pago" required="">
                                                                <option value="Depósito/transferencia">Depósito/transferencia</option>
                                                               
                                                               
                                                             </select>
                                                               <span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Descuento (%)</label>
                                                               <input type="text" class="form-control" id="descuento" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                        

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               
                                                            <button type="button" class="btn btn-success model_img" onclick="guardar_subcategoria()"> <i class="fa fa-check"></i>Guardar</button>
                                                            </div>


                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-lg-7 col-sm-6">



                                                     <div class="white-box">
                                                         <h3 class="box-title">Categorías Publicadas</h3>
                                                         <hr>
                                                <div class="table-responsive">
                                                    <table class="table product-overview" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Pago</th>
                                                                <th>Valor</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                        $sql = "SELECT * FROM descuentos";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td><?php echo $fila['id'] ?></td>
                                            <td><?php echo $fila['pago'] ?></td>
                                            <td><?php echo $fila['valor'] ?>%</td>
                                           
                                        </tr>
                                        
                                       <?php } ?>
                                        





                                                       </tbody>
                                                    </table><br><br>
                                                </div>
                                            </div>




                                        </div>


                                     </div>
                                    <!--row -->
                
                                        </section>
                                      
                            <section id="section-bar-3">
                                                <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Gestionar Envio</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                               <h3>Valor minimo para envio Gratis</h3>
                                                         <hr>
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Valor</label>
                                                               <input type="number" class="form-control" id="envio" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                         

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               
                                                            <button type="button" class="btn btn-success model_img" onclick="guardar_envio()"> <i class="fa fa-check"></i>Guardar</button>
                                                            </div>


                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-lg-7 col-sm-6">



                                                     <div class="white-box">
                                                         <h3 class="box-title">Valor envio Gratis</h3>
                                                         <hr>
                                                <div class="table-responsive">
                                                    <table class="table product-overview" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Valor</th>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                        $sql = "SELECT *FROM envio_gratis";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td>1</td>
                                            <td>$ <?php echo number_format($fila['valor'],2) ?></td>
                                           
                                            
                                        </tr>
                                        
                                       <?php } ?>
                                        





                                                       </tbody>
                                                    </table><br><br>
                                                </div>
                                            </div>




                                        </div>


                                     </div>
                                    <!--row -->
                
                                        </section>
                                 
                                       <section id="section-bar-4">
                                                <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Gestionar Reseñas</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                               <h3>Porcentaje del Cup&oacute;n de descuento en reseñas</h3>
                                                         <hr>
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Porcentaje</label>
                                                               <input type="number" class="form-control" id="cupon" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                         

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               
                                                            <button type="button" class="btn btn-success model_img" onclick="guardar_categoria()"> <i class="fa fa-check"></i>Guardar</button>
                                                            </div>


                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-lg-7 col-sm-6">



                                                     <div class="white-box">
                                                         <h3 class="box-title">Porcentaje de Descuento</h3>
                                                         <hr>
                                                <div class="table-responsive">
                                                    <table class="table product-overview" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Valor</th>
                                                               
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                        $sql = "SELECT *FROM registro";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $fila['valor'] ?>%</td>
                                           
                                            
                                        </tr>
                                        
                                       <?php } ?>
                                        





                                                       </tbody>
                                                    </table><br><br>
                                                </div>
                                            </div>




                                        </div>


                                     </div>
                                    <!--row -->
                
                                        </section>
     
                                        
                                    </div>
                                    <!-- /content -->
                                </div>
                                <!-- /tabs -->
                            </section>
                         
                          
                        
                      
                        
                   
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
