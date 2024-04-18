<?php
include('../config/app_config.php');
session_start();


foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE subcategorias SET orden  = '.($key+1).' WHERE estado="1" and id ='.$value;
   mysql_query($update);        
} 
 
echo $update;
    


?>