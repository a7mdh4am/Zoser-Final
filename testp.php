<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>profile</title>
  <meta name="description" content="ZOSER - Create and customize ID cards for friends and share your memories">
  <meta name="keywords" content="ID cards, friendship, customizable, NFC cards">  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">

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
      <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">

  
</head>

<body>
        <!--header-->
        <header class="headerP">
            <a href="index.php" class="logo" >
                <img src="images/logo.svg" alt="Zoser logo">
            </a>
    
            <ul class="navlist">
                <li><a href="index.php">home</a></li>
                <li><a href="#">shop</a></li>
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
            <h1>Ahmed & Mariam Story!</h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem ipsum assumenda laudantium nisi vel. Fugit, nisi nobis! Corporis asperiores cum maxime saepe similique, temporibus vero illo, quod qui quos hic!</p>
        </div>

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

  <!-- book -->
   <section>
     <input type="checkbox" id="checkbox-cover" />
     <input type="checkbox" id="checkbox-page1" />
     <input type="checkbox" id="checkbox-page2" />
     <input type="checkbox" id="checkbox-page3" />

     
     <div class="book">
       <div class="cover">
         <label for="checkbox-cover">short memories built together!</label>
        </div>
        <div class="page" id="page1">
          <div class="front-page">
          <img src="images/s1.jpg" alt="Back of Page 1" />
          <label class="next" for="checkbox-page1"></label>
          </div>
          <div class="back-page">
            <img src="images/s2.jpg" alt="Back of Page 1" />
            <label class="prev" for="checkbox-page1"></label>
          </div>
        </div>
        <div class="page" id="page2">
          <div class="front-page">
          <img src="images/s3.jpg" alt="Back of Page 1" />
          <label class="next" for="checkbox-page2"></label>
          </div>
          <div class="back-page">
            <img src="images/s4.jpg" alt="Back of Page 2" />
            <label class="prev" for="checkbox-page2"></label>
          </div>
        </div>
        <div class="page" id="page3">
          <div class="front-page">
          <img src="images/s5.jpg" alt="Back of Page 1" />
          <!-- <label class="prev" for="checkbox-page2"><i class='bx bx-chevron-left' ></i></label> -->
          </div>
        </div>
        <div class="back-cover"></div>
      </div>
    </section>
      <!-- end book -->
      
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
<style>
  section{
    margin: 50px 0 50px 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }
 section .book {
    width: 350px;
    height: 450px;
    position: relative;
    transition-duration: 1s;
    perspective: 1500px;
}

section input {
    display: none; /* Hide radio buttons */
}

section .cover, .back-cover {
    /* background-color: #4173a5; */
    background-color: #303030;
    width: 100%;
    height: 100%;
    border-radius: 0 15px 15px 0;
    box-shadow: 0 0 5px rgb(41, 41, 41);
    display: flex;
    align-items: center;
    justify-content: center;
    transform-origin: center left;
    position: absolute;
    z-index: 4;
    transition: transform 1s;
}

section .cover label {
    width: 100%;
    height: 100%;
    cursor: pointer;
    text-align: center;
    justify-content: center;
    align-items: center;
    color: white;
}

section .back-cover {
    position: relative;
    z-index: -1;
}

section .page {
    position: absolute;
    background-color: white;
    width: 330px;
    height: 430px;
    border-radius: 0 15px 15px 0;
    margin-top: 10px;
    transform-origin: left;
    transform-style: preserve-3d;
    transform: rotateY(0deg);
    transition-duration: 1.5s;
}

section .page img {
    width: 100%;
    height: 100%;
    border-radius: 15px;
    object-fit: contain;
}

section .front-page {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    box-sizing: border-box;
    padding: 1rem;
}

section .back-page {
    transform: rotateY(180deg);
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    box-sizing: border-box;
    padding: 1rem;
}

section .next, .prev {
  width: 100%;
  height: 100%;
    position: absolute;
    bottom: 1em;
    cursor: pointer;
}

section .next {
    right: 1em;
}

section .prev {
    left: 1em;
}

section #page1 {
    z-index: 3;
}

section #page2 {
    z-index: 2;
}

section #page3 {
    z-index: 1;
}

/* Flip effects */
section #checkbox-cover:checked ~ .book {
  transform:translateX(190px);
  
}

section #checkbox-cover:checked ~ .book .cover {
    transition: transform 1.5s, z-index 0.5s 0.5s;
    transform: rotateY(-180deg);
    z-index: 1;
}

section #checkbox-cover:checked ~ .book .page {
    box-shadow: 0 0 3px rgb(99, 98, 98);
}

section #checkbox-page1:checked ~ .book #page1 {
    transform: rotateY(-180deg);
    z-index: 2;
}

section #checkbox-page1:checked ~ .book #page2 {
    z-index: 3; /* Ensure page 2 is above when page 1 is flipped */
}

section #checkbox-page2:checked ~ .book #page2 {
    transform: rotateY(-180deg);
    z-index: 2;
}

section #checkbox-page2:checked ~ .book #page3 {
    z-index: 3; /* Ensure page 3 is above when page 2 is flipped */
}
@media(max-width: 920px) {
  section #checkbox-cover:checked ~ .book {
    transform: scale(0.7) translateX(185px);
}
}
@media(max-width: 570px) {
  section #checkbox-cover:checked ~ .book {
    transform: scale(0.6) translateX(185px);
}
}
@media(max-width: 440px) {
  section #checkbox-cover:checked ~ .book {
    transform: scale(0.5) translateX(175px);
    /* transform: scale(0.7) translateY(175px) rotateZ(90deg); */

}
}

</style>

</html>
