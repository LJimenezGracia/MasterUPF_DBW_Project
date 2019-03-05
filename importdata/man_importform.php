<?php

session_start();

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "index.php";</script>';
}

// define variables and set to empty values
// $direction = "";
// $directionErr = NULL;

//Checking if the input is correct

// if (!function_exists(test_input)){
// 	function test_input($data) {
//   		$data = trim($data);
//  		$data = stripslashes($data);
//   		$data = htmlspecialchars($data);
//   		return $data;
// 	}	
// }

//   if (empty($_POST["direction"])) {
//     //$directionErr = "Direction name is required";
//   } else {
//   	$direction = test_input($_POST["direction"]);
//   	// Validating name (letters, numbers and whitespaces)
//   	//if(!preg_match("/^[\(Fw\)\(Rv\)]$/",$direction)) {
//   	if(!preg_match("/^(Fw|Rv)$/",$direction)) {
//   		$directionErr = "Only Fw or Rv allowed";
//   	}
//   }

?>

<html>
	<head>
		<title>PrimerSTOCK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
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
							<h2>Manually import primers</h2>
							<p><span class="error">* Required field</span></p>
					</header>
				</div>
			
			<div class="inner-a">			
					<div class="row uniform">
					<div class="6u$ 12u$(xsmall)">
				<form action = "manual_import.php" method="post" id="addform">
				<h4>Name <span class="error">*</span>
					<input type = "text" name = "name" placeholder="Enter primer name" autocomplete required> 
				</h4>
				<h4>Sequence <span class="error">*</span>
					<input type = "text" name = "sequence" placeholder="Enter sequence (5' to 3')" autocomplete required></h4>
				<h4>Direction <span class="error">*</span>
					<div class="6u 12u">
					<div class="6u 12u">
					<input type="radio" id="Fw"  name = "direction" value="Fw" checked><label for="Fw">Forward</label></div>
					<div class="6u 12u">
					<input type="radio" id="Rv" name = "direction" value="Rv"><label for="Rv">Reverse</label></div> 
				</h4>
				<h4>Length 
					<input type = "number" name = "length" min="0" placeholder="Enter length" autocomplete></h4>
				<h4>Melting temperature 
					<input type = "number" min="0" name = "tm" placeholder="Enter Tm" autocomplete></h4>
				<h4>%GC 
					<input type = "number"  name = "pGC" min="0" placeholder="Enter GC percentage" autocomplete></h4>
				<h4>Concentration <span class="error">*</span>
					<input type = "number" name = "concentration" min="0" placeholder="Enter concentration [µl]" autocomplete required></h4>
				<h4>Gene <span class="error">*</span>
					<input type = "text" name = "gene" placeholder="Enter target name" autocomplete required></h4>
				<h4>GeneID <span class="error">*</span>
					<input type = "number" min="0" name = "geneID" placeholder="Enter GenBankID" autocomplete required></h4>
				<h4>BindingSite <span class="error">*</span>
					<input type = "text" name = "binding" placeholder="Enter binding site" autocomplete required></h4>
				<h4>Organism <span class="error">*</span>
					<input type = "text" name = "organism" placeholder="Enter taxonomic name" autocomplete required></h4>
				<h4>Storage <span class="error">*</span>
					<input type = "text" name = "storage" placeholder="Enter storage position" autocomplete required></h4>
				<h4>Provider <span class="error">*</span>
					<input type = "text" name = "provider" placeholder="Enter provider name" autocomplete required></h4>
				<h4>Stock <span class="error">*</span>
					<div class="6u 12u">
					<input type="radio" id="4"  name = "stock" value="4" checked><label for="4">In stock</label></div>
					<div class="6u 12u">
					<input type="radio" id="3" name = "stock" value="3"><label for="3">Not in stock</label></div>
				</h4>
				<h4>Ordered <span class="error">*</span>
					<div class="6u 12u">
					<input type="radio" id="4o"  name = "ordered" value="4"><label for="4o">Ordered</label></div>
					<div class="6u 12u">
					<input type="radio" id="3o" name = "ordered" value="3" checked><label for="3o">Not ordered</label></div>
				</h4>

				<h4>Comments <textarea name = "comments" cols="1"></textarea></h4>
			
				<input class="button special" type = "submit" value="Add new primer">
				<input type="reset" value="Reset">
				</div></div>
				</form>
				</section>

<!-- TO USE SESSION VARIABLES (in case you need to further validate the form in the future) -->
<!-- 		<?php
		//If the data is correct, pass the values of the input via session and include the file with the connection to the database -->
		//if ((empty($directionErr)) and !empty($direction)){
		//if (empty($directionErr) and !empty($direction)){ 

			//Set session variables
		    // $_SESSION["new_name"] =  test_input($_POST['name']); 
		    // $_SESSION["new_sequence"] =  test_input($_POST['sequence']);
		    // $_SESSION["new_direction"] =  $direction;
		    // $_SESSION["new_tm"] =  test_input($_POST['tm']);
		    // $_SESSION["new_pgc"] =  test_input($_POST['pGC']);
		    // $_SESSION["new_concentration"] =  test_input($_POST['concentration']); 
		    // $_SESSION["new_storage"] =  test_input($_POST['storage']);
		    // $_SESSION["new_gene"] =  test_input($_POST['gene']); 
		    // $_SESSION["new_geneid"] =  test_input($_POST['geneID']);
		    // $_SESSION["new_binding"] =  test_input($_POST['binding']); 
		    // $_SESSION["new_organism"] =  test_input($_POST['organism']);
		    // $_SESSION["provider"] =  test_input($_POST['provider']);

		 //    echo $_SESSION["new_name"]; 
			// echo $_SESSION["new_sequence"];
			// echo $_SESSION["new_direction"];
			// echo $_SESSION["new_tm"]; 
			// echo $_SESSION["new_pgc"];
			// echo $_SESSION["new_concentration"]; 
			// echo $_SESSION["new_storage"];
			// echo $_SESSION["new_gene"]; 
			// echo $_SESSION["new_geneid"];
			// echo $_SESSION["new_binding"]; 
			// echo $_SESSION["new_organism"];
			// echo $_SESSION["provider"];

 			//header("Location: manual_import.php"); /* Redirect browser */
   	 		//exit();
 			//}
		?> -->
				
		

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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>