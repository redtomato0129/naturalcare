
<?php

include('../config/app_config.php');


$sql = "Select *from ciudades where provincia='".$_POST['pais']."'";
 
 $result= mysql_query($sql);
 $mostrar = '<div class="form-group m-b-40">
 <label for="input6">Elige la ciudad</label>
 <select class="form-control p-0" id="ciudad" required>';

 while($fila = mysql_fetch_array($result))
 {
$mostrar.='<option value="'.$fila['ciudad'].'">'.$fila['ciudad'].'</option>';
 }
 $mostrar.=' </select> </div>';
echo $mostrar;
	



?>