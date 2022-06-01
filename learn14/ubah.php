<?php  
session_start();
require 'functions.php';

if (!isset($_SESSION['login'])) {
	header('Location: login.php');
	exit();
}

$id = $_GET["id"];

// Make Query to take old data
$student = show("SELECT * FROM students WHERE id = $id")[0];

if ( isset($_POST["submit"]) ) {

	if ( edit($_POST) > 0 ) {
		echo "
			<script>
				alert('Data Berhasil Di Ubah !');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Di Ubah !');
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
	<title>Edit Students</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>Edit Students</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $student["id"]; ?>">
		<input type="hidden" name="oldImage" value="<?= $student["image"]; ?>">
		<ul>
			<li>
				<label for="name">Username :</label>
				<input type="text" name="name" id="name" required value="<?= $student["name"]; ?>">
			</li>
			<br>
			<li>
				<label for="email">Email :</label>
				<input type="text" email="email" id="email" name="email" required value="<?= $student["email"]; ?>">
			</li>
			<br>
			<li>
				<label for="job">Job :</label>
				<input type="text" job="job" id="job" name="job" required value="<?= $student["job"]; ?>">
			</li>
			<br>
			<li>
				<label for="image">Image :</label><br>
				<img src="img/<?= $student["image"] ?>" width="50"><br>
				<input type="file" image="image" id="image" name="image">
			</li>
		</ul>
		<button type="submit" name="submit">Edit Students</button>
	</form>
</body>
</html>