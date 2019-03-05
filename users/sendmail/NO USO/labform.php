<?php

session_start();
// define variables and set to empty values
$institution = $group_name = $country = $email = "";
$institutionErr = $group_nameErr = $countryErr = $emailErr = "";

//Checking if the input is correct
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["institution"])) {
    $institutionErr = "Institution is required";
  } else {
    $institution = test_input($_POST["institution"]);
    // Validating name (letters and whitespaces)
    if (!preg_match("/^[a-zA-Z ]*$/",$institution)) {
  	$institutionErr = "Only letters and white space allowed"; 
  }
  }

  if (empty($_POST["group_name"])) {
    $group_nameErr = "Group name is required";
  } else {
  	$group_name = test_input($_POST["group_name"]);
  	// Validating name (letters, numbers and whitespaces)
  	if(!preg_match("/^[a-zA-Z0-9 ]*$/",$group_name)) {
  	$group_nameErr = "Only letters and white space allowed";
  }
  }

  if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
    $country = test_input($_POST["country"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
  	$countryErr = "Only letters and white space allowed";
  }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
  	$email = test_input($_POST["email"]);
  	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<p><span class="error">* required field</span></p>
<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
<form method="post" action="">
<h2>Sign up form</h2>
Institution: <input type = "text" name = "institution" placeholder="E.g. Pompeu Fabra University"/>
<span class="error">* <?php echo $institutionErr;?></span>
<br><br>
Group name: <input type = "text" name = "group_name" placeholder="Statistics"/>
<span class="error">* <?php echo $group_nameErr;?></span>
<br><br>
Country: <input type = "text" name = "country" placeholder="Germany"/>
<span class="error">* <?php echo $countryErr;?></span>
<br><br>
Email: <input type = "text" name = "email" placeholder="Enter email"/>
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit"> 
<br><br>


<p>Already registered? Click <a href="login.html">here</a> to log in.</p>
</form>

</body>
</html>

<?php

//echo "<h2>Your Input:</h2>";
//echo $institution;
//echo "<br>";
//echo $group_name;
//echo "<br>";
//echo $country;
//echo "<br>";
//echo $email;
//echo "<br>";


//<!-- If the data is correct, use a hidden form with post to process the data in a php that will send the 
//data to the server -->
if (((($institutionErr == $group_nameErr) == $countryErr) == $emailErr) and !empty($email)){ 

    //Set session variables
    $_SESSION["institution"] =  $institution; 
    $_SESSION["group_name"] =  $group_name;
    $_SESSION["country"] =  $country;
    $_SESSION["email"] =  $email;

    include 'lab.php';
} 

include 'mailer.php';


?>