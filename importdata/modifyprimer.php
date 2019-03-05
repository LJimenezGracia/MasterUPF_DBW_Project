<?php
session_start();

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "../index.php";</script>';
}

// Obtaing the variables from the form via POST
$nname = $_POST["name"]; 
$nsequence = $_POST["sequence"];
$ndirection = $_POST["direction"];
$ntm = $_POST["tm"]; 
$npGC = $_POST["pGC"];
$nconcentration = $_POST["concentration"]; 
$nstorage = $_POST["storage"];
$ngene = $_POST["gene"]; 
$ngeneID = $_POST["geneID"];
$nbinding = $_POST["binding"]; 
$norganism = $_POST["organism"];
$nprovider = $_POST["provider"];
$nlength = $_POST["length"];
$nstock = $_POST["stock"];       
$nordered = $_POST["ordered"];
$ncomments = $_POST["comments"];


//print_r($_SESSION);

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
							<h2>PrimerSTOCK database</h2>
					</header>
				</div>

			<div class="inner">
<?php
include ('../connection.php');
$con = getdb();

$lab = $_SESSION['wlab'];
$array_id = [];

$error = 0;
$errors_array = "";
$error_existing = "";
$error_exis_namestor = "";

// FIRST, DELETE THE EXISTING PRIMER
$eprimer_name = $_SESSION['eprimername'];
$sqldel = "DELETE FROM Primer WHERE Primer.Primer_name = '$eprimer_name' AND Primer.Lab_idLabs = $lab";

$resultdel = mysqli_query($con, $sqldel);

// SECONDLY, ADD THE NEW PRIMER WITH THE MODIFICATIONS
// if ($resultdel === TRUE) {
//     echo "You have deleted the selected primer.";
// }

//imput checking if no field is empty in the form, and that direction must be Fw or Rv (in the html?)

//to modify -->everything has been properly validated in the input form)
			//if (isset($_POST["Import"])) {
				$checkname = "SELECT * FROM Primer WHERE Primer_name = '".$nname."'";
                $result_checkname = mysqli_query($con,$checkname);
            	$checkstorage = "SELECT * FROM Primer WHERE Storage_position = '".$nstorage."'";
                $result_checkstorage = mysqli_query($con,$checkstorage);

                if (mysqli_num_rows($result_checkname)!=0 OR mysqli_num_rows($result_checkstorage)!=0) {
                $error_exis_namestor = $nname;
                $error++;
            }
            else {

				if ($nlength == "" OR $nsequence != $_SESSION['esequence']) {
                    $nlength = strlen($nsequence);
                }
                if ($ntm == "" OR $npGC == "" OR $nsequence != $_SESSION['esequence']) {
                    $query = $nsequence;
                    $url = "http://www.biophp.org/minitools/melting_temperature/demo.php?primer=$query&basic=1&cp=200&cs=50&cmg=0";
                    $query_result = file($url);
                    $temp = substr($query_result[19], 86, 2);
                    $GC = substr($query_result[8], -6, 5);
                    $ntm = $temp;
                    $npGC = $GC;
                }

				$result1 = mysqli_query($con,"INSERT into Provider (`Provider_name`) 
                     SELECT * FROM (SELECT '".$nprovider."') AS tmp WHERE NOT EXISTS 
                     (SELECT `Provider_name` FROM Provider WHERE `Provider_name` = '".$nprovider."')");
                
                $result2 = mysqli_query($con,"INSERT into Organism (`Taxonomic_name`) 
                     SELECT * FROM (SELECT '".$norganism."') AS tmp WHERE NOT EXISTS 
                     (SELECT `Taxonomic_name` FROM Organism WHERE `Taxonomic_name` = '".$norganism."')");

                $result3 = mysqli_query($con,"INSERT IGNORE into Target 
                (`GenBank_id`, `Target_name`, `Organism_idOrganism` ) values ('".$ngeneID."' ,'".$ngene."',
                (SELECT `idOrganism` FROM `Organism` WHERE `Taxonomic_name` = '".$norganism."') )");

                $result4 = mysqli_query($con, "INSERT IGNORE into BindingSite (`idBindingSite`, `BindingSite_name`,
                 `Target_GenBank_id`) values ('".$nbinding."-".$ngeneID."','".$nbinding."', '".$ngeneID."') ");


                $result6 = mysqli_query($con, "INSERT into Primer (`idPrimer`,`Primer_name`, `Sequence_5to3`,`Direction_FwRv`,`Length`,
                    `Tm`, `pGC`, `Concentration`, `Storage_position`,`Comments`,`Ordered_idOrdered`, `Lab_idLabs`, `Stock_idStock`,
                    `Provider_idProvider`, `BindingSite_idBindingSite`)  values 
					('".$nsequence."-".$lab."','".$nname."', '".$nsequence."','".$ndirection."','".$nlength."','".$ntm."',
					'".$npGC."','".$nconcentration."','".$nstorage."','".$ncomments."','4', '".$lab."','3',
					(SELECT `idProvider` FROM `Provider` WHERE `Provider_name` = '".$nprovider."'),
					  (SELECT `idBindingSite` FROM `BindingSite` WHERE `BindingSite_name` = '".$nbinding."'
					  AND `Target_GenBank_id` = '".$ngeneID."')) ");

                if (mysqli_errno($con) == "0") {

                    $primer_id = $nsequence."-".$lab;
					array_push($array_id, $primer_id);
					
                    $current_user = $_SESSION['wuser'];
                    $current_primer_id = $_SESSION['esequence']."-".$lab;

                    if ($_SESSION['esequence'] != $nsequence){
                        $new_primer_id = $nsequence."-".$lab;

                        $change_made = 'The primer ' .$_SESSION['eprimername']. ' has been properly MODIFIED in the database. (idPrimer(previous): '.$current_primer_id.' --> idPrimer(actual): '.$new_primer_id.')';
                        $history_data = mysqli_query($con, "INSERT into History (`idUser`, `Change_info`, `Lab_idLabs`)
                         values ('".$current_user."' ,'".$change_made."','".$lab."' )");
                    }
                    elseif ($_SESSION['eprimername'] != $nname) {
                        $change_made = 'The primer ' .$_SESSION['eprimername']. ' has been properly MODIFIED in the database. The new primer name is ' .$nname. ' (idPrimer: '.$current_primer_id.')';
                        $history_data = mysqli_query($con, "INSERT into History (`idUser`, `Change_info`, `Lab_idLabs`)
                             values ('".$current_user."' ,'".$change_made."','".$lab."' )");

                    }
                    else {
                    $change_made = 'The primer ' .$_SESSION['eprimername']. ' has been properly MODIFIED in the database. (idPrimer: '.$current_primer_id.')';
                    $history_data = mysqli_query($con, "INSERT into History (`idUser`, `Change_info`, `Lab_idLabs`)
                         values ('".$current_user."' ,'".$change_made."','".$lab."' )");
                    }

                }
                elseif (mysqli_errno($con) == "1062"){
                    $error_existing = $nname;
                    $error++;

                }
                elseif (mysqli_errno($con) != "0") {
                    $errors_array = $nname;
                    $error++;
				}
				             
				//var_dump(mysqli_error_list($con));
			}

				

				if (count($array_id) > 0 ) {
					?>
							<p center="align">Number of primers modified in your database: <?php print count($array_id)?></p>
			
							<h3>Information of the modified Primer</h3>
							<table border="0" cellspacing="2" cellpadding="4" id="dataTable" class='table table-striped'>
								<thead>
									<tr>
										<th>Name</th>
										<th>Sequence</th>
										<th>Direction</th>
										<th>Length</th>
										<th>Tm</th>
										<th>%GC</th>
										<th>[µl]</th>
										<th>Storage</th>
										<th>Gene</th>
										<th>GeneID</th>
										<th>Binding</th>
										<th>Organism</th>
										<th>Provider</th>
										<th>Comments</th>
									</tr>
								</thead>
								<tbody>
				<?php
				}
				else {
				?>
					<p center="align">Number of primers modified in your database: 0</p>
				<?php
				}
			
				function get_all_records($primer_id){
					$con = getdb();
			
					$Sql = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Length,Primer.Tm, Primer.pGC,
					 Primer.Concentration, Primer.Storage_position, Primer.Comments, Primer.Provider_idProvider, Primer.BindingSite_idBindingSite,
					 Provider.Provider_name, BindingSite.BindingSite_name, BindingSite.Target_GenBank_id, Target.Target_name,
					 Target.Organism_idOrganism, Organism.Taxonomic_name FROM Primer  
						INNER JOIN Provider ON Primer.Provider_idProvider = Provider.idProvider 
						INNER JOIN BindingSite ON Primer.BindingSite_idBindingSite = BindingSite.idBindingSite 
						INNER JOIN Target ON BindingSite.Target_GenBank_id = Target.GenBank_id 
						INNER JOIN Organism ON Target.Organism_idOrganism = Organism.idOrganism 
						WHERE Primer.idPrimer = '$primer_id'";
			
					$result = mysqli_query($con, $Sql); 
					
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) { 
						?>
							<tr>
							   <td><?php print $row['Primer_name']; ?></td>
							   <td><?php print $row['Sequence_5to3'] ?></td>
							   <td><?php print $row['Direction_FwRv'] ?></td>
							   <td><?php print $row['Length'] ?></td>
							   <td><?php print $row['Tm'] ?></td>
							   <td><?php print $row['pGC'] ?></td>
							   <td><?php print $row['Concentration'] ?></td>
							   <td><?php print $row['Storage_position'] ?></td>
							   <td><?php print $row['Target_name'] ?></td>
							   <td> <a href="https://www.ncbi.nlm.nih.gov/gene/<?php print $row['Target_GenBank_id'] ?>"><?php print $row['Target_GenBank_id'] ?></a></td> 
							   <td><?php print $row['BindingSite_name'] ?></td>
							   <td><i><?php print $row['Taxonomic_name'] ?></i></td>
							   <td><?php print $row['Provider_name'] ?></td>
							   <td><?php print $row['Comments'] ?></td>
							</tr>
						<?php        
						}  
					}
				}
				
				foreach ($array_id as $item) {
					get_all_records($item);  
				} 
				?>
						</tbody>
					</table>
			
					<?php
    if ($error != 0){
        ?>
        <div border = "0" class="container" style="width:700px; background-color:#f7f7f7; padding: 25px 25px 25px 25px;">
        <h3 align = "center"><b>List of errors</b></h3>
        <p align = "center"><b style="color:#f43f3f;">ATENTION!</b> Your primer has not been added to your database due to the following error.</p>
        <?php
        if ($errors_array != ""){
            ?>
            <h4>Incorrect primer record format</h4>
            <p>Please, ensure that you have introduced the primer in the <u>requested format</u>:
                 <b> <?php print ($errors_array) ?> </b>
            
            <br>If you have already the primer format and still get the same error, do not hesitate to CONTACT US.</p>
        <?php
        }
        if ($error_existing != "" OR $error_exis_namestor != "") {
            ?>
            <h4>Existing primer in database</h4>
            <?php
        if ($error_existing != "") {
            ?>
            <p align="justify">Careful! You are trying to add the primer <b><?php print($error_existing) ?></b> which <u>sequence</u> is already in your database.
            </p>
            
        <?php
        }
        if ($error_exis_namestor != "") {
            ?>
            <p align="justify">Careful! You are trying to add the primer <b><?php print ($error_exis_namestor) ?></b> which <u>primer name</u> OR <u>storage position</u> is already in your database.
            </p>
        <?php
        }
        }
        ?>
        <br>
        <a class="button" style="margin-left: 240px" href="modifyprimerform.php">Modify another primer</a>
    </div>
<?php
    }
    else{

        ?> <br><a class="button" class="button" style="margin-left: 0px" href="modifyprimerform.php">Modify another primer</a><?php
    }
    ?>
    </div>
    </section>
    </body>
</html>

			<script type="text/javascript">
			$(document).ready(function () {
				$('#dataTable').DataTable( {
				});
			});
			</script>

		<?php
		 $con->close(); 

		// Set the session variables of this primer to NULL again
		$_SESSION['eprimerkey'] = NULL;
		$_SESSION['eprimername'] = NULL;
		$_SESSION['esequence'] = NULL;
		$_SESSION['edirection'] = NULL;
		$_SESSION['etm'] = NULL;
		$_SESSION['epgc'] = NULL;
		$_SESSION['elength'] = NULL;
		$_SESSION['econcentration'] = NULL;
		$_SESSION['estorage'] = NULL;
		$_SESSION['egene'] = NULL;
		$_SESSION['egeneid'] = NULL;
		$_SESSION['ebindingsite'] = NULL;
		$_SESSION['eorganism'] = NULL;
		$_SESSION['eprovider'] = NULL;
		$_SESSION['estock'] = NULL;
		$_SESSION['eordered'] = NULL;
		$_SESSION['ecomments'] = NULL;
		//print_r($_SESSION);
		 ?>