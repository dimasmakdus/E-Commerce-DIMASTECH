<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}
require '../functions.php';

if ( isset($_POST["submit"]) ) {

    if ( tambahProduk($_POST) > 0 ) {
        setcookie('tambahBerhasil', 'berhasil',time()+5);
        echo "
            <script>
              document.location.href = 'daftarproduk.php';
            </script>
            ";
    } else {
        setcookie('tambahGagal', 'gagal',time()+5);
        echo "
            <script>
              document.location.href = 'daftarproduk.php';
            </script>
            ";
    }
}


?>
