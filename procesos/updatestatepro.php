
<?php

include('../config/app_config.php');


$sql = "UPDATE productos SET estado='".$_POST['id_estado']."' where id=".$_POST['id']." ";
 
 mysql_query($sql);




?>