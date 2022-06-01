<?php
session_start();  
require 'functions.php';

if ( isset($_SESSION['login']) ) {
	header('Location: index.php');
	exit();
}


if ( isset($_POST["login"]) ) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

	// check username
	if ( mysqli_num_rows($result) === 1 ) {
		
		// cek session login
		$_SESSION['login'] = true;

		$row = mysqli_fetch_assoc($result);
		//check password
		if ( password_verify($password, $row['password']) ) {
			header('Location: index.php');
			exit();
		}
	}
	$error = true;
}

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	<h1>Please Login to Your Account</h1>

	<?php if ( isset($error) ): ?>
		<p style="color: red; font-style: italic;">Username / Password Wrong</p>
	<?php endif ?>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login">Sign in</button>
			</li>
		</ul>
	</form>
</body>
</html>