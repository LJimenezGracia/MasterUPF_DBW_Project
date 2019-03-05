<?php

session_start();


// define variables and set to empty values
$institution = $group_name = $country = $email = "";
$institutionErr = $group_nameErr = $countryErr = $emailErr = $privacyErr = "";

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

  if (empty($_POST["privacy"])) {
    $privacyErr = "*To properly continue with the registration read an accept our Privacy Policy";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html lang="en">
	<head>
		<title>Laboratory registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="../assets/css/main.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<style>
		.error {color: #FF0000;}
		</style>
	</head>

	<body class="subpage">

	<!-- Header -->
		
		<header id="header">
			<div class="inner">
				<a href="../index.php" class="logo"><img src="../images/PrimerStock.svg" alt="logo" height="50" width="125"/></a>
				<nav id="nav">
					<a href="signupform.php">User sign up</a>
					<a href="loginform.php">Log in</a>
					<a href="../index.php#five">Contact</a>
				</nav>
				<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
			</div>
		</header>


			<section id="one" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>Laboratory registration</h2>
						<p><span class="error">* Required field</span></p>
					</header>
				</div>

				<div class="inner-a">
					<form method="post" action="">
							<div class="row uniform">
								<div class="6u$ 12u$(xsmall)">
									<h4>Institution <span class="error">* <?php echo $institutionErr;?></span><input type = "text" name = "institution" placeholder="Enter your institution"/></h4>
									<h4>Group name <span class="error">* <?php echo $group_nameErr;?></span><input type = "text" name = "group_name" placeholder="Enter your group name"/></h4>
									<h4>Country <span class="error">* <?php echo $countryErr;?></span> <?php include 'countriesdropdown.html';?></h4>
									<h4>Email <span class="error">* <?php echo $emailErr;?></span><input type = "text" name = "email" placeholder="Enter email"/> </h4>
									<input type="checkbox" id="privacy" name="privacy" value="privacy">
									<label for="privacy">I have read and I accept the <a href="privacy_policy.html">Privacy Policy</a></label><br><span class="error"><?php echo $privacyErr;?></span>
									<br>
									<input class="button special" type="submit" name="submit" value="Submit"> 
									<input type="reset">
									<p>Already registered? Click <a href="loginform.php">here</a> to log in.</p>
								</div>
							</div>
						</form>
					</div>
				</section>
			</body>


		<?php
		//<!-- If the data is correct, pass the values of the input via session and include the file with the connection to the database -->
		if (((($institutionErr == $group_nameErr) == $countryErr) == $emailErr) and !empty($email)and empty($privacyErr)){ 

		    //Set session variables
		    $_SESSION["institution"] =  $institution; 
		    $_SESSION["group_name"] =  $group_name;
		    $_SESSION["country"] =  $country;
		    $_SESSION["email"] =  $email;

		    include 'lab.php';
		} 
		?>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
							<b>&copy;PrimerSTOCK, 2019.</b>
						</div>
						<ul class="icons">
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
						</ul>
					</div>
				</div>
			</footer>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			</html>

