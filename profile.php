<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/dbh.inc.php';

$boyName = '';
$girlName = '';
$storyMessage = '';
$imageUrls = [];

// Check if 'id' is provided in the URL
if (!isset($_GET["id"])) {
    header("Location: 404.php");
    die("Invalid user ID.");
}

$userid = $_GET["id"];  // Get the user ID from the URL

try {
    // Fetch user details
    $query = "SELECT boy_name, message, girl_name FROM users WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $userid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Handle invalid data
    if (!$result) {
        header("Location: /");
        die();
    }


    // Assign values to variables
    $boyName = $result['boy_name'];
    $girlName = $result['girl_name'];
    $storyMessage = $result['message'];


      if(empty($result['boy_name'])){$boyName = "🤷‍♂️";}
      if(empty($result['girl_name'])){$girlName = "🤷‍♀️";}
      if(empty($result['message'])){
      $storyMessage = "<pre></br>
      
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣤⢔⣒⠂⣀⣂⣤⣄⣀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⣴⣿⠋⢠⣟⣼⣷⠼⣞⣽⢏⣿⣆⠱⣄
      ⠀⠀⠀⠀⠀⠀⠀⠹⣿⡀⣆⠛⠢⠐⡍⡉⣾⣾⣽⣟⡰⠃
      ⠀⠀⠀⠀⠀⠀⠀⠀⢈⢿⣿⣦⠀⠤⢶⣿⠿⢋⣴⡏⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠈⣺⡙⢻⣿⣿⣧⣽⣉⣁⣿⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⢡⣷⡔⡉⣩⢋⡋⠩⠯⡟⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⢀⠀⠈⣘⣶⣁⢙⢐⣄⡴⠪⠓⠁⠉⠃
      ⠀⠀⠀⠀⠀⠀⠀⠈⠙⠛⠛⢻⣿⣿⣿⣿⠻⣧⡀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠨⠫⣿⠉⠻⣇⠘⠓⠂⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠁⠇⣿⠂⠁⠀⠀⠀⠀⠀⠀
      ⠀⢶⣾⣿⣿⣿⣿⣿⣶⣄⠀⢐⢝⣿⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠹⣿⣿⣿⣿⣿⣿⣿⣧⠈⢹⣿⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠈⠙⠻⢿⣿⣿⠿⢛⣄⢸⡇⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⠘⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⡁⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⠁⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⡆⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢹⣷⠂⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⠀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⣿⡀⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⠇⠀⠀⠀⠀⠀⠀⠀
      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠋⠀⠀⠀⠀⠀
      </pre>
      ";}


    // Fetch images associated with the user
    $query = "SELECT image_url FROM images WHERE uid = :id";  // Assuming a separate table for images
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $userid);
    $stmt->execute();
    $imageUrls = $stmt->fetchAll(PDO::FETCH_COLUMN);

} catch (PDOException $e) {
    error_log($e->getMessage());
    echo "An error occurred while fetching the user.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?php echo "$boyName & $girlName"; ?></title>
  <meta name="description" content="ZOSER - Create and customize ID cards for friends and share your memories">
  <meta name="keywords" content="ID cards, friendship, customizable, NFC cards">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Box Icon Link -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  
  <!-- Remix Icon Link -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
  
  <!-- Google Font Link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">

</head>

<body>
  <!-- Header -->
  <header class="headerP">
    <a href="index.php" class="logo">
      <img src="images/logo.svg" alt="Zoser logo">
    </a>

    <ul class="navlist">
      <li><a href="index.php">home</a></li>
      <li><a href="shop.php">shop</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php
              if(isset($_SESSION["user_id"])){?>
            <li><a href="includes/logout.inc.php">sign out</a></li>
            <?php }?>
      <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
    </ul>

    <div class="right-content">
            <?php
        if (isset($_SESSION["user_id"]) && $_GET["id"] == $_SESSION["user_id"]) { ?>
            <a href="edit_profile.php" class="nav-btn">Edit</a>
        <?php } else if (isset($_SESSION["user_id"])) { ?>
            <a href="profile.php?id=<?php echo $_SESSION["user_id"]; ?>" class="nav-btn">Profile</a>
        <?php } else { ?>
            <a href="signin.php" class="nav-btn">Sign In</a>
        <?php } ?>

      
      <div class="bx bx-menu" id="menu-icon"></div>
    </div>
  </header>

  <!-- Profile Text Section -->
  <div class="profile-text">
    <h1><?php echo "$boyName & $girlName story!"; ?></h1>
    <p><?php echo $storyMessage; ?></p>
  </div>

  <!-- Image Swiper Section -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php foreach ($imageUrls as $imageUrl) { ?>
        <div class="swiper-slide"><img src="<?php echo htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8'); ?>" alt=""></div>
      <?php } ?>
    </div>
  </div>

  <!-- JS Scripts -->
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "cards",
      grabCursor: true,
    });


    // auto swapper
  //   var swiper = new Swiper(".mySwiper", {
  //   effect: "cards",
  //   grabCursor: true,
  //   loop: true,
  //   autoplay: {
  //       delay:2500,
  //       disableOnInteraction: true,
  //   },
  // });
  </script>
</body>

</html>
