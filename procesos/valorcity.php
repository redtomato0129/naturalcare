
<?php
session_start();
include('../config/app_config.php');

$envio=0;
$valor ='No Hacemos Envios a esta ciudad';
$sql = "Select *from valores_envio where ciudad like ('%".trim($_POST['pais'])."%') and estado='1'";
$r= mysql_query($sql);
$result = mysql_fetch_array($r);


if(isset($result['valor']))
{
	 $envio = $result['valor'];
	 $valor = "$ ".number_format($result['valor'],2);
}

$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];

$descuento = 0;
$scupon = "select b.* from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);

  if($fcupon['id'] > 0)
	{
		if($fcupon['tipo'] == '1')
		{
			$descuento =(($subtotal*$fcupon['valor'])/100);

		}else
		{
			$descuento = $fcupon['valor'];
		}
	}	

echo $html='	  <div class=" text-uppercase">Compras <span class="card-total-price" style="text-align: right;">$'.number_format($subtotal,2).'</span>
                           
                            </div>
                             <div class=" text-uppercase">Descuento (-) <span class="card-total-price" style="text-align: right;">$ '.number_format($descuento,2).'</span>
                           
                            </div>
                             <div class=" text-uppercase">Envio (+) <span class="card-total-price" style="text-align: right;"> '.($valor).'</span>
                           
                            </div>
                             <div class="card-total text-uppercase">Subtotal <span class="card-total-price">$'.number_format(($subtotal-$descuento+$envio),2).'</span>
                            <h6>Valor incluye iva</h6>
                            </div>
                            <a href="checkout.php">   <button class="btn btn--full btn--lg">finalizar compra </button></a>
                       ';


?>