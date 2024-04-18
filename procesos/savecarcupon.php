
<?php
session_start();
/* Función */
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


include('../config/app_config.php');


$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];

$datos = "SELECT *FROM usuario_admin";
$rdatos = mysql_query($datos);
$fdatos = mysql_fetch_array($rdatos);


$svali = "SELECT *FROM cupones WHERE codigo='".$_POST['codigo']."' and estado='1'";
$rvali = mysql_query($svali);
$valid=0;
while($fvalid = mysql_fetch_array($rvali))
{
	$valid++;
}

$svali2 = "SELECT *FROM cupones WHERE codigo='".$_POST['codigo']."' and estado='1' and superior <= ".$_POST['subtotal']."";
$rvali2 = mysql_query($svali2);
$valid2=0;
while($fvalid2 = mysql_fetch_array($rvali2))
{
	$valid2++;
}

if($valid > 0)
{
	if($valid2 > 0)
	{
	 $svalidar = "SELECT *FROM cupones WHERE codigo='".$_POST['codigo']."' and estado='1' and superior <= ".$_POST['subtotal']." and codigo NOT IN (select cupon from cupones_usuarios where usuario='".$_POST['email']."')";
	$rvalidar = mysql_query($svalidar);
	$validador=0;
	while($fvalidar = mysql_fetch_array($rvalidar))
	{
		 
		$fecha = date('m/d/y');
		$fechas = explode("-", $fvalidar['rango']);
		$fecha_inicio= trim($fechas[0]);
		$fecha_fin= trim($fechas[1]);

		if (check_in_range($fecha_inicio, $fecha_fin, $fecha))
		{
		   $validador++;
		  

		} else {
		    $validador=0;
		}
	}




	if($validador != 0)
	{

		$svali = "SELECT *FROM cupones WHERE codigo='".$_POST['codigo']."' and estado='1'";
		$rvali = mysql_query($svali);
		$fvali = mysql_fetch_array($rvali);
		$valor = 0;
		if($fvali['bandera']>0)
		{
			$valfinal =  "SELECT a.producto,c.precio FROM cupones AS a 
			LEFT JOIN carrito as c ON (a.producto = c.producto)
			LEFT JOIN productos as b ON (a.producto = b.id)
			WHERE a.codigo='".$_POST['codigo']."' AND c.carro = '".$_SESSION["idcarrito"]."' and a.estado='1' and a.producto != ''";
			$rvalfinal = mysql_query($valfinal);
			$fvalfinal = mysql_fetch_array($rvalfinal);

			if(isset($fvalfinal['precio']))
			{
				
				if($fvali['tipo'] == '1')
		        { 
		            $valor =((($fvalfinal['precio']/1.15)*$fvali['valor'])/100);
		            $insertar = '1';

		        }else
		        {
		            $valor = $fcupon['valor'];
		            $insertar = '1';
		        }
			}else
			{
				$insertar = '0';
			}


		}else
		{
			$valor = 0;
			$insertar = '1';
		}


		if($insertar == '1'){
		$sql = "INSERT INTO carrito_cupon VALUES ('','".$_SESSION['idcarrito']."','".$_POST['codigo']."',now(),'".$valor."')";
		$res=mysql_query($sql);
		if($res == true)
		{
			$s = "INSERT INTO cupones_usuarios VALUES ('','".$_POST['email']."','".$_POST['codigo']."',now())";
			$r=mysql_query($s);
			$_SESSION['emailcupon']=$_POST['email'];
			echo "1";
		}

		}else
		{
			echo "4";
		}


		



	}else
	{
		echo "2";
	}
}else
	{
		echo "3";
	}
}else
{
	echo "2";
}



?>