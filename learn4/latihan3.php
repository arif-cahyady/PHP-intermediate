<?php  
// Learn 4 - PHP
// Case Study Array Numeric

$students = [
	["Arif Cahyady", "arif@gmail.com", "IT Support"],
	["Chano Liynx", "chano@gmmail.com", "IT Support"]
];

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Case Study Array Numeric</title>
	</head>
	<body>
		<h2>List Student</h2>
	
		<?php foreach ($students as $student): ?>
		<ul>
			<?php foreach ($student as $key): ?>	
				<li>Name :  <?= $key ?>
			<?php endforeach ?>
		</ul>
		<?php endforeach ?>
	
	</body>
</html>