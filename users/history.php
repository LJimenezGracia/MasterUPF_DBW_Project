<?php
session_start(); 
include('../connection.php');
$con = getdb();
$lab = $_SESSION['wlab'];

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
    <link rel="stylesheet" href="../DataTable/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="../DataTable/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="../DataTable/jquery.dataTables.min.js"></script>

	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../index.php" class="logo"><img src="../images/PrimerStock.svg" alt="logo" height="50" width="125"/></a>
					<nav id="nav">
						<a href="users.php#two">Primer Search</a>
						<a href="users.php#three">Database settings</a>
						<a href="users.php#four">Resources</a>
						<a href="users.php#five">Others</a>
						<a href="users.phpfive">Contact</a>
						<a href="logout.php" class="fa fa-sign-out">LOG OUT<a/>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>


			<!-- One -->
		<section id="one" class="wrapper">
		<div class="inner" style="width:1100px">
					<header class="align-center">
						<h2>Lab History</h2>
					</header>

	<table border="0" cellspacing="2" cellpadding="4" id="dataTable" style="width:1100px">
                    <thead>
                        <tr>
                    <th>User</th>
                    <th>Change Information</th>
                        </tr>
                    </thead>
                   <tbody>

<?php

$query = "SELECT History.idUser, History.Change_info FROM History WHERE History.Lab_idLabs = $lab ORDER BY History.idHistory DESC";

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { 
            	$userid = $row['idUser'];
            	$query1 = "SELECT Users.User_name, Users.Surname FROM Users WHERE Users.idUsers = '$userid'";

            	$result1 = mysqli_query($con, $query1);
            	$user_info = mysqli_fetch_assoc($result1);
            	?>
            	<tr>
                   <td><?php echo $user_info['User_name'], " ", $user_info['Surname']; ?></td>
                   <td><?php print $row['Change_info'] ?></td>
                   </tr>
<?php
}
}
?>

    	</tbody>
        </table>

		</div>
		</section>

	</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable(
        	 {
  "columns": [
    { "width": "30%" },
    null,
  ]
});
    });
</script>
