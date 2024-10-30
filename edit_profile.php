<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit();
}

// Include the database connection
require_once "includes/dbh.inc.php";

// Get the current user ID
$userId = $_SESSION["user_id"];

// Fetch the user data from the database
$query = "SELECT boy_name, girl_name, message FROM users WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $userId);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user data is found
if (!$userData) {
    die("User not found.");
}

// Fetch previously uploaded images
$imageQuery = "SELECT id, image_url FROM images WHERE uid = :user_id"; // Adjust this query based on your database structure
$imageStmt = $pdo->prepare($imageQuery);
$imageStmt->bindParam(':user_id', $userId);
$imageStmt->execute();
$images = $imageStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Boxicons and Remixicon link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">

    <style>
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        .preview-box {
            position: relative;
        }
        .preview-box img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            padding: 1px 6px;
            border-radius: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="index.php" class="logo">
            <img src="images/logo.svg">
        </a>

        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="#">shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if(isset($_SESSION["user_id"])) { ?>
            <li><a href="includes/logout.inc.php">Sign Out</a></li>
            <?php } ?>
            <li><a href="https://www.instagram.com/zoser.eg/"><i class="ri-instagram-line"></i></a></li>
        </ul>
        <div class="right-content">
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <!-- Edit Profile Section -->
    <section id="contact" class="contact">
        <h1>Edit Profile</h1>
        <form action="includes/userupdate.inc.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label for="boy_name">Boy Name:</label>
                <input type="text" id="boy_name" name="boy_name" placeholder="Boy" value="<?php echo htmlspecialchars($userData['boy_name']); ?>" required>
            </div>
            <div class="input-group">
                <label for="girl_name">Girl Name:</label>
                <input type="text" id="girl_name" name="girl_name" placeholder="Girl" value="<?php echo htmlspecialchars($userData['girl_name']); ?>" required>
            </div>
            <div class="input-group">
                <label for="message">Your Story:</label>
                <textarea id="message" name="message" placeholder="Our infinity story! :'D" required><?php echo htmlspecialchars($userData['message']); ?></textarea>
            </div>
            <div class="input-group">
                <label for="file">Your Pretty Photos:</label>
                <input type="file" id="file" name="photos[]" accept="image/*" multiple>
            </div>

            <!-- Preview container for images -->
            <div class="preview-container" id="preview-container">
                <?php foreach ($images as $image): ?>
                    <div class="preview-box" data-image-id="<?php echo htmlspecialchars($image['id']); ?>">
                        <img src="<?php echo htmlspecialchars($image['image_url']); ?>" alt="Uploaded Image">
                        <button type="button" class="delete-btn old-image-btn">x</button> <!-- Changed class name here -->
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit">Save &lt;3</button>
        </form>
    </section>

    <script>
        const fileInput = document.getElementById('file');
        const previewContainer = document.getElementById('preview-container');

        // Handle new image previews
        fileInput.addEventListener('change', function(event) {
            // Clear previous previews of newly selected images
            const newPreviewBoxes = Array.from(previewContainer.querySelectorAll('.preview-box.new'));
            newPreviewBoxes.forEach(box => box.remove());

            // Convert file list to an array and loop through them
            Array.from(event.target.files).forEach((file, index) => {
                // Create a new FileReader instance to read the image
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewBox = document.createElement('div');
                    previewBox.classList.add('preview-box', 'new');

                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    previewBox.appendChild(imgElement);

                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'x';
                    deleteButton.classList.add('delete-btn', 'new-image-btn'); // New class for new images

                    // Handle delete functionality for new uploads
                    deleteButton.addEventListener('click', () => {
                        previewBox.remove();

                        const dataTransfer = new DataTransfer();
                        Array.from(fileInput.files).forEach((f, i) => {
                            if (i !== index) {
                                dataTransfer.items.add(f);
                            }
                        });
                        fileInput.files = dataTransfer.files; // Update file input
                    });

                    previewBox.appendChild(deleteButton);
                    previewContainer.appendChild(previewBox);
                };

                reader.readAsDataURL(file);
            });
        });

// Handle deletion of already uploaded images (from the database)
document.querySelectorAll('.old-image-btn').forEach(button => {
    button.addEventListener('click', function () {
        const previewBox = this.parentElement;
        const imageId = previewBox.getAttribute('data-image-id');

        // Show confirmation dialog
        const confirmation = confirm('Are you sure you want to delete this image?');
        
        if (confirmation && imageId) {
            fetch('includes/delete_image.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `image_id=${imageId}`
            })
            .then(response => {
                // Check the response status
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.message === 'Image deleted successfully') {
                    previewBox.remove(); // Remove the image preview box
                } else {
                    console.error('Error:', data.message);
                    alert('Failed to delete image');
                }
            })
            .catch(error => {
                console.error('Error:', error.message); // Log any errors to the console
            });
        }
    });
});

// Add an event listener for newly created buttons dynamically
const observer = new MutationObserver(() => {
    document.querySelectorAll('.new-image-btn').forEach(button => {
        button.addEventListener('click', () => {
            // Show confirmation dialog
            const confirmation = confirm('Are you sure you want to delete this image?');
            
            if (confirmation) {
                const previewBox = button.parentElement;
                previewBox.remove(); // Remove the image preview box
            }
        });
    });
});

observer.observe(previewContainer, { childList: true });

    </script>
    <script src="script.js"></script>
</body>
</html>
