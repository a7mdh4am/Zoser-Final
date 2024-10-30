<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>about us</title>
  <meta name="description" content="ZOSER - Lazy Profile Owners!">
  <meta name="keywords" content="ID cards, friendship, customizable, NFC cards">  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">


      <!--box icon link-->
      <link rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    </head>
      <!--remix icon link-->
      <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
  />
      <!--google font link-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  
</head>

<body>
        <!--header-->
        <div class="announcement">
        <h4>20% off for first 10 orders</h4>
    </div>
        <header class="headerP">
            <a href="index.php" class="logo" >
                <img src="images/logo.svg" alt="Zoser logo">
            </a>
    
            <ul class="navlist">
                <li><a href="index.php">home</a></li>
                <li><a href="shop.php">shop</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
              if(isset($_SESSION["user_id"])){?>
            <li><a href="includes/logout.inc.php">sign out</a></li>
            <?php }?>
                <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
            </ul>
            <div class="right-content">
            <?php
              if(!isset($_SESSION["user_id"])){?>
                <a href="signin.php" class="nav-btn">Sign In</a>
              <?php }else {?>
                <a href="profile.php?id=<?php echo $_SESSION["user_id"]; ?>" class="nav-btn">Profile</a>
                <?php }?>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>

        </header>
    
       <!--hero-->
<section class="hero">
        <div class="hero-text">
            <h1>About US</h1>
            <p>we believe that friendships are worth treasuring, and that’s why we use NFC technology to bring your memories to life.<br>With just a tap, your personalized card links to a digital space where you can add photos, write messages, and even share your favorite song – making every card as unique as your friendship.</p>
            <div class="main-hero">
                <a href="contact.php" class="btn">Contact</a>
                
            </div>
        </div>
    </section>
    <!--js-->
    <script src="script.js"></script>
</body>

</html>

