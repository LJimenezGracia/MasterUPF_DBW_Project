<?php

session_start();
$iduser = $_SESSION['wuser'];
include ('../connection.php');
$con = getdb();

$query = "DELETE FROM Users WHERE Users.idUsers = $iduser";
$result = mysqli_query($con,$query);

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "../index.php";</script>';
}

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


	<section id="one" class="wrapper">
				<div class="inner">
					<header class="align-center">
							<h2>Deregister from PrimerSTOCK</h2>
							</header>
				</div>

				<div class="6u$ 12u$(xsmall) center" style="background-color:#f9f9f9; padding: 25px 25px 25px 25px;margin:auto;" align="center">

							<h3>You have now successfully signed out from PrimerSTOCK</h3>
							<p>You can register again <a href= "../index.php">here.</a></p> 
					
				</div>


<?php include('logout.php');


