
<?php

include('../config/app_config.php');


echo $sql = "UPDATE marcas SET estado='".$_POST['id_estado']."' where id=".$_POST['id']." ";
 
 mysql_query($sql);




?>