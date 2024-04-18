<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    
      include('config/app_config.php');
      $sadmin = "SELECT *FROM usuario_admin";
      $radmin = mysql_query($sadmin);
      $fadmin = mysql_fetch_array($radmin);
     
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
    <title>Historial de pedidos</title>
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
                        <h4 class="page-title" style="color: #FFF;">Historial de Ventas </h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
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
                                    <thead>
                                        <tr>
                                            <th># de orden</th>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Email</th>
                                            <th>Valor</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $spedido = "SELECT a.* FROM pedidos as a  ";
                                                $rpedido = mysql_query($spedido);
                                               while($fpedido = mysql_fetch_array($rpedido)){
                                                switch ($fpedido['estado']) {
                                                    case '1':
                                                        $etiqueta = "orden-recibida";
                                                        $mensaje = "orden recibida";
                                                    break;
                                                    case '2':
                                                        $etiqueta = "solicitado";
                                                        $mensaje = "entregado al courier";
                                                    break;
                                                    case '3':
                                                        $etiqueta = "entregado";
                                                        $mensaje = "Entregado con éxito";
                                                    break;
                                                    case '4':
                                                        $etiqueta = "cancelado";
                                                        $mensaje = "Cancelado";
                                                    break;
                                                    
                                                    
                                                }
                                        ?>
                                    
                                        <tr>
                                            <td><?php echo str_pad($fpedido['id'], 6, "0", STR_PAD_LEFT) ?></td>
                                            <td><?php echo substr($fpedido['fecha'],0,10) ?></td>
                                            <td><?php echo $fpedido['nombres']." ".$fpedido['apellidos'] ?></td>
                                            <td><?php echo $fpedido['email'] ?></td>
                                            <td>$<?php echo number_format(($fpedido['subtotal']+$fpedido['iva']+$fpedido['envio']-$fpedido['descuento']),2) ?></td>
                                            <td><span class="label label-<?php echo $etiqueta; ?> font-weight-100"><?php echo $mensaje; ?></span> </td>
                                            <td>
                                            <a href= "detalle_pedido.php?id=<?php echo $fpedido['id'] ?>"><div class="fileupload btn btn-info waves-effect waves-light"><span>Ver Detalle</span>                                            </div></a>
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
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    </script>
    
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
    </script>
   
  
    
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
</body>

</html>
