<?php
require_once 'includes/config_session.inc.php';

// if(!$_POST['boy_name'] || !$_POST['girl_name'] || !$_POST['selected_color']){
// header('Location: order.php');
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $boy_name = $_POST['boy_name'];
    $girl_name = $_POST['girl_name'];
    $color = $_POST['selected_color'];
    $song = $_POST['song'];
    $product = $_POST['id'];
    

    // Upload and move the files
    $target_dir = "uploads/";
    $boy_photo = $target_dir . "boy/" . uniqid('img_') . '_' . basename($_FILES["boy_photo"]["name"]);
    $girl_photo = $target_dir . "girl/" . uniqid('img_') . '_' . basename($_FILES["girl_photo"]["name"]);

    if (move_uploaded_file($_FILES["boy_photo"]["tmp_name"], $boy_photo) && move_uploaded_file($_FILES["girl_photo"]["tmp_name"], $girl_photo)) {
        // Store paths and display the checkout screen
    } else {
        echo print_r($_POST);
        echo print_r($_FILES);
        die("Sorry, there was an error uploading the files.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
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
<!-- Checkout Section -->
<section class="checkout">
    <h1>Checkout</h1>
    <form action="includes/order_process.inc.php" method="POST">
        <!-- Shipping Details -->
        <div class="shipping-info">
            <h3>Shipping Information</h3>
            <div>
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
<div>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
</div>
    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
    </div>
<div>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>
</div>
<div>
    <label for="phone">Governorate:</label>
    <select name="zone" id="Select1" required="" autocomplete="shipping address-level1" class="ZHJU6 _1k3449n5 _1k3449n3 _1fragemsy oAlPg IWR5K tu1VS"><option data-alternate-values="[&quot;6th of October&quot;,&quot;As Sādis min Uktūbar&quot;]" value="SU">6th of October</option><option data-alternate-values="[&quot;Al Sharqia&quot;,&quot;Ash Sharqīyah&quot;]" value="SHR">Al Sharqia</option><option data-alternate-values="[&quot;Alexandria&quot;,&quot;Al Iskandarīyah&quot;]" value="ALX">Alexandria</option><option data-alternate-values="[&quot;Aswan&quot;,&quot;Aswān&quot;]" value="ASN">Aswan</option><option data-alternate-values="[&quot;Asyut&quot;,&quot;Asyūţ&quot;]" value="AST">Asyut</option><option data-alternate-values="[&quot;Beheira&quot;,&quot;Al Buḩayrah&quot;]" value="BH">Beheira</option><option data-alternate-values="[&quot;Beni Suef&quot;,&quot;Banī Suwayf&quot;]" value="BNS">Beni Suef</option><option data-alternate-values="[&quot;Cairo&quot;,&quot;Al Qāhirah&quot;]" value="C">Cairo</option><option data-alternate-values="[&quot;Dakahlia&quot;,&quot;Ad Daqahlīyah&quot;]" value="DK">Dakahlia</option><option data-alternate-values="[&quot;Damietta&quot;,&quot;Dumyāţ&quot;]" value="DT">Damietta</option><option data-alternate-values="[&quot;Faiyum&quot;,&quot;Al Fayyūm&quot;]" value="FYM">Faiyum</option><option data-alternate-values="[&quot;Gharbia&quot;,&quot;Al Gharbīyah&quot;]" value="GH">Gharbia</option><option data-alternate-values="[&quot;Giza&quot;,&quot;Al Jīzah&quot;]" value="GZ">Giza</option><option data-alternate-values="[&quot;Helwan&quot;,&quot;Ḩulwān&quot;]" value="HU">Helwan</option><option data-alternate-values="[&quot;Ismailia&quot;,&quot;Al Ismāٰīlīyah&quot;]" value="IS">Ismailia</option><option data-alternate-values="[&quot;Kafr el-Sheikh&quot;,&quot;Kafr ash Shaykh&quot;]" value="KFS">Kafr el-Sheikh</option><option data-alternate-values="[&quot;Luxor&quot;,&quot;Al Uqşur&quot;]" value="LX">Luxor</option><option data-alternate-values="[&quot;Matrouh&quot;,&quot;Maţrūḩ&quot;]" value="MT">Matrouh</option><option data-alternate-values="[&quot;Minya&quot;,&quot;Al Minyā&quot;]" value="MN">Minya</option><option data-alternate-values="[&quot;Monufia&quot;,&quot;Al Minūfīyah&quot;]" value="MNF">Monufia</option><option data-alternate-values="[&quot;New Valley&quot;,&quot;Al Wādī al Jadīd&quot;]" value="WAD">New Valley</option><option data-alternate-values="[&quot;North Sinai&quot;,&quot;Shamāl Sīnā&quot;]" value="SIN">North Sinai</option><option data-alternate-values="[&quot;Port Said&quot;,&quot;Būr Saٰīd&quot;]" value="PTS">Port Said</option><option data-alternate-values="[&quot;Qalyubia&quot;,&quot;Al Qalyūbīyah&quot;]" value="KB">Qalyubia</option><option data-alternate-values="[&quot;Qena&quot;,&quot;Qinā&quot;]" value="KN">Qena</option><option data-alternate-values="[&quot;Red Sea&quot;,&quot;Al Baḩr al Aḩmar&quot;]" value="BA">Red Sea</option><option data-alternate-values="[&quot;Sohag&quot;,&quot;Sūhāj&quot;]" value="SHG">Sohag</option><option data-alternate-values="[&quot;South Sinai&quot;,&quot;Janūb Sīnā&quot;]" value="JS">South Sinai</option><option data-alternate-values="[&quot;Suez&quot;,&quot;As Suways&quot;]" value="SUZ">Suez</option></select>
</div>
        </div>

        <!-- Hidden Fields to Pass Data -->
        <input type="hidden" name="boy_name" value="<?php echo htmlspecialchars($boy_name); ?>">
        <input type="hidden" name="girl_name" value="<?php echo htmlspecialchars($girl_name); ?>">
        <input type="hidden" name="song" value="<?php echo htmlspecialchars($song); ?>">
        <input type="hidden" name="boy_photo" value="<?php echo htmlspecialchars($boy_photo); ?>">
        <input type="hidden" name="girl_photo" value="<?php echo htmlspecialchars($girl_photo); ?>">
        <input type="hidden" name="selected_color" value="<?php echo htmlspecialchars($color); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product); ?>">

        <!-- Submit Button -->
        <button type="submit">Complete Order</button>
    </form>
</section>
    <!--js-->
    <script src="script.js"></script>
    <style>
        .checkout {
    padding: 80px 20px;
    text-align:left;
  }
  .checkout h1 {
    margin: 22px 30px;
    font-size: 50px;
    color: #303030;
    font-weight: 900;
  }
  
  .checkout form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;

  }
  .shipping-info h3{
    margin-bottom: 15px;
  }
  .shipping-info div{
    margin-bottom: 15px;
  }
  
  .shipping-info input,.shipping-info select {
    width: calc(100% - 0px);
    padding: 10px 15px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 13px;
  }
  </style>
</body>
</html>
