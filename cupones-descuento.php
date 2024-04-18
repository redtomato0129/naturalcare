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
    <title>Crear Cupones de descuento</title>
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
                    <div class="col-md-7">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Crear cupones de descuento</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                
                                
                                    
                             <form >
                           
                                     <hr>
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                     <div class="col-md-6 m-r-20">
                                     <div class="form-group m-b-40">
                                         <label for="input6">Elija el tipo de cupón:</label>    
                                        <select class="form-control p-0" id="tipo" required>
                                                <option></option>
                                                <option value="1">En porcentaje de descuento</option>
                                                <option value="2">Valor en dólares</option>
                                             </select><span class="highlight"></span> <span class="bar"></span>
                                        
                                        </div>
                                     </div>
                                     
                                     <div class="col-md-4">
                                        <div class="form-group m-b-40">
                                            <label for="input1">Indique el valor o porcentaje</label>
                                     <input type="text" class="form-control" id="valor" onKeyPress="return soloNumeros(event)" required><span class="highlight"></span> <span class="bar"></span>
                                        <span class="help-block"><small>Ingrese solo números</small></span>  
                                       </div>
                                       </div>
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                     
                                 
                                 
                                 
                                 
                             
                                 
                                 
                                     
                                     
                                     
                                     <hr>
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                     <div class="col-md-4">
                                        <div class="form-group m-b-40">
                                            <label for="detalle">Detalle del cupón</label>
                                     <input type="text" class="form-control" id="detalle" required><span class="highlight"></span> <span class="bar"></span>
                                        <span class="help-block"><small>para registro suyo</small></span>  
                                       </div>
                                       </div>
                                       
                                       <div class="col-md-4 m-b-40">
                                        <div class="form-group">
                                                       <label>aplicar en compras superiores a: </label> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-money"></i></div>
                                                            <input type="number" class="form-control" onKeyPress="return soloNumeros(event)" id="superior" placeholder="Precio"> </div>
                                                    </div>
                                       </div>
                                       
                                       <div class="col-md-4 m-b-40">
                                        <div class="form-group ">
                                            <label>periodo de validez: </label> 
                                             <div class="example">
                                         <input class="form-control input-daterange-datepicker" type="text" name="daterange" id="rango" value="" /> </div>
                                       </div>
                                       </div>

                                        <div class="col-md-4 m-b-40">
                                        <div class="form-group ">
                                            <label>Codigo de Cupón </label> 
                                             <div class="example">
                                         <input class="form-control"  type="text" name="codcupon" id="codcupon" value="" /> </div>
                                       </div>
                                       </div>

                                       <div class="col-md-4 m-b-40">
                                        <div class="form-group ">
                                            <label>Producto </label> 
                                             <select class="form-control p-0" id="producto" required>
                                                <option value="0">NO APLICA</option>
                                                <?php  
                                                $sproducto = "SELECT *FROM productos where estado ='1' order by nombre asc";
                                                $rproductos = mysql_query($sproducto);
                                                while($fproducto = mysql_fetch_array($rproductos)){
                                                ?>
                                                <option value="<?php echo $fproducto['id'] ?>"><?php echo $fproducto['nombre'] ?></option>
                                              <?php } ?>
                                                
                                             </select>
                                       </div>
                                       </div>
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                    <div class="form-actions m-t-40">
                                      <button type="button" class="btn btn-success model_img" id="completar" onclick="guardar_cupon()"> <i class="fa fa-check"></i>Crear Cupón</button>
                                    </div>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-md-5">
                        <div class="white-box">
                          
                         <div class="table-responsive">
                         </div>
                            <a href="historial-cupones.php"><button class="btn btn-block btn-success btn-rounded">Ver todos los publicados</button></a>
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
    
    <!-- Plugin JavaScript -->
    <script src="../plugins/bower_components/moment/moment.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="../plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="../plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="../plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
  $(document).ready(function () {
            // Smart Wizard 

    miFechaActual = new Date() 
    $('#rango').daterangepicker({
       minDate: miFechaActual,
     
      locale: {
      format: 'DD/MM/YYYY',
      daysOfWeek: [
        "Dom",
        "Lun",
        "Mar",
        "Mie",
        "Jue",
        "Vie",
        "Sáb"
    ],
    monthNames: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    ],
    }
});
        });

    // Daterange picker
   
    

      function guardar_cupon(){
          $('#completar').attr('onclick','');
          var detalle = document.getElementById("detalle").value;
          var valor = document.getElementById("valor").value;
          var tipo = document.getElementById("tipo").value;
          var rango = document.getElementById("rango").value;
          var superior = document.getElementById("superior").value;
          var codcupon = document.getElementById("codcupon").value;
          var producto = document.getElementById("producto").value;
         
          

            if(detalle){

                if(valor){

                    if(tipo){

                        if(superior){
                             if(rango){
                               if(codcupon){


                            var paqueteDeDatos = new FormData();
                            paqueteDeDatos.append('rango', rango);
                            paqueteDeDatos.append('detalle', detalle);
                            paqueteDeDatos.append('valor', valor);
                            paqueteDeDatos.append('tipo', tipo);
                            paqueteDeDatos.append('superior', superior);
                            paqueteDeDatos.append('codcupon', codcupon);
                            paqueteDeDatos.append('producto', producto);
                          
                    $.ajax({
                    type: "POST",
                    url: "procesos/savecupon.php",
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
                            window.location.href = 'cupones-descuento.php';
                            });

                    });

               }else{
             swal("Alto!","Ingresa un codigo de cupón" , "error");
             $('#completar').attr('onClick', 'guardar_cupon();');
            
           }

           }else{
             swal("Alto!","Ingresa un rango" , "error");
             $('#completar').attr('onClick', 'guardar_cupon();');
            
           }
            }else{
             swal("Alto!","Ingresa en que valor aplica" , "error");
             $('#completar').attr('onClick', 'guardar_cupon();');
            
           }
            }else{
             swal("Alto!","Ingresa el tipo " , "error");
             $('#completar').attr('onClick', 'guardar_cupon();');
            
           }

           }else{
            
             swal("Alto!","Ingresa un valor" , "error");
             $('#completar').attr('onClick', 'guardar_cupon();');
           }

           }else{

             swal("Alto!","Ingresa un detalle" , "error");
             $('#completar').attr('onClick', 'guardar_cupon();');

           }

         
                }
        

    </script>
    
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
    
    
    
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    
</body>

</html>
