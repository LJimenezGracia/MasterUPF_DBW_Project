<?php

// Processing data form labform.php (Lab register)
session_start();


$servername = "localhost";
$username = "primerstock";
$password = "primerstock1234";
$db = "primerstock_db";

// Obtaing the variables from the form
$institution = $_SESSION['institution'];
$group_name = $_SESSION['group_name'];
$country = $_SESSION['country'];
$email = $_SESSION['email'];

// echo "<h2>Your Input:</h2>";
// echo $institution;
// echo "<br>";
// echo $group_name;
// echo "<br>";
// echo $country;
// echo "<br>";
// echo $email;
// echo "<br>";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	// Generating Lab_code
	$code = $country . rand(1000,9999);

	$sql = "INSERT INTO Lab (Institution,Group_name,Country,Email,Lab_code) VALUES ('$institution', '$group_name','$country','$email','$code')";

	if ($conn->query($sql) === TRUE) {
	    echo "Congratulations! You are now registered!";
	    echo "<h2>Your Lab data is:</h2>";
		echo "Institution - " . $institution;
		echo "<br>";
		echo "Group name - " . $group_name;
		echo "<br>";
		echo "Country - " . $country;
		echo "<br>";
		echo "Email - " . $email;
		echo "<br>";
		echo "Lab code - " . $code;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


#}

?>