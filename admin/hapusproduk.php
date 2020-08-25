<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if( hapusproduk($id) > 0 ) {
	echo "
			<script>
				alert('Produk berhasil dihapus');
				document.location.href = 'daftarproduk.php';
			</script>
		";
}else {
	echo "
			<script>
				alert('Produk gagal dihapus');
				document.location.href = 'daftarproduk.php';
			</script>
		";
}



?>