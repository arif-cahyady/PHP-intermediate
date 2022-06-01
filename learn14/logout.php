<?php  
session_start();
session_unset();
session_destroy();

setcookie('chano', '', time() - 3600);
setcookie('nano', '', time() - 3600);

header("Location: login.php");


?>