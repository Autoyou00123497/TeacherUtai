<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสมาชิก</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .form-container input[type="text"], 
        .form-container input[type="password"], 
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-container button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>เพิ่มข้อมูลสมาชิก</h2>
        <form action="insert_member.php" method="POST" enctype="multipart/form-data">
            <label for="u_id">รหัสสมาชิก :</label>
            <input type="text" id="u_id" name="u_id" required>

            <label for="u_fname">ชื่อ :</label>
            <input type="text" id="u_fname" name="u_fname" required>

            <label for="u_lname">นามสกุล :</label>
            <input type="text" id="u_lname" name="u_lname" required>

            <label for="u_status">สถานะ :</label>
<select id="u_sex" name="u_sex" required>
    <option value="">-- กรุณาเลือกสถานะ --</option>
    <option value="ชาย">ชาย</option>
    <option value="หญิง">หญิง</option>
    <option value="ไม่ต้องการระบุ">ไม่ต้องการระบุ</option>

</select>


            <label for="u_phone">เบอร์โทรศัพท์ :</label>
            <input type="text" id="u_phone" name="u_phone">

            <label for="u_address">ที่อยู่ :</label>
            <input type="text" id="u_address" name="u_address">

            <label for="u_status">สถานะ :</label>
<select id="u_status" name="u_status" required>
    <option value="">-- กรุณาเลือกสถานะ --</option>
    <option value="A">A</option>
    <option value="M">M</option>
</select>


            <label for="u_password">รหัสผ่าน :</label>
            <input type="password" id="u_password" name="u_password" required>

            <label for="u_img">รูปภาพสมาชิก :</label>
            <input type="file" id="u_img" name="u_img" accept="image/*">

            <button type="submit">เพิ่มข้อมูล</button>
        </form>
    </div>
</body>
</html>
