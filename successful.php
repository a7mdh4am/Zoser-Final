<?php
// Get the order ID from the URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
} else {
    echo "No Order ID found.";
}
?>

<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?php echo "#$order_id-Successful"; ?></title>
  <meta name="description" content="ZOSER - Searchin For Dusty Thing!">
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
                <li><a href="about.php">About</a></li>
                <li><a href="testc.php">Contact</a></li>
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
                <div class="body">

                  <div class="succ-text">
                    <h3>Your Order ID is: <?php echo $order_id; ?></h3> 
                    <h1>Woohoo! Your order is in the works! </h1>
                    <p> Your custom card is on its way to spreading smiles. We can’t wait for you to see the magic unfold! ✨ Keep an eye out for updates, and thank you for letting us be a part of your story! 💖 </p>
                    <a href="index.php" class="btn">show me</a>
                  </div>
                </div>
</body>
<style>
  .body{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
  }
  .body .btn{
    margin-top: 20px;
  }
    .succ-text{
    margin: 15% 5%;
    text-align: center;
  }
  @media(max-width:440px){
    .succ-text{
        margin: 46% 5%;
        text-align: center;
      }}
      @media(max-width:570px){
    .succ-text{
        margin: 40% 5%;
        text-align: center;
      }}
      @media(max-width: 920px) {
    .succ-text{
        margin: 28% 5%;
        text-align: center;
      }}
      @media(max-width:950px){
    .succ-text{
        margin: 26% 5%;
        text-align: center;
      }}
      @media(max-width:1150px){
    .succ-text{
        margin: 23% 5%;
        text-align: center;
      }}

</style>
</html>
<script src="script.js"></script>


