<?php
function getdb(){
$servername = "localhost";
$username = "primerstock";
$password = "primerstock1234";
$db = "primerstock_db";

try {
    $con = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $con;
}