<?php
session_start();
include('../connection.php');
$con = getdb();

$lab = $_SESSION['wlab'];
$date = date("Ymd");

if(isset($_POST["Export"])){      
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=primerDB_'.$lab.'_'.$date.'.csv');  
    
    $output = fopen('php://output', 'w');  
    fputcsv($output, array('Primer','Sequence','Direction','Tm','pGC','Concentration',
        'Storage','Gene','GenBankID','BindingSite','Organism','Provider', 'Comments'));  
    
    $Sql = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Length, Primer.Tm, Primer.pGC,
    Primer.Concentration, Primer.Storage_position, Target.Target_name, BindingSite.Target_GenBank_id,
    BindingSite.BindingSite_name, Organism.Taxonomic_name, Provider.Provider_name, Primer.Comments FROM Primer  
       INNER JOIN Provider ON Primer.Provider_idProvider = Provider.idProvider 
       INNER JOIN BindingSite ON Primer.BindingSite_idBindingSite = BindingSite.idBindingSite 
       INNER JOIN Target ON BindingSite.Target_GenBank_id = Target.GenBank_id 
       INNER JOIN Organism ON Target.Organism_idOrganism = Organism.idOrganism 
       WHERE Primer.Lab_idLabs = $lab";
    
    $result = mysqli_query($con, $Sql);  

    while($row = mysqli_fetch_assoc($result))  {
        fputcsv($output, $row);  
    }  
    fclose($output);  
}
$con->close();