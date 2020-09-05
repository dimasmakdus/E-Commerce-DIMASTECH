<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if( hapuskategori($id) > 0 ) {
	setcookie('hapusBerhasil', 'berhasil',time()+5);
	echo "
			<script>				
				document.location.href = 'kategori.php';
			</script>
		";
}else {
	setcookie('hapusGagal', 'gagal',time()+5);
	echo "
			<script>				
				document.location.href = 'kategori.php';
			</script>
		";
}



?>