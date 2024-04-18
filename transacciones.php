<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    $spay = "SELECT codigo,autorizacion,detalle FROM pymentez  group by 1,2,3";
    $Resul = mysql_query($spay);

   
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
    <title>Transacciones</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
     <link href="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
  
 <!-- switcher -->
      <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
 <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
 <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    
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
                        <h4 class="page-title" style="color: #FFF;">Transacciones Tarjetas de crédito/débito</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    
               </div>
            <!-- breadcup-->
                
                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table product-overview" id="myTable">
                                   
                                        <tr>
                                            <th>Titular</th>
                                            <th>Email</th>
                                            <th>Tipo</th>
                                            <th>Transacción</th>
                                            <th>Autorización</th>
                                            <th>Valor</th>
                                            <th>Código</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                        </tr>
                                    
                                 
<?php   while($fil=mysql_fetch_array($Resul)) { 
$json = json_decode($fil['detalle'],true);

foreach ($json["transaction"] as $k => $v) {
    if($k == 'amount') {
    $valor=$v;
}else{
if($k == 'date')
{
    $date=$v;
}else
{
    if($k == 'message')
{
    $stado=$v;
}else
{
 if($k == 'carrier_code')
{
    $codi=$v;
}else
{
if($k == 'installments')
{
    $insta=$v;
}else
{
    
} 
}
}
}
}
}

foreach ($json["card"] as $k => $v) {
    
    if($k == 'type')
{
    $tipo=$v;
}else
{
    if($k == 'holder_name')
{
    $titular=$v;
}else
{

    
} 
}
}

foreach ($json["user"] as $k => $v) {
    
    if($k == 'email')
{
    $email=$v;
}else
{

    
}
}
if($fil['autorizacion'] == "")
{
    $fil['autorizacion']="Sin Autorización";
}
?>
<tr>
                  
                <td><?php echo strtoupper($titular); ?></td>
                <td><?php echo $email; ?></td>   
                <td><?php echo strtoupper($tipo); ?></td>
                <td><?php echo $fil['codigo'] ?></td>
                <td> <?php echo $fil['autorizacion'] ?></td>
                <td>$ <?php echo number_format($valor,2); ?></td>
                <td><?php echo $codi; ?></td>
                <td><?php echo $stado; ?></td>
                <td><?php echo $date; ?></td>
                </tr>
                 <?php } ?>                                       
                                       
                                   
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
    <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        
        
    });
    </script>
    
    <!-- bt-switch -->
    <script src="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
   
    </script>
   
  
    
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
</body>

</html>
