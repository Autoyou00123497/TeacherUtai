<div style = "display: flex; justify-content: flex-end">
<button type="button" class="btn btn-success">เพิ่มข้อมูล Users</button>
</div>


<table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">รหัสสมาชิก</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เพศ</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col">ที่อยู่</th>
      <th scope="col">สถานะ</th>
      <th scope="col">ภาพ</th>
      <th scope="col">แก้ไข / ลบ </th>

    </tr>
  </thead>


  <?php 
include('conn.php');

$sql="SELECT * FROM tbl_member";
$result=mysqli_query($con,$sql);
while($data=mysqli_fetch_array($result)){ ?>


  <tbody>

    <tr>
      <th scope="row"><?php echo $data['u_id'] ?></th>
      <th scope="row"><?php echo $data['u_fname'] ?></th>
      <th scope="row"><?php echo $data['u_lname'] ?></th>

      <th scope="row"><?php echo $data['u_sex'] ?></th>
      <th scope="row"><?php echo $data['u_phone'] ?></th>
      <th scope="row"><?php echo $data['u_address'] ?></th>
      <th scope="row"><?php echo $data['u_status'] ?></th>
      <th scope="row"><?php echo "<img src='img/users/" . $data["u_img"] . "' width='150' height='150'>"; ?></th>
      <td> 
      <button type="button" class="btn btn-warning">แก้ไข</button>
      <button type="button" class="btn btn-danger">ลบ</button>
      </td>

      
    </tr>
    
  </tbody>

  <?php       } ?>








    </table>
    













