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
// ESTOS TRES NO ESTÁN INCLUIDOS EN LAS QUERIES
$nlength = $_POST["length"];
$nstock = $_POST["stock"];       
$nordered = $_POST["ordered"];
$ncomments = $_POST["comments"];

//print_r($_SESSION);

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Database</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
        
    </head>
    <body>
    </body>
   </html>
           
<?php
include ('../connection.php');
$con = getdb();

$lab = $_SESSION['wlab'];
$array_id = [];

$error = 0;
$errors_array = [];
$error_existing = [];
$error_exis_namestor = "";

// FIRST, DELETE THE EXISTING PRIMER
$eprimer_name = $_SESSION['eprimername'];
$sqldel = "DELETE FROM Primer WHERE Primer.Primer_name = '$eprimer_name' AND Primer.Lab_idLabs = $lab";

$resultdel = mysqli_query($con, $sqldel);

// SECONDLY, ADD THE NEW PRIMER WITH THE MODIFICATIONS
if ($resultdel === TRUE) {
    //echo "You have deleted the primer named: $eprimer_name.";
    echo '<script>alert("You have deleted the selected primer");</script>';

    $current_user = $_SESSION['wuser'];
    $current_primer_id = $_SESSION['esequence']."-".$lab;

    $change_made = 'The primer ' .$_SESSION['eprimername']. ' has been properly DELETED in the database. (idPrimer: '.$current_primer_id.' )';
    $history_data = mysqli_query($con, "INSERT into History (`idUser`, `Change_info`, `Lab_idLabs`)
         values ('".$current_user."' ,'".$change_made."','".$lab."' )");

}

mysqli_close($con);

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

include "modifyprimerform.php";
print_r($_SESSION);
?>