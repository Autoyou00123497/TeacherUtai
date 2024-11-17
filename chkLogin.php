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
        $_SESSION["img"]=$row["u_img"];
        $_SESSION["sex"]=$row["u_sex"];
        $_SESSION["status"]=$row["u_status"];

        if($_SESSION["status"]=="A"){
        header("location: index_a.php");

        }
        if($_SESSION["status"]=="M"){
            header("location: index_m.php");
    
            }
    

    }else {

        echo"<script>";
        echo"alert(\"Username or Paswword incorret\");";
        echo "Window.history.back()";
        echo "</script>";
    } 

}else {

    header("location: index.php");
    
}




?>