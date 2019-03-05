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
 <?php
include ('blast.inc.php');
require ('../connection.php');

$con = getdb();

if ((($file_f = fopen("/home/dbw10/project/".$lab."_f.txt",'wa+')) !== false) AND ($file_r = fopen("/home/dbw10/project/".$lab."_r.txt",'wa+'))) {

    $Sql = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv FROM Primer WHERE Primer.Lab_idLabs = $lab";

    $result = mysqli_query($con, $Sql); 
    while($row = mysqli_fetch_assoc($result)){
        if ($row['Direction_FwRv'] == 'Fw'){
            fwrite($file_f, ">");
            fwrite($file_f, $row['Primer_name']);
            fwrite($file_f, "\n");
            fwrite($file_f, $row['Sequence_5to3']);
            fwrite($file_f, "\n");

        }
        if ($row['Direction_FwRv'] == 'Rv'){
            fwrite($file_r, ">");
            fwrite($file_r, $row['Primer_name']);
            fwrite($file_r, "\n");
            fwrite($file_r, $row['Sequence_5to3']);
            fwrite($file_r, "\n");
        
        }
    }
}

fclose($file_f);
fclose($file_r);


$forward = "/home/dbw10/project/".$lab."_f.txt";
$reverse = "/home/dbw10/project/".$lab."_r.txt";


if ($_FILES['uploadFile']['name']) {
    $_REQUEST['fasta']=  file_get_contents($_FILES['uploadFile']['tmp_name']);  
    exec("/home/dbw00/blast/bin/makeblastdb -in ".$forward." -parse_seqids -title Database_f -dbtype nucl");
    exec("/home/dbw00/blast/bin/makeblastdb -in ".$reverse." -parse_seqids -title Database_r -dbtype nucl"); 
}
if (!$_REQUEST['fasta']) { ?>
<html>
    <head>
        <title>Error: No request</title>
    </head>
    <body>
        <h2>Error: Received request was empty</h2>
    </body>
</html>
<?php
} else {
    $fasta = $_REQUEST['fasta'];
}
?>
        <?php 

            exec("echo ' ".$fasta." '| tr 'ATGC' 'TACG'", $complement);  
            $complement = $complement[0];      
            $result_f = blast($fasta, $forward);
            $result_r = blast($complement, $reverse);
            $result_f_complete =blast_complete($fasta, $forward);
            $result_r_complete =blast_complete($complement, $reverse);

            $_SESSION['result_f_complete']=$result_f_complete;
            $_SESSION['result_r_complete']=$result_r_complete;

            if (!count($result_r)) {
                echo "<h3>Result Reverse</h3>: No primers found for this sequence <br><br>";
            }
            if (!count($result_f)) {
                echo "<h3>Result Forward</h3>: No primers found for this sequence <br><br>";
        } else { ?>

        <html><body>
            
        <div class="row">
  <div class="column"><h3>Result Forward</h3></div>
  <div class="column"><a href="blast_forward.php" class="button alt" target="_blank">View BLAST output</a></div>
</div>

        <table border="0" cellspacing="2" cellpadding="4" id="dataTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sequence</th>
                    <th>Direction</th>
                    <th>Tm</th>
                    <th>%GC</th>
                    <th>Concentration</th>
                    <th>Position</th>
                    <th>Provider</th>
                    <th>BindingSite</th>
                    <th>Gene id</th>
                    <th>Gene name</th>
                    <th>Organism</th>
                    <th>Stock</th>
                    <th>Ordered</th>
                    <th>E. value</th>
                    <th>%Identity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                get_blast ($result_f); 
                ?></tbody>
        </table>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
<br>
<br>
<br>
<div class="row">
  <div class="column"><h3>Result Reverse</h3></div>
  <div class="column"><a href="blast_reverse.php" class="button alt" target="_blank">View BLAST output</a> </div>
</div>

            <br>
        <table border="0" cellspacing="2" cellpadding="4" id="dataTable1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sequence</th>
                    <th>Direction</th>
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
                    <th>E. value</th>
                    <th>%Identity</th>
                </tr>
            </thead>
            <tbody><?php
                get_blast ($result_r);
                    }
                ?>
            </tbody>
        </table>
    </body>
    <br>
    <a class="button" href="blast.php">New Search</a>
    </div>
</section>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable1').DataTable();
    });
</script>


<!-- <section id="three" class="wrapper style1 special">
            <div class="inner">
                    <header class="align-center">
                        <h2>Design your PCR protocol</h2>
                    </header>
                    <body class="align-center"><h3>Select your primers (insert primer name)</h3>
                        <form action="protocol.php" method="post">
                        <div class="flex flex-2 align-center" style="width: 40%; margin-left: 355px;">
                            <article><p>Forward</p><input name="F" required></article>
                            <article><p>Reverse</p><input name="R" required></article>
                        </div>
                    <br>
                    <br>
                    IF THE PRIMERS DO'NT EXIST!! ERROR: The selected primers are not in the database
                    <input type="submit" value="Submit" name="SubmitButton" class ="align-center">
                </form>
                    </body>

                    

            </div> -->
<!-- </header> -->


<?php  
function blast ($fasta, $db) {
    require "blast.inc.php";
    $p = strpos($fasta, '>');
    if (!$p and ( $p !== 0)) { // strpos returns False if not found and "0" if first character in the string
        // When is not already FASTA, add header + new line
        $fasta = ">User provided sequence\n" . $fasta;
    }     
    // Set temporary file name to a unique value to protect from concurrent runs
    $tempFile = $tmpDir . "/" . uniqId('');


    // Open temporary file and store query FASTA
    $ff = fopen($tempFile . ".query.fasta", 'wt');
    fwrite($ff, $fasta);
    fclose($ff);

    exec($blastCmdLine . " -db $db -query " . $tempFile . ".query.fasta -out " . $tempFile . ".blast.out", $output, $retrun_var);

    // print ($blastCmdLine . " -db $db -query " . $tempFile . ".query.fasta -out " . $tempFile . ".blast.out");


    // Read results file and parse hits onto $result[]
    $result = file($tempFile . ".blast.out");
    $output_file = ($tempFile . ".blast.out");
    if (file_exists($tempFile . ".query.fasta"))
    unlink($tempFile . ".query.fasta");
    return $result;
    if (file_exists($output_file))
    unlink($output_file);

}

function get_blast($result){
        foreach (array_values($result) as $rr) {
            
            $con = getdb();
                        $data = explode ("\t",$rr);
                            $idCode = $data[0];
                            $desc = $data[1];
                            $ev = $data[2];
                            $identity = $data[3];

            $Sql = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Tm, Primer.`pGC`, Primer.Concentration, Primer.Storage_position, Primer.Provider_idProvider, Primer.BindingSite_idBindingSite,  Provider.Provider_name, BindingSite.BindingSite_name, BindingSite.Target_GenBank_id, Target.Target_name, Target.Organism_idOrganism, Organism.Taxonomic_name, Stock.in_stock, Ordered.is_ordered FROM Primer  
            INNER JOIN Provider ON Primer.Provider_idProvider = Provider.idProvider 
            INNER JOIN BindingSite ON Primer.BindingSite_idBindingSite = BindingSite.idBindingSite 
            INNER JOIN Target ON BindingSite.Target_GenBank_id = Target.GenBank_id 
            INNER JOIN Organism ON Target.Organism_idOrganism = Organism.idOrganism 
            INNER JOIN Stock ON Primer.Stock_idStock = Stock.idStock 
            INNER JOIN Ordered ON Primer.Ordered_idOrdered = Ordered.idOrdered 
            WHERE Primer.Primer_name = '$idCode'";

            $result = mysqli_query($con, $Sql); 
            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                
                echo " <tr>
                   <td>" . $row['Primer_name']."</td>
                   <td>" . $row['Sequence_5to3']."</td>
                   <td>" . $row['Direction_FwRv']."</td>
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
                   <td>" . $ev."</td>
                   <td>" . $identity."</td></tr> <?php "
                   ;        
                  } }
    }

}

function blast_complete ($fasta, $db) {
    require "blast.inc.php";
    $p = strpos($fasta, '>');
    if (!$p and ( $p !== 0)) { // strpos returns False if not found and "0" if first character in the string
        // When is not already FASTA, add header + new line
        $fasta = ">User provided sequence\n" . $fasta;
    }     
    $tempFile = $tmpDir . "/" . uniqId('');
    $ff = fopen($tempFile . ".query.fasta", 'wt');
    fwrite($ff, $fasta);
    fclose($ff);

    exec("/home/dbw00/blast/bin/blastn -task blastn-short -evalue 0.001 -max_target_seqs 100 -db $db -query " . $tempFile . ".query.fasta -out " . $tempFile . ".blast.out", $output, $retrun_var);

    $result = file($tempFile . ".blast.out");
    $output_file = ($tempFile . ".blast.out");
    if (file_exists($tempFile . ".query.fasta"))
    unlink($tempFile . ".query.fasta");
    return $output_file;
    if (file_exists($tempFile . ".blast.out"))
        unlink($output_file);


}
?>

<?php $con->close(); 
if (file_exists($forward))
    // unlink($forward);
    exec("rm ".$forward);
    exec("rm ".$forward.".*");

if (file_exists($reverse))
    exec("rm ".$reverse);
    exec("rm ".$reverse.".*");
?>



