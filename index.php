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
    <title>Inicio Administrador</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="../plugins/bower_components/css-chart/css-chart.css" rel="stylesheet">
    <!--Owl carousel CSS -->
    <link href="../plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- Wizard CSS -->
    <!--<link href="../plugins/bower_components/register-steps/steps.css" rel="stylesheet">-->
    <!-- upload de foto-->  
    <link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Wizard externo-->
    <link href="css/wizard/wizard.css" id="theme" rel="stylesheet">
    
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
                
         
         
     
           
           
           
           <!-- .resumen y slider -->
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">PRODUCTOS PUBLICADOS</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="linea-icon linea-basic fa-fw fa fa-shopping-bag text-info"></i></li>
                                        <li class="text-right"><span class="counter"><?php echo $conpro; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Usuarios Registrados</h3>
                                    <ul class="list-inline two-part">
                                        <li><i class="linea-icon linea-basic fa-fw fa fa-user text-purple"></i></li>
                                        <li class="text-right"><span class="counter"><?php echo $conuser; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>
                <!-- /.fin resumen y slider -->
                
                
              
               
                <!--ultimo publicado y ultimos pedidos -->
                <div class="row">
                
                   <!--ultimo publicado-->
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Últimos productos publicados (solo los últimos 3)</h3>
                            <div class="table-responsive">
                               <table class="table product-overview" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                            <th>Foto</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT *FROM productos where estado='1' limit 3";
                                        $resul= mysql_query($sql);

                                        while($fila = mysql_fetch_array($resul)){

                                         ?>
                                        <tr>
                                            <td><?php echo $fila['nombre'] ?></td>
                                            <td><?php echo $fila['codigo'] ?></td>
                                            <td> <img src="imagenes/productos/<?php echo $fila['foto_uno'] ?>" alt="iMac" width="80"> </td>
                                            <td><a href="editar_producto.php?id=<?php echo $fila['id'] ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Editar"><i class="ti-marker-alt"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Borrar" data-toggle="tooltip" onclick="eliminar(<?php echo $fila['id'] ?>)" ><i class="ti-trash"></i></a></td>
                                        </tr>
                                           
                                       <?php } ?>
                                        
                                        
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                    </div>
                   <!--fin ultimo publicado-->
                    
                    <!-- ultimos pedidos-->
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Últimos Pedidos (solo los últimios 5)
                              
                            </h3>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th># de pedido</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                  <!--  <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">453231</td>
                                            <td><span class="label label-orden-recibida font-weight-100">orden recibida</span> </td>
                                            <td class="txt-oflo">18-10-2019</td>
                                            <td><span class="text-success">$25.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td class="txt-oflo">453232</td>
                                            <td><span class="label label-solicitado font-weight-100">entregado al courier</span></td>
                                            <td class="txt-oflo">09-02-2018</td>
                                            <td><span class="text-success">$20.00</span></td>
                                        </tr>
                                       
                                        <tr>
                                            <td>4</td>
                                            <td class="txt-oflo">Sandalia Marlene</td>
                                            <td><span class="label label-entregado font-weight-100">Entregado con éxito</span></td>
                                            <td class="txt-oflo">21-02-2018</td>
                                            <td><span class="text-success">$24.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td class="txt-oflo">Tacón Leopardo</td>
                                            <td><span class="label label-cancelado font-weight-100">Cancelado</span></td>
                                            <td class="txt-oflo">27-02-2018</td>
                                            <td><span class="text-success">$34.00</span></td>
                                        </tr>
                                        
                                    </tbody>-->
                                </table> <a href="pedidos.php">Ver todas las ventas</a> </div>
                        </div>
                    </div>
                    <!-- fin ultimos pedidos-->
                </div>
                <!-- /ultimo publicado y ultimos pedidos -->
            
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
    <!--weather icon -->
    <script src="../plugins/bower_components/skycons/skycons.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- jQuery for carousel -->
    <script src="../plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
    <script src="../plugins/bower_components/owl.carousel/owl.custom.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/widget.js"></script>

    <!-- wizard-->
    <!--<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="../plugins/bower_components/register-steps/jquery.easing.min.js"></script>
    <script src="../plugins/bower_components/register-steps/register-init.js"></script>-->
    
    
    <!-- wizard externo-->
    <!-- form wizard -->
    <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Smart Wizard 	
            $('#wizard').smartWizard();

            function onFinishCallback() {
                $('#wizard').smartWizard('showMessage', 'Finish Clicked');
                //alert('Finish Clicked');
            }
        });

        $(document).ready(function () {
            // Smart Wizard	
            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

        });
    </script>
    
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
