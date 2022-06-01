<?php  


// Connect PHP to database
$db = mysqli_connect("localhost", "root", "", "PHP");


// You can check error from your table if you want. let's see code below
$result = mysqli_query($db,"SELECT * FROM students");
if ( !$result ) {
	echo mysqli_error($db);
}

function show($query)
	{
		global $db;
		// Make query database
		$result = mysqli_query($db, $query);
		// make array for query
		$rows = [];
		// put data from $result
		while ( $row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}



function insert($data)
{
	global $db;
	// Put data from element in form
	$image = htmlspecialchars($data["image"]);
	$name = htmlspecialchars($data["name"]);
	$email = htmlspecialchars($data["email"]);
	$job = htmlspecialchars($data["job"]);

	// Make Query
	$query = "INSERT INTO students VALUES
			('', '$image', '$name', '$email', '$job')
	";

	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}


function delete($id)
{
	global $db;
	$query = "DELETE FROM students WHERE id=$id";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}



function edit( $data )
{
	global $db;
	// Put data from element in form
	$id = $data["id"];
	$image = htmlspecialchars($data["image"]);
	$name = htmlspecialchars($data["name"]);
	$email = htmlspecialchars($data["email"]);
	$job = htmlspecialchars($data["job"]);

	// Make Query
	$query = "UPDATE students SET 
			image = '$image',
			name = '$name',
			email = '$email',
			job = '$job'
		WHERE id = $id
	";

	mysqli_query($db, $query);
	return mysqli_affected_rows($db);	
}



function search($keyword)
{
	$query = "SELECT * FROM students WHERE
		name LIKE '%$keyword%' OR
		job LIKE '%$keyword%'
	";

	return show($query);
}














?>