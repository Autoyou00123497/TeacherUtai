<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มประเภทสินค้า</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555555;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-container button {
            background-color: #007bff;
            color: #ffffff;
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
        <h2>เพิ่มประเภทสินค้า</h2>
        <form action="insert_category.php" method="POST">
            <label for="c_id">รหัสประเภทสินค้า (c_id):</label>
            <input type="text" id="c_id" name="c_id" placeholder="ใส่รหัสประเภทสินค้า เช่น C001" required>

            <label for="c_name">ชื่อประเภทสินค้า (c_name):</label>
            <input type="text" id="c_name" name="c_name" placeholder="ใส่ชื่อประเภทอาหาร เช่น เส้น ข้าว " required>

            <button type="submit">เพิ่มข้อมูล</button>
        </form>
    </div>
</body>
</html>
