<form action="login.php" method="post">
  <label for="u_id">User ID:</label>
  <input type="text" id="u_id" name="u_id" required><br><br>

  <label for="u_password">Password:</label>
  <input type="password" id="u_password" name="u_password" required><br><br>

  <input type="submit" value="Login">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $u_id = $_POST["u_id"];
  $u_password = $_POST["u_password"];

  // เชื่อมต่อกับฐานข้อมูล (แก้ไขข้อมูลให้ตรงกับของคุณ)


    $conn = new mysqli("localhost", "root", "", "restaurant");

  // ตรวจสอบการเชื่อมต่อ
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // ค้นหาข้อมูลในฐานข้อมูล
  $sql = "SELECT * FROM tbl_member WHERE u_id = '$u_id' AND u_password = '$u_password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // ล็อกอินสำเร็จ
    // ตั้งค่า session หรือ cookie ตามต้องการ เช่น
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["u_id"] = $u_id;

    // redirect ไปหน้า index.php
    header("Location: index.php");
    exit(); // คำสั่งนี้เพื่อหยุดการทำงานของสคริปต์หลังจาก redirect
  } else {
    // ล็อกอินล้มเหลว
    echo "Invalid username or password.";
  }

  $conn->close();
}
?>