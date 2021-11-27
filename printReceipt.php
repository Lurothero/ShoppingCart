<?php
session_start();
include 'php database files/ecomDB.php';


$user = $_SESSION["username"];

$tablename = $user . "table";//SPACE MUST BE KEPT


echo "comming soon...";


$sql = "DROP table $tablename";

$result = mysqli_query($connect, $sql);



echo "table dropped";

?>