<?php
session_start(); 
include('../connection.php');
$con = getdb();
$lab = $_SESSION['wlab'];

if (empty($_SESSION['wuser'])){
	echo '<script>alert("Please log in");</script>';
	echo '<script>window.location = "loginform.php";</script>';
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
					<a href="../index.php" class="logo"><img src="../images/PrimerStock.svg" alt="logo" height="40" width="125"/></a>
					<nav id="nav">
						<a href="#two">Primer Search</a>
						<a href="#three">Database settings</a>
						<a href="#four">Resources</a>
						<a href="#five">Others</a>
						<a href="../index.php#five">Contact</a>
						<a href="logout.php" class="fa fa-sign-out">LOG OUT<a/>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- One -->
		<section id="one" class="wrapper">
		<div class="inner">
					<header class="align-center">
						<img src="../images/PrimerStock_blue.svg" alt="logo" height="150" width="400" class="responsive-a"/>
					</header>


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
                    <th>BindingSite</th>
                    <th>Gene id</th>
                    <th>Gene name</th>
                    <th>Organism</th>
                    <th>Storage</th>
                    <th>Provider</th>
                    <th>Stock</th>
                    <th>Ordered</th>
                    <th>Comments</th>
                        </tr>
                    </thead>
                   <tbody>
		<?php
		
		$Sql = "SELECT Primer.Primer_name, Primer.Sequence_5to3, Primer.Direction_FwRv, Primer.Tm, Primer.`pGC`, Primer.Concentration, Primer.Storage_position, Primer.Provider_idProvider, Primer.BindingSite_idBindingSite,  Primer.Comments, Primer.Length, Provider.Provider_name, BindingSite.BindingSite_name, BindingSite.Target_GenBank_id, Target.Target_name, Target.Organism_idOrganism, Organism.Taxonomic_name, Stock.in_stock, Ordered.is_ordered FROM Primer                   
INNER JOIN Provider ON Primer.Provider_idProvider = Provider.idProvider                   
INNER JOIN BindingSite ON Primer.BindingSite_idBindingSite = BindingSite.idBindingSite                   
INNER JOIN Target ON BindingSite.Target_GenBank_id = Target.GenBank_id                   
INNER JOIN Organism ON Target.Organism_idOrganism = Organism.idOrganism                   
INNER JOIN Stock ON Primer.Stock_idStock = Stock.idStock                  
INNER JOIN Ordered ON Primer.Ordered_idOrdered = Ordered.idOrdered WHERE Primer.Lab_idLabs = $lab"; 

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
                   <td><?php print $row['Target_name'] ?></td>
                   <td> <a href="https://www.ncbi.nlm.nih.gov/gene/<?php print $row['Target_GenBank_id'] ?> " target="_blank"><?php print $row['Target_GenBank_id'] ?></a></td> 
                   <td><?php print $row['BindingSite_name'] ?></td>
                   <td><i><?php print $row['Taxonomic_name'] ?></i></td>
                   <td><?php print $row['Storage_position'] ?></td>
                   <td><?php print $row['Provider_name'] ?></td>
                   <td><?php print $row['in_stock'] ?></td>
                   <td><?php print $row['is_ordered'] ?></td>
                   <td><?php print $row['Comments'] ?></td>
                </tr>
                <?php
            }
        }

 ?> 

    	</tbody>
        </table>

		</div>
		</section>


		<!-- Two -->
		<section id="two" class="wrapper style1 special">
			<div class="inner">
					<header class="align-center">
						<h2>Primer search</h2>
					</header>
			<div class="flex flex-2">
				<article>
					<header>
						<h3 align="center">Advanced search</h3>
					</header>
					<footer>
						<a href="../searchfield/advsearchform.php"class="button fit">Search by field</a>
					</footer>
				</article>
				<article>
					<header>
						<h3 align="center">BLAST against your database</h3>
					</header>
					<footer>
						<a href="../blast/blast.php" class="button fit">Search by sequence</a>
					</footer>
				</article>
				
			</div>
		</section>

		<!-- Three -->
		<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
							<h2>Database settings</h2>
							<p>Please, note the following example is a guide on how the provided input must look like.</p>
							<img src="../images/importdata.jpg" height="125" width="900"/>
					</header>
					
					<div class="flex flex-3">
							<article>
								<header>
									<h3>Import primers from .CSV</h3>
								</header>
								<p align="justify">	1. <b>Download</b> the following template:</p>
									<a href="../importdata/import_template.csv" download="import_template.csv" class="button icon fa-download" style="margin-left: 90px">Template</a>
								<p align="justify"><br>2. <b>Fill</b> in the fields from the template  with your data, without
									leaving any empty space inside a field (use an underscore instead). <br>It is possible to not fill <b>comments</b>, nor <b>Length, Tm </b>and<b> %GC </b>(automatically calculated). </br></p>
									<form class="form-horizontal" action="../importdata/import.php" method="post" name="upload_excel" enctype="multipart/form-data">
										<fieldset>
								<p align="justify">3. <b>Import</b> your data to your LAB database:</br>
									<input type="file" name="file" id="file" accept=".csv" required ></p>
									<button type="submit" id="submit" name="Import" class="button special icon fa-upload" data-loading-text="Loading..."  style="margin-left: 90px">IMPORT</button>
									</fieldset></form>


							</article>
							<article>
								<header>
									<h3>Import/Edit primer manually</h3>
								</header>
								<p align="justify">To manually introduce a new primer in your database, do it here:</p>
								<a href="../importdata/man_importform.php" class="button special icon fa-upload" style="margin-left: 90px">IMPORT</a>
								<p align="justify"></br>To edit an existing primer (modify or delete), do it here:</p>
								<a href="../importdata/modifyprimerform.php" class="button special icon fa-pencil" style="margin-left: 100px">EDIT</a>
							</article>
							<article>
								<header>
									<h3>Export primer database (.CSV)</h3>
								</header>
								<p align="justify">Do you need a copy of your LAB primer database? Do you want to have an updated LAB primer list?</br></p>
								<p align="justify">You can now download a .csv file with all your LAB primers data:
								<form class="form-horizontal" action="../exportdata/export.php" method="post" name="upload_excel" enctype="multipart/form-data">
									<button type="submit" name="Export" class="button special icon fa-download" style="margin-left: 90px">EXPORT database</button>
								</form></p>
							</article>
                
						  
				</div>
			</section>

			<!-- Four -->

			<section id="four" class="wrapper style1 special">
			<div class="inner">
					<header class="align-center">
						<h2>Resources</h2>
						<h3>TOOLS</h3>
						<p>Here you can find some interesting tools to use when working with primers.</p>
					</header>
					<div class="flex flex-4">
						<div class="box" onclick="location.href='https://www.eurofinsgenomics.eu/en/ecom/tools/pcr-primer-design/';" style="cursor: pointer;">
						<p align = "center"><h3>Primer Design Tool</h3><br>Eurofins Genomics</p>
						</div>
						<div class="box" onclick="location.href='https://genome.ucsc.edu/cgi-bin/hgPcr';" style="cursor: pointer;">
						<p align="center"><h3>In-Silico PCR</h3><br>University of California, Santa Cruz (UCSC)</p>
						</div>
						<div class="box" onclick="location.href='https://pga.mgh.harvard.edu/primerbank/';" style="cursor: pointer;">
						<p align = "center"><h3>PrimerBank</h3><br>The Massachusetts General Hospital</p>
						</div>
						<div class="box" onclick="location.href='http://www.oligoevaluator.com/OligoCalcServlet';" style="cursor: pointer;">
						<p align = "center"><h3>OligoEvaluator</h3><br>Sigma-Aldrich<br>Merck</p>
						</div>
					</div>
					<header class="align-center">
						<h3>PROVIDERS</h3>
						<p>Here you can find some providers' websites to directly order your primers.</p>
					</header>
					<div class="flex flex-4">
						<div class="box" onclick="location.href='https://www.thermofisher.com/es/en/home/life-science/oligonucleotides-primers-probes-genes.html';" style="cursor: pointer;">
						<p align = "center"><h3>ThermoFisher Scientific</h3></p>
						</div>
						<div class="box" onclick="location.href='https://www.sigmaaldrich.com/configurator/servlet/DesignCenter?customName=customoligo';" style="cursor: pointer;">
						<p align="center"><h3>Sigma-Aldrich<br>Merck</h3></p>
						</div>
						<div class="box" onclick="location.href='https://eu.idtdna.com/pages/products/custom-dna-rna';" style="cursor: pointer;">
						<p align = "center"><h3>Integrated DNA Technologies (IDT)</h3></p>
						</div>
						<div class="box" onclick="location.href='http://www.bio-rad.com/es-es/product/primepcr-pcr-primers-assays-arrays?ID=M0HROA15';" style="cursor: pointer;">
						<p align = "center"><h3>BIO-RAD</h3><br></p>
						</div>
					</div>
			</div>
			</section>


			<!-- Five -->
			<section id="five" class="wrapper">
					<div class="inner">
						<header class="align-center">
							<h2>Others</h2>
						</header>
					<div class="flex flex-3">
							<article>
								<header>
									<h3 align="center">History</h3>
								</header>
						<a href="history.php" class="button alt" style="width:80%; margin-left: 30px" >Check out your Lab's History</a>
							</article>
							<article>
								<header>
									<h3 align="center">User</h3>
								</header>
						<a href="delete.php" class="button alt" style="width:80%; margin-left: 25px" >Deregister from PrimerSTOCK</a>
							</article>
					<article>
								<header>
									<h3 align="center">Documentation</h3>
								</header>
						<a href="history.php" class="button alt" style="width:70%; margin-left: 45px" >Check out our manual</a>
							
							</article>
						</div>
					</div>
					<br>
				</section>


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

	</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
