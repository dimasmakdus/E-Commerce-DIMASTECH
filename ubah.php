<?php 

require 'functions.php';


$jumlah = $_POST["jumlah"];

// cek apakah data berhasil diubah atau tidak?
if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'shoping-cart.php';
			</script>
		";
} else {
		echo "
			<script>
				alert('data gagal diubah');
				document.location.href = 'shoping-cart.php';
			</script>
		";
}

?>