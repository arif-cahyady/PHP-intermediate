<?php  
// Use file functions.php
require 'functions.php';

$students = query();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard Admin</title>
</head>
<body>
	
	<h1>List Students</h1>

	<table border="1" cellpadding="10" cellspacing="0">
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
						<a href=""> Edit </a> ||
						<a href=""> Delete </a> 
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