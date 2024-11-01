<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>edit profile</title>
  <meta name="description" content="ZOSER - Create and customize ID cards for friends and share your memories">
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
        <header class="headerP">
            <a href="index.php" class="logo" >
                <img src="images/logo.svg" alt="Zoser logo">
            </a>
    
            <ul class="navlist">
                <li><a href="#">Membership</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="testc.php">Contact</a></li>
                <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
            </ul>
            <div class="right-content">
            <?php
              if(!isset($_SESSION["user_id"])){?>
                <a href="signin.php" class="nav-btn">Sign In</a>
              <?php }else {?>
                <a href="../edit_profile.php" class="nav-btn">edit</a>
              <?php }?>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
    
        </header>
    
        <div class="profile-text">
            <h1><input type="text" name="bname" placeholder="boy" required> & <input type="text" name="gname" placeholder="girl" required> Story!</h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem ipsum assumenda laudantium nisi vel. Fugit, nisi nobis! Corporis asperiores cum maxime saepe similique, temporibus vero illo, quod qui quos hic!</p>
        </div>

<style>
  .profile-text input {
    align-items: center;
    width: calc(20% - 0px);
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 12px;
  }
  .profile-text h1{
    text-align: center;
  }
  
</style>
<!-- 
        <div class="imgrl">
          <img class="imgrl-1" src="images/s1.jpg" alt="">
          <img class="imgrl-2" src="images/s2.jpg" alt="">
          <img class="imgrl-3" src="images/s3.jpg" alt="">
          <img class="imgrl-4" src="images/s4.jpg" alt="">

        </div>
 -->

  <!-- Swiper -->

  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/s1.jpg" alt=""></div>
        <div class="swiper-slide"><img src="images/s2.jpg" alt=""></div>
        <div class="swiper-slide"><img src="images/s3.jpg" alt=""></div>
        <div class="swiper-slide"><img src="images/s4.jpg" alt=""></div>
        <div class="swiper-slide"><img src="images/s5.jpg" alt=""></div>
        
    </div>
  </div>
  
  <script src="script.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "cards",
      grabCursor: true,
    });
  </script>
</body>

</html>
