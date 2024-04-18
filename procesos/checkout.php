<?php

function check_in_range($fecha_inicio, $fecha_fin, $fecha){



     $fechai = explode("/", $fecha_inicio);
     $fecha_inicio = $fechai[1]."/".$fechai[0]."/".$fechai[2];
     
     $fechaf = explode("/", $fecha_fin);
     $fecha_fin = $fechaf[1]."/".$fechaf[0]."/".$fechaf[2];
     
     $fecha_inicio = strtotime($fecha_inicio);
     
     $fecha_fin = strtotime($fecha_fin);
     
     $fecha = strtotime($fecha);
     

     if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {

         return true;

     } else {

         return false;

     }
 }


session_start();

    include('../administrador/config/app_config.php');
    if((is_numeric($_SESSION["idcarrito"]) && $_SESSION["idcarrito"] > 0 && $_SESSION["idcarrito"] < 500000) || ($_SESSION['idcarrito']>1500000 && $_SESSION['idcarrito']<1900000))
    {
        
        $_SESSION['flagretorno']='0';
        $scat = "SELECT *FROM categorias WHERE estado='1'";
        $rcat = mysql_query($scat);

        $scatd = "SELECT *FROM categorias WHERE estado='1'";
        $rcatd = mysql_query($scatd);

        
        $ruta = "../administrador/imagenes";

        $sdetalle = "SELECT *FROM productos WHERE estado='1' and id=".$_GET['id']." ORDER BY id desc LIMIT 4";
        $rdetalle = mysql_query($sdetalle);
        $fdetalle = mysql_fetch_array($rdetalle);
        $tallas = explode(":;:", $fdetalle['tallas']);
        $tallas = array_unique($tallas);
        $colores = explode(":;:", $fdetalle['colores']);
        $colores = array_unique($colores);

        $spublicidad = "SELECT *FROM publicidad";
        $rpublicidad = mysql_query($spublicidad);
        $fpublicidad = mysql_fetch_array($rpublicidad);
        $pproductos = explode(":;:", $fpublicidad['seccionb']);

        $sslider = "SELECT *from sliders";
        $rslider = mysql_query($sslider);

        $scarritoc = "SELECT a.*,b.foto_uno ,b.nombre FROM carrito as a
        LEFT JOIN productos as b ON (a.producto = b.id)
        where carro='".$_SESSION["idcarrito"]."'";
        $rcarritoc = mysql_query($scarritoc);

        $datuser = "SELECT *FROM natuser where id=".$_SESSION['idcarrito'];
        $rdatosu = mysql_query($datuser);
        $fusuario = mysql_fetch_array($rdatosu);


    }else
    {
       $_SESSION['flagretorno']='1';
       header('Location: login.php');
    }
$envio = 0;
$sql = "Select *from valores_envio where ciudad like ('".trim($fusuario['ciudad'])."') and estado='1'";
$r= mysql_query($sql);
$result = mysql_fetch_array($r);
if($result['valor'] > 0){
    $envio = $result['valor'];
}

$descuento = 0;
$scupon = "select b.*,a.valor as descuento from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);

$senviogratis = "SELECT *FROM envio_gratis";
$renviogratis = mysql_query($senviogratis);
$fenviogratis = mysql_fetch_array($renviogratis);

if($subtotal > $fenviogratis['valor'])
{   
    $envio = 0;
}

if($_SESSION['emailcupon']!= "")
{
    $fusuario['email']=$_SESSION['emailcupon'];
}

$fecha = date('m/d/y');
$fechas = explode("-", $fcupon['rango']);
$fecha_inicio= trim($fechas[0]);
$fecha_fin= trim($fechas[1]);

if (check_in_range($fecha_inicio, $fecha_fin, $fecha))
    {
       $validador++;
      

    } else {
        $validador=0;
    }

    if($validador == 0)
    {
        $sbcuponcar = "DELETE FROM carrito_cupon WHERE carro='".$_SESSION["idcarrito"]."'";
        $rbcuponcar = mysql_query($sbcuponcar);
        
    }

    $scarrocsumenvi = "SELECT SUM((b.envio)) as sumenvio FROM carrito as a
LEFT JOIN productos as b ON (a.producto=b.id)
WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosumenvi = mysql_query($scarrocsumenvi);
$fsumaenvi = mysql_fetch_array($rcarritosumenvi);

if($fsumaenvi['sumenvio']== 0)
{
    $envio = 0;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <meta name="description" content="productos para el cuidado personal, cuidado capilar elaborados a base de estractos de origen natural">
    <meta name="author" content="cremas, jabones artesanales, shampoo gardenia, gel reductor, tratamiento capilar, tratamiento corporal, exfoliantes, jabón de aloe vera, jabón de romero">
       <meta name="robots" content="index,all">
    <meta name="revisit-after" content="5 days">
    
    
    <title>Checkout Natural Care ec - Ecuador </title>
    <script src="https://cdn.paymentez.com/checkout/1.0.1/paymentez-checkout.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../js/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../js/vendor/slick/slick.min.css" rel="stylesheet">
    <link href="../js/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../js/vendor/animate/animate.min.css" rel="stylesheet">
     <link href="../css/style-watches_1_light.css" rel="stylesheet">
   <link href="../fonts/icomoon/icomoon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
     <!--wizard -->
    <link href="../css/custom-wizard.css" rel="stylesheet" type="text/css">  
    
         <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154164370-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154164370-1');
</script>
<!-- fin - Google Analytics -->

</head>

<body class="is-dropdn-click">
   <?php include('header.php'); ?>

    <?php 
    if($cantidad == 0)
    {
        echo "<script>
        swal({ 
            title: 'Alto!',
            text: 'No tienes productos en tu cesta',
            type: 'error' 
            },
            function(){
            history.back();
            });
        </script>";
    }


  if($fcupon['id'] > 0)
    {
        if($fcupon['descuento']>0){
          $descuento1 = $fcupon['descuento'];
        }
        else{
        if($fcupon['tipo'] == '1')
        {
            $descuento1 =((($subtotal/1.15)*$fcupon['valor'])/100);


        }else
        {
            $descuento1 = $fcupon['valor'];
        }
    }
    }
    ?>
    
    <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><span>Checkout</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <h1 class="text-center">Checkout</h1>
                <div class="clearfix"></div>
                <form  id="comprar">
                    <div class="row">
                        <div class="col-md-8">
                            
                            
                             <div class="x_panel">
                               
                                <div class="x_content">


                                    <!-- Smart Wizard -->
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li>
                                                <a href="#step-1">
                                                    <span class="step_no">1</span>
                                                    <span class="step_descr">
                                            <small>Datos comprador</small>
                                        </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <span class="step_no">2</span>
                                                    <span class="step_descr">
                                            <small>Datos facturación</small>
                                        </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-3">
                                                    <span class="step_no">3</span>
                                                    <span class="step_descr">
                                            <small>Datos de Envío</small>
                                        </span>
                                                </a>
                                            </li>
                                            
                                            
                                            <li>
                                                <a href="#step-4">
                                                    <span class="step_no">4</span>
                                                    <span class="step_descr">
                                            <small>Forma de Pago</small>
                                        </span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                        
                                        <!--paso 1-->
                                        <div id="step-1">
                                            <div class="tab-pane-inside">
                                       <?php if($_SESSION['invitado']== ""){ ?>
                                        <div class="clearfix"><input id="formcheckoutCheckbox1" name="checkbox1" type="checkbox" onclick="activaruno()"> <label for="formcheckoutCheckbox1">Actualizar datos</label></div>
                                    <?php } ?>
                                         <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">* Email:</label>
                                                <div class="form-group"><input type="text" name="email" maxlength="35" class="form-control" id="email" value="<?php echo $fusuario['email'] ?>" readonly="readonly"></div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                            <div class="sidebar-block_content"><label class="text-uppercase">Si tienes un cupón introduce el código:</label>
                                <div class="form-flex">
                                    <div class="form-group"><input type="text" id="codigo" placeholder="ingresa elcódigo" value="<?php echo $fcupon['codigo'] ?>" class="form-control" <?php if($fcupon['codigo'] != ""){ ?> disabled="disabled" <?php } ?> ></div>
                                    <?php if($fcupon['codigo'] == ""){ ?>
                                     <button type="button" onclick="cupon();" class="btn btn--form btn--alt">Aplicar</button> 
                                     <?php }else{ ?>
                                     <button type="button" onclick="borrarcupon(<?php echo $_SESSION["idcarrito"] ?>,'<?php echo $fcupon['codigo'] ?>');" class="btn btn--form btn--alt">Borrar</button> 
                                     <?php } ?>

                                    
                                </div>
                            </div>
                                            </div>
                                           
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">* Cedula:</label>
                                                <div class="form-group"><input type="text" name="ci" maxlength="15" class="form-control" id="ci" value="<?php echo $fusuario['ruc'] ?>" readonly="readonly"></div>
                                            </div>
                                           
                                        </div>
                                        

                                        <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">* Nombres:</label>
                                                <div class="form-group"><input type="text" name="nombres" maxlength="25" class="form-control" id="nombres" value="<?php echo $fusuario['nombres'] ?>" readonly="readonly"></div>
                                            </div>
                                            <div class="col-sm-6"><label class="text-uppercase">* Apellidos:</label>
                                                <div class="form-group"><input type="text" name="apellidos" maxlength="25" id="apellidos" value="<?php echo $fusuario['apellidos'] ?>" class="form-control" readonly="readonly"></div>
                                            </div>
                                        </div>
                                        
                                        
                                       <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">* Número celular:</label>
                                                <div class="form-group"><input type="text" id="celular" name="celular" maxlength="14" value="<?php echo $fusuario['celular'] ?>" class="form-control" readonly="readonly"></div>
                                            </div>
                                            <div class="col-sm-6"><label class="text-uppercase">Numero fijo:</label>
                                                <div class="form-group"><input type="text" id="telefono" name="telefono" maxlength="14" value="<?php echo $fusuario['telefono'] ?>" class="form-control" readonly="readonly"></div>
                                            </div>
                                        </div>
                                       
                                       
                                        
                                    </div>
                                        <p style="font-style: italic; font-size:13px;">En el paso 3 se sumará la tarifa de envío</p>
                                        </div>
                                       <!--fin paso 1-->
                                        
                                        
                                        <!-- paso 2-->
                                        <div id="step-2">
                                        
                                         <div class="panel-group" id="checkoutAccordion">
                                           <div class="panel">
                                           	<?php if($_SESSION['invitado']== ""){ ?>
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" href="#step3">Facturar con los mismos datos</a></h4>
                                    </div>
                                <?php } ?>
                                    <div id="step3" data-parent="#checkoutAccordion" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        	
                                            <div class="panel-body-inside">
                                            	<?php if($_SESSION['invitado']== ""){ ?>
                                                <div class="clearfix"><input id="datosfact" value="" name="datosfact" type="checkbox" class="radio" checked="checked"> <label for="datosfact" >
                                                    Si por favor, facturar con los mis datos 
                                                </label></div><br />
                                                <b>RUC:</b><?php echo $fusuario['ruc'] ?>
                                                <b>Razón:</b><?php echo $fusuario['razon'] ?>
                                                <b>Dirección:</b><?php echo $fusuario['direccionf'] ?>
                                                <b>Teléfono:</b><?php echo $fusuario['telefonof'] ?>
                                                <?php } ?>
                                                <input type="hidden" name="ruc" id="ruc" value="<?php echo $fusuario['ruc'] ?>">
                                                <input type="hidden" name="razon" id="razon" value="<?php echo $fusuario['razon'] ?>">
                                                <input type="hidden" name="direccionf" id="direccionf" value="<?php echo $fusuario['direccionf'] ?>">
                                                <input type="hidden" name="telefonof" id="telefonof" value="<?php echo $fusuario['telefonof'] ?>">
                                               
                                            </div>

                                        </div>
                                    </div>
                                </div>
                               
                                           <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" href="#step4">Ingresar nuevos datos de facturación</a></h4>
                                    </div>
                                    <div id="step4" data-parent="#checkoutAccordion" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="panel-body-inside">
                                                <?php if($_SESSION['invitado']== "") { ?>
                                              <div class="clearfix"><input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox" onclick="activardos()"> <label for="formcheckoutCheckbox2">Ingresar datos</label></div> 
                                              <?php } ?>  
                                               
                                            <div class="row mt-2">
                                            <div class="col-sm-4"><label class="text-uppercase">CI/RUC:</label>
                                                <div class="form-group"><input type="text" id="nruc" readonly="readonly" name="nruc"  value="" class="form-control"></div>
                                            </div>
                                            <div class="col-sm-4"><label class="text-uppercase">RAZON SOCIAL:</label>
                                                <div class="form-group"><input type="text" name="nrazon" readonly="readonly"  id="nrazon" value="" class="form-control"></div>
                                            </div>
                                            
                                            <div class="col-sm-4"><label class="text-uppercase">TELÉFONO</label>
                                                <div class="form-group"><input type="text" id="ntelefonof" readonly="readonly" name="ntelefonof" value="" class="form-control"></div>
                                            </div>
                                            
                                        </div>
                                          
                                          <label class="text-uppercase">DIRECCION:</label>
                                        <div class="form-group"><input type="text" name="ndireccionf" readonly="readonly"  id="ndireccionf" value="" class="form-control"></div>
                                        <div class="mt-2"></div>
                                           
                                           
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                         </div>
                                          <p style="font-style: italic; font-size:13px;">Favor verificar que los DATOS DE FACTURACIÓN sean correctos, ya que no se refacturará</p> 
                                       </div>
                                       <!--fin paso 2-->
                                       
                                       
                                       <!-- paso 3-->
                                        <div id="step-3">
                                            <h2 class="StepTitle">Datos de Envío</h2>   
                                            <div class="tab-pane-inside">
                                       <?php if($_SESSION['invitado']== "") { ?>
                                        <div class="clearfix"><input id="formcheckoutCheckbox3" name="checkbox3" type="checkbox" onclick="activartres()"> <label for="formcheckoutCheckbox3">Actualizar datos</label></div>
                                    <?php } ?>
                                                                        
                                        <div class="row">
                                            <div class="col-sm-6"><label class="text-uppercase">Provincia:</label>
                                                <div class="form-group select-wrapper">
                                                    <select class="form-control" name="provincia" id="provincia" onchange="buscarciudad(this.value)" readonly="readonly">
                                                        <option value="<?php echo $fusuario['provincia'] ?>"><?php echo $fusuario['provincia'] ?></option>
                                                        <?php 
                                                        $sprov = "SELECT *FROM provincias";
                                                        $rpro = mysql_query($sprov);
                                                        while($fpro = mysql_fetch_array($rpro)){
                                                        ?>
                                                        <option value="<?php echo $fpro['provincia'] ?>"><?php echo $fpro['provincia'] ?></option>
                                                       <?php } ?>
                                                       
                                                    </select></div>
                                            </div>
                                            <div class="col-sm-6" id="ciu">
                                                <label class="text-uppercase">Ciudad:</label>
                                                <div class="form-group select-wrapper">
                                                    <select class="form-control" name="ciudad" id="ciudad" readonly="readonly">
                                                        <option value="<?php echo $fusuario['ciudad'] ?>"><?php echo $fusuario['ciudad'] ?></option>
                                                       
                                                       
                                                    </select></div>
                                            </div>
                                        </div>
                                        
                                      <div class="row mt-2">
                                            <div class="col-sm-6"><label class="text-uppercase">Dirección exacta:</label>
                                                <div class="form-group">
                                                <textarea class="form-control textarea--height-100" name="direccion" id="direccion" data-required-error="indica bien tu dirección" readonly="readonly" required><?php echo $fusuario['direccion'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6"><label class="text-uppercase">Referencias:</label>
                                                <div class="form-group">
                                                <textarea class="form-control textarea--height-100" readonly="readonly" name="referencia" id="referencia" data-required-error="que queda cerca de tu dirección" required><?php echo $fusuario['referencia'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <p style="font-style: italic; font-size:13px;">El cliente se responsabiliza por nuevos costos de envío si la dirección es errónea o incompleta, y si no se encuentre una persona en la dirección proporcionada</p> 
                                        </div>
                                       <!--fin paso 3-->
                                       
                                       <?php $sdesc = "select *from descuentos";
                                             $rdesc = mysql_query($sdesc);
                                             $fdesc = mysql_fetch_array($rdesc);
                                        ?>
                                       <!-- paso 4-->
                                        <div id="step-4">
                                        <div class="clearfix">
                                            <input id="formcheckoutRadio4" value="Tarjeta crédito/débito" name="pago" type="radio" class="radio"  onclick="buscarpago(0)" > <label for="formcheckoutRadio4">Tarjeta Crédito/Débito </b></label>
                                        </div>
                                        <div class="clearfix">
                                            <input id="formcheckoutRadio5" value="Depósito/transferencia" name="pago" type="radio" class="radio" onclick="buscarpago(1)"> <label for="formcheckoutRadio5">Depósito/Transferencia <?php if($fdesc['id'] > 0){ ?> -  Descuento Adicional (<?php echo $fdesc['valor'] ?>%)<?php } ?></label>
                                        </div>
                                        <div class="clearfix">
                                            <input id="formcheckoutRadio6" value="Payphone" name="pago" type="radio" class="radio" onclick="buscarpago(0)"> <label for="formcheckoutRadio6">Payphone</label>
                                        </div>
                                        
                                      
                                       
                                
                                    
                                    <hr>
                                    
                                    <div class="clearfix"><input id="terminos" name="terminos" type="checkbox">
                                       
                                         <label c for="terminos">Acepta usted los <a href="terminos-y-condiciones.php" style=" font-weight: 800">términos y condiciones</a> así como las <a href="politicas.php" style=" font-weight: 800">políticas de devolución</a>   de este sitio web</label>
                                   </div>
                                         
                                         
                                         
                                         
                                    <div class="clearfix mt-1 mt-md-2">  <button type="button" id="completar" onclick="guardar_pedido()" class="btn btn--lg w-100 js-paymentez-checkout">Confirmar orden</button></div>
                                        </div>
                                       <!--fin paso 4-->
                                        

                                    </div>
                                    <!-- End SmartWizard Content -->

                                    <input type="hidden" value="<?php echo $_SESSION['invitado'] ?>" name="invitado" id="invitado">





                                </div>
                            </div>
                            
                            
                        </div>
                        
                        
                        <?php $descuento = $descuento1+$descuento2; ?>
                        <div class="col-md-4 mt-2 mt-md-5" id="resumen">
                            <h2>Resumen de orden</h2>
                            
                            
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">items</th>
                                  <th class="derecha" scope="col"><?php echo $cantidad ?></th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                
                                <tr>
                                  <th scope="row">Subtotal sin IVA</th>
                                  <td class="derecha">$<?php echo number_format(($subtotal/1.15),2) ?></td>
                                </tr>
                                
                                
                                
                                <tr>
                                  <th scope="row">Descuento (-)</th>
                                  <td class="derecha">$<?php echo number_format($descuento,2) ?></td>
                                </tr>
                                <?php  $ivaenvio = number_format((($envio/1.15)*0.15),2); ?>

                                <?php

                                if($fsumaenvi['sumenvio']== 0)
                                {
                                    $envio = 0;
                                }
                                  if($subtotal > $fenviogratis['valor'])
                                {   
                                    $envio = 0;
                                }

                                ?>
                                <?php if($_SESSION['invitado']== "") {  }else{  $envio = 0; $ivaenvio=0; $fusuario['ciudad']="(Por Calcular)"; } ?>
                                
                                
                                <tr>
                                  <th scope="row">Envío a <?php echo $fusuario['ciudad'] ?> (+)</th>
                                  <td class="derecha"><div id="envio"><?php echo number_format(($envio/1.15),2); ?></div></td>
                                </tr>

                                <tr>
                                  <th scope="row">IVA 15% (+)</th>
                                  <td class="derecha">$<?php echo $iva=number_format((((($subtotal/1.15)-$descuento)*0.15)+$ivaenvio),2) ?></td>
                                </tr>
                               
                               

                                 

                              </tbody>
                            </table>
                           
                           
                            <div class="card-total-sm">
                                <div class="float-right">total <span class="card-total-price">$ <?php echo  $ttot= number_format(((($subtotal/1.15)-$descuento)+$envio+($iva)),2) ?></span></div>
                             <input type="hidden" name="id_transaccion" id="id_transaccion" value="" />
                             <input type="hidden" name="codigo_autorizacion" id="codigo_autorizacion" value="" />
                             <input type="hidden" name="responses" id="responses" value="" />
                    
                             <input type="hidden" name="valtot" id="valtot" value="<?php echo  $ttot; ?>">
                             <input type="hidden" name="iduser" id="iduser" value="<? echo $_SESSION['idcarrito'];?>">
                             <input type="hidden" name="or" id="or" value="<? echo rand(10000,20000) ?>">
                             <input type="hidden" name="subtotal" id="subtotal" value="<?php echo $subtotal ?>" >
                            </div>
                            <div class="mt-2"></div>
                           
                            
                        </div>
                    </div>
                    
                   
                </form>
            </div>
        </div>
    </div>
  <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-body">
         <center><img src="carga.gif"></center>
        </div>
        
    </div>
</div>  



<!-- Modal -->
  <div class="modal fade" id="modalverificar" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Verificacíon de Tarjeta<br /></h4>
          <h5>Por favor ingrese el <b>codigo que llegó a su email, o SMS del Banco emisor de su tarjeta</b></h5>
        </div>
        <div class="modal-body">
          <input type="number" name="codigoverificacion" id="codigoverificacion" maxlength="6" onKeyUp="return limitar(event,this.value,6)" onKeyDown="return limitar(event,this.value,6)" >
          
          <button type="button" class="btn btn-success" id="completarrr"  onclick="validarcompra()">Verificar</button>
          <label style="display: none;" id="vlid">Validando......</label>
          
        </div>
        <div class="modal-footer">
         <!-- <a href="checkout.php" class="btn btn-default">Regresar a la tienda</a>-->
        </div>
      </div>
    </div>
  </div>
</div>
  
  
    <?php include('footer.php'); ?>
   
   
   
    <script src="../js/vendor/jquery/jquery.min.js"></script>
    <script src="../js/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/vendor/slick/slick.min.js"></script>
    <script src="../js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
    <script src="../js/vendor/instafeed/instafeed.min.js"></script>
    <script src="../js/vendor/countdown/jquery.countdown.min.js"></script>
    <script src="../js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../js/vendor/ez-plus/jquery.ez-plus.min.js"></script>
    <script src="../js/vendor/tocca/tocca.min.js"></script>
    <script src="../js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.min.js"></script>
    <script src="../js/vendor/isotope/jquery.isotope.min.js"></script>
    <script src="../js/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="../js/vendor/cookie/jquery.cookie.min.js"></script>
    <script src="../js/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../js/vendor/lazysizes/lazysizes.min.js"></script>
    <script src="../js/vendor/lazysizes/ls.bgset.min.js"></script>
    <script src="../js/vendor/form/jquery.form.min.js"></script>
    <script src="../js/vendor/form/validator.min.js"></script>
    <script src="../js/vendor/slider/slider.js"></script>
    <script src="../js/app.js"></script>
     <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5debc01d43be710e1d210734/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</body>
<script type="text/javascript">

    function limitar(e, contenido, caracteres)
        {
            // obtenemos la tecla pulsada
            var unicode=e.keyCode? e.keyCode : e.charCode;
 
            // Permitimos las siguientes teclas:
            // 8 backspace
            // 46 suprimir
            // 13 enter
            // 9 tabulador
            // 37 izquierda
            // 39 derecha
            // 38 subir
            // 40 bajar
            if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
                return true;
 
            // Si ha superado el limite de caracteres devolvemos false
            if(contenido.length>=caracteres)
                return false;
 
            return true;
        }
    function activaruno()
    {
        if( $('#formcheckoutCheckbox1').prop('checked') ) {
            $('#nombres').removeAttr("readonly");
            $('#apellidos').removeAttr("readonly");
            $('#telefono').removeAttr("readonly");
            $('#celular').removeAttr("readonly");
            $('#email').removeAttr("readonly");
            $('#ci').removeAttr("readonly");
           
        }else{
             $('#nombres').attr("readonly","readonly");
            $('#apellidos').attr("readonly","readonly");
            $('#telefono').attr("readonly","readonly");
            $('#celular').attr("readonly","readonly");
            $('#email').attr("readonly","readonly");
            $('#ci').attr("readonly","readonly");
            
       }
    }

    function activardos()
    {
       if( $('#formcheckoutCheckbox2').prop('checked') ) {
            $('#nruc').removeAttr("readonly");
            $('#nrazon').removeAttr("readonly");
            $('#ndireccionf').removeAttr("readonly");
            $('#ntelefonof').removeAttr("readonly");
            $('#datosfact').prop('checked', false);
            
        }else{
             $('#nruc').attr("readonly","readonly");
            $('#nrazon').attr("readonly","readonly");
            $('#ndireccionf').attr("readonly","readonly");
            $('#ntelefonof').attr("readonly","readonly");
            $('#datosfact').prop('checked', true); 
           
       }
       
       
    }

    function activartres()
    {
        if( $('#formcheckoutCheckbox3').prop('checked') ) {
            $('#provincia').removeAttr("readonly");
            $('#ciudad').removeAttr("readonly");
            $('#direccion').removeAttr("readonly");
            $('#referencia').removeAttr("readonly");
            
        }else{
             $('#provincia').attr("readonly","readonly");
            $('#ciudad').attr("readonly","readonly");
            $('#direccion').attr("readonly","readonly");
            $('#referencia').attr("readonly","readonly");
           
       }
       
    }

    function actualizaruno()
    {
         var nombres = document.getElementById("nombres").value;
         var apellidos = document.getElementById("apellidos").value;
         var celular = document.getElementById("celular").value;
         var telefono = document.getElementById("telefono").value;
        if(nombres)
                {

                    if(apellidos)
                    {

                        if(celular)
                    {
                         if(celular)
                    {
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('nombres', nombres);
                        paqueteDeDatos.append('apellidos', apellidos);
                        paqueteDeDatos.append('telefono', telefono);
                        paqueteDeDatos.append('celular', celular);
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/updateuserone.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {
                                        return true;
                                    });
                   }else
                   {
                     swal("Alto!","Ingresa una celular" , "error");
                     $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
                    }else
                   {
                     swal("Alto!","Ingresa un celular" , "error");
                     $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
                    }else
                   {
                     swal("Alto!","Ingresa apellidos" , "error");
                     $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
               }else
               {
                 swal("Alto!","Ingresa nombres" , "error");
                  $('#completar').attr('onClick', 'guardar_pedido();');
                 return false;
               }
    }


    function actualizardos()
    {
         var ruc = document.getElementById("ruc").value;
         var razon = document.getElementById("razon").value;
         var direccionf = document.getElementById("direccionf").value;
         var telefonof = document.getElementById("telefonof").value;

         if( $('#datosfact').prop('checked') )
         {
            return true;
         }else
         {
         var nruc = document.getElementById("nruc").value;
         var nrazon = document.getElementById("nrazon").value;
         var ndireccionf = document.getElementById("ndireccionf").value;
         var ntelefonof = document.getElementById("ntelefonof").value;


         document.getElementById("ruc").value = nruc;
         document.getElementById("razon").value = nrazon;
         document.getElementById("direccionf").value = ndireccionf;
         document.getElementById("telefonof").value = ntelefonof;

         ruc = document.getElementById("ruc").value;
         razon = document.getElementById("razon").value;
         direccionf = document.getElementById("direccionf").value;
         telefonof = document.getElementById("telefonof").value;
         
         }
        
        if(ruc)
                {

                    if(razon)
                    {

                        if(direccionf)
                    {
                     
                        if(telefonof)
                    {
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('ruc', ruc);
                        paqueteDeDatos.append('razon', razon);
                        paqueteDeDatos.append('direccionf', direccionf);
                        paqueteDeDatos.append('telefonof', telefonof);
                        
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/updateuserdos.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {
                                        return true;
                                    });
                     }else
                   {
                     swal("Alto!","Ingresa un teléfono en facturacion" , "error");
                      $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
                   
                    }else
                   {
                     swal("Alto!","Ingresa una dirección de facturacion" , "error");
                      $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
                    }else
                   {
                     swal("Alto!","Ingresa la razón social" , "error");
                     $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
               }else
               {
                 swal("Alto!","Ingresa un ruc o cédula" , "error");
                  $('#completar').attr('onClick', 'guardar_pedido();');
                 return false;
               }
    }

     function actualizartres()
    {
         var provincia = document.getElementById("provincia").value;
         var ciudad = document.getElementById("ciudad").value;
         var direccion = document.getElementById("direccion").value;
         var referencia = document.getElementById("referencia").value;
        if(provincia)
                {

                    if(ciudad)
                    {

                        if(direccion)
                    {
                         if(referencia)
                    {
                       
                        var paqueteDeDatos = new FormData();
                        paqueteDeDatos.append('provincia', provincia);
                        paqueteDeDatos.append('ciudad', ciudad);
                        paqueteDeDatos.append('direccion', direccion);
                        paqueteDeDatos.append('referencia', referencia);
                        $.ajax({
                        type: "POST",
                        url: "../administrador/procesos/updateuserthree.php",
                        contentType: false,
                                    data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                                    processData: false,
                                    cache: false, 
                                     }).done(function( msg ) {
                                        return true;
                                    });
                   }else
                   {
                     swal("Alto!","Ingresa una referencia" , "error");
                      $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
                    }else
                   {
                     swal("Alto!","Ingresa una dirección" , "error");
                     $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
                    }else
                   {
                     swal("Alto!","Ingresa una ciudad" , "error");
                     $('#completar').attr('onClick', 'guardar_pedido();');
                     return false;
                    }
               }else
               {
                 swal("Alto!","Ingresa una provincia" , "error");
                  $('#completar').attr('onClick', 'guardar_pedido();');
                 return false;
               }
    }

    function buscarciudad(id)
    {
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('pais', id);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/buscarcity.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            $('#ciu').html(msg);
                        });
    }
     function calculoenvio(id)
    {
      
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('pais', id);
           
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/calculoenvio.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            $('#resumen').html(msg);
                        });
    }


      function buscarpago(id)
    {
        var ciudad = document.getElementById("ciudad").value;
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('pais', id);
             paqueteDeDatos.append('ciudad', ciudad);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/calculopago.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            $('#resumen').html(msg);
                        });
    }



    function validarcompra()
    {
        $('#completarrr').hide();
        $('#vlid').show();

        // $('#completarrr').attr('onclick','');
         var iduser = document.getElementById("iduser").value;
         var transa = document.getElementById("id_transaccion").value;
         var ttipo = "BY_OTP";
         var codigover = document.getElementById("codigoverificacion").value;
        
        if (codigover.length >5 && codigover.length <7){
    
         var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('transaction', transa);
            paqueteDeDatos.append('type', ttipo);
            paqueteDeDatos.append('value', codigover);
            paqueteDeDatos.append('user', iduser);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/verify.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            console.log(msg);
                              
                               msg = JSON.parse(msg);
                              console.log(msg);                         

                          if (msg.transaction.status == "success"){
        document.getElementById("id_transaccion").value=msg.transaction.id;
        document.getElementById("codigo_autorizacion").value= msg.transaction.authorization_code;
         $.ajax({
            type: "POST",
            url: "../administrador/procesos/savepedido.php",
            data: $('#comprar').serialize(), // Al atributo data se le asigna el objeto FormData.
                       
                         }).done(function( msg ) {
                           
                           if(msg > 0)
                           {
                           
                           window.location.href ='orden-completada.php?id='+msg;
                           // Location.href='orden-completada.php';
                           }else
                           {
                            swal("Alto!","Ocurrió un error inténtalo de nuevo" , "error");
                                 $('#completar').attr('onClick', 'guardar_pedido();');
                           }
                        });
    }else
    {
         swal("Alto!","Código de Validación Incorrecto" , "error");
       // $('#completarrr').attr('onClick', 'validarcompra();');
        $('#completarrr').show();
        $('#vlid').hide();
    }
     });
     }else
     {
         swal("Alto!","Código de Validación debe contener 6 dígitos" , "error");
       // $('#completarrr').attr('onClick', 'validarcompra();');
        $('#completarrr').show();
        $('#vlid').hide();
     }
    }

   function guardar_pedido()
    {
        $('#completar').attr('onclick','');
         
        if( $('#terminos').prop('checked') ) {
    var ppago = $('input:radio[name=pago]:checked').val();
    

    if(ppago != null){
    if(ppago == "Tarjeta crédito/débito"){
      var paymentezCheckout = new PaymentezCheckout.modal({
      client_app_code: 'NATURALCARE-EC-CLIENT', // Client Credentials Provied by Paymentez
      client_app_key: 'buLX8bAWXshiiYJGAJwqVhFC1u9K5o', // Client Credentials Provied by Paymentez
      locale: 'es', // User's preferred language (es, en, pt). English will be used by default.
      env_mode: 'prod', // `prod`, `stg`, `dev`, `local` to change environment. Default is `stg`
      onOpen: function() {
          console.log('modal open');
      },
      onClose: function() {
          console.log('modal closed');
           $('#completar').attr('onClick', 'guardar_pedido();');
      },
      onResponse: function(response) { // The callback to invoke when the Checkout process is completed
    console.log(response);
    if (response.transaction.status=="success"){
        document.getElementById("id_transaccion").value=response.transaction.id;
        document.getElementById("codigo_autorizacion").value=response.transaction.authorization_code;
        document.getElementById("responses").value=response;

         $.ajax({
            type: "POST",
            url: "../administrador/procesos/savepedido.php",
            data: $('#comprar').serialize(), // Al atributo data se le asigna el objeto FormData.
                       
                         }).done(function( msg ) {
                           
                           if(msg > 0)
                           {
                           
                           window.location.href ='orden-completada.php?id='+msg;
                           // Location.href='orden-completada.php';
                           }else
                           {
                            swal("Alto!","Ocurrió un error intóntalo de nuevo" , "error");
                                 $('#completar').attr('onClick', 'guardar_pedido();');
                           }
                        });
        
     
//lo que deseas hacer
}else
{
     if (response.transaction.status=="pending"){
        
        document.getElementById("id_transaccion").value=response.transaction.id;
       

        $('#modalverificar').modal('show');



    }else{
     swal("Alto!","Tu transacción no pudo ser procesada inténtalo nuevamente"+response.transaction.message , "error");
    }
    
}
          console.log('modal response');
          document.getElementById('response').innerHTML = JSON.stringify(response); 
           $('#completar').attr('onClick', 'guardar_pedido();');           
      }
  });

    // Open Checkout with further options:
     var tot = document.getElementById("valtot").value;
     var ema = document.getElementById("email").value;
     var iduser = document.getElementById("iduser").value;
     var cel = document.getElementById("celular").value;
     var ord = document.getElementById("or").value;
     var st = (parseFloat(tot)/1.15);
     var iv=    (parseFloat(st)*0.15);
    // var tcredio = document.getElementById("tcredio").value;//aqui esta la variable del tipo de credito
      var tcredio = 0;
        paymentezCheckout.open({
          user_id: iduser,
          user_email: ema, //optional        
          user_phone: cel, //optional
          order_description: 'Paga de manera Segura',
          order_amount: parseFloat(tot),
          order_vat: (Math.round((parseFloat(iv)) * 100) / 100) ,//valor del iva el calculo
          order_reference: '#'+ord,
          order_installments_type: parseFloat(tcredio),  //  la forma del credito
          order_taxable_amount: (Math.round((parseFloat(tot)/1.15) * 100) / 100), // optional:  subtotal sin iva
          order_tax_percentage: 15 // optional: siempre es 12%
        });
 

  // Close Checkout on page navigation:
  window.addEventListener('popstate', function() {
    paymentezCheckout.close();
  });

}else
{
    if(ppago != "Tarjeta crédito/débito"){    
    swal({   
            title: "Procesando Compra",   
            text: "Espera por favor",   
            
             imageUrl: "carga.gif",
            showConfirmButton: false 
        });
    }

          $.ajax({
            type: "POST",
            url: "../administrador/procesos/savepedido.php",
            data: $('#comprar').serialize(), // Al atributo data se le asigna el objeto FormData.
                       
                         }).done(function( msg ) {
                           
                           if(msg > 0)
                           {
                           
                           window.location.href ='orden-completada.php?id='+msg;
                           // Location.href='orden-completada.php';
                           }else
                           {
                            swal("Alto!","Ocurrió un error inténtalo de nuevo" , "error");
                                 $('#completar').attr('onClick', 'guardar_pedido();');
                           }
                        });


}
   
    }else
    {
         swal("Alto!","Seleccione una forma de pago" , "error");
           $('#completar').attr('onClick', 'guardar_pedido();');
    }     
    }else
    {
         swal("Alto!","Acepta los términos para completar el pedido" , "error");
           $('#completar').attr('onClick', 'guardar_pedido();');
    }

    }
  </script>
  
  
  <!-- form wizard -->
    <script type="text/javascript" src="../js/wizard/jquery.smartWizard.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function () {
            var invitado = document.getElementById("invitado").value;
            if(invitado > 0)
            {
                $('#provincia').removeAttr("readonly");
                $('#ciudad').removeAttr("readonly");
                $('#direccion').removeAttr("readonly");
                $('#referencia').removeAttr("readonly");
                $('#nombres').removeAttr("readonly");
                $('#apellidos').removeAttr("readonly");
                $('#telefono').removeAttr("readonly");
                $('#celular').removeAttr("readonly");
                $('#email').removeAttr("readonly");
                $('#nruc').removeAttr("readonly");
                $('#nruc').removeAttr("readonly");
                $('#nrazon').removeAttr("readonly");
                $('#ndireccionf').removeAttr("readonly");
                $('#ntelefonof').removeAttr("readonly");
                $('#ci').removeAttr("readonly");
                
            }
               $('#wizard').smartWizard({
                transitionEffect:'slideleft',
                onLeaveStep:leaveAStepCallback,
                onFinish:onFinishCallback,
                
            });


              function leaveAStepCallback(obj){
                var step_num= obj.attr('rel');
                return validateSteps(step_num);
              }
              
             

            function onFinishCallback() {
             $('#completar').attr('onclick','');
         
        if( $('#terminos').prop('checked') ) {
    
         $('.modal').modal('show');
      
        $.ajax({
            type: "POST",
            url: "../administrador/procesos/savepedido.php",
            data: $('#comprar').serialize(), // Al atributo data se le asigna el objeto FormData.
                       
                         }).done(function( msg ) {
                           
                           if(msg > 0)
                           {
                           
                           window.location.href ='orden-completada.php?id='+msg;
                           // Location.href='orden-completada.php';
                           }else
                           {
                            swal("Alto!","Ocurrió un error inténtalo de nuevo" , "error");
                                 $('#completar').attr('onClick', 'guardar_pedido();');
                           }
                        });
        
    }else
    {
         swal("Alto!","Acepta los términos para completar el pedido" , "error");
           $('#completar').attr('onClick', 'guardar_pedido();');
    }
             
            }

        });
  </script>
  
  
  <!-- form wizard -->
    <script type="text/javascript" src="../js/wizard/jquery.smartWizard.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function () {
            var invitado = document.getElementById("invitado").value;
            if(invitado > 0)
            {
                $('#provincia').removeAttr("readonly");
                $('#ciudad').removeAttr("readonly");
                $('#direccion').removeAttr("readonly");
                $('#referencia').removeAttr("readonly");
                $('#nombres').removeAttr("readonly");
                $('#apellidos').removeAttr("readonly");
                $('#telefono').removeAttr("readonly");
                $('#celular').removeAttr("readonly");
                $('#email').removeAttr("readonly");
                $('#nruc').removeAttr("readonly");
                $('#nruc').removeAttr("readonly");
                $('#nrazon').removeAttr("readonly");
                $('#ndireccionf').removeAttr("readonly");
                $('#ntelefonof').removeAttr("readonly");
                
            }
               $('#wizard').smartWizard({
                transitionEffect:'slideleft',
                onLeaveStep:leaveAStepCallback,
                onFinish:onFinishCallback,
                
            });


              function leaveAStepCallback(obj){
                var step_num= obj.attr('rel');
                return validateSteps(step_num);
              }
              
             

            function onFinishCallback() {
             $('#completar').attr('onclick','');
         
        if( $('#terminos').prop('checked') ) {
    
         $('.modal').modal('show');
      
        $.ajax({
            type: "POST",
            url: "../administrador/procesos/savepedido.php",
            data: $('#comprar').serialize(), // Al atributo data se le asigna el objeto FormData.
                       
                         }).done(function( msg ) {
                           
                           if(msg > 0)
                           {
                           
                           window.location.href ='orden-completada.php?id='+msg;
                           // Location.href='orden-completada.php';
                           }else
                           {
                            swal("Alto!","Ocurrió un error inténtalo de nuevo" , "error");
                                 $('#completar').attr('onClick', 'guardar_pedido();');
                           }
                        });
        
    }else
    {
         swal("Alto!","Acepta los términos para completar el pedido" , "error");
           $('#completar').attr('onClick', 'guardar_pedido();');
    }
             
            }

        });

        

        function validateSteps(step){
        var isStepValid = true;
         
      // validate step 1
      if(step == 1){
         
        
        if(actualizaruno() == false ){
           
         isStepValid = false; 
             swal({ 
                    title: "Alto!",
                    text: "Todos los campos con (*) del paso uno son obligatorios",
                    type: "error" 
                    },
                    function(){
                     
                    });

        }else{
          isStepValid = true;
        }
      }

        if(step == 2)
        {
             if(actualizardos() == false ){
             isStepValid = false; 
          swal({ 
                    title: "Alto!",
                    text: "Todos los campos del paso dos son obligatorios",
                    type: "error" 
                    },
                    function(){
                     
                    });

        }else{
            isStepValid = true;
          
        }
        }

        if(step == 3)
        {
             if(actualizartres() == false ){
                 isStepValid = false; 
          swal({ 
                    title: "Alto!",
                    text: "Todos los campos del paso tres son obligatorios",
                    type: "error" 
                    },
                    function(){
                      isStepValid = false; 
                    });

        }else{
          isStepValid = true;
        }
        }
     
      
      
      
      return isStepValid;
    }

    
 function cupon()
    {
        var email = document.getElementById('email').value;
        var codigo = document.getElementById('codigo').value;
        var subtotal = document.getElementById('subtotal').value;

        if(email)
        {
        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('codigo', codigo);
            paqueteDeDatos.append('email', email);
            paqueteDeDatos.append('subtotal', subtotal);
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/savecarcupon.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            if(msg == 1)
                        {
                             location.reload();
                        }else
                        {
                            if(msg == 3)
                        {
                             swal({ 
                                        title: "Alto!",
                                        text: "Tu compra es inferior al límite de tu cupón",
                                        type: "error" 
                                        },
                                        function(){
                                        //location.reload();
                                        });
                        }else{
                             swal({ 
                                        title: "Alto!",
                                        text: "Cupón inválido ",
                                        type: "error" 
                                        },
                                        function(){
                                        //location.reload();
                                        });
                            }
                        }
                        });
             }else
    {
         swal("Alto!","Ingresa un email para asignar el cupón" , "error");
           
    }
    }
   
     function borrarcupon(id,cupon)
    {
      
        if(cupon)
        {

            swal({   
            title: "Al eliminar este cupón aplicado ya no podrá volver a utilizarlo en otra compra. Desea proceder a borrarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo eliminarlo!",   
            closeOnConfirm: false 
        }, function(){

        var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('codigo', cupon);
             paqueteDeDatos.append('id', id);
          
            
            $.ajax({
            type: "POST",
            url: "../administrador/procesos/deletecarcupon.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                            if(msg == 1)
                        {
                            window.location.reload();
                                       
                        }
                        });
          });
             }else
    {
         swal("Alto!","Ingresa un cupón" , "error");
           
    }
    }
   

    
    

       
    </script>
    
    
</html>