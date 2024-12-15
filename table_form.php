<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลประเภท</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">เพิ่มข้อมูลโต๊ะอาหาร </h2>
        <form action="table_insert.php" method="post">
            <div class="form-group">
                <label for="t_id">รหัสโต๊ะ</label>
                <input type="text" class="form-control" id="t_id" name="t_id" required>
            </div>
            <div class="form-group">
                <label for="t_name">ชื่อโต๊ะ</label>
                <input type="text" class="form-control" id="t_name" name="t_name" required>
            </div>
            <button onclick="window.location.href='table_insert.php';" class="btn btn-primary">บันทึก</button>
            <a href="index.php" class="btn btn-warning btn-lg">กลับหน้าหลัก</a>

            </form>

    </div>
</body>
</html>
