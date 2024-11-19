<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if (isset($_POST['subphoto1'])) {
    // التحقق من وجود المدخلات المطلوبة
    if (!empty($_POST['txtarea']) && isset($_FILES['lnk1'])) {
        $txtarea = $_POST['txtarea'];
        $url1 = $_POST['url1'];

        // التحقق من رفع الملف بشكل صحيح
        if ($_FILES['lnk1']['error'] === UPLOAD_ERR_OK) {
            // تخزين بيانات الملف
            $file_name = $_FILES['lnk1']['name'];
            $file_type = $r=explode('/',$_FILES['lnk1']['type'])[0];
            
            $target_directory = "uploads/"; // قم بتغيير المسار حسب مجلد الرفع الخاص بك

            // رفع الملف إلى المسار المحدد
            if (move_uploaded_file($_FILES['lnk1']['tmp_name'], $target_directory.$_FILES['lnk1']['name'])) {
                // قراءة بيانات الملف JSON
                $file_data = "vpos.json";
                $data = json_decode(file_get_contents($file_data), true);

                // إعداد المنشور الجديد
                $new_post = [
                    'review_post' => $txtarea,
                    'post_file_name' => $file_name,
                    'post_file_type' => $file_type,
                    'link' => $url1,
                    'user'=>$_COOKIE['user_cookie'],
                    "date"=>date("Y-m-d g:i:s A"),
                    "profile_photo"=>$_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']]
                   ,"likes"=>""
                ];

                // إضافة المنشور باستخدام معرف فريد
                $data[] = $new_post;

                // تحديث ملف JSON
                file_put_contents($file_data, json_encode($data, JSON_PRETTY_PRINT));
                echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: green;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
                '>تم حفظ المنشور بنجاح.</h1>";
                echo "
                <script>
                    setTimeout(function() {
                        window.location.href = 'shorts.php'; 
                    }, 5000);
                </script>";
    
                // رسائل متحركة أثناء الانتقال
                echo '<div id="hilood"></div>';
                echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘</h1>"},1000)</script>';
                echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘🔘</h1>"},2000)</script>';
                echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘🔘🔘</h1>"},3000)</script>';
                echo '<script>setTimeout(function (){document.getElementById("hilood").innerHTML = "<h1>🔘🔘🔘🔘</h1>"},4000)</script>';
    
                $_SESSION['1']="-1";
               
            } else {
                echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
                '>حدث خطأ أثناء رفع الملف.</h1>";
                $_SESSION['4']="-4";
                header("location:upload.php");
            }
        } else {
            echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
            '>حدث خطأ أثناء رفع الملف.</h1>";
            header("location:upload.php");
            $_SESSION['3']="-3";
        }
    } else {
        echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
        '>يرجى ملء جميع الحقول المطلوبة.</h1>";
        $_SESSION['2']="-2";
        header("location:upload.php");

    }
}

?>
<style>
/* Global Styles */
.story-containe {
  display: flex;
  gap: 10px;
}

.storys img {
  width: 400px;
  height: 200px;
  object-fit: cover;
  cursor: pointer;
  border-radius: 10px;
}
body {
   color:white;
   font-family: Arial, sans-serif;
   margin: 0;
   padding: 0;
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: flex-start; /* قم بتغيير إلى flex-start لضبط المحاذاة */
   overflow-y: auto;
   background: url(bg2.jpg) no-repeat center center fixed;
   background-size: cover;
}

        h2 {
            text-align: center;
        }

        textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            resize: none;
            font-size: 16px;
        }
       
        .post-container {
            width: 80%;
            max-width: 600px;
            margin: 15px auto;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            position: relative;
            transition: all 0.3s ease;
        }
        .post-container:hover {
          background: rgba(255, 255, 255, 0.1);
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            transform: scale(1.05);
            backdrop-filter: blur(10px);
        }
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post-user-profile {
            border-radius: 50%;
            margin-right: 10px;
            width: 40px;
            height: 40px;
        }

        .post-content {
            margin: 10px 0;
            color: #fff;
        }

        .post-interactions {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }
/*hhhhh */ 
.navbar {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: url(bg10.jpg) no-repeat center center fixed; /* مركزية وثابتة */
  padding: 10px 20px;
  position: fixed;
  top: 0;
  z-index: 100;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.navbar .logo {
  font-size: 1.5em;
  font-weight: bold;
  background: url(bg10.jpg) no-repeat center center fixed; /* مركزية وثابتة */
}

.navbar .search-bar input {
  padding: 8px 15px;
  border-radius: 20px;
  border: none;
  outline: none;
  width: 300px;
  background: url(bg11.jpg) no-repeat center center fixed; /* مركزية وثابتة */
  transition: width 0.3s ease-in-out;
}

.navbar .search-bar input:focus {
  width: 400px;
}

.navbar .user-menu {
  display: flex;
  align-items: center;
}
#xx{
  margin-left:250px; width: 400px; border-radius:15px; height: 550px;
}

.navbar .user-menu img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 15px;
}

.navbar .bx-menu {
  font-size: 1.8em;
  background: url(bg.jpg) no-repeat center center fixed; /* مركزية وثابتة */
  cursor: pointer;
}

/* Responsive Hamburger Menu */
.nav-container {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  background: url(bg9.jpg) no-repeat center center fixed; /* مركزية وثابتة */
  position: relative;
  margin-top: 64px;
}

.nav-container .links {
  display: flex;
  gap: 20px;
}

.nav-container .link a {
  text-decoration: none;
  color: #fff;
  font-size: 1.2em;
  padding: 10px;
  border-radius: 5px;
  transition: background 0.3s ease;
}

.nav-container .link a:hover {
  background: url(bg.jpg) no-repeat center center fixed; /* مركزية وثابتة */
  color: #fff;
}

.hamburg {
  font-size: 2em;
  color: #fff;
  cursor: pointer;
  display: none;
}

.dropdown {
  display: none;
}

/* Dropdown menu for mobile view */
@media (max-width: 768px) {
  .hamburg {
    display: none;

  }
  .story-containe {
  display: flex;
  gap: 10px;
}

#lo{
  display: none;

}
.storys img {
  width: 300px;
  height: 280px;
  object-fit: cover;
  cursor: pointer;
  border-radius: 10px;
}
#xs{
  display: none;
}
#xx{
  margin-left:20px;
   width: 400px;
    border-radius:15px;
    height: 500px;
}
  .nav-container .links {
    display: block;
  }

  .dropdown {
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 70px;
    width: 100%;
    background-color: #2c3e50;
    padding: 20px;
    gap: 10px;
  }

  .dropdown .links a {
    color: #fff;
    font-size: 1.2em;
    text-decoration: none;
    padding: 10px;
    background-color: #34495e;
    border-radius: 5px;
  }

  .dropdown .links a:hover {
    background-color: #16a085;
  }
}

/* Story Styles */
.story-container {
  display: flex;
  gap: 10px;
}

.story img {
  width: 300px;
  height: 150px;
  object-fit: cover;
  cursor: pointer;
  border-radius: 10px;
}

/* Modal Styles */
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8); /* Background with opacity */
  justify-content: center;
  align-items: center;
}

.modal-content {
  max-width: 80%;
  max-height: 80%;
  display: flex;
  justify-content: center;
}

.modal-content img {
  width: 100%;
  height: auto;
  border-radius: 10px;
}

</style>