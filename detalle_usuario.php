<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    if(is_numeric($_GET['id']))
    {
        include('config/app_config.php');
        $suser = "SELECT *FROM natuser WHERE estado='1' and id=".$_GET['id'];
        $ruser = mysql_query($suser);
        $fuser = mysql_fetch_array($ruser);
        //HISTORIAL DE PUNTOS
        $usuarioID = $fuser['id'];
        $consultaHistorial = "SELECT *FROM points_history WHERE user_id=".$usuarioID." and process_points=1 ORDER BY fecha asc";
        $rhistorial = mysql_query($consultaHistorial);
      //  $fhistorial = mysql_fetch_array($rhistorial);

        $consultaHistorial2 = "SELECT a.*,b.*,a.puntos FROM puntos as a
        LEFT JOIN tipo_puntos as b on (a.tipo=b.id) WHERE a.usuario=".$usuarioID." ";
        $rhistorial2 = mysql_query($consultaHistorial2);
       // $fhistorial2 = mysql_fetch_array($rhistorial2);

    $consultaHistorial2 = "SELECT a.fecha_registro,b.descripcion,'0' as puntos_negativos,a.puntos FROM puntos as a
    LEFT JOIN tipo_puntos as b on (a.tipo=b.id)
    WHERE a.usuario=".$usuarioID." 
    UNION ALL
    SELECT fecha,descripcion,deb_points as puntos_negativos,sum_points as puntos FROM points_history WHERE user_id=".$usuarioID." and process_points in (1,2) ORDER BY fecha_registro asc
      ";
    $rhistorial2 = mysql_query($consultaHistorial2);
    }

    $consultaHistorial3 = "SELECT a.fecha_registro,b.descripcion,'0' as puntos_negativos,a.puntos FROM puntos as a
    LEFT JOIN tipo_puntos as b on (a.tipo=b.id)
    WHERE a.usuario=".$usuarioID." 
    UNION ALL
    SELECT fecha,descripcion,deb_points as puntos_negativos,sum_points as puntos FROM points_history WHERE user_id=".$usuarioID." and process_points in (1,2) ORDER BY fecha_registro asc
      ";
    $rhistorial3 = mysql_query($consultaHistorial3);


     while($elHistorial3 = (mysql_fetch_array($rhistorial3))){
                                            
      $neto3 = $neto3+($elHistorial3['puntos']-$elHistorial3['puntos_negativos']);
  }
                                           
                                        

     $sql456 = "UPDATE natuser SET points=".$neto3." where id=".$usuarioID."";
     mysql_query($sql456);
    
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
    <title>Detalle de Usuario</title>
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
                        <h4 class="page-title" style="color: #FFF;">Detalle de Usuario </h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
               </div>
            <!-- breadcup-->
                
                
                
                
                
                <div class="row">
                    
                    <div class="col-lg-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3><b><?php echo $fuser['nombres']." ".$fuser['apellidos'] ?></b> <span class="pull-right">desde: <?php echo substr($fuser['fecha_registro'],0,10) ?></span></h3></div>
                           </div>
                    </div>
                    
                    
                    
                    
                    
               </div>
                
                <div class="row">
                         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Datos de Contacto</div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                          <div class="row">
                                        
                                        <div class="col-md-3 col-xs-2"> <strong>EMail</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['email'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-2 b-r"> <strong>Provincia</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['provincia'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-2"> <strong>Teléfono móvil</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['celular'] ?></p>
                                        </div>
                                              <br><br>
                                              <div class="clearfix"></div>
                                              
                                       <div class="col-md-3 col-xs-2 b-r"> <strong>RUC/CI</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['ruc'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-2 b-r"> <strong>Ciudad</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['ciudad'] ?></p>
                                        </div>
                                              
                                         <div class="col-md-3 col-xs-2 b-r"> <strong>Dirección</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['direccion'] ?></p>
                                        </div>
                                              
                                    
                                    <div class="col-md-3 col-xs-2"> <strong>Referencia</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['referencia'] ?></p>
                                        </div>
                                        
                                        
                                         <div class="col-md-3 col-xs-2"> <strong>Cumpleaños</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $fuser['cumple'] ?></p>
                                        </div>
                                
                                        
                                    </div>
                                </div>
                                <div class="panel-footer"> 
                                    
                                       
                                    
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white-box">
                                   <h3 class="box-title">Puntos Acumulados</h3><hr>
                                    <h2 class="puntos"><?php echo $neto3 ?> PUNTOS</h2>
                                    <hr><!--  <small>Pendientes de asignar: 120 puntos</small> --> 
                                    
                                    <!-- <hr> -->
                                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#gestionPuntos">Gestionar Puntos </button>
                                   <button class="btn btn-success" data-toggle="modal" data-target="#historial">Ver historial </button>
                                    <!-- <a href="detalle-puntos.php"></a> -->  
                                   
                                </div>
                            </div>
                           </div>
                    </div>
                    
                    
                    
                </div>
                
                


                <!-- MODAL HISTORIAL-->
                <div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                        <div class="panel-heading"> <h2 class="strong">Historial de puntos</h2></div>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> -->
                      </div>
                      <div class="modal-body">

                      <div class="table-responsive">
                            <table class="table table-bordered table-order-history">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Transacción</th>
                                        <th scope="col">Debitados</th>
                                        <th scope="col">Acreditados</th>
                                        <th scope="col">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     <?php 
                                     $neto=0;

                                    //die(var_dump($rhistorial2));
                                        while($elHistorial2 = (mysql_fetch_array($rhistorial2))){
                                            
                                            $neto = $neto+($elHistorial2['puntos']-$elHistorial2['puntos_negativos']);
                                           
                                        ?>
                                       
                                        <tr>
                                            <td><?php echo substr($elHistorial2['fecha_registro'],0,10) ?></td>
                                            <td><?php echo $elHistorial2['descripcion'] ?></td>
                                            <td><span class="resta">(-) <?php echo $elHistorial2['puntos_negativos'] ?></span></td>
                                            <td><span class="suma">(+) <?php echo $elHistorial2['puntos'] ?></span></td>
                                            <td><?php echo $neto ?></td>
                                        </tr>
                                        <?php // } else{}; ?>
                                        
                                    <?php } 
                                    $sql = "UPDATE natuser SET points=".$neto." where id=".$usuarioID."";
                                     mysql_query($sql);

                                    ?>
                                    <?php /*
                                                                                while($elHistorial = (mysql_fetch_array($rhistorial))){
                                        ?>
                                        <?php // if ( $elHistorial['process_points'] == '1') {

                                            $neto= $neto+ ($elHistorial['sum_points'] - $elHistorial['deb_points']); 
                                        ?>
                                        <tr>
                                            <td><?php echo $elHistorial['fecha'] ?></td>
                                            <td><?php echo $elHistorial['descripcion'] ?></td>
                                            <td><span class="resta">(-) <?php echo $elHistorial['deb_points'] ?></span></td>
                                            <td><span class="suma">(+) <?php echo $elHistorial['sum_points'] ?></span></td>
                                            <td><?php echo $neto ?></td>
                                        </tr>
                                        <?php // } else{};
                                        
                                        
                                    } */?>
                                    
                                    
                                    
                                   
                                </tbody>
                            </table>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Guardar Cambios</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- MODAL GESTION PUNTOS-->
                <div class="modal fade" id="gestionPuntos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                        <div class="panel-heading"> <h2 class="strong">Gestión de puntos</h2></div>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> -->
                      </div>
                      <div class="modal-body">
                        <form action="">
                            <label for="campopuntos">Escribir puntos</label>
                            <input type="number" class="form-control" name="campopuntos" placeholder="Ej: 100" id="campopuntos"> 
                            <label for="ptodecrip">Escribir detalle de los puntos</label>
                             <br>
                            <input type="text" class="form-control" name="ptodecrip" id="ptodecrip" value="" placeholder="Escribir detalle de los puntos">
                             <br/>
                           
                            <input type="hidden" name="balanceOld" id="balanceOld" value="<?php echo $fuser['points'] ?>">
                            <input type="hidden" name="usrid" id="usrid" value="<?php echo $fuser['id'] ?>">
                             <br>

                            <button type="button" id="pointplus" class="btn btn-success"> <i class="fa fa-plus"></i> Agregar</button>
                            <button type="button" id="pointminus" class="btn btn-warning"> <i class="fa fa-minus"></i> Quitar</button>

                        </form>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Guardar Cambios</button> -->
                      </div>
                    </div>
                  </div>
                </div>




                <!--historial pedidos -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Historial de sus pedidos</h3>
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
                                        <?php  $spedido = "SELECT a.* FROM pedidos as a 
                                                           LEFT JOIN natuser as b on (a.usuario=b.id) WHERE b.id=".$_GET['id'];
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
                <!--fin historial pedidos -->
              
                
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

        /////////////// GESTION DE PUNTOS //////////////////
        $('#pointplus').on('click', function (){ //si es suma
          xvalor = $('#campopuntos').val();
          yvalor = $('#balanceOld').val();
          suma = xvalor;
          resta = "0";
          var resultado =  parseInt(xvalor) + parseInt(yvalor);
          // alert(resultado);
          procesarPuntos(resultado, suma, resta);
        });
        $('#pointminus').on('click', function (){// si es resta
          xvalor = $('#campopuntos').val();
          yvalor = $('#balanceOld').val();
          suma = "0";
          resta = xvalor;
          var resultado = yvalor - xvalor;
          // alert(resultado);
          procesarPuntos(resultado, suma, resta);
        });

        function procesarPuntos (resultado, suma, resta ) { //registramos los datos en el historial y el usuario
        userId = $('#usrid').val();
        ptodecrip = $('#ptodecrip').val();
        fecha = (new Date()).toISOString().split('T')[0];
        // alert(userId);
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('fecha', fecha);
        paqueteDeDatos.append('sum_points', suma);
        paqueteDeDatos.append('deb_points', resta);
        paqueteDeDatos.append('balance', resultado);
        paqueteDeDatos.append('user_id', userId);
        paqueteDeDatos.append('descripcion', ptodecrip);
        paqueteDeDatos.append('status', "0");
        paqueteDeDatos.append('process_points', '1');
        paqueteDeDatos.append('product_reference', '0');
        $.ajax({
        type: "POST",
        url: "procesos/pointshistory.php",
        contentType: false,
            data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
            processData: false,
            cache: false, 
             }).done(function( msg ) {
                console.log(msg);
                alert("puntos actualizados")
                location.reload();
                // swal({ 
                //     title: "Correcto!",
                //     text: "Datos Actualizados",
                //     type: "success" 
                //     },
                //     function(){
                //         location.reload();
                //     });
            });
/*
        */
        };
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
