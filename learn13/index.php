<?php
// Learn 13 - PHP
// Session & Logout


// Use file functions.php
session_start();
require 'functions.php';

// check session login
if (!isset($_SESSION['login'])) {
	header('Location: login.php');
	exit();
}

$students = show("SELECT * FROM students");

// cek keyword pencarian
if ( isset($_POST["search"]) ) {
	$students = search($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard Admin</title>
</head>
<body>
	
	<a href="logout.php">Logout</a>

	<h1>List Students</h1>

	<a href="tambah.php" > Input Students </a>

	<form action="" method="post" accept-charset="utf-8">
		<input type="text" name="keyword" size="40" autofocus="" autocomplete="off" placeholder="Masukan Keyword Pencarian.." style="margin-top: 20px;">
		<button type="submit" name="search">Search</button>
	</form>

	<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>No.</th>
				<th>Action</th>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
				<th>Job</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($students as $student): ?>
				
				<tr>
					<td><?= $i ?></td>
					<td>
						<a href="ubah.php?id=<?= $student["id"] ?>"> Edit </a> ||
						<a href="hapus.php?id=<?= $student["id"] ?>" onclick=" return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> Delete </a> 
					</td>
					<td>
						<img src="img/<?= $student["image"]  ?>" alt="a.png" width="50">
					</td>
					<td> <?= $student["name"] ?> </td>
					<td> <?= $student["email"] ?> </td>
					<td> <?= $student["job"] ?> </td>
				</tr>
			<?php $i++ ?>
			<?php endforeach ?>
		</tbody>
	</table>

</body>
</html>