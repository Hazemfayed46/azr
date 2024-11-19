
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <form action=""method="POST">
  <input type="submit"name="xx"value="SHORTS VIDEOS"id="xxx">
</form>
</body>
</html>
<?php
if(isset($_POST['xx'])){
  header("location:vp.php");
}
$file_path = "user_profile_photo.json";
$fasd=json_decode(file_get_contents("posts.json"),true);
foreach($fasd as $data){
    if($data["user"]===$_COOKIE['user_cookie']){
        if($data["post_file_type"]==="image"){

            // عرض المنشور
            echo '<div class="post-container">
                    <div class="post-header">
                    <img src="' . "profiles_photos/" .$data["profile_photo"]. '" alt="صورة المستخدم" class="post-user-profile">
                        <div class="post-user-details">
                            <span class="user-name">' . htmlspecialchars($data["user"]) . ' <span>USER</span></span>
                            <br> <span class="post-time">' . $data["date"] . '</span>
                        </div>
                    </div>
                    <div class="post-content">
                    <div>' . $data['review_post'] . '</div>
                        <img src="' . "uploads/" . $data["post_file_name"] . '" alt="صورة المنشور" style="max-width: 100%; border-radius: 8px; margin-top: 10px;">
                    </div>
                    <div>' . $data['link'] . '</div>
                    <div class="post-interactions">
                        <button class="edit-button" onclick="editPost(this)">تعديل</button>
                        <div>
                            <i class="far fa-thumbs-up"></i> <span>120</span>
                            <i class="far fa-comment"></i> <span>45</span>
                            <i class="far fa-share-square"></i> <span>10</span>
                        </div>
                    </div>
                </div>';
        }   
        elseif($data["post_file_type"] === "video"){
          // عرض المنشور (فيديو)
          echo '<div class="post-container">
                  <div class="post-header">
                      <img src="' . "profiles_photos/" . $data["profile_photo"] . '" alt="صورة المستخدم" class="post-user-profile">
                      <div class="post-user-details">
                          <span class="user-name">' . htmlspecialchars($data["user"]) . ' <span>USER</span></span>
                          <br> <span class="post-time">' . $data["date"] . '</span>
                      </div>
                  </div>
                  <div class="post-content">
                      <div>' . $data['review_post'] . '</div>
                      <video style="max-width: 100%; border-radius: 8px; margin-top: 10px;" controls autoplay loop>
                          <source src="uploads/' . $data["post_file_name"] . '" type="video/mp4">
                          <source src="uploads/' . $data["post_file_name"] . '" type="video/webm">
                          <source src="uploads/' . $data["post_file_name"] . '" type="video/ogg">
                          متصفحك لا يدعم تشغيل الفيديو.
                      </video>        
                  </div>
                  <div>' . $data['link'] . '</div>
                  <div class="post-interactions">
                      <button class="edit-button" onclick="editPost(this)">تعديل</button>
                      <div>
                          <i class="far fa-thumbs-up"></i> <span>120</span>
                          <i class="far fa-comment"></i> <span>45</span>
                          <i class="far fa-share-square"></i> <span>10</span>
                      </div>
                  </div>
              </div>';
        }}
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    
</body>
</html>
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
#xxx {
        background: black;
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

    #xxx:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(255, 78, 0, 0.4);
        background: linear-gradient(135deg, #ff9f1c, #ff4e00);
    }
    
</style>