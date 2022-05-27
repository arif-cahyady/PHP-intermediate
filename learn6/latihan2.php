<?php  
// Learn 6 - PHP
// Method GET & $_GET
// Use Get to sent data in link

$students = [
	[
		"nama" => "Arif Cahyady",
		"email" => "arif@gmail.com",
		"job" => "IT Support"
	],
	[
		"nama" => "Firmansyah",
		"email" => "firman@gmail.com",
		"job" => "Enginer"
	]

];

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>GET Method & $_GET</title>
	</head>
	<body>
		<h2>List Students</h2>
		<ul>
			<?php foreach ($students as $student): ?>
				<li><a href="latihan3.php?nama=<?= $student["nama"] ?>&email=<?= $student["email"] ?>&job=<?= $student["job"] ?>"><?= $student["nama"] ?></a></li>
			<?php endforeach ?>
		</ul>
	</body>
</html>