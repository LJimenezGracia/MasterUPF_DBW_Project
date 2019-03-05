<?php

// Processing data form loginform.php (Log in)
session_start();


$servername = "localhost";
$username = "primerstock";
$password = "primerstock1234";
$db = "primerstock_db";

// Obtaing the variables from the form
$user_email = $_SESSION['email'];
$user_password = $_SESSION['password'];

// Checking that the variables are imported
// echo "<h2>Your Input:</h2>";
// echo $email;
// echo "<br>";
// echo $password;
// echo "<br>";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//get all the names and values that have been posted.
//$username = $_POST['email'];

//check if username exists by querying 
$sql = "SELECT * FROM Users WHERE Email = '".$user_email."'";

//$sqllab = "SELECT History,Database_forward,Database_reverse FROM Lab WHERE idLabs = '".$user_email."'";
$errors = 1;
$errormsgs = "";
$result = mysqli_query($conn,$sql);
//checks if the email already exists in the database or the user needs to sign in first
if(mysqli_num_rows($result)!=0)
      {
       	$row = $result->fetch_assoc(); 

		if (password_verify($user_password, $row['Password'])) {
		    //echo 'Password is valid!';
		    $errors = 0;
		} else {
		    //echo 'Invalid password.';
        $errormsgs = $errormsgs . 'Invalid password.';
		}
    } else { 
        //echo"You need to sign in first";
        $errormsgs = $errormsgs . "You need to sign in first";

}

// Setting session variables

// Query to select the session variables to work when log in
$sqlvar = "SELECT Users.idUsers,Users.Lab_idLabs,Lab.Database_forward,Lab.Database_reverse FROM Users 
	INNER JOIN Lab ON Users.Lab_idLabs = Lab.idLabs
	WHERE Users.Email = '".$user_email."'";

$resultvar = mysqli_query($conn,$sqlvar);

if (mysqli_num_rows($resultvar) > 0) {
    while($row = mysqli_fetch_assoc($resultvar)) {
    	//print_r($row);  
    	$_SESSION["wlab"] =  $row['Lab_idLabs'];
    	$_SESSION["wuser"] =  $row['idUsers'];
    	// $_SESSION["whistory"] =  $row['History'];
    	// $_SESSION["wdbf"] =  $row['Database_forward'];
    	// $_SESSION["wdbr"] =  $row['Database_reverse']; 

    }  
}

$conn->close();

 if ($errors == 0){
 	  header("Location: users.php"); /* Redirect browser */
   	exit();
 } else {
    $_SESSION['loginerrors'] = $errormsgs;
    include 'modallogin.php';
 }
?>

<!-- Just checking that the session variables have been generated
<html>
<body>
<p> <?php echo $_SESSION["wlab"];?> </p>
<p> <?php echo $_SESSION["wuser"];?> </p>
<p> <?php echo $_SESSION["whistory"];?> </p>
<p> <?php echo $_SESSION["wdbf"];?> </p>
<p> <?php echo $_SESSION["wdbr"];?> </p>
</body>
</html> -->