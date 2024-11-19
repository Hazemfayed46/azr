<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="styles1.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="" method="POST">
      <h1 id="regg">Register</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name='username' required>
        <i class='bx bxs-user'></i>
      </div> 
      <!--1-->
      <div class="input-box">
        <input type="text" placeholder="User" name='user'required>
        <i class='bx bxs-user'></i>
      </div>
      <!--2-->
       <div class="input-box">
        <input type="text" placeholder="Gmail" name='gmail'required>
        <i class='bx bxs-user'></i>
      </div>
      <!--3-->
      <div class="input-box">
        <input type="password" placeholder="Password"name='password' required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <!--4-->
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <!--5-->
      <button type="submit" class="btn" name='sub'>Login</button>
      <div class="register-link">
        <p>do you have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
<?php
error_reporting(E_ERROR | E_PARSE);
$data = json_decode(file_get_contents("users.json"), true);
if(isset($_POST['sub'])){
foreach ($data as $da) {
  if(isset($_POST['gmail'])||isset($da["user"])){
  if($da["gmail"] === $_POST['gmail'] || $da["user"]===$_POST['user']){
    echo '<h1 style="background:red;color:yellow;">Error: Choose another user or gmail</h1>';
  }else{
    header("location:make_sure.php");
  }
    }
      }
    }
?>