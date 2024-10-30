<?php
require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us!</title>
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
    <div class="announcement">
        <h4>20% off for first 10 orders</h4>
    </div>
    <header>
        <a href="index.php" class="logo" >
            <img src="images/logo.svg">
        </a>

        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="shop.php">shop</a></li>
            <li><a href="#">Contact</a></li>
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
    <section id="contact" class="contact">
        <h1>Contact Us</h1>
        <form action="includes/contacthandler.inc.php" method="POST">
          <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
          </div>
          <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
          </div>
          <div class="input-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your Message" required></textarea>
          </div>
          <button type="submit">Send Message</button>
        </form>
      </section>
    <!--js-->
    <script src="script.js"></script>
</body>
</html>