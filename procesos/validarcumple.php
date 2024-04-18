
<?php

// include('../config/app_config.php');

$datuserb = "SELECT *FROM points_history where product_reference='999999' and user_id=".$oneid;
    $rdatosub = mysql_query($datuserb);
    $fusuariob = mysql_fetch_array($rdatosub);
    $descriptionvalidate =  $fusuariob['descripcion'];


    function calculaedad($fechanacimiento){
	  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	  $ano_diferencia  = date("Y") - $ano;
	  $mes_diferencia = date("m") - $mes;
	  $dia_diferencia   = date("d") - $dia;
	  if ($dia_diferencia < 0 || $mes_diferencia < 0)
	    $ano_diferencia--;
	  return $ano_diferencia;
	}
	$edad = calculaedad($fusuario['cumple'])+1;

    if(empty($descriptionvalidate)){


    	if (condition) {
    		// code...
    	}
    	// echo 'todavia no cumple'.$descriptionvalidate; 
    }else{ 
    	// echo "ya cumplio ".$descriptionvalidate; 
    } 

	// ACTUALIZAMOS LOS PUNTOS DEL USUARIO // status beneficio es el activador de tipo de beneficio (cupon-canjepuntos-plan de recompensa)
	// $sqlUser = "UPDATE natuser SET points='".$_POST['balance']."', status_beneficio='".$_POST['status']."' WHERE id=".$_POST['user_id'];
	// $ugo = mysql_query($sqlUser);
	// if ( $ugo == true) { echo 'Puntos Actualizados '; } else{ echo ' No se actualizaron los puntos algo pasaaaa! ';}

	// if($_POST['fecha'] > 0){
	// 	$fecha = $_POST['fecha'];
	// }
	// else{
	// 	$date = new DateTime();
	// 	$fecha = $date->format('Y-m-d') . "\n";
	//  }


	//INSERTAMOS EL REGISTRO DE LA OPERACIÓN
	// $sql = "INSERT INTO points_history VALUES (
	// '',
	// '".$fecha."',
	// '".$_POST['sum_points']."',
	// '".$_POST['deb_points']."',
	// '".$_POST['balance']."',
	// '".$_POST['user_id']."',
	// '".$_POST['descripcion']."',
	// '".$_POST['process_points']."',
	// '".$_POST['product_reference']."'
	// )";

	// $go = mysql_query($sql);
	// if ( $go == true) {
	// 	echo ' Registro agregado';
	// } else{ echo ' No se agregó el registro algo pasaaaa! ';}


?>