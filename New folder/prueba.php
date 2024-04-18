<?php 
echo $fecha_actual = date("d/m/Y");
$date_now = date('d-m-Y');
$date_future = strtotime('+7 day', strtotime($date_now));
$date_future = date('d-m-Y', $date_future);
echo $fecha_nueva = date("d/m/Y", strtotime($date_future));
?>