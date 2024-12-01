<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "restaurant";

$con = mysqli_connect($host, $user, $pass, $dbname) or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET character_set_client='utf8'");
mysqli_query($con, "SET character_set_results='utf8'");
mysqli_query($con, "SET character_set_connection='utf8'");

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}

date_default_timezone_set('Asia/Bangkok'); // Correct function to set the timezone
?>