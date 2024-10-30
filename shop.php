<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';

// Prepare and execute the SQL query to fetch products
try {
    $stmt = $pdo->prepare("SELECT id, name, bio, price,colors, img FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all products as associative array
} catch (PDOException $e) {
    echo "Error fetching products: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lovely shop!</title>
    <meta name="description" content="ZOSER - Create and customize ID cards for friends and share your memories">
    <meta name="keywords" content="ID cards, friendship, customizable, NFC cards">
    
    <link rel="stylesheet" type="text/css" href="shop_css.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
</head>
<body>
    <!--header-->
    <div class="announcement">
        <h4>20% off for first 10 orders</h4>
    </div>
    <header>
        <a href="index.php" class="logo">
            <img src="images/logo.svg" alt="Zoser logo">
        </a>

        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if(isset($_SESSION["user_id"])) { ?>
                <li><a href="includes/logout.inc.php">Sign Out</a></li>
            <?php } ?>
            <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
        </ul>

        <div class="right-content">
            <?php if(!isset($_SESSION["user_id"])) { ?>
                <a href="signin.php" class="nav-btn">Sign In</a>
            <?php } else { ?>
                <a href="profile.php?id=<?php echo $_SESSION["user_id"]; ?>" class="nav-btn">Profile</a>
            <?php } ?>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    
    <!--hero-->
    <section class="hero">
        <?php if(!empty($products)) { 
            foreach($products as $product) { 
            $colors = explode(',', $product['colors']);

// Trim any whitespace from each color (just in case)
$colors = array_map('trim', $colors);?>
                <section class="product">
                    <img src="images/<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div class="product-text">
                        <h3 class="h3t"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['bio']); ?></p>
                        <div class="color-groups">
                        <!-- Dynamically render color buttons based on the product colors -->
                        <?php foreach ($colors as $color): ?>
                            <div class="color color-<?php echo htmlspecialchars($color); ?>"
                            data-color="<?php echo htmlspecialchars($color); ?>"></div>
                            <?php endforeach; ?>
                        </div>
                        <a class="price"><?php echo htmlspecialchars($product['price']); ?>EGP</a>
                        <!-- Pass product ID in URL -->
                        <form action="order.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                        <button class="btn" type="submit">Buy</button>
                    </form>
                        </div>
                    </section>
            <?php } 
        } else { ?>
            <p>No products found.</p>
        <?php } ?>
    </section>
  
    <!--footer-->
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
<?php
$pdo = null;
$stmt = null;