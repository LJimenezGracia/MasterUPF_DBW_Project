<?php
session_start(); 
$result_r = $_SESSION['result_r_complete'];

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "index.php";</script>';
}


?>

<html>
	<head>
		<title>PrimerSTOCK</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../DataTable/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="../DataTable/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="../DataTable/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/html2canvas.js"></script>
    <script type="text/javascript" src="../js/blaster.js"></script>

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

		<!-- Two -->
		<section id="two" class="wrapper">
			<div class="inner">
					<header class="align-center">
						<h2>Primer search results</h2>
					</header>

            <h2>Result Reverse</h2>
            <div id="blast-multiple-alignments-f"></div>
            <div id="blast-alignments-table-f"></div>
            <div id="blast-single-alignment-f"></div>

<?php $file_r = file_get_contents($result_r);
    $file_r = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$file_r), "\0..\37'\\")));
?>

    <script type="text/javascript">
        var alignments = "<?php echo $file_r; ?>";

        var blasterjs = require("biojs-vis-blasterjs");
        var instance  = new blasterjs({
            string: alignments,
            multipleAlignments: "blast-multiple-alignments-f",
            alignmentsTable: "blast-alignments-table-f",
            singleAlignment: "blast-single-alignment-f"
        });  
    </script>
       </article>
        </div>
		</section>



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

	</body>
</html>
