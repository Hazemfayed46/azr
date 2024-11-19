<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

// التحقق من وجود رمز التأكيد المدخل والكوكي
    if (isset($_POST['txt'])) {
        // التحقق من مطابقة رمز التأكيد مع الكوكي
        
        if ($_POST['txt'] == $_SESSION['mass']) {
            $file_json = "users.json";
            // قراءة ملف JSON
            if (file_exists($file_json)) {
                $data = json_decode(file_get_contents($file_json), true);
                $peloo = true;

                // التحقق من وجود المستخدم
                foreach ($data as $us) {
                    if ($_COOKIE['uu'] === $us['user'] || $_COOKIE['gmail6'] === $us['gmail']) {
                        $peloo = false;
                        break;
                    }
                }
                $_SESSION["peloo"]=$peloo;
                // إذا لم يتم العثور على المستخدم، نضيف مستخدم جديد
                if ($peloo) {
                    $un = uniqid() ;
          setcookie('un_'.$_COOKIE['uu'], $un, time() + 31536000000, '/'); // مدة الكوكي 1000 سنة
                    if (isset($_COOKIE['username6']) && isset($_COOKIE['uu']) && isset($_COOKIE['gmail6']) && isset($_COOKIE['password6'])) {
                        $newperson = [
                            'id' => $un,
                            'username' => $_COOKIE['username6'],
                            'user_' . $_COOKIE['uu'] => $_COOKIE['uu'],
                            'user' => $_COOKIE['uu'],
                            'gmail' => $_COOKIE['gmail6'],
                            'password' => $_COOKIE['password6'],
                        ];

                        // إضافة المستخدم الجديد إلى البيانات
                        $data[] = $newperson;
                        file_put_contents($file_json, json_encode($data, JSON_PRETTY_PRINT));
                        echo "<h1 style='background:green;color:white;'>Success: User added successfully!<div id='divloading' style='background:black;color:yellow;margin-right:450px;'></div></h1>";
                        echo '<script>setTimeout(function (){window.location.href = "login.php";},5000)</script>';
                        echo '<script>setTimeout(function (){document.getElementById("lightning-tex").innerHTML = "<h1>🔘</h1>"},1000)</script>';
                        echo '<script>setTimeout(function (){document.getElementById("lightning-tex").innerHTML = "<h1>🔘🔘</h1>"},2000)</script>';
                        echo '<script>setTimeout(function (){document.getElementById("lightning-tex").innerHTML = "<h1>🔘🔘🔘</h1>"},3000)</script>';
                        echo '<script>setTimeout(function (){document.getElementById("lightning-tex").innerHTML = "<h1>🔘🔘🔘🔘</h1>"},4000)</script>';
                    }
                } else {
                    // إذا كان المستخدم موجودًا بالفعل
                    echo '<h1 style="background:red;color:yellow;">Error: Choose another user or gmail</h1>';
                }
            } else {
                // معالجة حالة عدم وجود ملف users.json
                echo '<h1 style="background:red;color:yellow;">Error: User data file not found!</h1>';
            }
        } else {
            // إذا كان رمز التأكيد غير صحيح
            echo '<h1 style="background:red;color:yellow;">Error: Incorrect confirmation code.</h1>';
        }
    } else {
        echo '<h1 style="background:red;color:yellow;">Error: Confirmation code not provided or cookie missing.</h1>';
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id='lightning-tex'></div>
    </body>
    </html>