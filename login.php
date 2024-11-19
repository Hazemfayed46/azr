<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Dan Aleko</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="" method="POST">
      <h1 id="hilood">Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username or Gmail" id="button-login-user"name="button-login-user" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" id="button-login-password" name="button-login-password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn" name='submit-form-login'id="submit-form-login">Login</button>
      <div class="register-link">
        <p>Dont have an account? <a href="Register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
<?php
error_reporting(E_ERROR | E_PARSE);
$file_json = 'users.json'; // مسار ملف المستخدمين

// تحقق من وجود ملف JSON
if (file_exists($file_json)) {
    $data = json_decode(file_get_contents($file_json), true); // قراءة البيانات من JSON وتحويلها لمصفوفة
} else {
    $data = []; // إنشاء مصفوفة فارغة إذا كان الملف غير موجود
}

if (isset($_POST['submit-form-login'])) {
    if (isset($_POST['button-login-user']) && isset($_POST['button-login-password'])) {
        $button_login_user = $_POST["button-login-user"];
        $button_login_password = $_POST["button-login-password"];

        $isAuthenticated = false;
        
        // التحقق من بيانات المستخدم
        foreach ($data as $user) {
            if (($button_login_user == $user['user'] || $button_login_user == $user['gmail']) && $button_login_password == $user['password']) {
                $isAuthenticated = true;
                break;
            }
        }

        if ($isAuthenticated) {
            // إنشاء الكوكيز للمستخدم وكلمة المرور مع اسم ثابت
            setcookie('user_cookie', $button_login_user, time() + (10 * 365 * 24 * 60 * 60), '/'); // الكوكي للمستخدم لمدة 10 سنوات
            setcookie('password_cookie', $button_login_password, time() + (10 * 365 * 24 * 60 * 60), '/'); // الكوكي لكلمة المرور لمدة 10 سنوات

            // عرض رسالة نجاح
            echo "<h1 style='background:greenyellow;'>Success</h1>";
            echo "
            <script>
                setTimeout(function() {
                    window.location.href = 'index.php'; 
                }, 5000);
            </script>";

            // رسائل متحركة أثناء الانتقال
            echo '<div id="hilood"></div>';
            echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘</h1>"},1000)</script>';
            echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘🔘</h1>"},2000)</script>';
            echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘🔘🔘</h1>"},3000)</script>';
            echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘🔘🔘🔘</h1>"},4000)</script>';

            exit();
        } else {
            echo "<h1 style='background:red;'>Error: Invalid credentials</h1>";
        }
    } else {
        echo "<h1 style='background:red;'>Error: Please fill in all fields</h1>";
    }
}
?>
