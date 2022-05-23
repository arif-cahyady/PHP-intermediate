<?php  
// Learn 2 - PHP
// Implementasi to HTML
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Implementasi PHP to HTML</title>
	<style type="text/css" media="screen">
		.warna-baris {
			background-color: silver;
		}
	</style>
</head>
<body>
	
	<table border="1" cellpadding="10" cellspacing="0">
		<?php for ($i=1; $i <= 5; $i++) : ?>
			<?php if ($i % 2 == 1) : ?>
				<tr class="warna-baris">
			<?php else : ?>
				<tr>
			<?php endif; ?>	
				<?php for ($j= 1; $j <= 5; $j++) : ?>
					<td><?= "$i,$j";  ?></td>
				<?php endfor; ?>
				</tr>
		<?php endfor; ?>
	</table>




</body>
</html>
<!DOCTYPE html>