<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f8ff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      background: #ffffff;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px;
      text-align: center;
    }
    .login-container h1 {
      margin-bottom: 20px;
      color: #333;
    }
    .login-container label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    .login-container input[type="submit"] {
      background-color: #007bff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }
    .login-container input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .login-container .error-message {
      color: red;
      font-size: 14px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <form action="login.php" method="post">
      <label for="u_id">User ID:</label>
      <input type="text" id="u_id" name="u_id" required>

      <label for="u_password">Password:</label>
      <input type="password" id="u_password" name="u_password" required>

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
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["u_id"] = $u_id;

        // redirect ไปหน้า index.php
        header("Location: index.php");
        exit(); // คำสั่งนี้เพื่อหยุดการทำงานของสคริปต์หลังจาก redirect
      } else {
        // ล็อกอินล้มเหลว
        echo '<div class="error-message">Invalid username or password.</div>';
      }

      $conn->close();
    }
    ?>
  </div>
</body>
</html>
