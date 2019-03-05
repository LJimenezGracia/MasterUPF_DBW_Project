<?php

session_start();

// define variables and set to empty values
$direction = "";
$directionErr = NULL;
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
							<h2>Advanced search</h2>
					</header>
				</div>
			
			<div class="inner-a">			
				<div class="row uniform">
				<div class="6u$ 12u$(xsmall)">
				<form action = "advsearch.php" method="post" id="advform">
				<h5>Name<input type = "text" name = "name" placeholder="Enter primer name" default="Primer1"></h5>
				<h5>Direction
					<div class="6u 12u">
					<input type="radio" id="Fw"  name = "direction" value="Fw"><label for="Fw">Forward</label></div>
				<div class="6u 12u">
					<input type="radio" id="Rv" name = "direction" value="Rv"><label for="Rv">Reverse</label></div>
				<div class="6u 12u">
					<input type="radio" id="False_direction" name = "direction" value="False" checked><label for="False_direction">Doesn't matter</label><br></div>

				</h5>
				<h5>Melting temperature <input type = "number" min="0" name = "tm" placeholder="Enter Tm" autocomplete></h5>
				<h5>%GC <input type = "number" min="0" name = "pGC" placeholder="Enter GC percentage" autocomplete></h5>
				<h5>Storage <input type = "text" name = "storage" placeholder="Enter storage position" autocomplete></h5>
				<h5>Stock
				<div class="6u 12u">
					<input type="radio" id="4"  name = "stock" value="4"><label for="4">In stock</label></div>
				<div class="6u 12u">
					<input type="radio" id="3" name = "stock" value="3"><label for="3">Not in stock</label></div>
				<div class="6u 12u">
					<input type="radio" id="False" name = "stock" value="False" checked><label for="False">Doesn't matter</label><br></div></h5>
				
				<h5>Ordered
				<div class="6u 12u">
					<input type="radio" id="4o"  name = "ordered" value="4"><label for="4o">Ordered</label></div>
				<div class="6u 12u">
					<input type="radio" id="3o" name = "ordered" value="3"><label for="3o">Not Ordered</label></div>
				<div class="6u 12u">
					<input type="radio" id="Falseo" name = "ordered" value="False" checked><label for="Falseo">Doesn't matter</label><br></div>
					</h5>
				
				<h5>Provider <input type = "text" name = "provider" placeholder="Enter provider name" autocomplete></h5>
				<h5>Gene <input type = "text" name = "gene" placeholder="Enter target name" autocomplete></h5>
				<h5>GeneID <input type = "number" name = "geneID" placeholder="Enter GenBankID" autocomplete></h5>
				<h5>BindingSite <input type = "text" name = "binding" placeholder="Enter binding site" autocomplete></h5>
				<h5>Organism <input type = "text" name = "organism" placeholder="Enter taxonomic name" autocomplete></h5>

				<h5>Comments <textarea name = "comments" form="advform" cols="1"></textarea></h5>
				

				<input class="button special" type = "submit" value="Search">
				<input type="reset" value="Reset">
				</div></div>
				</form>
				</section>


		<?php

			//Set session variables
		    $_SESSION["sname"] = $_POST['name']; 
		    $_SESSION["sdirection"] =$_POST['direction'];
		    $_SESSION["stm"] = $_POST['tm'];
		    $_SESSION["spgc"] = $_POST['pGC'];
		    $_SESSION["sstorage"] = $_POST['storage'];
		    $_SESSION["sstock"] =  $_POST['stock'];
		    $_SESSION["sordered"] =  $_POST['ordered'];
		    $_SESSION["sprovider"] =  $_POST['provider'];
		    $_SESSION["sgene"] =  $_POST['gene']; 
		    $_SESSION["sgeneid"] =  $_POST['geneID'];
		    $_SESSION["sbinding"] = $_POST['binding']; 
		    $_SESSION["sorganism"] = $_POST['organism'];
		    $_SESSION["scomments"] = $_POST['comments'];
		    

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