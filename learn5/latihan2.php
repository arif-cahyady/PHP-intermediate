<?php  
// Learn 5 - PHP
// Associative Array

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
		<title>Associative Array</title>
	</head>
	<body>
		<h2>List Students</h2>
		<?php foreach ($students as $student): ?>
			<ul>
				<li>Nama : <?= $student["nama"] ?></li>
				<li>Email : <?= $student["email"] ?></li>
				<li>Job : <?= $student["job"] ?></li>
			</ul>
		<?php endforeach ?>
	</body>
</html>