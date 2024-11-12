<?php 
include("connection.php");
echo $_POST["username"];
echo $_POST["password"];


$stmt = $conn->prepare("SELECT * FROM tbl_member WHERE u_id = ? AND u_password = ?");
$stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Since we're looking for a specific user, we only need to fetch once
    $row = $result->fetch_assoc();
    
    // Start the session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Set session variables
    $_SESSION['u_status'] = $row["u_status"];
    $_SESSION['u_fname'] = $row["u_fname"];
    $_SESSION['u_lname'] = $row["u_lname"];
    
    // Redirect to index.php
    header('Location: index.php');
    exit(); // Always call exit after header redirect
} else {
    echo "Invalid username or password";
}

?>