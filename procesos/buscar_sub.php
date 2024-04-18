
<?php

include('../config/app_config.php');


$sql = "Select *from subcategorias where categoria='".$_POST['pais']."' and estado='1'";
 
 $result= mysql_query($sql);
 $mostrar = '<div class="form-group "> <label for="input6">Sub-Categoria</label>
 <select class="form-control p-0" id="subcategoria" name="subcategoria" required>';

 while($fila = mysql_fetch_array($result))
 {
$mostrar.='<option value="'.$fila['id'].'">'.$fila['descripcion'].'</option>';
 }
 $mostrar.=' </select> </div>';
echo $mostrar;
	



?>