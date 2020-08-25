<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if( hapuskategori($id) > 0 ) {
	echo "
			<script>
				alert('Kategori berhasil dihapus');
				document.location.href = 'daftarproduk.php';
			</script>
		";
}else {
	echo "
			<script>
				alert('Kategori gagal dihapus');
				document.location.href = 'daftarproduk.php';
			</script>
		";
}



?>