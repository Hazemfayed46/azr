<?php 

if(empty($_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']])){
  $_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']] = "profile.jpg";
}; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style.css">
    <title><?php $_COOKIE['user_cookie'];?></title>
</head>
<body>
    
    <nav>
        <div class="nav-container">
            <div class="logo" data-aos="zoom-in" data-aos-duration="1500">
            <?php echo $_COOKIE['user_cookie'];?> <span>USER</span>
            </div>
            <div class="links">
                <div class="link" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100"><a href="index.php">Home</a></div>
                <div class="link" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200"><a href="cv.php">CV</a></div>
                <div class="link" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300"><a href="shorts.php">V short</a></div>
                <div class="link" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400"><a href="upload.php">Upload</a></div>
                <div class="link" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500"><a href="community.php">Community</a></div>
                <div class="link" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500"><a href="change_photo.php">Change IMG photo</a></div>

       
        </div>
        <i class="fa-solid fa-bars hamburg" onclick="hamburg()"></i>
    </div>
        <div class="dropdown">
            <div class="links">
                <a href="index.php">Home</a>
                <a href="short.php">V short</a>
                <a href="vpos.php">GET POSTS</a>
                <a href="upload.php">Upload</a>
                <a href="community.php">Community</a>
<a href="change_photo.php">Change IMG photo</a>
                <i class="fa-solid fa-xmark cancel" onclick="cancel()"></i>
            </div>
        </div>
    </nav>
    <section>
        <div class="main-container">
            <div class="image" data-aos="zoom-out" data-aos-duration="3000">
            <a href="change_photo.php"> <img src = "<?php echo $_COOKIE['photogra'.'_'.$_COOKIE['user_cookie']]; ?>" alt="choose your photo icon choose your photo icon"></a>
            </div>
            <div class="content">
                <h1 data-aos="fade-left" data-aos-duration="1500" data-aos-delay="700">Hey I'm <span><?php echo $_COOKIE['user_cookie'];?></span></h1>
                <div class="typewriter" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="900">I'm a <span class="typewriter-text"></span><label for="">|</label></div>
                <p data-aos="flip-down" data-aos-duration="1500" data-aos-delay="1100">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit quasi commodi quia rerum, iste corporis expedita in excepturi nesciunt repellendus quisquam amet provident ad mollitia debitis odit voluptatem necessitatibus tempora.</p>
                <div class="social-links">
                    <a href="#" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1300"><i class="fa-brands fa-github"></i></a>
                    <a href="#" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1400"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1600"><i class="fa-brands fa-twitter"></i></a>
                </div>
                <div class="btn" data-aos="zoom-in" data-aos-duration="1500" data-aos-delay="1800">
                    <button>Follow Me</button>
                    <button id="hhdd"onclick="hhee(this.id)">GET POSTS</button>
                </div>
                
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({offset:0});
       function  hhee(gggg){
    window.location.href="vpos.php";
  }
    </script>
    <script src="script.js">
 

    </script>


</body>
</html>
<?php
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