<div id="php">
    <?php
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
                $file_data = "posts.json";
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
            } else {
                echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
                '>حدث خطأ أثناء رفع الملف.</h1>";
            }
        } else {
            echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
            '>حدث خطأ أثناء رفع الملف.</h1>";
        }
    } else {
        echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
        '>يرجى ملء جميع الحقول المطلوبة.</h1>";
    }
}

$_SESSION['types']="VIDEO SHORTS";
$_SESSION['type']="POSTS";
$_SESSION["place"]="";
$_SESSION["places"]="";
$words=true;
if(isset($_POST['button1'])){
    $_SESSION["place"]="sho.php";
    $_SESSION['type']="VIDEO SHORTS";
    $_SESSION['types']="POSTS";
    $_SESSION["places"]="up.php";
}
if($words){

}else{
    
}
if(isset($_SESSION['4'])){
    if($_SESSION['4']=="-4"){
        echo"<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
        '>حدث خطأ أثناء رفع الملف.</h1>";
    }
    if(isset($_SESSION['3'])){
if($_SESSION['3']=="-3"){
    echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
    '>حدث خطأ أثناء رفع الملف.</h1>";
}
    }
    if(isset( $_SESSION['2'])){
        if( $_SESSION['2']=="-2"){
            echo "<h1 style='background: linear-gradient(135deg, #ff9f1c, #ff4e00);color: red;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;
        '>يرجى ملء جميع الحقول المطلوبة.</h1>";
        }
    }
}
?>
</div>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة التواصل الاجتماعي المستقبلية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    /* إعدادات الصفحة الأساسية */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: radial-gradient(circle at center, #1a1a1a, #000);
        color: #ffffff;
        overflow: hidden;
        transition: all 0.5s ease;
    }

    h2 {
        font-size: 28px;
        color: #ff9f1c;
        text-shadow: 0 0 8px rgba(255, 159, 28, 0.8);
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
    }

    /* تصميم الإطار الرئيسي */
    .add-post, .post-container {
        width: 85%;
        max-width: 700px;
        background: linear-gradient(145deg, #1e1e1e, #2b2b2b);
        border-radius: 20px;
        box-shadow: 8px 8px 16px rgba(0, 0, 0, 0.8), -8px -8px 16px rgba(50, 50, 50, 0.3);
        padding: 30px;
        margin: 20px auto;
        transition: transform 0.4s ease, box-shadow 0.3s ease;
    }

    .add-post:hover, .post-container:hover {
        transform: translateY(-8px);
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.6), -10px -10px 20px rgba(60, 60, 60, 0.5);
    }

    /* عناصر الإدخال */
    textarea, input[type="file"], input[type="text"], button {
        width: 100%;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 12px;
        border: none;
        font-size: 17px;
        background: rgba(40, 40, 40, 0.9);
        color: #fffcf9;
        transition: all 0.3s ease;
    }

    textarea:focus, input[type="file"]:focus, input[type="text"]:focus {
        background: rgba(50, 50, 50, 0.9);
        outline: none;
        box-shadow: 0 0 10px rgba(255, 159, 28, 0.5);
    }

    button {
        background: linear-gradient(135deg, #ff9f1c, #ff4e00);
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    button:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(255, 78, 0, 0.4);
    }

    /* رأس المشاركة */
    .post-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .post-user-profile {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        margin-right: 12px;
        box-shadow: 0 4px 10px rgba(255, 159, 28, 0.6);
    }

    .post-user-details {
        font-size: 16px;
        color: #ff9f1c;
        text-shadow: 0 0 6px rgba(255, 159, 28, 0.5);
    }

    /* محتوى المشاركة */
    .post-content {
        color: #ffffff;
        line-height: 1.8;
        font-size: 16px;
        margin: 15px 0;
        padding: 15px;
        background: rgba(40, 40, 40, 0.8);
        border-radius: 15px;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
    }

    /* التفاعلات */
    .post-interactions {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 15px;
    }

    .post-interactions i {
        font-size: 20px;
        cursor: pointer;
        color: #ff9f1c;
        transition: transform 0.2s, color 0.2s;
    }

    .post-interactions i:hover {
        color: #ff4e00;
        transform: scale(1.15);
    }

    /* زر التعديل */
    .edit-button {
        padding: 10px 16px;
        background-color: #ff4e00;
        border-radius: 8px;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .edit-button:hover {
        background-color: #c44200;
        transform: scale(1.08);
    }
    #button1 {
        background: linear-gradient(135deg, #ff9f1c, #ff4e00);
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 12px;
        border: none;
        font-size: 17px;
        color: #fffcf9;
        transition: all 0.3s ease;
    }

    #button1:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(255, 78, 0, 0.4);
        background: black;
        outline: none;
        box-shadow: 0 0 10px rgba(255, 159, 28, 0.5);
    }
</style>

</head>
<body>
<button name="subphoto1"><?php echo $_SESSION['type']; ?></button>
    <div class="add-post">
        <h2>أضف منشورك</h2>
        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SESSION["places"];?>">
        <input type="submit"id="button1"name="button1"value="<?php echo $_SESSION['types'];?>"onclick="fun()">
        </form>
        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SESSION["place"];?>">
            <textarea name="txtarea" id="post-text" rows="4" placeholder="اكتب منشورك هنا..."></textarea>
            <input name="lnk1" type="file" id="lnk1">
            <input name="url1" type="text" id="post-link" placeholder="أدخل رابط...(اختياري)">
            <button type="submit" name="subphoto1">إضافة المنشور</button>
        </form>
    </div>

    <div id="posts-container"></div>
</body>
</html>
