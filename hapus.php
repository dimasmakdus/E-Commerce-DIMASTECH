<?php 

require 'functions.php';
$query = query("SELECT * FROM keranjang");


if( hapus($query) > 0 ) {
	echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'shoping-cart.php';
			</script>
		";
}else {
	echo "
			<script>
				alert('data gagal dihapus');
				document.location.href = 'shoping-cart.php';
			</script>
		";
}

?>