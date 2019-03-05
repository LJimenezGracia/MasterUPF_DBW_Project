<?php

session_start();

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "../index.php";</script>';
}

include ('../connection.php');
$con = getdb();
$lab = $_SESSION['wlab'];
$primername = $_POST['primername'];

$sql = "SELECT * FROM Primer WHERE Primer.Primer_name = '$primername' AND Primer.Lab_idLabs = $lab";

$result = mysqli_query($con,$sql);


if(mysqli_num_rows($result)!=0){
	//echo "There are primers with this name";
	while($row = mysqli_fetch_assoc($result)) {
		//print_r($row);
		$eprimerkey = $row['idPrimer'];

	}
	// If there is a primer with that name, store in session variables all the fields
	$frame = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Tm, Primer.`pGC`, Primer.Concentration, Primer.Storage_position, Primer.Provider_idProvider, Primer.BindingSite_idBindingSite,  Primer.Comments, Primer.Length, Provider.Provider_name, BindingSite.BindingSite_name, BindingSite.Target_GenBank_id, Target.Target_name, Target.Organism_idOrganism, Organism.Taxonomic_name, Stock.in_stock, Ordered.is_ordered FROM Primer                   
		INNER JOIN Provider ON Primer.Provider_idProvider = Provider.idProvider                   
		INNER JOIN BindingSite ON Primer.BindingSite_idBindingSite = BindingSite.idBindingSite                   
		INNER JOIN Target ON BindingSite.Target_GenBank_id = Target.GenBank_id                   
		INNER JOIN Organism ON Target.Organism_idOrganism = Organism.idOrganism                   
		INNER JOIN Stock ON Primer.Stock_idStock = Stock.idStock                  
		INNER JOIN Ordered ON Primer.Ordered_idOrdered = Ordered.idOrdered WHERE Primer.Lab_idLabs = $lab AND Primer.idPrimer = '$eprimerkey'";


	$result2 = mysqli_query($con,$frame);
	if(mysqli_num_rows($result2)!=0){
		while($row2 = mysqli_fetch_assoc($result2)) {
		//echo "<p> This is the info about the primer </p>";
		//print_r($row2);
		$_SESSION['eprimerkey'] = $eprimerkey;
		$_SESSION['eprimername'] = $row2['Primer_name'];
		$_SESSION['esequence'] = $row2['Sequence_5to3'];
		$_SESSION['edirection'] = $row2['Direction_FwRv'];
		$_SESSION['etm'] = $row2['Tm'];
		$_SESSION['epgc'] = $row2['pGC'];
		$_SESSION['elength'] = $row2['Length'];
		$_SESSION['econcentration'] = $row2['Concentration'];
		$_SESSION['estorage'] = $row2['Storage_position'];
		$_SESSION['egene'] = $row2['Target_name'];
		$_SESSION['egeneid'] = $row2['Target_GenBank_id'];
		$_SESSION['ebindingsite'] = $row2['BindingSite_name'];
		$_SESSION['eorganism'] = $row2['Taxonomic_name'];
		$_SESSION['eprovider'] = $row2['Provider_name'];
		$_SESSION['estock'] = $row2['in_stock'];
		$_SESSION['eordered'] = $row2['is_ordered'];
		$_SESSION['ecomments'] = $row2['Comments'];
		//print_r($_SESSION);

		include "modifyprimerform.php";

		}

	}


}else{
	//echo "No primers with this name.";
	echo '<script>alert("There are no primers with this name in your database");</script>';
	include "modifyprimerform.php";
}