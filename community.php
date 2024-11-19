<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community</title>
    <style>
        /* Body Styles */
        #body1 {
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
            overflow-x: hidden;
        }

        /* Posts container */
        #posts1 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-items: center;
            padding: 20px;
            width: 100%;
        }

        /* Image and Video Container */
        #imgvideo1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 350px;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        /* Image and Video Styling */
        img, video {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        img:hover, video:hover {
            transform: scale(1.05);
        }

        /* Video Specific Styles */
        video {
            background-color: #333;
            max-height: 600px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            #posts1 {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>
</head>
<body id='body1'>
    <div id="posts1">
        <div id="imgvideo1">
            <img src="posts/-N3zI1_4b1QrCiAEi8fP.jpg" alt="Post Image 1">
        </div>
        <div id="imgvideo1">
            <img src="posts/-N3zI07RaK_JFeMhUOIE.jpg" alt="Post Image 2">
        </div>
        <div id="imgvideo1">
            <img src="posts/-NREu-1dHRUDqgoLbdOt.jpg" alt="Post Image 3">
        </div>
        <div id="imgvideo1">
            <img src="posts/360ytmp3.com_hms-tnshr-mqt-mswwr-lqthm-mwq-yrz-shml-gz-wqtl-w-sr-jnwd-sry-ylyyn.mp4" alt="Post Image 4">
        </div>
        <div id="imgvideo1">
            <img src="posts/-N2tRMUgtUvMUkkSHnBB.jpg" alt="Post Image 5">
        </div>
        <div id="imgvideo1">
            <img src="posts/-N2tSYSCYfMYpzKRgnWU.jpg" alt="Post Image 6">
        </div>
        <div id="imgvideo1">
            <img src="posts/-N2tSh3IlwgJ2DuIunff.jpg" alt="Post Image 7">
        </div>
        <div id="imgvideo1">
            <video src="posts/360ytmp3.com_hms-tnshr-mqt-mswwr-lqthm-mwq-yrz-shml-gz-wqtl-w-sr-jnwd-sry-ylyyn.mp4" controls></video>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorts - TikTok Style</title>
    <style>
        /* Body and General Styling */
        #body2 {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            color: #fff;
        }

        /* Posts Container */
        #posts {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            height: 100%;
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
            scroll-behavior: smooth;
        }

        /* Post Style */
        .post {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            scroll-snap-align: start;
            background-color: #1e1e1e;
            border-radius: 20px;
            margin-bottom: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        /* Image and Video Styling */
        img, video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
            max-height: 100vh;
        }

        /* Video Specific Styling */
        video {
            background-color: #000;
        }

        /* Overlay Text Content for Each Post (optional) */
        .content-overlay {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
            font-size: 18px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        /* Smooth Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #222;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }
    </style>
</head>
<body id='body2'>
    <div id="posts">
        <div class="post">
            <img src="posts/-N3zI1_4b1QrCiAEi8fP.jpg" alt="Post Image 1">
            <div class="content-overlay">Post 1</div>
        </div>
        <div class="post">
            <img src="posts/-N3zI07RaK_JFeMhUOIE.jpg" alt="Post Image 2">
            <div class="content-overlay">Post 2</div>
        </div>
        <div class="post">
            <img src="posts/-NREu-1dHRUDqgoLbdOt.jpg" alt="Post Image 3">
            <div class="content-overlay">Post 3</div>
        </div>
        <div class="post">
            <img src="posts/360ytmp3.com_hms-tnshr-mqt-mswwr-lqthm-mwq-yrz-shml-gz-wqtl-w-sr-jnwd-sry-ylyyn.mp4" alt="Post Image 4">
            <div class="content-overlay">Post 4</div>
        </div>
        <div class="post">
            <video src="posts/gaga.mp4" controls></video>
            <div class="content-overlay">Video 1</div>
        </div>
    </div>

    <script>
        // Automatically play video when it comes into view
        const posts = document.querySelectorAll('.post');
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5 // Play video when 50% of it is visible
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const video = entry.target.querySelector('video');
                    if (video) {
                        video.play();
                    }
                } else {
                    const video = entry.target.querySelector('video');
                    if (video) {
                        video.pause();
                    }
                }
            });
        }, options);

        posts.forEach(post => {
            observer.observe(post);
        });
    </script>
</body>
</html>
