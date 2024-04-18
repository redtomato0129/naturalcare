<?php
include('../config/app_config.php');

if(is_numeric($_POST['id']))
{
	$sql = "UPDATE natuser SET estado='2' WHERE id=".$_POST['id'];
	mysql_query($sql);
}                                      	
?>