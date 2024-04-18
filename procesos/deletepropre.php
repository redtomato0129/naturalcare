
<?php
include('../config/app_config.php');


$sql = "UPDATE productos_presentacion SET estado='2' where id=".$_POST['id']." ";
 
 mysql_query($sql);


?>