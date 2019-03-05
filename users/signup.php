<?php

// Processing data form sign up form.php (Sign up)
session_start();

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
$value1 = $_SESSION['name'];
$value2 = $_SESSION['surname'];
$value3 = $_SESSION['email'];
$value4 = $_SESSION['password'];
$value5 = $_SESSION['labcode'];
$hashed_password = password_hash($_SESSION['password'], PASSWORD_BCRYPT);

//We should check if the lab exists or not !!

// query for inserting new data in the database
$sql = "INSERT INTO Users (User_name,Surname,Email,Password,Lab_idLabs) VALUES ('$value1', '$value2','$value3','$hashed_password', (SELECT idLabs FROM Lab WHERE Lab_code = '$value5') )";

// query for checking if user with this email already exists
$sql2 = "SELECT * FROM Users WHERE Email = '".$value3."'";

// query for checking if the lab code exists
$sql3 = "SELECT * FROM Lab WHERE Lab_code = '".$value5."'";

$result = $conn->query($sql2);  # For the email check
$result2 = $conn->query($sql3); # For the lab code check
$errormsgs = "";

$errors = 0;

if ($result2->num_rows == 0){
  //echo "Lab code does not exist. Try again or register your lab.<br>";
  $errormsgs = $errormsgs . "Lab code does not exist. Try again or register your lab.<br>";
  $errors = 1;
}

if ($_SESSION['password2'] != $_SESSION['password']) {
  //include 'signupform.php';
  //echo "Password didn't match. Try again! <br>";
  $errormsgs = $errormsgs . "<br>Password didn't match. Try again! <br>";
  $errors = 1;

} 

if ($result->num_rows > 0){ # If that email already exists
      if ($errors == 0){
        //include 'signupform.php';
        //header("Location: signupform.php");
        //exit;
      }
      //echo "Email already exists. Please choose another email to sign up.<br>";
      $errormsgs = $errormsgs . "<br>Email already exists. Please choose another email to sign up.<br><br>";
      $errors = 1;
} 

// If there are errors, upload the session variable and print the modal with the errors.
if ($errors != 0){
  $_SESSION['signuperrors'] = $errormsgs;
  include 'emodalsignup.php';
}

if (($result->num_rows == 0) and ($errors == 0)) {
  // if username doesn't exist it continues with the registration of the user 
  if ($conn->query($sql) === TRUE) {

        include 'modalsignup.php';
        include '../mailer_signup.php';
        //echo "<p>Congratulations! You are now registered! Click <a href=".'"loginform.php"'.">here</a> to log in.</p>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

$conn->close();
