<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    
      include('config/app_config.php');
      $sadmin = "SELECT *FROM usuario_admin";
      $radmin = mysql_query($sadmin);
      $fadmin = mysql_fetch_array($radmin);

    $spedido = "SELECT a.* FROM pedidos as a 
    
    WHERE a.id=".$_GET['id'];
    $rpedido = mysql_query($spedido);
    $fpedido = mysql_fetch_array($rpedido);
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
    <title>Detalle de Pedido</title>
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
    </head>

<body>
    
    <div id="wrapper">
        
     <?php include('menu.php'); ?>
        
        
        
        
        
                               <!------------ modal de estados ----------------->
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Actualizar estado</h4>
                                            </div>
                                            <div class="modal-body">
                                               
                                            <div class="form-group m-b-40">
                                                <select class="form-control p-0" id="estado" required>
                                                 <option value="1" <?php  if($fpedido['estado'] == '1'){ ?> selected <?php } ?> >Orden recibida</option>
                                                <option value="2" <?php  if($fpedido['estado'] == '2'){ ?> selected <?php } ?>>entregada al courier</option>
                                                <option value="3" <?php  if($fpedido['estado'] == '3'){ ?> selected <?php } ?>>Entregado con éxito</option>
                                                <option value="4" <?php  if($fpedido['estado'] == '4'){ ?> selected <?php } ?>>Cancelado</option>
                                             </select><span class="highlight"></span> <span class="bar"></span>
                                            </div>
                                           
                                            
                                            <div class="form-group m-b-40">
                                                <div class="form-group m-b-40">
                                                <span class="help-block"><small></small></span>  
                                                 <?php if($fpedido['estado'] == '2'){ ?>
                                            <label for="input1">Indique el número de guía</label>
                                    
                                     <input type="text" class="form-control" id="guia" value="<?php echo $fpedido['guia']; ?>" required>
                                     <input type="hidden" class="form-control" id="motivo" value="<?php echo $fpedido['motivo_cancelar']; ?>" required>
                                 <?php }else{ ?>
                                 	 <?php if($fpedido['estado'] == '4'){ ?>
                                            <label for="input1">Indique el motivo de cancelar</label>
                                    
                                     <input type="text" class="form-control" id="motivo" value="<?php echo $fpedido['motivo_cancelar']; ?>" required>
                                     <input type="hidden" class="form-control" id="guia" value="" required>
                                 <?php } ?>
                                      
                                    <div id="oculto" style="display: none;">
                                     <label for="input1">Indique el número de guía</label>
                                    <input type="text" class="form-control" id="guia" value="<?php echo $fpedido['guia']; ?>" >
                                    <input type="text" class="form-control" id="motivo" value="<?php echo $fpedido['motivo_cancelar']; ?>" required> 
                                </div>
                                  <?php } ?>   
                                   <span class="highlight"></span> <span class="bar"></span>   
                                       </div>
                                            </div>
                                            
                       
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary" onclick="estados()">Guardar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- modal de estados-->
        
        
        
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                            </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <h3>CLiente:  <?php echo $fpedido['nombres']." ".$fpedido['apellidos']; ?></h3>
                            <h4><b>Fecha Pedido :</b> <i class="fa fa-calendar"></i> <?php echo substr($fpedido['fecha'],0,10) ?>
                           
                             <b>Tipo de Compra:</b>
                                                     <?php if($fpedido['invitado'] != ''){ ?>
                                                        <label for="input1"> Compra como Invitado </label> 
                                                    <?php }else{ ?>
                                                        <label for="input1"> Compra con Cuenta </label> 
                                                    <?php } ?>
                                                
                             <?php if($fpedido['guia']!=""){ ?>               
                             <!-- /.ester campo de abajo lo llena el admin de la tienda --> 
                            <b> # de guía: </b><?php echo ($fpedido['guia']) ?>
                            <?php } ?>
                             <?php if($fpedido['motivo_cancelar']!=""){ ?>               
                             <!-- /.ester campo de abajo lo llena el admin de la tienda --> 
                            <b> Motivo Cancelación: </b><?php echo ($fpedido['motivo_cancelar']) ?>
                            <?php } ?>
                            <span class="pull-right">Estado: 
                            <span class="label label-<?php echo $etiqueta; ?> font-weight-100"><?php echo $mensaje; ?></span><br>
                             <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-refresh"></i> <small>cambiar estado</small></a><br>
                          
                            </span>
                            
                          
                            
                            
                            </h4>
                            <hr>
                            <div class="row">
                                
                                <div class="col-sm-4">
                                        <address>
                                            <h3> &nbsp;<b class="text-info">Datos de envío</b></h3>
                                            <p class="text-muted m-l-5"><?php echo $fpedido['direccione'] ?><br>
                                            <?php echo $fpedido['provinciae'] ?> - <?php echo $fpedido['ciudade'] ?><br>
                                            Referencia: <?php echo $fpedido['referenciae'] ?><br>
                                            Teléfono: <?php echo $fpedido['telefonoe'] ?><br>
                                            </p>
                                        </address>
                                </div>
                                
                                <div class="col-sm-4">
                                        <address>
                                            <h3> &nbsp;<b class="text-info">Datos Facturación</b></h3>
                                            <p class="text-muted m-l-5">
                                                RUC/ CI:  <?php echo $fpedido['ruc'] ?><br>
                                                RAZON:  <?php echo $fpedido['razon'] ?><br>
                                                DIRECCION: <?php echo $fpedido['direccionf'] ?><br>
                                                TELEFONO: <?php echo $fpedido['telefonof'] ?><br>
                                            </p>
                                         </address>
                                </div>
                                
                                
                                <div class="col-sm-4">
                                        <address>
                                            <h3> &nbsp;<b class="text-info">Datos de pedido</b></h3>
                                            <p class="text-muted m-l-30">
                                              Forma de pago: <?php echo $fpedido['pago'] ?><br>
                                              Orden #: <?php echo str_pad($fpedido['id'], 6, "0", STR_PAD_LEFT) ?><br>
                                              ID transacción: <?php echo $fpedido['idtran'] ?><br>
                                              Autorización transacción: <?php echo $fpedido['autorizaciontran'] ?><br>
                                            </p>
                                        </address>
                                    </div>
                                
                                
                                
                                
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">foto</th>
                                                    <th>Descripción</th>
                                                    <th class="text-right">Cantidas</th>
                                                    <th class="text-right">Costo unit</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $sdetalle = "SELECT a.* ,d.foto_uno,d.nombre,d.precio,a.precio as precio_carro FROM pedido_detalle as a
                                                                   LEFT JOIN pedidos as b ON (b.id=a.pedido)
                                                                   LEFT JOIN natuser as c on (b.usuario=c.id)
                                                                   LEFT JOIN productos as d ON (d.id=a.producto)
                                                                   WHERE b.id=".$fpedido['id']; 
                                                      $rdetalle = mysql_query($sdetalle);
                                                      while($fdetalle = mysql_fetch_array($rdetalle)){
                                                ?>
                                                <tr>
                                                    <td class="text-center"><img src="imagenes/productos/<?php echo $fdetalle['foto_uno'] ?>" width="65px;"></td>
                                                    <td>
                                                    <span><?php echo $fdetalle['nombre'] ?> × <?php echo $fdetalle['cantidad'] ?></span><br>
                                                    Código: <?php echo $fdetalle['codigo'] ?><br>
                                                     <?php if($fdetalle['presentacion']!= "NO APLICA"){ ?>
                                                    
                                                    presentación: <?php echo $fdetalle['presentacion'] ?><br>
                                                     <?php } ?>
                                                    <?php if($fdetalle['color']!= ""){ ?>
                                                    Color: <span class="cuadro-color" style="background-color: <?php echo $fdetalle['color'] ?>"> </span> &nbsp;
                                                     <?php } ?>
                                                       <?php if($fdetalle['precio_carro'] == "0"){ $fdetalle['precio']=0; ?>
                                                   <br />CANJEADO POR PUNTOS
                                                    <?php }  ?>
                                                    
                                                    </td>
                                                    <td class="text-right"><?php echo $fdetalle['cantidad'] ?></td>
                                                    <td class="text-right"> $<?php echo number_format($fdetalle['precio'],2) ?> </td>
                                                    <td class="text-right"> $<?php echo number_format(($fdetalle['precio']*$fdetalle['cantidad']),2) ?> </td>
                                                    
                                                   
                                                </tr>
                                            <?php } ?>
                                                
                                              
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total (sin iva): $<?php echo number_format(($fpedido['subtotal']),2) ?></p>
                                         <p>Descuento: $<?php echo number_format(($fpedido['descuento']),2) ?></p>
                                         <p>Puntos Canjeados: <?php echo number_format(($fpedido['puntos_canjeados']),0) ?></p>
                                          <p> <?php echo $fpedido['provinciae'] ?> - <?php echo $fpedido['ciudade'] ?> : $<?php echo number_format(($fpedido['envio']/1.15),2) ?> </p>
                                         <p>IVA 15%: $<?php echo number_format((($fpedido['iva'])+(($fpedido['envio']/1.15)*0.15)),2) ?></p>
                                       
                                        <hr>
                                        <h3><b>Total :</b> $<?php echo number_format(($fpedido['subtotal']+$fpedido['iva']+$fpedido['envio']-$fpedido['descuento']),2) ?></h3> </div>
                                    <div class="clearfix"></div>
                                    <hr>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
        <input type="hidden" name="pedido" id="pedido" value="<?php echo $fpedido['id'] ?>">
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
<script type="text/javascript">
      function estados(id)
    {
        var estado = document.getElementById("estado").value;
        var pedido = document.getElementById("pedido").value;
        var guia = document.getElementById("guia").value;
        var motivo = document.getElementById("motivo").value;
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('estado', estado);
            paqueteDeDatos.append('pedido', pedido);
            paqueteDeDatos.append('guia', guia);
            paqueteDeDatos.append('motivo', motivo);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/updatestate.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                         location.reload();
                        });
    }
</script>

</html>
