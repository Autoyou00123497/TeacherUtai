<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "restaurant";

$con = mysqli_connect($host, $user, $pass, $dbname) or die("error : " . mysqli_error($conn));
mysqli_query($con, "SET character_set_client='utf8' ");
mysqli_query($con, "SET character_set_results='utf8' ");
mysqli_query($con, "SET character_set_connection='utf8' ");
?>
