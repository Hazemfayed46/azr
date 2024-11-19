<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\SMTP;

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
    $mail->SMTPSecure = 'tls'; // تفعيل تشفير SSL
$mail->Port = 587;         // المنفذ الذي يستخدم SSL
            // المنفذ الذي يستخدم SSL (محذوف)
            $mail->isHTML(true);
        } catch (Exception $e) {
            echo "لم يتم إرسال الرسالة. خطأ: {$mail->ErrorInfo}";
        }




        
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
        background-color: rgba(255, 255, 255, 0.8); /* لون خلفية ثابت مع شفافية */
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
                <div class="confirmation-code" id="confirmationCode">' . $_COOKIE['confirmatio'] . '</div>
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
$mail->send();
