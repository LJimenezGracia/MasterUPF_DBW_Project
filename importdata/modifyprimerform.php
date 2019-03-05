<?php

session_start();

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
							<h2>Modify or Delete primers</h2>
							<p><span class="error">* Required field</span></p>
					</header>
				</div>

			
			<div class="inner-a">			
					<div class="row uniform">
					<div class="6u$ 12u$(xsmall)">

				<!-- This form selects a primer to modify by name and will return all the info about it -->
				<!-- <form action="returnprimer.php" method="post"> -->
				<form action="returnprimer.php" method="post" id="modform">
					<h4>Select primer by Name<span class="error">*</span>
						<input type = "text" name = "primername" placeholder="Enter primer name" autocomplete required></h4>
					<input class="button special" type = "submit" value="Load Primer">
					<input type="reset" value="Reset">
				</form>

				<!-- A form to modify the previously selected primer -->
				<form action = "modifyprimer.php" method="post">
				<h4>Name <span class="error">*</span>
					<input type = "text" name = "name" value="<?php echo $_SESSION['eprimername'];?>" required></h4>
				<h4>Sequence <span class="error">*</span>
					<input type = "text" name = "sequence" value="<?php echo $_SESSION['esequence'];?>" autocomplete required></h4>
				<h4>Direction <span class="error">*</span>
				<?php if ($_SESSION['edirection'] == 'Fw'){ 
					?>
					<div class="6u 12u">
					<div class="6u 12u">
					<input type="radio" id="Fw"  name = "direction" value="Fw" checked><label for="Fw">Forward</label></div>
					<div class="6u 12u">
					<input type="radio" id="Rv" name = "direction" value="Rv"><label for="Rv">Reverse</label></div>

				<?php
				} else {
					?>
					<div class="6u 12u">
					<div class="6u 12u">
					<input type="radio" id="Fw"  name = "direction" value="Fw"><label for="Fw">Forward</label></div>
					<div class="6u 12u">
					<input type="radio" id="Rv" name = "direction" value="Rv" checked><label for="Rv">Reverse</label></div>
				<?php
				} 
				?>
				</h4>
				<h4>Length <span class="readonly"> (read only) </span>
					<input type = "number" name = "length" min="0" value="<?php echo $_SESSION['elength'];?>" autocomplete readonly required></h4>
				<h4>Melting temperature <span class="readonly"> (read only) </span>
					<input type = "number" min="0" name = "tm" value="<?php echo $_SESSION['etm'];?>" autocomplete readonly required></h4>
				<h4>%GC <span class="readonly"> (read only) </span>
					<input type = "number" name = "pGC" min="0" value="<?php echo $_SESSION['epgc'];?>" autocomplete readonly required></h4>
				<h4>Concentration <span class="error">*</span>
					<input type = "number" name = "concentration" value="<?php echo $_SESSION['econcentration'];?>" autocomplete required></h4>
				<h4>Gene <span class="error">*</span>
					<input type = "text" name = "gene" value="<?php echo $_SESSION['egene'];?>" autocomplete required></h4>
				<h4>GeneID <span class="error">*</span>
					<input type = "number" min="0" name = "geneID" value="<?php echo $_SESSION['egeneid'];?>" autocomplete required></h4>
				<h4>BindingSite <span class="error">*</span>
					<input type = "text" name = "binding" value="<?php echo $_SESSION['ebindingsite'];?>" autocomplete required></h4>
				<h4>Organism <span class="error">*</span>
					<input type = "text" name = "organism" value="<?php echo $_SESSION['eorganism'];?>" autocomplete required></h4>
				<h4>Storage <span class="error">*</span>
					<input type = "text" name = "storage" value="<?php echo $_SESSION['estorage'];?>"" autocomplete required></h4>
				<h4>Provider <span class="error">*</span>
					<input type = "text" name = "provider" value="<?php echo $_SESSION['eprovider'];?>" autocomplete required></h4>
				<h4>Stock <span class="error">*</span>
				<?php if ($_SESSION['estock'] == 'Y'){ 
					?>
					<div class="6u 12u">
					<input type="radio" id="4"  name = "stock" value="4" checked><label for="4">In stock</label></div>
					<div class="6u 12u">
					<input type="radio" id="3" name = "stock" value="3"><label for="3">Not in stock</label></div>

				<?php
				} else {
					?>
					<div class="6u 12u">
					<input type="radio" id="4"  name = "stock" value="4"><label for="4">In stock</label></div>
					<div class="6u 12u">
					<input type="radio" id="3" name = "stock" value="3" checked><label for="3">Not in stock</label></div>

				<?php
				} 
				?>
				</h4>
				
				<h4>Ordered <span class="error">*</span>
				<?php if ($_SESSION['eordered'] == 'Y'){ 
					?>
					<div class="6u 12u">
					<input type="radio" id="4"  name = "ordered" value="4" checked><label for="4">Ordered</label></div>
					<div class="6u 12u">
					<input type="radio" id="3" name = "ordered" value="3"><label for="3">Not ordered</label></div>

				<?php
				} else {
					?>
					<div class="6u 12u">
					<input type="radio" id="4o"  name = "ordered" value="4"><label for="4o">Ordered</label></div>
					<div class="6u 12u">
					<input type="radio" id="3o" name = "ordered" value="3" checked><label for="3o">Not ordered</label></div>

				<?php
				} 
				?>
				</h4>

				<h4>Comments <textarea name="comments" cols="1" ><?php echo $_SESSION['ecomments'];?></textarea></h4>
			
				<input class="button special" type = "submit" value="Modify">
				<!-- <button type="button" formaction="deleteprimer.php"> Delete </button> -->
				<!-- <input type="button" onclick="msg()" value="Delete"> -->
				<input type="button" value="Delete" id="delbutton" onclick="myFunction()" >
				<input type="reset" value="Reset">
				</div></div>
				</form>
				</section>
<script>
function myFunction() {
  var r = confirm("Are you sure you want to delete this primer?");
  if (r == true) {
		window.location = "deleteprimer.php";
		return false;
  } else {
		window.location = "../users/users.php";
		return false;
  }
}
</script>

		<?php
		//<!-- If the data is correct, pass the values of the input via session and include the file with the connection to the database -->
		//if ((empty($directionErr)) and !empty($direction)){
		if (empty($directionErr) and !empty($direction)){ 

			//Set session variables
		    $_SESSION["new_name"] =  test_input($_POST['name']); 
		    $_SESSION["new_sequence"] =  test_input($_POST['sequence']);
		    $_SESSION["new_direction"] =  $direction;
		    $_SESSION["new_tm"] =  test_input($_POST['tm']);
		    $_SESSION["new_pgc"] =  test_input($_POST['pGC']);
		    $_SESSION["new_concentration"] =  test_input($_POST['concentration']); 
		    $_SESSION["new_storage"] =  test_input($_POST['storage']);
		    $_SESSION["new_gene"] =  test_input($_POST['gene']); 
		    $_SESSION["new_geneid"] =  test_input($_POST['geneID']);
		    $_SESSION["new_binding"] =  test_input($_POST['binding']); 
		    $_SESSION["new_organism"] =  test_input($_POST['organism']);
		    $_SESSION["new_provider"] =  test_input($_POST['provider']);
		    // $_SESSION["new_comment"] =  test_input($_POST['comments']);

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

 			header("Location: modifyprimer.php"); /* Redirect browser */
   	 		exit();
 }

		?>
				
		

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