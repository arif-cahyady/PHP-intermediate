
<?php  
// cek user unditified
if ( !isset($_GET["nama"]) || 
	 !isset($_GET["email"]) ||
	 !isset($_GET["job"])
) {
	
	// redirect
	header("location: latihan2.php");

	exit();
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Details Student</title>
</head>
<body>
	<h2>Detail Student</h2>
	<ul>
		<li>Nama : <?= $_GET["nama"]; ?></li>
		<li>Email : <?= $_GET["email"]; ?></li>
		<li>Job : <?= $_GET["job"]; ?></li>
	</ul>

	<a href="latihan2.php">Back >></a>

</body>
</html>