<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';

// Check if a product ID is passed through the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare and execute the SQL query to fetch the product data including colors
    try {
        $stmt = $pdo->prepare("SELECT id, name, bio, price, img, bkimg, colors,alt FROM products WHERE id = :id");
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // If no product is found, handle the error
        if (!$product) {
            echo "Product not found.";
            exit;
        }

        // Assuming $product['colors'] contains a string like "green, grey, navy, neon"
        $colors = explode(',', $product['colors']);

        // Trim any whitespace from each color (just in case)
        $colors = array_map('trim', $colors);

    } catch (PDOException $e) {
        echo "Error fetching product: " . $e->getMessage();
        exit;
    }
} else {
    header('Location: shop.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" type="text/css" href="order_css.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
</head>

<body>
<div class="announcement">
        <h4>20% off for first 10 orders</h4>
    </div>
    <header>
        <a href="index.php" class="logo">
            <img src="images/logo.svg" alt="Zoser logo">
        </a>
        <ul class="navlist">
            <li><a href="index.php">home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if (isset($_SESSION["user_id"])) { ?>
                <li><a href="includes/logout.inc.php">sign out</a></li>
            <?php } ?>
            <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
        </ul>
        <div class="right-content">
            <?php if (!isset($_SESSION["user_id"])) { ?>
                <a href="signin.php" class="nav-btn">Sign In</a>
            <?php } else { ?>
                <a href="profile.php?id=<?php echo $_SESSION["user_id"]; ?>" class="nav-btn">Profile</a>
            <?php } ?>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-img">
            <!-- Use dynamic product image -->
            <img src="images/<?php echo htmlspecialchars($product['img']); ?>"
                alt="<?php echo htmlspecialchars($product['name']); ?>">
            <img src="images/<?php echo htmlspecialchars($product['bkimg']); ?>"
                alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="hero-text">
            <h3 class="h3t"><?php echo htmlspecialchars($product['name']); ?></h3>
            <p><?php echo htmlspecialchars($product['bio']); ?></p>
            <form action="checkout.php" method="post" enctype="multipart/form-data">
                <div class="color-content">
                    <h3>Select Color</h3>
                    <div class="color-groups">
                        <!-- Dynamically render color buttons based on the product colors -->
                        <?php foreach ($colors as $color): ?>
                            <div class="color color-<?php echo htmlspecialchars($color); ?>"
                                data-color="<?php echo htmlspecialchars($color); ?>"></div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="selected_color" id="selected_color"
                        value="<?php echo htmlspecialchars($colors[0]); ?>">
                </div>
                <div class="inpt-name">
                    <label for="boy_name">Boy Name:</label>
                    <input type="text" id="boy_name" name="boy_name" required>
                </div>
                <div class="input-group">
                    <label for="boy_photo">Boy Photo:</label>
                    <div class="container">
                        <input type="file" id="file_boy" name="boy_photo" accept="image/*" hidden required>
                        <div class="img-area" id="img-area-boy" data-img="">
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button type="button" class="select-image" id="select-image-boy">Select Image</button>
                    </div>
                </div>
                <div class="inpt-name">
                    <label for="girl_name">Girl Name:</label>
                    <input type="text" id="girl_name" name="girl_name" required>
                </div>
                <div class="input-group">
                    <label for="girl_photo">Girl Photo:</label>
                    <div class="container">
                        <input type="file" id="file_girl" name="girl_photo" accept="image/*" hidden required>
                        <div class="img-area" id="img-area-girl" data-img="">
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button type="button" class="select-image" id="select-image-girl">Select Image</button>
                    </div>
                </div>
                <div class="inpt-name">
                    <label for="song">Spotify Song:</label>
                    <input type="text" id="song" name="song" required>
                </div>
                <p>If you want to add your signature to the card, contact us on Instagram <a
                        href="https://www.instagram.com/zoser.eg/">@zoser.eg</a></p>
                <div class="main-hero">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <button class="btn" type="submit">Buy</button>
                    <!-- Display dynamic price -->
                    <a href="#" class="price"><?php echo htmlspecialchars($product['price']); ?>EGP</a>
                </div>
            </form>
        </div>
    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>We believe that friendships are worth treasuring, and that’s why we use NFC technology to bring your memories
            to life...</p>
        <p>Made with <i class="ri-heart-line"></i> by a7mdh4am</p>
    </section>

    <script>
        const colorButtons = document.querySelectorAll('.color');
        const frontImage = document.querySelector('.hero-img img:nth-child(1)');
        const backImage = document.querySelector('.hero-img img:nth-child(2)');
        const selectedColorInput = document.getElementById('selected_color');

        colorButtons.forEach(colorButton => {
            colorButton.addEventListener('click', () => {
                const color = colorButton.getAttribute('data-color');
                selectedColorInput.value = color;
                frontImage.src = `images/<?php echo $product['alt']; ?>_${color}.png`;
                backImage.src = `images/<?php echo $product['alt']; ?>_back_${color}.png`;

                colorButtons.forEach(btn => btn.classList.remove('active-color'));
                colorButton.classList.add('active-color');
            });
        });






        // Function to handle image preview
        function handleImagePreview(inputFile, imgArea) {
            inputFile.addEventListener('change', function () {
                const image = this.files[0];
                if (image.size < 2000000) {  // Image size validation (less than 2MB)
                    const reader = new FileReader();
                    reader.onload = () => {
                        // Clear any previous image
                        const allImg = imgArea.querySelectorAll('img');
                        allImg.forEach(item => item.remove());

                        // Create new img element and set the source
                        const imgUrl = reader.result;
                        const img = document.createElement('img');
                        img.src = imgUrl;
                        imgArea.appendChild(img);

                        imgArea.classList.add('active');
                        imgArea.dataset.img = image.name;

                        // Show the image area
                        imgArea.style.display = "block"; // Show the image area
                        imgArea.style.marginBottom = "20px";
                    };
                    reader.readAsDataURL(image);  // Convert image to base64 and trigger onload
                } else {
                    alert("Image size more than 2MB");
                    imgArea.style.display = "none"; // Hide the image area if the image is too large
                }
            });
        }

        // Boy Photo Logic
        const selectImageBoy = document.querySelector('#select-image-boy');
        const inputFileBoy = document.querySelector('#file_boy');
        const imgAreaBoy = document.querySelector('#img-area-boy');

        selectImageBoy.addEventListener('click', function () {
            inputFileBoy.click();
        });

        handleImagePreview(inputFileBoy, imgAreaBoy);  // Apply the preview logic for boy's photo

        // Girl Photo Logic
        const selectImageGirl = document.querySelector('#select-image-girl');
        const inputFileGirl = document.querySelector('#file_girl');
        const imgAreaGirl = document.querySelector('#img-area-girl');

        selectImageGirl.addEventListener('click', function () {
            inputFileGirl.click();
        });

        handleImagePreview(inputFileGirl, imgAreaGirl);  // Apply the preview logic for girl's photo




    </script>
    <script src="script.js"></script>
</body>

</html>