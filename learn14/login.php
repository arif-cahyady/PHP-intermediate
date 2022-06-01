<?php
session_start();  
require 'functions.php';

if ( isset($_COOKIE['chano']) && isset($_COOKIE['nano']) ) {
	$chano = $_COOKIE['chano'];
	$nano = $_COOKIE['nano'];

	// get data from id
	$result = mysqli_query($db, "SELECT username FROM users WHERE id = $chano");
	$row = mysqli_fetch_assoc($result);

	// check cookie == username
	if ( $nano === hash('ripemd160', $row['username']) ) {
		$_SESSION['login'] = true;
	}
}


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
		
		$row = mysqli_fetch_assoc($result);
		//check password
		if ( password_verify($password, $row['password']) ) {

			// cek session login
			$_SESSION['login'] = true;

			// check cookie
			if ( isset($_POST['remember']) ) {
				// set cookie
				setcookie('chano', $row['id'], time() + 60*60*24);
				setcookie('nano', hash('ripemd160', $row['username']), time() + 60*60*24);
			}
		
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
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember me</label>
			</li>
			<li>
				<button type="submit" name="login">Sign in</button>
			</li>
		</ul>
	</form>
</body>
</html>