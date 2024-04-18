<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    if(is_numeric($_GET['idcate']) && $_GET['idcate'] > 0)
    {
        $scat = "SELECT *FROM categorias WHERE estado='1' and id=".$_GET['idcate'];
        $rcat = mysql_query($scat);
        $fcat = mysql_fetch_array($rcat);
    }
     if(is_numeric($_GET['idsub']) && $_GET['idsub'] > 0)
    {
        $ssub = "SELECT *FROM subcategorias WHERE estado='1' and id=".$_GET['idsub'];
        $rsub = mysql_query($ssub);
        $fsub = mysql_fetch_array($rsub);
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
    <title>Publicar Categorías y subcategorías</title>
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
                        <h4 class="page-title" style="color: #FFF;">Gestionar Categorías y subcategorías</h4>
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
                                            <li><a href="#section-bar-1" class="sticon ti-layers"><span>Categorías</span></a></li>
                                            <li><a href="#section-bar-2" class="sticon ti-layers"><span>Sub-Categorías</span></a></li>
                                            </ul>
                                    </nav>
                                    <div class="content-wrap">
                                        <section id="section-bar-1">
                                                <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Gestionar Categorías</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                               <h3>Publicar Nueva Categoría</h3>
                                                         <hr>
                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Nombre de la Categoría</label>
                                                               <input type="text" class="form-control" id="categoria" value="<?php echo $fcat['descripcion'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                         

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               
                                                            <button type="button" class="btn btn-success model_img" onclick="editar_categoria(<?php echo $fcat['id'] ?>)"> <i class="fa fa-check"></i>Guardar</button>
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
                                                                <th>Categoría</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                        $sql = "SELECT *FROM categorias where estado='1'";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td><?php echo $fila['id'] ?></td>
                                            <td><?php echo $fila['descripcion'] ?></td>
                                           
                                            <td>
                                            <div class="btn-group m-r-10">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Acción <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="categorias_subcategorias_edit.php?idcate=<?php echo $fila['id'] ?>">Editar</a></li>
                                        <li style="cursor: pointer;"><a onclick="eliminar_categoria(<?php echo $fila['id'] ?>)"  >Eliminar</a></li>
                                         </ul>
                                </div>
                                            </td>
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
                                                <div class="panel-heading">Gestionar Sub-Categorías</div>
                                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                                    <div class="panel-body">
                                                   <form>
                                               <h3>Publicar Nueva Sub-Categoría</h3>
                                                         <hr>
                                                          <!-- inicio de bloque-->
                                                          <div class="row">
                                                            <div class="col-md-9">
                                                            <div class="form-group m-b-10">
                                                            <label for="input1">Categoria</label>
                                                               <select class="form-control p-0" id="categoriasub" required="">
                                                                <option value="0">seleccione</option>
                                                                <?php
                                                                  $sql = "SELECT *FROM categorias where estado='1'";
                                                                  $resul= mysql_query($sql);

                                                                  while($fila = mysql_fetch_array($resul)){

                                                                   ?>

                                                                    <option value="<?php echo $fila['id'] ?>" <?php if($fsub['categoria'] == $fila['id']){ ?> selected <?php } ?>><?php echo $fila['descripcion'] ?></option>
                                                                <?php } ?>
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
                                                            <label for="input1">Nombre de la Sub-Categoría</label>
                                                               <input type="text" class="form-control" id="subcategoria" value="<?php echo $fsub['descripcion'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                                            </div>
                                                            </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                         <!-- inicio de bloque-->
                                                         <div class="row">
                                                         <div class="col-sm-6 ol-md-6 col-xs-12">
                                                           <div class="white-box ">
                                                            <h3 class="box-title">Imagen de menú de navegación</h3>
                                                            <label for="input-file-now-custom-1">Dimensiones: 200 X 200 pixeles</label>
                                                            <input type="file" id="foto" class="dropify" data-default-file="imagenes/upload3.jpg" />
                                                           </div> 
                                                         </div>
                                                         </div>
                                                         <!-- fin de bloque-->

                                                      <hr>
                                                            <div class="form-actions m-t-40">
                                                               
                                                            <button type="button" class="btn btn-success model_img" onclick="editar_subcategoria(<?php echo $fsub['id'] ?>)"> <i class="fa fa-check"></i>Guardar</button>
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
                                                                <th>Categoría</th>
                                                                <th>Sub-Categoría</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                        $sql = "SELECT a.*,b.descripcion as categoria FROM subcategorias as a
                                                LEFT JOIN categorias as b ON (a.categoria=b.id)
                                                WHERE a.estado='1'";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td><?php echo $fila['id'] ?></td>
                                            <td><?php echo $fila['categoria'] ?></td>
                                            <td><?php echo $fila['descripcion'] ?></td>
                                           
                                            <td>
                                            <div class="btn-group m-r-10">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Acción <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="categorias_subcategorias_edit.php?idsub=<?php echo $fila['id'] ?>">Editar</a></li>
                                        <li style="cursor: pointer;"><a onclick="eliminar_subcategoria(<?php echo $fila['id'] ?>)"  >Eliminar</a></li>
                                         </ul>
                                </div>
                                            </td>
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


         function editar_categoria(id){
          $('#completar').attr('onclick','');
          var nombre = document.getElementById("categoria").value;
         
        
           if(nombre){
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('id', id);
            $.ajax({
            type: "POST",
            url: "procesos/updatecat.php",
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

             swal("Alto!","Ingresa un nombre para la categoria" , "error");
             $('#completar').attr('onClick', 'guardar_tienda();');

           }

         
                }


         function editar_subcategoria(id){
          $('#completar').attr('onclick','');
          var nombre = document.getElementById("subcategoria").value;
          var cat = document.getElementById("categoriasub").value;
         
        
           if(cat != '0'){
              if(nombre){
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('archivo', $('#foto')[0].files[0]);
                    paqueteDeDatos.append('nombre', nombre);
                    paqueteDeDatos.append('categoria', cat);
                     paqueteDeDatos.append('id', id);
            $.ajax({
            type: "POST",
            url: "procesos/updatesubcat.php",
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

             swal("Alto!","Ingresa un nombre para la subcategoria" , "error");
             $('#completar').attr('onClick', 'guardar_tienda();');

           }
            }else{

             swal("Alto!","Seleccione una categoria" , "error");
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
