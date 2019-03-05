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

// Putting the values inserted by the user in the variables $value
$value1 = $_POST['name'];
$value2 = $_POST['surname'];
$value3 = $_POST['email'];
$value4 = $_POST['password'];
$value5 = $_POST['labcode'];
$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);


// query for inserting new data in the database
$sql = "INSERT INTO Users (User_name,Surname,Email,Password,Lab_idLabs) VALUES ('$value1', '$value2','$value3','$hashed_password', (SELECT idLabs FROM Lab WHERE Lab_code = '$value5') )";

// query for checking if user with this email already exists
$sql2 = "SELECT * FROM Users WHERE Email= '".$value3."'";

$result = $conn->query($sql2);

if ($_POST['password2'] != $_POST['password']) {
	include 'form.html';
	echo "Password didn't match. Try again!";
} else {
	if ($result->num_rows > 0)
  	{
  	  include 'form.html';
      echo "Username already exists. Please choose another email to sign up.";
  	} else {

  	  // if username doesn't exist it continues with the registration of the user 
  	  if ($conn->query($sql) === TRUE) {
      echo "Congratulations! You are now registered! It should redirect the user to login page";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }

  	}

}

  

$conn->close();


?> 