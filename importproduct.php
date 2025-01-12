<?php
include"conn.php";
if(isset($_POST['submit'])){
    if($_FILES['csv_file']['error']==0){
        $file=fopen($_FILES['csv_file']['tmp_name'],'r');
        fgetcsv($file);
        while(($data=fgetcsv($file))!==FALSE){
            $p_id=$con->real_escape_string($data[0]);
            $p_name=$con->real_escape_string($data[1]);
            $c_id=$con->real_escape_string($data[2]);
            $p_quantity=$con->real_escape_string($data[3]);
            $p_price=$con->real_escape_string($data[4]);
            $p_img=$con->real_escape_string($data[5]);
        $sql="INSERT INTO tbl_product(p_id,p_name,c_id,p_quantity,p_price,p_img) VALUES ('$p_id','$p_name','$c_id',$p_quantity,$p_price,'$p_img')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo "<script>";
                    echo "alert(\" นำเข้าข้อมูลสินค้าสำเร็จ \");";
                        Header("Location: index.php");
                    echo "</script>";
                    } else {
                        echo "<script>";
                        echo "alert(\" นำเข้าข้อมูลสินค้าไม่ได้ \");";
                        echo "</script>";
                    }
        }    
    fclose($file);
    }else{
        echo"เกิดข้อผิดพลาดในการนำเข้าสินค้า!";
    }
}


?>