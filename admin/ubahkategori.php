<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}
require '../functions.php';

if ( isset($_POST["submit"]) ) {

    if ( ubahKategori($_POST) > 0 ) {
        setcookie('ubahBerhasil', 'berhasil',time()+5);
        echo "
            <script>
              document.location.href = 'kategori.php';
            </script>
            ";
    } else {
        setcookie('ubahGagal', 'gagal',time()+5); 
        echo "
            <script>
              document.location.href = 'kategori.php';
            </script>
            ";
    }
}


?>
