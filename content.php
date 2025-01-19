<div style="display: flex; justify-content: flex-end;">
    <button 
        onclick="window.location.href='member_insert.php';" 
        class="btn btn-success"
    >
        เพิ่มข้อมูล Users
    </button>

    <button 
        onclick="window.location.href='import_member.php';" 
        class="btn btn-success"
    >
        เพิ่มข้อมูล CSV
    </button>
</div>

<table class="table">
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
            <th scope="col">แก้ไข / ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include('conn.php');

        $sql = "SELECT * FROM tbl_member";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $data['u_id'] ?></td>
                <td><?php echo $data['u_fname'] ?></td>
                <td><?php echo $data['u_lname'] ?></td>
                <td><?php echo $data['u_sex'] ?></td>
                <td><?php echo $data['u_phone'] ?></td>
                <td><?php echo $data['u_address'] ?></td>
                <td><?php echo $data['u_status'] ?></td>
                <td><?php echo "<img src='img/users/" . $data["u_img"] . "' width='150' height='150'>"; ?></td>
                <td> 
                    <button 
                        onclick="window.location.href='member_edit.php?u_id=<?php echo $data['u_id']; ?>';" 
                        class="btn btn-warning"
                    >
                        แก้ไข
                    </button>
                    <button 
                        onclick="if(confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')) window.location.href='delete_member.php?u_id=<?php echo $data['u_id']; ?>';" 
                        class="btn btn-danger"
                    >
                        ลบ
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
