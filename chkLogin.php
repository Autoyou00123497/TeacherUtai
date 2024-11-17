<?php 
session_start();
if(isset($_POST['Username'])){
    include("conn.php");
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $sql = "SELECT*FROM tbl_member WHERE u_phone = '".$Username."'and u_password = '".$Password."' ";
    $result =mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        $_SESSION["UserID"]=$row["u_id"];
        $_SESSION["Name"]=$row["u_fname"]."  ".$row["u_lname"];
        


    }
}




?>