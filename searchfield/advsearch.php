<?php

session_start();
include ('../connection.php');
$con = getdb();
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

        <section id="one" class="wrapper">
        <div class="inner">
          <header class="align-center">
              <h2>Advanced search results</h2>
          </header>
        
<?php

// Obtaing the variables from the form

// $_SESSION["sname"] = $_POST['name']; 
// $_SESSION["sdirection"] =$_POST['direction'];
// $_SESSION["stm"] = $_POST['tm'];
// $_SESSION["spgc"] = $_POST['pGC'];
// $_SESSION["sstorage"] = $_POST['storage'];
// $_SESSION["sstock"] =  $_POST['stock'];
// $_SESSION["sordered"] =  $_POST['ordered'];
// $_SESSION["sprovider"] =  $_POST['provider'];
// $_SESSION["sgene"] =  $_POST['gene']; 
// $_SESSION["sgeneid"] =  $_POST['geneID'];
// $_SESSION["sbinding"] = $_POST['binding']; 
// $_SESSION["sorganism"] = $_POST['organism'];
// $_SESSION["scomments"] = $_POST['comments'];

$sname = $_POST['name']; 
$sdirection = $_POST['direction'];
$stm = $_POST['tm']; 
$spGC = $_POST['pGC'];
$sstorage = $_POST['storage'];
$sstock = $_POST['stock'];
$sordered = $_POST['ordered'];
$sprovider = $_POST['provider'];
$sgene = $_POST['gene'];
$sgeneID = $_POST['geneID'];
$sbinding = $_POST['binding']; 
$sorganism = $_POST['organism'];
$comments = $_POST['comments'];

$lab = $_SESSION['wlab'];

$error = 0;

$ANDconds = ["True"];
$frame = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Tm, Primer.`pGC`, Primer.Concentration, Primer.Storage_position, Primer.Provider_idProvider, Primer.BindingSite_idBindingSite,  Primer.Comments, Primer.Length, Provider.Provider_name, BindingSite.BindingSite_name, BindingSite.Target_GenBank_id, Target.Target_name, Target.Organism_idOrganism, Organism.Taxonomic_name, Stock.in_stock, Ordered.is_ordered FROM Primer                   
INNER JOIN Provider ON Primer.Provider_idProvider = Provider.idProvider                   
INNER JOIN BindingSite ON Primer.BindingSite_idBindingSite = BindingSite.idBindingSite                   
INNER JOIN Target ON BindingSite.Target_GenBank_id = Target.GenBank_id                   
INNER JOIN Organism ON Target.Organism_idOrganism = Organism.idOrganism                   
INNER JOIN Stock ON Primer.Stock_idStock = Stock.idStock                  
INNER JOIN Ordered ON Primer.Ordered_idOrdered = Ordered.idOrdered WHERE Primer.Lab_idLabs = $lab
";


if (!empty($sname)){
    $frame = $frame." AND Primer.Primer_name LIKE '$sname'";
}
if ($sdirection != "False"){
    $frame = $frame ." AND Primer.Direction_FwRv = '$sdirection'";
}
if (!empty($stm)){
    $min = $stm -2;
    $max = $stm +2;
    $frame = $frame ." AND Primer.Tm BETWEEN $min AND $max";
}
if (!empty($spGC)){
    $min = $spGC -5;
    $max = $spGC +5;
    $frame = $frame ." AND Primer.pGC BETWEEN $min AND $max";
}
if ($sstock != "False"){
    $frame = $frame ." AND Primer.Stock_idStock = $sstock";
}
if ($sordered != "False"){
    $frame = $frame ." AND Primer.Ordered_idOrdered = $sordered";
}
if (!empty($sstorage)){
    $frame = $frame ." AND Primer.Storage_position = '$sstorage'";
}
if (!empty($sprovider)){
    $frame = $frame ." AND Provider.Provider_name LIKE '$sprovider'";
}
if (!empty($sgene)){
    $frame = $frame ." AND Target.Target_name LIKE '$sgene'";
}
if (!empty($sgeneID)){
    $frame = $frame ." AND Target.GenBank_id = $sgeneID";
}
if (!empty($sbinding)){
    $frame = $frame ." AND BindingSite.BindingSite_name LIKE '$sbinding'";
}
if (!empty($sorganism)){
    $frame = $frame ." AND Organism.Taxonomic_name LIKE '$sorganism'";
}
if (!empty($comments)){
    $frame = $frame ." AND Primer.Comments LIKE '$comments'";
}

$result = mysqli_query($con,$frame);

if (mysqli_num_rows($result) > 0) {
    ?>
    <h3>List of primers</h3>
            <table border="0" cellspacing="2" cellpadding="4" id="dataTable">
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
                    <th>Provider</th>
                    <th>BindingSite</th>
                    <th>Gene id</th>
                    <th>Gene name</th>
                    <th>Organism</th>
                    <th>Stock</th>
                    <th>Ordered</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>

    <?php
    while($row = mysqli_fetch_assoc($result)) { 
                
                echo " <tr>
                   <td>" . $row['Primer_name']."</td>
                   <td>" . $row['Sequence_5to3']."</td>
                   <td>" . $row['Direction_FwRv']."</td>
                   <td>" . $row['Length']."</td>
                   <td>" . $row['Tm']."</td>
                   <td>" . $row['pGC']."</td>
                   <td>" . $row['Concentration']."</td>
                   <td>" . $row['Storage_position']."</td>
                   <td>" . $row['Provider_name']."</td>
                   <td>" . $row['BindingSite_name']."</td>
                   <td>" . $row['Target_GenBank_id']."</td>
                   <td>" . $row['Target_name']."</td>
                   <td>" . $row['Taxonomic_name']."</td>
                   <td>" . $row['in_stock']."</td>
                   <td>" . $row['is_ordered']."</td>
                   <td>" . $row['Comments']."</td> 
                   </tr> ";
            }
            }
else {
    ?>
    <p align="center"><em>Number of primers found in your database: 0</p></em>
    <h3>No primers found</h3>

<?php
}
?>
        </table>
        </tbody>
        </div>
        </br>
        <a class="button" style="margin-left: 100px" href="advsearchform.php">Search new primers</a>

</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>

