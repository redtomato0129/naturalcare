
<?php

include('../config/app_config.php');


$sql = "Select *from ciudades where provincia='".$_POST['pais']."'";
 
 $result= mysql_query($sql);
 $mostrar = '<label class="text-uppercase">Ciudad:</label>
            <div class="form-group select-wrapper">
                <select class="form-control" name="ciudad" id="ciudad" onchange="calculoenvio(this.value)">
                <option value="0">SELECCIONE</option>';

 while($fila = mysql_fetch_array($result))
 {
$mostrar.='<option value="'.$fila['ciudad'].'">'.$fila['ciudad'].'</option>';
 }
 $mostrar.=' </select> </div>';
echo $mostrar;
	



?>