<?php

require 'functions.php';

if ( isset($_POST['register']) ) {
	
	if ( register($_POST) > 0 ) {
		echo "<script>
			alert('User has been registered');
			document.location.href = 'login.php';
		</script>";
	} else {
		echo mysqli_error($db);
	}

}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard Registeration</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
	
	<h1>Register Your Account</h1>

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
			<label for="confirm">Confirmation Password : </label>
			<input type="password" name="confirm" id="confirm">
		</li>
		<li>
			<button type="submit" name="register">Sign Up</button>	
		</li>
	</ul>

</form>
</body>
</html>