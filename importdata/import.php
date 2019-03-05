<?php 
session_start();
$lab = $_SESSION['wlab'];
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

        <!-- Two -->
        <section class="wrapper">
            <div class="inner">
                    <header class="align-center">
                        <h2>PrimerSTOCK database</h2>
                    </header>

<?php

include('../connection.php');
$con = getdb();

$array_id = [];

$error = 0;
$errors_array = [];
$error_existing = [];
$error_exis_namestor = [];

if(isset($_POST["Import"])){		
	$filename=$_FILES["file"]["tmp_name"];	
	$row = 1;
	if (($handle = fopen($filename, "r")) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $checkname = "SELECT * FROM Primer WHERE Primer_name = '".$data[0]."'";
                $result_checkname = mysqli_query($con,$checkname);
            $checkstorage = "SELECT * FROM Primer WHERE Storage_position = '".$data[7]."'";
                $result_checkstorage = mysqli_query($con,$checkstorage);
			if($row == 1){
				$row++;
				continue; 
            }
            if ($data[0] == "" OR $data[1] == "" OR $data[2] == "" OR $data[6] == "" OR $data[7] == "" 
            OR $data[8] == "" OR $data[9] == "" OR $data[10] == "" OR $data[11] == "" OR $data[12] == "") {
                array_push($errors_array, $row);
                $error++;
                $row++;
            }
            elseif ($data[2] !== "Fw" AND $data[2] !== "Rv") {
                array_push($errors_array, $row);
                $error++;
                $row++;
            }
            elseif (mysqli_num_rows($result_checkname)!=0 OR mysqli_num_rows($result_checkstorage)!=0) {
                array_push($error_exis_namestor, $row);
                $error++;
                $row++;
            }
            else {
                $comments = $data[13];
                $data = preg_replace('/\s+/', '', $data);
                if ($data[3] == "") {
                    $data[3] = strlen($data[1]);
                }
                if ($data[4] == "" OR $data[5] == "" ) {
                    $query = $data[1];
                    $url = "http://www.biophp.org/minitools/melting_temperature/demo.php?primer=$query&basic=1&cp=200&cs=50&cmg=0";
                    $query_result = file($url);
                    $temp = substr($query_result[19], 86, 2);
                    $GC = substr($query_result[8], -6, 5);
                    $data[4] = $temp;
                    $data[5] = $GC;
                }
    			$result1 = mysqli_query($con,"INSERT into Provider (`Provider_name`) 
                     SELECT * FROM (SELECT '".$data[12]."') AS tmp WHERE NOT EXISTS 
                     (SELECT `Provider_name` FROM Provider WHERE `Provider_name` = '".$data[12]."')");
                
                $result2 = mysqli_query($con,"INSERT into Organism (`Taxonomic_name`) 
                     SELECT * FROM (SELECT '".$data[11]."') AS tmp WHERE NOT EXISTS 
                     (SELECT `Taxonomic_name` FROM Organism WHERE `Taxonomic_name` = '".$data[11]."')");

                $result3 = mysqli_query($con,"INSERT IGNORE into Target 
                (`GenBank_id`, `Target_name`, `Organism_idOrganism` ) values ('".$data[9]."' ,'".$data[8]."',
                (SELECT `idOrganism` FROM `Organism` WHERE `Taxonomic_name` = '".$data[11]."') )");

                $result4 = mysqli_query($con, "INSERT IGNORE into BindingSite (`idBindingSite`, `BindingSite_name`,
                 `Target_GenBank_id`) values ('".$data[10]."-".$data[9]."','".$data[10]."', '".$data[9]."') ");

                $result6 = mysqli_query($con, "INSERT into Primer (`idPrimer`,`Primer_name`, `Sequence_5to3`,`Direction_FwRv`,
                    `Length`, `Tm`, `pGC`, `Concentration`, `Storage_position`,`Comments`,`Ordered_idOrdered`, `Lab_idLabs`, `Stock_idStock`,
                    `Provider_idProvider`, `BindingSite_idBindingSite`)  values 
                    ('".$data[1]."-".$lab."','".$data[0]."', '".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."',
                    '".$data[6]."','".$data[7]."','$comments','3', '$lab','4',(SELECT `idProvider` FROM `Provider` WHERE `Provider_name`
                     = '".$data[12]."'), (SELECT `idBindingSite` FROM `BindingSite` WHERE `BindingSite_name`
                     = '".$data[10]."' AND `Target_GenBank_id` = '".$data[9]."')) ");
                

                if (mysqli_errno($con) == "0") {
                    $row++;
                    
                    $primer_id = $data[1]."-".$lab;
                    array_push($array_id, $primer_id);

                    $current_user = $_SESSION['wuser'];
                    $current_primer_id = $data[0]."-".$lab;
                    $change_made = 'The primer ' .$data[0]. ' has been properly ADDED in the database. (idPrimer: '.$current_primer_id.')';
                    $history_data = mysqli_query($con, "INSERT into History (`idUser`, `Change_info`, `Lab_idLabs`)
                         values ('".$current_user."' ,'".$change_made."','".$lab."' )");

                }
                elseif (mysqli_errno($con) == "1062"){
                    array_push($error_existing, $row);
                    $error++;
                    $row++;

                }
                elseif (mysqli_errno($con) != "0") {
                    array_push($errors_array,$row);
                    $error++;
                    $row++;
                }

          			// var_dump(mysqli_error_list($con));				
			}
		}
    fclose($handle);
	}

    if (count($array_id) > 0 ) {
        ?>
                <p align="center"><em>Number of primers added in your database: <?php print count($array_id)?></p></em>

                <h3>List of added primers</h3>
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
        <p align="center"><em>Number of primers added in your database: 0</p></em>
    <?php
    }

    function get_all_records($primer_id){
        $con = getdb();

        $Sql = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Length, Primer.Tm, Primer.pGC,
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
        <p align = "center"><b style="color:#f43f3f;">ATENTION!</b> Not all your primers have been added to your database due to different errors.</p>
        <?php
        if (count($errors_array) != 0){
            ?>
            <h4>Incorrect primer(s) record format</h4>
            <p>Please, ensure that the following lines from your .csv file have the <u>requested format</u>:
                 <b> <?php print (join(', ', $errors_array)) ?> </b>
            
            <br>If you have already corrected the .csv file records and still get the same error, do not hesitate to CONTACT US.</p>
        <?php
        }
        if (count($error_existing) != 0 OR count($error_exis_namestor) != 0) {
            ?>
            <h4>Existing primer(s) in database</h4>
            <?php
            if (count($error_existing) != 0) {
            ?>
            <p align="justify">Careful! the following lines contain <u>primer sequences</u> that are in your database:
                <b> <?php print (join(', ', $error_existing)) ?> </b>
            </p>

            <?php
            }
            if (count($error_exis_namestor) != 0) {
            ?>
            <p align="justify">Careful! the following lines contain <u>primer names</u> OR <u>storage positions</u> that are in your database:
                <b> <?php print (join(', ', $error_exis_namestor)) ?> </b>
            </p>
        <?php
        }
        }
        ?>
        <br>
        <a class="button" style="margin-left: 240px" href="http://mmb.pcb.ub.es/formacio/~dbw10/project/users/users.php#three">Enter new primers</a>
        </div>
<?php
    }
    else{
        ?>
        <br><a class="button" class="button" style="margin-left: 0px" href="http://mmb.pcb.ub.es/formacio/~dbw10/project/users/users.php#three">Enter new primers</a>
        <?php
    }
    ?>
    </div>
    </section>
    </body>
</html>
<?php
}
?>
<script type="text/javascript">
$(document).ready(function () {
    $('#dataTable').DataTable( {
    });
});
</script>
<?php $con->close();