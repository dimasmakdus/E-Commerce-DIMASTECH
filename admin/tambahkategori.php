<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}
require '../functions.php';

if ( isset($_POST["submit"]) ) {

    if ( tambahKategori($_POST) > 0 ) {
        setcookie('tambahBerhasil', 'berhasil',time()+5);
        echo "
            <script>              
              document.location.href = 'kategori.php';
            </script>
            ";
    } else {
        setcookie('tambahGagal', 'gagal',time()+5);
        echo "
            <script>              
              document.location.href = 'kategori.php';
            </script>
            ";
    }
}


?>
