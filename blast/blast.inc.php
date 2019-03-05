<?php

$blastHome = "/home/dbw00/blast";
$blastDbsDir = "/home/dbw06/public_html/project";
$blastExe = "$blastHome/bin/blastn";
$blastCmdLine = "$blastExe -task blastn-short -evalue 0.001 -max_target_seqs 100 -outfmt  \"6 sseqid stitle evalue pident\"";
// $blastCmdLine = "$blastExe -task blastn-short -evalue 0.001 -max_target_seqs 100";


$baseDir = "/home/dbw10/project";

$tmpDir = "$baseDir/tmp";
if (!file_exists($tmpDir)) {
    mkdir($tmpDir);
}
?>
