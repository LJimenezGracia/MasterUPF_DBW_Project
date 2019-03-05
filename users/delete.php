<?php 
session_start();
$lab = $_SESSION['wlab'];
$iduser = $_SESSION['wuser'];

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "index.php";</script>';
}

include('../connection.php');
$con = getdb();

$query = "SELECT Users.* from Users WHERE Users.idUsers = $iduser";

$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);

$query2 ="SELECT Lab.* from Lab WHERE Lab.idLabs = $lab";
$result2 = mysqli_query($con,$query2);
$row2 = mysqli_fetch_assoc($result2);



?>

<html>
	<head>
		<title>PrimerSTOCK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<style>
		.error {color: #FF0000;}
		.readonly {size:small; color:grey;}
		</style>
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../index.php" class="logo"><img src="../images/PrimerStock.svg" alt="logo" height="50" width="125"/></a>
					<nav id="nav">
					<a href="#two">Primer Search</a>
						<a href="#three">Database settings</a>
						<a href="#four">Resources</a>
						<a href="#five">Others</a>
						<a href="five">Contact</a>
						<a href="logout.php" class="fa fa-sign-out">LOG OUT<a/>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<header class="align-center">
							<h2>Deregister from PrimerSTOCK</h2>
							<p align="center">User information</p>
					</header>
				</div>

				<div class="inner-a">			
					<div class="row uniform">
					<div class="6u$ 12u$(xsmall)">

					<form action="" method="post" id="modform">

						<h4>Name <span class="error">
					<input type = "text" name = "name" value="<?php echo $row['User_name'];?>" required readonly="readonly"></h4>
					<h4>Surname <span class="error">
					<input type = "text" name = "name" value="<?php echo $row['Surname'];?>" required readonly="readonly"></h4>
					<h4>Email <span class="error">
					<input type = "text" name = "name" value="<?php echo $row['Email'];?>" required readonly="readonly"></h4>
					<h4>Institution<span class="error">
					<input type = "text" name = "name" value="<?php echo $row2['Institution'];?>" required readonly="readonly"></h4>
					<h4>Group Name<span class="error">
					<input type = "text" name = "name" value="<?php echo $row2['Group_name'];?>" required readonly="readonly"></h4>


			<input class="button special" value="Delete User" onclick="myFunction()">
			<input type="reset" value="Cancel" onclick="window.location='users.php';">
		</form>

<script>
function myFunction() {
  var r = confirm("Are you sure you want to delete this user?");
  if (r == true) {
		window.location = "deleteuser.php";
		return false;
  } else {
		window.location = "users.php";
		return false;
  }
}
</script>





