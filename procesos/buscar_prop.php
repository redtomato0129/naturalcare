
<?php

include('../config/app_config.php');


$sql = "Select *from productos where subcategoria='".$_POST['pais']."' and estado='1'";
 
 $result= mysql_query($sql);
 $mostrar = ' <div class="form-group">
<label for="input6">Elije 4 productos</label>
<select class="select2 m-b-10 select2-multiple" id="productos" multiple="multiple" data-placeholder="Seleccione solo 4 productos">';

 while($fila = mysql_fetch_array($result))
 {
$mostrar.='<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
 }
 $mostrar.=' </select> </div>';
echo $mostrar;
	



?>