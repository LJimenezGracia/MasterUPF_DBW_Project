<?php
session_start(); 

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "../index.php";</script>';
}
?>
<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>PrimerSTOCK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../index.php" class="logo"><img src="../images/PrimerStock.png" alt="logo" height="40" width="125"/></a>
					<nav id="nav">
						<a href="../users/users.php#two">Primer Search</a>
                        <a href="../users/users.php#three">Database settings</a>
                        <a href="../users/users.php#four">Resources</a>
                        <a href="../users/users.php#five">Others</a>
                        <a href="../index.php#five">Contact</a>
                        <a href="../users/logout.php" class="fa fa-sign-out">LOG OUT<a/>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>Primer search by sequence (BLAST)</h2>
						<p><em>BLAST program searches in your LAB primer database using a DNA sequence query.</em></p><br>
					</header>
					<div class="align-center">
					<form action="blast_result1.php" id="input" name="input" method="POST" enctype="multipart/form-data">
						<p align = "center" >Enter the DNA sequence in raw or FASTA format, or directly upload a file with the same query format.</p>
						<textarea name="fasta" cols="20" rows="5">This is default text</textarea>
						<br>   
						<input type="file" name="uploadFile" >
						<input class="button special" type="submit" value="Send data"> <input type="reset" value="Clear data">
					</form>
					</div>		
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
							<b>&copy;PrimerSTOCK, 2019.</b>
						</div>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>