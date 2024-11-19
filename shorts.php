<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHORTS VIDEOS</title>
    <style>
    /* Body Styling */
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background: #000;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow: hidden;
        position: relative;
    }

    /* Video as Background */
    .background-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
        opacity: 0.2;
    }

    /* Posts Container */
    .posts-container {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        overflow-y: scroll;
        scroll-snap-type: y mandatory;
        -webkit-overflow-scrolling: touch;
    }

    /* Individual Post */
    .post {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        scroll-snap-align: start;
        position: relative;
    }

    /* Media Container */
    .media-container {
        width: 100%;
        max-width: 400px;
        aspect-ratio: 9 / 16;
        height: auto;
        background: transparent;
        border-radius: 16px; /* Rounded corners */
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        margin: auto;
        position: relative;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        animation: gradientAnimation 10s ease infinite; 
    }

    /* Add perspective effect for desktop */
    .media-container:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.8);
    }

    /* Media Content - video */
    video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 16px; /* Rounded corners */
    }

    /* Post Description */
    .description {
        position: absolute;
        bottom: 20%;
        left: 10%;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        font-size: 1.2rem;
    }

    /* Interaction Buttons */
    .button-container {
        position: absolute;
        right: 5%;
        top: 30%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .button {
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.1);
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 24px;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .button:hover {
        background-color: rgba(255, 255, 255, 0.3);
        transform: scale(1.1);
    }

    /* Scrollbar Hidden */
    .posts-container::-webkit-scrollbar {
        display: none;
    }

    /* Desktop Styling with Circular Video */
    @media (min-width: 1024px) {
        .media-container {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 9 / 16;
            height: auto;
            background: transparent;
            border-radius: 16px; /* Rounded corners */
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            margin: auto;
        }

        video {
            object-fit: cover;
        }
    }

    /* Mobile View Adjustments */
    @media (max-width: 768px) {
        .media-container {
            width: 100%;
            height: 100%;
            border-radius: 0; /* Remove border radius for fullscreen effect */
        }

        video {
            object-fit: cover;
        }
    }
</style>
</head>
<body>
    <!-- Background Video -->
    <video class="background-video" autoplay loop muted>
        <source src="your-video-file.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="posts-container">
    <?php 
    error_reporting(E_ERROR | E_PARSE);
    $giga = json_decode(file_get_contents("vpos.json"), true);
    
    if (empty($giga)) {
        echo "<h1 style='background:yellow;color: black;font-weight: bold;cursor: pointer;border-radius: 10px;transition: transform 0.3s ease, box-shadow 0.3s ease;'>لا يوجد فيديوهات منشورة حتي الان</h1>";
    } else {
        shuffle($giga);
    }
    
    foreach ($giga as $gigas) {
        echo '<div class="post">
            <div class="media-container">
                <video autoplay loop muted controls>
                    <source src="uploads/' . $gigas["post_file_name"] . '" type="video/mp4">
                    <source src="uploads/' . $gigas["post_file_name"] . '" type="video/webm">
                    <source src="uploads/' . $gigas["post_file_name"] . '" type="video/ogg">
                </video>
            </div>
            <div class="description">
                <p><strong>user:</strong> ' . $gigas["user"] . '</p>
                <p><strong>description:</strong> ' . $gigas["review_post"] . '</p>
                <p><strong>time:</strong> ' . $gigas["date"] . '</p>
                <p><strong>link:</strong> <a href="' . $gigas["link"] . '" target="_blank">Go to Post</a></p>
            </div>
            <div class="button-container">
                <button class="button">' . $gigas["profile_photo"] . '</button>
                <button class="button">❤️</button>
                <button class="button">💬</button>
                <button class="button">🔗</button>
            </div>
        </div>';
    }
    ?>
    </div>
</body>
</html>
