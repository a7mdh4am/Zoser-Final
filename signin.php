<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
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
    
    <header>
        <a href="index.php" class="logo" >
            <img src="images/logo.svg">
        </a>

        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="shop.php">shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
        </ul>
        <div class="right-content">
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>
    
    <!--hero-->
    <section id="contact" class="contact">
        <h1>Sign In</h1>
        <form id="contactForm" action="includes/login.inc.php" method="post">
          <div class="input-group">
            <label for="userid">ID:</label>
            <input type="text" id="username" name="username" placeholder="username" required>
          </div>
          <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
          </div>
          <button type="submit">Sign In</button>
        </form>
        <?php check_signin_errors(); ?>
        <!-- <form id="contactForm" action="includes/logout.inc.php" method="post">
          <button type="logout">logout</button>
        </form> -->
      </section>
    <!--js-->
    <script src="script.js"></script>
</body>
</html>