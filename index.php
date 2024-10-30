<?php
require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zoser!</title>
    <meta name="description" content="ZOSER - Create and customize ID cards for friends and share your memories">
    <meta name="keywords" content="ID cards, friendship, customizable, NFC cards">

    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">

    <!--box icon link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<!--remix icon link-->
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
<!--google font link-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet">

</head>

<body>
    <!--header-->
    <div class="announcement">
        <h4>20% off for first 10 orders</h4>
    </div>
    <header>
        <a href="home" class="logo">
            <img src="images/logo.svg" alt="Zoser logo">
        </a>

        <ul class="navlist">
            <li><a href="about.php">About</a></li>
            <li><a href="shop.php">shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
            if (isset($_SESSION["user_id"])) { ?>
                <li><a href="includes/logout.inc.php">sign out</a></li>
            <?php } ?>
            <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
        </ul>
        <div class="right-content">
            <?php
            if (!isset($_SESSION["user_id"])) { ?>
                <a href="signin.php" class="nav-btn">Sign In</a>
            <?php } else { ?>
                <a href="profile.php?id=<?php echo $_SESSION["user_id"]; ?>" class="nav-btn">Profile</a>
            <?php } ?>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>

    <section class="banner">

        <div class="video-section">
            <video playsinline preload="metadata" muted autoplay loop class="video-media">
                <source src="images/banner4.mp4" type="video/mp4">
                <!-- Fallback image in case the video doesn't load -->
                <img src="images/hero.png" alt="Video preview">
            </video>
            <a href="index.php" class="video-button">NEW ARRIVAL</a>
        </div>
    </section>


    <div class="label-container">
        <div class="label"> Memories are timeless, keep them close! |<span> Every friendship tells a story, let's keep yours alive!</span></div>
    </div>
    <!--hero-->
    <section class="hero">
        <div class="hero-text">
            <h5>Guarantee YOUR LOVE!</h5>
            <h1>Lovers Licence</h1>
            <p> relationship is a journey, enjoy the ride and let’s make magic!</p>
            <div class="main-hero">
                <a href="order.php" class="btn">Order Now</a>
                <a class="price">100EGP<span>sale!</span></a>
            </div>
        </div>
        <div class="hero-img">
            <img src="images/hero.png">
        </div>
    </section>


    <!--js-->
    <section class="footer">
        <p>Made With <i class="ri-heart-line"></i> by <a href="https://www.instagram.com/a7mdh4am/"
                style="text-decoration:none;background:linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);
    -webkit-background-clip: text;
            background-clip: text;
    -webkit-text-fill-color: transparent;">a7mdh4am</a></p>
    </section>




    <script src="script.js"></script>

</body>

</html>
<style>
        .announcement {
        width: 100%;
        background-color: black;
    }
    .announcement h4{
        padding: 0.5rem 3rem 0.5rem 3rem;
        font-size: 18px;
        color: white;
        text-align: center;
    }
    .label-container {
        margin-top: 40px;
        width: 100%;
        /* height: 5vh; */
        overflow: hidden;
        background-color: black;
    }

    .label {
        display: inline-block;
        white-space: nowrap;
        font-weight: bold;
        font-size: 2.4rem;
        color: white;
        letter-spacing: 5px;
        animation: scrollText 15s linear infinite;
    }

    /* Keyframes for the scrolling animation */
    @keyframes scrollText {
        0% {
            transform: translateX(60%);
        }

        100% {
            transform: translateX(-100%);
        }
    }
    .btn {
    /* box-shadow: 0px 0px 10px 5px #000; */
    animation: pulseShadow 1.5s infinite;
    background-color: white;
    color: #303030;
    border: 2px solid #303030;
}
.btn:hover{
    transform: scale(1);
    /* animation: 1; */
    
}

/* Keyframes for the shadow animation */
@keyframes pulseShadow {
    0%, 100% {
        /* box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);  */
    }
    50% {
        /* box-shadow: 0px 0px 15px 7.5px rgba(0, 0, 0, 0.7); */
        box-shadow: .25rem .25rem 0rem black ;
        transform: translate(-.25rem, -.25rem);
    }
}
</style>