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
    <title>Agregar tipos</title>
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
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

    
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
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Agregar tipo a: Multiplicador</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                               <form>
                           <hr>
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-9">
                                        <div class="form-group m-b-10">
                                        <label for="input1">Nombre del tipo</label>
                                           <input type="text" class="form-control" id="input1" required><span class="highlight"></span> <span class="bar"></span>
                                        </div>
                                        </div>
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                     
                                              
                                        <hr>
                                        <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success model_img" id="sa-success2"> <i class="fa fa-check"></i>Registrar</button>
                                        </div>
                                        
                                       
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-lg-7 col-sm-6">
                      
                            
                          
                                 <div class="white-box">
                                     <h3 class="box-title">Tipos publicados</h3>
                            <div class="table-responsive">
                                <table class="table product-overview" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                             <th>tipos</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>1X</td>
                                            <td><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>02</td>
                                            <td>2X</td>
                                            <td><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>03</td>
                                            <td>3X</td>
                                            <td><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></td>
                                        </tr>
                                        
                                        
                                        
                                       
                                        
                                    </table><br><br>
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
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/widget.js"></script>

  
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
