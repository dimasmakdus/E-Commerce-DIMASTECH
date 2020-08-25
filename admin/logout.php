<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('dims', '', time() - 3600);
setcookie('dimk', '', time() - 3600);


header("Location: login.php");
exit;


 ?>