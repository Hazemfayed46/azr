<?php
session_start();
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // إعدادات الخادم
    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // إلغاء وضع التصحيح
    $mail->isSMTP();                      // إرسال باستخدام SMTP
    $mail->Host       = 'smtp.gmail.com'; // تعيين خادم SMTP
    $mail->SMTPAuth   = true;             // تفعيل مصادقة SMTP
    $mail->Username   = 'dressmepaypal@gmail.com'; // اسم المستخدم (البريد الإلكتروني)
    $mail->Password   = 'bnigolivjawwqmli';      // كلمة مرور البريد الإلكتروني
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // تفعيل تشفير SSL
    $mail->Port = 587;         // المنفذ الذي يستخدم SSL
            // المنفذ الذي يستخدم SSL (محذوف)
            $mail->isHTML(true);
        } catch (Exception $e) {
            echo "لم يتم إرسال الرسالة. خطأ: {$mail->ErrorInfo}";
        }
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد البريد الإلكتروني</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&family=Cairo:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background"></div>
    <div class="container">
    <h2 class="lightning-text">تأكيد البريد الإلكتروني</h2>
<p class="glitch-text">يرجى إدخال رمز التأكيد.</p>
<form method="POST"action="new_person.php">
    <input type="text" name="txt" id="email" placeholder="أدخل رمز التأكيد">
    <button type="submit" name="submitBtn" id="submitBtn">إرسال رمز التأكيد</button>
</form>
        <p id="error" class="error-message">حدث خطأ. الرجاء إدخال رمز تأكيد صالح.</p>
    </div>

   
    <script>
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        const emailInput = document.getElementById("email");
        const errorMessage = document.getElementById("error");
        const emailValue = emailInput.value.trim();

        if (!emailValue) {
            errorMessage.textContent = "الرجاء إدخال بريد Gmail صالح.";
            errorMessage.style.visibility = "visible";
            emailInput.style.borderColor = "red";
        } else {
            errorMessage.textContent = "";
            errorMessage.style.visibility = "hidden";
            emailInput.style.borderColor = "#74ebd5";
        }
    });
    </script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        color: #333;
        overflow: hidden;
    }

    .container {
        text-align: center;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 400px;
    }

    h1 {
        font-size: 2em;
        color: #333;
        margin-bottom: 20px;
    }

    p {
        font-size: 1.1em;
        color: #666;
        margin-bottom: 30px;
    }

    .verification-text {
        font-size: 16px;
        font-weight: bold;
        color: #3498db;
        background: linear-gradient(90deg, #3498db 0%, #8e44ad 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: glow 2s ease-in-out infinite;
    }

    @keyframes glow {
        0%, 100% {
            text-shadow: 0 0 10px #3498db, 0 0 20px #3498db, 0 0 30px #8e44ad;
        }
        50% {
            text-shadow: 0 0 20px #8e44ad, 0 0 40px #8e44ad, 0 0 50px #3498db;
        }
    }

    input[type="text"] {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 25px;
        outline: none;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    input[type="text"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
    }

    input[type="text"]::placeholder {
        color: #bbb;
    }

    button {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        border: none;
        border-radius: 25px;
        background-color: #3498db;
        color: white;
        cursor: pointer;
        margin-top: 20px;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
        transform: scale(1.05);
    }

    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 10px;
        visibility: hidden;
    }

    .footer {
        margin-top: 20px;
        font-size: 14px;
        color: #888;
    }

    .footer a {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }

    .footer a:hover {
        text-decoration: underline;
    }

</style>

</body>
</html>
<?php
             $nn = rand(54896, 943426124562);
             $_SESSION['mass'] = $nn;
              $mail->setFrom("dressmepaypal@gmail.com", 'Studio Light Infinity ⛺');
              $mail->addAddress($_COOKIE['gmail6']);
              $mail->Subject = "hello";
              $mail->Body = '<!DOCTYPE html>
              <html lang="ar">
              <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>تأكيد بريدك الإلكتروني</title>
                  <style>
                  body {
                      height: 100vh;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      font-family: "Cairo", sans-serif;
                      overflow: hidden;
                      background: linear-gradient(270deg, #74ebd5, #ACB6E5, #74ebd5, #ACB6E5);
                      background-size: 400% 400%;
                      animation: gradient 10s ease infinite;
                  }
                  
                  @keyframes gradient {
                      0% {
                          background-position: 0% 50%;
                      }
                      50% {
                          background-position: 100% 50%;
                      }
                      100% {
                          background-position: 0% 50%;
                      }
                  }
                  
                  .container {
                      text-align: center;
                      color: white;
                      padding: 20px;
                      background-color: rgba(0, 0, 0, 0.5);
                      border-radius: 10px;
                  }
                  
                  h1 {
                      font-size: 2.5em;
                  }
                  
                  p {
                      font-size: 1.2em;
                  }
                  
                  .email-container {
                      background-color: rgba(255, 255, 255, 0.8);
                      margin: 0 auto;
                      padding: 20px;
                      max-width: 600px;
                      border-radius: 10px;
                      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                  }
                  
                  .header {
                      text-align: center;
                      padding: 10px;
                      background-color: #007BFF;
                      border-radius: 10px 10px 0 0;
                      color: #fff;
                  }
                  
                  .header h1 {
                      font-size: 24px;
                      margin: 0;
                  }
                  
                  .email-body {
                      padding: 20px;
                      text-align: center;
                  }
                  
                  .email-body p {
                      font-size: 18px;
                      margin-bottom: 30px;
                      color: #555;
                  }
                  
                  .confirmation-code {
                      font-size: 32px;
                      color: #007BFF;
                      letter-spacing: 5px;
                      margin-bottom: 20px;
                      font-weight: bold;
                      padding: 10px;
                      border: 2px dashed #007BFF;
                      display: inline-block;
                  }
                  
                  .button {
                      display: inline-block;
                      padding: 12px 30px;
                      background-color: #007BFF;
                      color: #fff;
                      text-decoration: none;
                      border-radius: 5px;
                      font-size: 16px;
                      transition: background-color 0.3s ease;
                      margin-top: 20px;
                  }
                  
                  .button:hover {
                      background-color: #0056b3;
                  }
                  
                  .copy-button {
                      display: inline-block;
                      padding: 12px 20px;
                      background-color: #28a745;
                      color: #fff;
                      text-decoration: none;
                      border-radius: 5px;
                      font-size: 16px;
                      margin-top: 20px;
                      cursor: pointer;
                      transition: background-color 0.3s ease;
                  }
                  
                  .copy-button:hover {
                      background-color: #218838;
                  }
                  
                  .footer {
                      text-align: center;
                      padding: 20px;
                      font-size: 14px;
                      color: #777;
                  }
                  
                  .footer a {
                      color: #007BFF;
                      text-decoration: none;
                  }
                  
                  .footer a:hover {
                      text-decoration: underline;
                  }
                  </style>
              </head>
              <body>
                  <div class="email-container">
                      <div class="header">
                          <h1>تأكيد بريدك الإلكتروني</h1>
                      </div>
                      <div class="email-body">
                          <p>مرحباً،</p>
                          <p>شكراً لتسجيلك لدينا. لإتمام عملية التسجيل، يرجى إدخال رمز التأكيد التالي:</p>
                          <div class="confirmation-box">
                              <div class="confirmation-code" id="confirmationCode">' .$_SESSION['mass']. '</div>
                              <button class="copy-button" onclick="copyCode()">نسخ الرمز</button>
                          </div>
                          <p>إذا لم تكن قد طلبت هذه الرسالة، يمكنك تجاهلها بكل بساطة.</p>
                          <a href="#" class="button">تأكيد حسابك</a>
                      </div>
                      <div class="footer">
                          <p>إذا كنت بحاجة إلى مساعدة، يرجى <a href="#">الاتصال بنا</a>.</p>
                          <p>&copy; 2024 جميع الحقوق محفوظة</p>
                      </div>
                  </div>
                  <script>
                  function copyCode() {
                      var code = document.getElementById("confirmationCode").textContent;
                      if (navigator.clipboard) {
                          navigator.clipboard.writeText(code).then(function() {
                              alert("تم نسخ الرمز إلى الحافظة بنجاح!");
                          }, function(err) {
                              alert("فشل في نسخ الرمز. الرجاء المحاولة مرة أخرى.");
                          });
                      } else {
                          var textArea = document.createElement("textarea");
                          textArea.value = code;
                          document.body.appendChild(textArea);
                          textArea.select();
                          try {
                              var successful = document.execCommand("copy");
                              var msg = successful ? "تم نسخ الرمز بنجاح!" : "فشل نسخ الرمز.";
                              alert(msg);
                          } catch (err) {
                              alert("فشل في نسخ الرمز، الرجاء المحاولة مرة أخرى.");
                          }
                          document.body.removeChild(textArea);
                      }
                  }
                  </script>
              </body>
              </html>';

              // إرسال البريد الإلكتروني
              $mail->send();
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['submitBtn'])) {
    // التحقق من وجود رمز التأكيد المدخل والكوكي
    if (isset($_POST['txt'])) {
        // التحقق من مطابقة رمز التأكيد مع الكوكي
        
        if ($_POST['txt'] ==  $nn) {
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

                // إذا لم يتم العثور على المستخدم، نضيف مستخدم جديد
                if ($peloo) {
                    if (isset($_COOKIE['username6']) && isset($_COOKIE['uu']) && isset($_COOKIE['gmail6']) && isset($_COOKIE['password6'])) {
                        $newperson = [
                            'id' => rand(0,9999999999999999999999),
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
}
?>
