<?php  
// cek apakah tombol login telah di tekan
if (isset($_POST["submit"])) {
	// cek username dan password
	if ($_POST["nama"] == "admin" && $_POST["password"] == "123") {
		// jika benar redirect ...
		header("location: admin.php");
	} else {
		$error = true;
	}
}





?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Login</title>
</head>
<body>
	<h2>Please Login</h2>
	<?php if (isset($error)): ?>
		<h5 style=" font-style: italic; color: red;">Username / Password Wrong</h5>
	<?php endif ?>
	<form action="" method="post">
		<ul>
			<label for="nama">Username : </label>
			<input type="text" name="nama">
		</ul>

		<ul>
			<label for="password">Password : </label>
			<input type="password" name="password">
		</ul>

		<button type="submit" name="submit">Login</button>

	</form>
</body>
</html>