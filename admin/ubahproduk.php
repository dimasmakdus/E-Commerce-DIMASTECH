<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}
require '../functions.php';

if ( isset($_POST["submit"]) ) {

    if ( ubahProduk($_POST) > 0 ) {
        setcookie('ubahBerhasil', 'berhasil',time()+5);
        echo "
            <script>
              document.location.href = 'daftarproduk.php';
            </script>
            ";
    } else {
        setcookie('ubahGagal', 'gagal',time()+5); 
        echo "
            <script>
              document.location.href = 'daftarproduk.php';
            </script>
            ";
    }
}


?>

