<?php  
session_start();
session_destroy();
$_SESSION['auth'] = 0;
header("location:index.php");

?>