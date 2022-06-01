<?php  

require 'functions.php';

// cek apakah tombol submit telah di tekan / belum
if ( isset($_POST["submit"]) ) {
	
	// Menampilkan Pesan Kesalahan / Keberhasilan Input Data
	if ( insert($_POST) > 0 ) {
		echo "
			<script>
				alert('Data Berhasil Di Tambahkan !');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Di Tambahkan !');
				document.location.href = 'tambah.php';
			</script>
		";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Input Students</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Add Students</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="name">Username :</label>
				<input type="text" name="name" id="name" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="email">Email :</label>
				<input type="text" email="email" id="email" name="email" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="job">Job :</label>
				<input type="text" job="job" id="job" name="job" required autocomplete="off">
			</li>
			<br>
			<li>
				<label for="image">Image :</label>
				<input type="file" image="image" id="image" name="image">
			</li>
		</ul>
		<button type="submit" name="submit">Add Students</button>
	</form>
</body>
</html>