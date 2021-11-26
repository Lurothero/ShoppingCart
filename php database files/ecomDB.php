<?php

$servername = "localhost";
$user = "ReneAllen";#
$pass = "AzO]dobWf6Ynw.kQ";#Please connect to your own Database!
$dbname = "ecoms";

$connect = mysqli_connect($servername,$user,$pass,$dbname);

if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>