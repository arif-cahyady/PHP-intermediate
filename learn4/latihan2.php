<?php
// Learn 4 - PHP  
// Pengulangan Pada Array in HTMl

$var = [3,4,2,6,2,6,1];

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Pengulangan Pada Array</title>
		<style type="text/css" media="screen">
			.exm1 {
				width: 50px;
				height: 50px;
				background-color: darkslateblue;
				text-align: center;
				line-height: 50px;
				margin: 3px;
				float: left;
				color: white;
			}
			
			.exm2 {
				width: 50px;
				height: 50px;
				background-color: yellowgreen;
				text-align: center;
				line-height: 50px;
				margin: 3px;
				float: left;
				color: white;
			}
		</style>
	</head>
	<body>	
		
		<!-- example with for  -->
		<?php for ($i=0; $i < count($var); $i++) : ?>
			<div class="exm1"><?= $var[$i]; ?></div>
		<?php endfor; ?>

		<!-- example with foreach -->
		<?php foreach ($var as $key): ?>
			<div class="exm2"><?= $key ?></div>
		<?php endforeach ?>


	</body>
</html>