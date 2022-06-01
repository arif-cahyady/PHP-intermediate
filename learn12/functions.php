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
	$name = htmlspecialchars($data["name"]);
	$email = htmlspecialchars($data["email"]);
	$job = htmlspecialchars($data["job"]);
	$image = upload();

	if ( !$image ) {
		return false;
	}

	// Make Query
	$query = "INSERT INTO students VALUES
			('', '$image', '$name', '$email', '$job')
	";

	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}

function upload()
{
	$nameFile = $_FILES['image']['name'];
	$sizeFile = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$tmpName = $_FILES['image']['tmp_name'];

	// Cek does image uploaded ?
	if ( $error === 4 ) {
		echo "<script>
			alert('Image not uploaded or not Found. Please insert your image!');
		</script>";
		return false;
		die();
	}

	// Make rule ekstension of image to upload
	$ekstensionsValid = ['jpg','jpeg','png'];
	$ekstensions = explode('.', $nameFile);
	$ekstensions = strtolower(end($ekstensions));

	// cek are ekstension is valid ?
	if ( !in_array($ekstensions, $ekstensionsValid) ) {
		echo "<script>
			alert('Your image is not valid ekstension. Please put image in jpg, jpeg & png!');
		</script>";
		return false;	
	}

	// move uploaded file
	$newNameFile = uniqid();
	$newNameFile .= '.';
	$newNameFile .= $nameFile;
	move_uploaded_file($tmpName, 'img/' . $newNameFile);

	return $newNameFile;

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
	$name = htmlspecialchars($data["name"]);
	$email = htmlspecialchars($data["email"]);
	$job = htmlspecialchars($data["job"]);
	$oldImage = $data["oldImage"];

	// cek has user update image or not ?
	if ( $_FILES['image']['error'] === 4 ) {
		$image = $oldImage;
	} else {	
		$image = upload();
	}


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


function register($data)
{
	global $db;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$confirm = mysqli_real_escape_string($db, $data["confirm"]);

	// cek user has been created
	$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
	if ( mysqli_fetch_assoc($result) ) {
		echo "<script>
			alert('Username has been created. Please make another username!');
		</script>";
		return false;
	}

	// cek password has same with confirm password
	if ( $password !== $confirm ) {
		echo "<script>
			alert('Confirm password is unditified. Please Check again!')
		</script>";
		
		return false;
	}

	// make encryption password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// create new user to database
	mysqli_query($db, "INSERT users VALUES('', '$username','$password')");

	return mysqli_affected_rows($db);
}















?>