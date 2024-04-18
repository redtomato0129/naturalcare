<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
 //HISTORIAL DE PUNTOS
        $getRecompensas = "SELECT * FROM recompensas  ORDER BY id asc";
        $rRecompensas = mysql_query($getRecompensas); 
        $fRecompensas = mysql_fetch_array($rRecompensas);      
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
    <title>Recompensas</title>
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
 
 
<!-- Date picker plugins css -->
    <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="../plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    
    
     
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
                        <h4 class="page-title" style="color: #FFF;">Recompensas</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> Gestionar Recompensas</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                
                                
                                    
                             <form >
                                    <hr>
                                    <!-- inicio de bloque-->
                                    <div class="row">
                                        <div class="col-md-6 m-b-40">
                                            <div class="form-group">
                                                <label>Monto en dólares: </label> 
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-money"></i></div>
                                                    <input type="number" class="form-control"  id="superior" placeholder="valor"> 
                                                </div>
                                            </div>
                                       </div>
                                       
                                        <div class="col-md-6 m-b-40">
                                            <div class="form-group">
                                                <label>Equivale a esta cantidad de puntos</label> 
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-wand"></i></div>
                                                    <input type="number" class="form-control"  id="valpts" placeholder="puntos">
                                                </div>
                                            </div>
                                       </div>
                                   
                                    </div>
                                    <!-- fin de bloque-->
                                     
                                     
                                    <div class="row">
                                        <div class="col-md-6 m-b-40">
                                            <div class="form-group">
                                                <label>Valor mínimo para poder usarlo: </label> 
                                                <div class="input-group">
                                                    <input type="number" class="form-control"  id="minimo" placeholder="valor mínimo">
                                                    <input type="hidden" class="form-control"  id="editid" value="0">
                                                </div>
                                                <p class="text-muted m-b-40">cantidad mínima de compra que debe tener en la cesta el cliente para poder aplicarlo</p>
                                            </div>
                                        </div>
                                    </div>
                                     
                                     
                                    <div class="form-actions m-t-40">
                                      <button type="button" class="btn btn-success model_img d-none" id="editar"> <i class="fa fa-check"></i> Editar</button>
                                      <button type="button" class="btn btn-primary model_img" id="completar"> <i class="fa fa-plus"></i> Crear Nuevo</button>
                                    </div>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>                    
                    
                    <div class="col-md-5">
                        <div class="white-box">
                        <h3 class="box-title">Recompensas publicadas</h3>  
                            <div class="table-responsive">
                                <table class="table product-overview" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Descripción</th>
                                            <th>Valor mínimo</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  while($laRecompensa = (mysql_fetch_array($rRecompensas))){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $laRecompensa['descripcion'] ?></td>
                                            <td>$ <?php echo $laRecompensa['min_uso'] ?></td>
                                            <td><span class="accion">
                                                <a href="#" class="edit" data-valmin="<?php echo $laRecompensa['min_uso'] ?>" data-usd="<?php echo $laRecompensa['valor_usd'] ?>" data-pts="<?php echo $laRecompensa['pts_equiv'] ?>" data-id="<?php echo $laRecompensa['id'] ?>" id="edit-<?php echo $laRecompensa['id'] ?>">Editar</a>  | 
                                                <a href="#" class="borrar" data-id="<?php echo $laRecompensa['id'] ?>" id="borrar-<?php echo $laRecompensa['id'] ?>">Eliminar</a> </span>
                                            </td>
                                        </tr>
                                    <?php }  ?>                               
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
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Plugin JavaScript -->

    <script>
    $(document).ready  
      
        /////////////////// EVENTO CLICK EDITAR ///////////////////////
        $('.edit').on('click', function (e) {
            edid = event.target.id; //obtenemos el id del objeto al que le dimos click
            var edUSD = document.getElementById(edid).getAttribute('data-usd'); //tomamos el precio que esta en data atributo
            var edPTS = document.getElementById(edid).getAttribute('data-pts'); //tomamos los puntos que esta en data atributo
            var edMIN = document.getElementById(edid).getAttribute('data-valmin'); //tomamos valor minimo que esta en data atributo
            var edID = document.getElementById(edid).getAttribute('data-id'); //tomamos el id que esta en data atributo
            document.getElementById("superior").value = edUSD; //llenamos el campo con el valor
            document.getElementById("valpts").value = edPTS; //llenamos el campo con el valor
            document.getElementById("minimo").value = edMIN; //llenamos el campo con el valor
            document.getElementById("editid").value = edID; //llenamos el campo con el valor
            $("#editar").removeClass('d-none');
        });
        /////////////////// CREAR ///////////////////////
        $('#completar').on('click', function () {
            var valorUSD = document.getElementById("superior").value;
            var valorPTS = document.getElementById("valpts").value;
            var minval = document.getElementById("minimo").value;

            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('valor_usd', valorUSD);
            paqueteDeDatos.append('pts_equiv', valorPTS);
            paqueteDeDatos.append('min_uso', minval);
            paqueteDeDatos.append('max_uso', '50');
            paqueteDeDatos.append('descripcion', '$'+valorUSD+'de Descuento'+'('+valorPTS+' Puntos)');
                  
            $.ajax({
                type: "POST",
                url: "procesos/recompensas_crud.php",
                contentType: false,
                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                processData: false,
                cache: false, 
            }).done(function( msg ) {
                alert(msg);
                setTimeout(function() {
                   window.location.href = 'recompensas.php'; 
               }, 1000);
                  
                });
        });
        /////////////////// EDITAR ///////////////////////
        $('#editar').on('click', function () {
            var evalorUSD = document.getElementById("superior").value;
            var evalorPTS = document.getElementById("valpts").value;
            var eminval = document.getElementById("minimo").value;
            var ed_id = document.getElementById("editid").value;

            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('valor_usd', evalorUSD);
            paqueteDeDatos.append('pts_equiv', evalorPTS);
            paqueteDeDatos.append('min_uso', eminval);
            paqueteDeDatos.append('id', ed_id);
            paqueteDeDatos.append('max_uso', '50');
            paqueteDeDatos.append('descripcion', '$'+evalorUSD+'de Descuento'+'('+evalorPTS+' Puntos)');
                  
            $.ajax({
                type: "POST",
                url: "procesos/recompensas_update.php",
                contentType: false,
                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                processData: false,
                cache: false, 
            }).done(function( msg ) {
                alert(msg);
                setTimeout(function() {
                   window.location.href = 'recompensas.php'; 
               }, 1000);
                  
                });
        });
        /////////////////// BORRAR ///////////////////////
        $('.borrar').on('click', function (e) { // esto funciona con data atributos
            edid2 = event.target.id; //obtenemos el id del objeto al que le dimos click
            var ed_ID = document.getElementById(edid2).getAttribute('data-id'); //tomamos el id que esta en data atributo
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('id', ed_ID);
            $.ajax({
                type: "POST",
                url: "procesos/delete_recompensas.php",
                contentType: false,
                data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                processData: false,
                cache: false, 
            }).done(function( msg ) {
                alert(msg);
                setTimeout(function() {
                   window.location.href = 'recompensas.php'; 
               }, 1000);
                });
        });                 
    
    </script>
</body>
</html>
