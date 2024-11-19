<?php
if (isset($_POST['sph'])) {
    if (!empty($_FILES['pho']['name'])) {
        $filesphoto = $_FILES['pho']['name'];

        // قراءة وتحديث ملف 'user_profile_photo.json'
        $datas = json_decode(file_get_contents('user_profile_photo.json'), true);
        $datas[$_COOKIE['user_cookie']]['photo_profile'] = $filesphoto;
        file_put_contents('user_profile_photo.json', json_encode($datas, JSON_PRETTY_PRINT));

        // نقل الملف إلى المجلد المحدد
        move_uploaded_file($_FILES['pho']['tmp_name'], 'profiles_photos/' . $filesphoto);

        // إعداد الكوكي
        setcookie('photogra' . '_' . $_COOKIE['user_cookie'], $filesphoto, time() + 31536000000, '/');

        // تحديث ملف 'posts.json' لتغيير صورة الملف الشخصي في المشاركات
        $posts = json_decode(file_get_contents("posts.json"), true);
        foreach ($posts as &$gata) {  // استخدام & لتحديث المرجع مباشرة
            if ($gata["user"] === $_COOKIE['user_cookie']) {
                $gata["profile_photo"] = $filesphoto; // تحديث حقل "profile_photo"
            }
        }
        // حفظ التعديلات في 'posts.json'
        file_put_contents("posts.json", json_encode($posts, JSON_PRETTY_PRINT));

        // إعادة توجيه المستخدم إلى 'profile2.php'
        header('location:profile2.php');
        exit(); // من الأفضل إضافة exit بعد التوجيه
    }else{
    echo '<h1 style="background:red;">Error : photos not here</h1>';
}}
if(empty($_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']])){
    $_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']] = "profile.jpg";
  };
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل صورة البروفايل</title>
</head>
<body>
    <div class="profile-container">
        <h2>تعديل صورة البروفايل</h2>
        <div class="profile-pic">
      <img id="profile-image" src="<?php echo $_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']]; ?>" alt="صورة البروفايل">
        </div>
        <div class="upload-section">
            <form action=''method="POST" enctype='multipart/form-data'>
                <lable> 
            <input type="file" id="pho" name="pho"> </input>
            <input type="submit" id="phoo" name="sph"/>
</lable></div></form>
        
        <canvas id="canvas" style="display:none;"></canvas>
        <div class="controls">
        </div>
    </div>
    <script src="script.js"></script>
<style>* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            background: linear-gradient(135deg, #3a3a3a, #000);
            color: #fff;
            overflow-y: auto;
        }

        @keyframes backgroundAnimation {
            0% { background: #3a3a3a; }
            50% { background: #000; }
            100% { background: #3a3a3a; }
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

.profile-container {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 400px;
}

.profile-container h2 {
    color: #333;
    margin-bottom: 20px;
}

.profile-pic {
    width: 150px;
    height: 150px;
    margin: 0 auto 20px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #ddd;
}

.profile-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.upload-section {
    margin-bottom: 20px;
}

.upload-label {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    display: inline-block;
}

.upload-label input {
    display: none;
}

.controls {
    margin-top: 20px;
}

button {
    background-color: #28a745;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
}

button:hover {
    background-color: #218838;
}
#pho{
background-color: #28a745;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
   
}
#pho:hover {
    background-color: black;
}
#phoo{
background-color: #28a745;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
}
#phoo:hover {
    background-color: black;
}
</style>
</body>
</html>

