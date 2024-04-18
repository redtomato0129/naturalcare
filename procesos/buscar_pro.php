
<?php

include('../config/app_config.php');


$sql = "Select *from productos where subcategoria='".$_POST['pais']."' and estado='1'";
 
 $result= mysql_query($sql);
 $mostrar = '<div class="form-group m-b-40">
 <label for="input6">Productos</label>
 <select class="form-control p-0" id="producto" onchange="buscar_presentacion()" required>
 <option value="0">SELECCIONE</option>';

 while($fila = mysql_fetch_array($result))
 {
$mostrar.='<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
 }
 $mostrar.=' </select> </div>';
echo $mostrar;
	



?>