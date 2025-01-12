<?php
include"conn.php";
if(isset($_POST['submit'])){
    if($_FILES['csv_file']['error']==0){
        $file=fopen($_FILES['csv_file']['tmp_name'],'r');
        fgetcsv($file);
        while(($data=fgetcsv($file))!==FALSE){
            $u_id=$con->real_escape_string($data[0]);
            $u_fname=$con->real_escape_string($data[1]);
            $u_lname=$con->real_escape_string($data[2]);
            $u_sex=$con->real_escape_string($data[3]);
            $u_phone=$con->real_escape_string($data[4]);
            $u_address=$con->real_escape_string($data[5]);
            $u_status=$con->real_escape_string($data[6]);
            $u_img=$con->real_escape_string($data[7]);
            $u_password=$con->real_escape_string($data[8]);
        $sql="INSERT INTO tbl_member(U_id,U_fname,U_lname,U_sex,U_phone,U_address,U_status,U_img,U_password) VALUES ('$u_id','$u_fname','$u_lname','$u_sex','$u_phone','$u_address','$u_status','$u_img','$u_password')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo "<script>";
                    echo "alert(\" นำเข้าข้อมูลสมาชิกสำเร็จ \");";
                        Header("Location: index_a.php");
                    echo "</script>";
                    } else {
                        echo "<script>";
                        echo "alert(\" นำเข้าข้อมูลสมาชิกไม่ได้ \");";
                        echo "</script>";
                    }
        }    
    fclose($file);
    }else{
        echo"เกิดข้อผิดพลาดในการนำเข้าสินค้า!";
    }
}


?>