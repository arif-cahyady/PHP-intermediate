<?php  
// Learn 7 - PHP
// PHP & Mysql

// Connect PHP to database
$db = mysqli_connect("localhost", "root", "", "PHP");


// You can check error from your table if you want. let's see code below
$result = mysqli_query($db,"SELECT * FROM students");
if ( !$result ) {
	echo mysqli_error($db);
}

// make function to put data from table students
function query()
	{
		global $db;
		// Make query database
		$result = mysqli_query($db,"SELECT * FROM students");
		// make array for query
		$rows = [];
		// put data from $result
		while ( $row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}








?>