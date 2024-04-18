
<?php
include('../config/app_config.php');


$sql = "UPDATE productos SET estado='2' where id=".$_POST['id']." ";
 
 mysql_query($sql);


?>