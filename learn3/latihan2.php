<?php  
// Learn 3 -PHP
// User Defined Function

function name($name)
{
	return $name;
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User defined Function</title>
</head>
<body>
	<h2>
		Welcome to <?php echo date("l") . "," . " " . name("Arif Cahyady"); ?>
	</h2>
</body>
</html>