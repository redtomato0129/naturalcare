<?php

include('../config/app_config.php');
session_start();
$scarrocant = "SELECT SUM(cantidad) as cantidad FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritocant = mysql_query($scarrocant);
$fcantidad = mysql_fetch_array($rcarritocant);
$cantidad = $fcantidad['cantidad'];

$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];


$puntoscanjeados=$_SESSION['puntoscanjeados'];


$svalores = "SELECT *FROM valores_envio WHERE trim(ciudad) like '".trim($_POST['pais'])."' and estado='1'";
$rvalores = mysql_query($svalores);
$fvalores = mysql_fetch_array($rvalores);
if($fvalores['valor']>0)
{
	$envio = $fvalores['valor'];
}else
{
	$envio = 0;
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


$descuento = 0;
$scupon = "select b.*,a.valor as descuento  from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);

  if($fcupon['id'] > 0)
  {
    if($fcupon['descuento']>0){
          $descuento = $fcupon['descuento'];
        }
        else{
    if($fcupon['tipo'] == '1')
    {
      $descuento =((($subtotal/1.15)*$fcupon['valor'])/100);

    }else
    {
      $descuento = $fcupon['valor'];
    }
  }
  } 
$senviogratis = "SELECT *FROM envio_gratis";
$renviogratis = mysql_query($senviogratis);
$fenviogratis = mysql_fetch_array($renviogratis);

if($subtotal > $fenviogratis['valor'])
{   
    $envio = 0;
}

$scupon22 = "select a.* from carrito_puntos as a
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon22 = mysql_query($scupon22);
$fcupon22 = mysql_fetch_array($rcupon22);

   if($fcupon22['id'] > 0)
        {
            $descuento3 = $fcupon22['valor'];
            $_SESSION['puntoscanjeados'] = $fcupon22['puntos'];

        }else
        {
            $descuento3 = $fcupon22['valor'];
        }


$puntoscanjeados=$_SESSION['puntoscanjeados'];
$descuento = $descuento1+$descuento2+$descuento3;

$mostrar = ' <h2>Resumen de orden</h2>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">items</th>
                                  <th class="derecha" scope="col">'.$cantidad.'</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                
                                <tr>
                                  <th scope="row">Subtotal sin IVA</th>
                                  <td class="derecha">$'.number_format(($subtotal/1.15),2).'</td>
                                </tr>
                                
                              
                                 <tr>
                                  <th scope="row">Descuento (-)</th>
                                  <td class="derecha">$'.number_format(($descuento),2).'</td>
                                </tr>
                                 <tr>
                                  <th scope="row">Puntos Canjeados (-)</th>
                                  <td class="derecha">$'.number_format(($puntoscanjeados),0).'</td>
                                </tr>

                                 <tr>
                                  <th scope="row">Envío a '.$_POST['pais'].' (+)</th>
                                  <td class="derecha"><div id="envio">'.number_format(($envio/1.15),2).'</div></td>
                                </tr>

                                <tr>
                                  <th scope="row">IVA 15% (+)</th>
                                  <td class="derecha">$'.number_format((((($subtotal/1.15)-$descuento)*0.15)+(($envio/1.15)*0.15)),2).'</td>
                                </tr>
                                
                               

                                

                              </tbody>
                            </table>
                           
                           
                            <div class="card-total-sm">
                                <div class="float-right">total <span class="card-total-price">$ '.number_format((($subtotal/1.15))-($descuento)+(((($subtotal/1.15)-$descuento)*0.15))+($envio/1.15)+(number_format((($envio/1.15)*0.15),2)),2).'</span></div>
                                <input type="hidden" name="id_transaccion" id="id_transaccion" value="" />
                             <input type="hidden" name="codigo_autorizacion" id="codigo_autorizacion" value="" />
                             <input type="hidden" name="responses" id="responses" value="" />
                    
                             <input type="hidden" name="valtot" id="valtot" value="'.number_format((($subtotal/1.15))-($descuento)+(((($subtotal/1.15)-$descuento)*0.15))+($envio/1.15)+((number_format((($envio/1.15)*0.15),2))),2).'">
                             <input type="hidden" name="iduser" id="iduser" value="'.$_SESSION['idcarrito'].'">
                             <input type="hidden" name="or" id="or" value="<'.rand(10000,20000).'">
                             <input type="hidden" name="subtotal" id="subtotal" value="'.$subtotal.'" >

                            </div>
                            <div class="mt-2"></div>';


 
echo $mostrar;
	



?>