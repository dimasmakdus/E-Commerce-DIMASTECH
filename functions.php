<?php 
$conn = mysqli_connect("localhost", "root", "", "toko_online");

// jumlah masuk keranjang
$keranjang = mysqli_query($conn, "SELECT * FROM keranjang");
$jumlah_cart = mysqli_num_rows($keranjang);

// total sub harga pada keranjang
$totalSubHarga = mysqli_query($conn, "SELECT SUM(harga*jumlah) FROM keranjang");
$subtotal = mysqli_fetch_array($totalSubHarga);

// kategori
$id_ssd = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = '1' ");
$id_hdd = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = '2' ");
$id_cpu = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = '3' ");
$id_mobo = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = '4' ");
$id_ram = mysqli_query($conn, "SELECT * FROM produk WHERE kategori = '5' ");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function rupiah($angka){

	// $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

function tambahcart($data) {
	// ambil data dari tiap elemen dalam form
	global $conn;
	$id = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambar = $data["gambar"];
	$jumlah = $data["jumlah"];


	// cek keranjang sudah ada atau belum
	$result = mysqli_query($conn, "SELECT * FROM keranjang WHERE id = '$id' ");

	if ( mysqli_fetch_assoc($result) ) {

		$keranjang = mysqli_query($conn, "SELECT jumlah FROM keranjang WHERE id = '$id' ");
		$jumlahProduk = mysqli_fetch_assoc($keranjang);

		$jumlah = $jumlah + (int)$jumlahProduk["jumlah"];
		$query = "UPDATE keranjang SET jumlah = '$jumlah' WHERE id = '$id' ";
		mysqli_query($conn, $query);

	} else {
		// query insert data
		$query = "INSERT INTO keranjang VALUES ('$id', '$nama', '$harga', '$gambar', '$jumlah')";
		mysqli_query($conn, $query);
		
	}

return mysqli_affected_rows($conn);

}

function hapus($data) {
	global $conn;
	mysqli_query($conn, "DELETE FROM keranjang");
	return mysqli_affected_rows($conn);
}

function hapusproduk($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapuskategori($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	$id = $data["id"];
	$jumlah = $data["jumlah"];

	$query = "UPDATE keranjang SET jumlah = $jumlah WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahKategori($data) {
	global $conn;
	$id = $data["id"];
	$nama = $data["nama"];

	$query = "UPDATE kategori SET nama = $nama WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function ubahproduk($data) {
	// ambil data dari tiap elemen dalam form
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$id_kategori = $data["kategori"];

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else {
		$gambar = upload();
	}

	$result = mysqli_query($conn, "SELECT id FROM kategori WHERE nama = '$id_kategori' ");
	$row = mysqli_fetch_assoc($result);
	$kategori = $row["id"];

	$query = "UPDATE produk SET 
				nama = '$nama', 
				harga = '$harga',
				keterangan = '$keterangan',
				gambar = '$gambar',
				kategori = '$kategori'
			WHERE id = $id
			";

	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);

}

function kirim($data) {
	// ambil data dari tiap elemen dalam form
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$kurir = htmlspecialchars($data["kurir"]);
	$totalharga = htmlspecialchars($data["totalharga"]);

	// query insert data
	$kirim = "INSERT INTO pengiriman VALUES ('', '$nama', '$alamat', '$kurir', '$totalharga')";
	mysqli_query($conn, $kirim);

	$hapus = mysqli_query($conn, "DELETE FROM keranjang");

	return mysqli_affected_rows($conn);

}

function tmbahKategori($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	
	$query = "INSERT INTO kategori VALUES ('', '$nama') ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function tambahProduk($data) {
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$harga = htmlspecialchars($data["harga"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$id_kategori = htmlspecialchars($data["kategori"]);

	// upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	$result = mysqli_query($conn, "SELECT id FROM kategori WHERE nama = '$id_kategori' ");
	$row = mysqli_fetch_assoc($result);

	$kategori = $row["id"];

	$query = "INSERT INTO produk VALUES ('', '$nama', '$harga', '$keterangan', '$gambar', '$kategori')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {
	// fugsi upload gambar
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
					alert('Pilih gambar terlebih dahulu...');
				</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
					alert('Yang anda upload bukan gambar..');
				</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ( $ukuranFile > 1000000 ) {
		echo "<script>
					alert('Ukuran gambar terlalu besar!');
				</script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../images/produk/'. $namaFileBaru);
	return $namaFileBaru;

}


function registrasi($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$username = strtolower(stripcslashes($data["username"]));
	$email = htmlspecialchars($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");
	if ( mysqli_fetch_assoc($result) ) {
		echo "<script>
			alert('username sudah terdaftar');
			</script>";
		return false;
	}


	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$nama', '$email', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

function namauser($user) {
	global $conn;
	$id = $user["dims"];
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id' ");
	$row = mysqli_fetch_assoc($result);

	return $row;
}


?>