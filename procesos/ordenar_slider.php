<?php

include('../config/app_config.php');
session_start();


foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE sliders SET orden  = '.($key+1).' WHERE id ='.$value;
   mysql_query($update);        
} 
 
echo $update;
	



?>