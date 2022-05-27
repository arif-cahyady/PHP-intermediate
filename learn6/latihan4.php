<?php  
// Learn 6 - PHP
// Method POST & $_POST
// You will sent data with form and make it protected

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Method POST & $_POST</title>
</head>
<body>
	<!-- Cek What User has been Registered -->
	<?php if ( isset($_POST["submit"]) ): ?>
		<h1>Selamat Datang, <?php echo $_POST["nama"]; ?></h1>
	<?php else: ?>
		<h1>Selamat Datang, Admin</h1>
	<?php endif ?>

	<form action="" method="post">
		<label for="nama">Masukan Nama : </label>
		<input type="text" name="nama">
		<button type="submit" name="submit">Send!</button>
	</form>
</body>
</html>