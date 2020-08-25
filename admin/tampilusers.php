<?php 

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}

$row = namauser($_COOKIE);
$admin = $row["username"];


?>