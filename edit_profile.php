<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZOSER</title>
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

</head>
<body>
    <!--header-->
    <header>
        <a href="index.html" class="logo" >
            <img src="images/logo.svg">
        </a>

        <ul class="navlist">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Membership</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
        </ul>
        <div class="right-content">
            <a href="signin.html" class="nav-btn">Sign In</a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>
    
    <!--hero-->
    <section id="contact" class="contact">
        <h1>Edit Profile</h1>
        <form action="#" method="POST">
            <div class="input-group">
              <label for="name">boy name:</label>
              <input type="text" id="boy_name" name="boy_name" placeholder="boy" required>
            </div>
            <div class="input-group">
              <label for="name">girl name:</label>
              <input type="text" id="girl_name" name="girl_name" placeholder="girl" required>
            </div>
          <div class="input-group">
            <label for="message">your story:</label>
            <textarea id="message" name="message" placeholder="our infinity story! :'D  " required></textarea>
          </div>
          <div class="input-group">
              <label for="file">yours pretty photos:</label>
              <input type="file" name="photos" title="null"required>
            </div>
          <button type="submit">save &lt;3</button>
        </form>
      </section>
    <!--js-->
    <script src="script.js"></script>
</body>
</html>