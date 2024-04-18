<?php 
session_start();
unset($_SESSION['invitado']);
session_destroy();
header('Location: ../index.php');
?>