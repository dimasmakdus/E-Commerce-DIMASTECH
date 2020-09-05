<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if( hapusproduk($id) > 0 ) {
	setcookie('hapusBerhasil', 'berhasil',time()+5);
	echo "
			<script>				
				document.location.href = 'daftarproduk.php';
			</script>
		";
}else {
	setcookie('hapusGagal', 'gagal',time()+5); 
	echo "
			<script>				
				document.location.href = 'daftarproduk.php';
			</script>
		";
}



?>