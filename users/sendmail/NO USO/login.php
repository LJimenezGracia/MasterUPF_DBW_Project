<?php
$servername = "localhost";
$username = "primerstock";
$password = "primerstock1234";
$db = "primerstock_db";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//get all the names and values that have been posted.
$username = $_POST['email'];

//check if username exists by querying 
$sql = "SELECT * FROM Users WHERE Email = '".$username."'";



$result = mysqli_query($conn,$sql);
//checks if the email already exists in the database or the user needs to sign in first
if(mysqli_num_rows($result)!=0)
      {
       	$row = $result->fetch_assoc(); 

		if (password_verify($_POST['password'], $row['Password'])) {
		    echo 'Password is valid!';
		} else {
		    echo 'Invalid password.';
		}
    } else { 
        echo"You need to sign in first";
}


?> 