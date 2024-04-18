
<?php

include('../config/app_config.php');


$sql = "Select *from productos where id=".$_POST['pais']." and estado='1'";
$result= mysql_query($sql);
$fila = mysql_fetch_array($result);
$tallas = explode(":;:", $fila['tallas']);
       
$mostrar = '<div class="form-group m-b-40">
<label for="input6">Presentación</label>
<select class="form-control p-0" id="presentacion" required>
<option value="0">SELECCIONE</option>';

 for($i=1;$i<count($tallas);$i++)
 {
    if($tallas[$i] != ":;:"  && $tallas[$i] != "" )
     { 
      $mostrar.=' <option value="'.$tallas[$i].'" >'.$tallas[$i].'</option>';
     } 
 } 
 
 $mostrar.=' </select> </div>';
echo $mostrar;
	



?>