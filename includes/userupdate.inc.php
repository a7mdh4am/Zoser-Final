<?php
session_start();

// Check if user is logged in (assuming user ID is stored in session)
if (isset($_SESSION["user_id"])) {
    $userid = $_SESSION["user_id"];  // Get the logged-in user's ID

    // Check if request is a POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $boyName = $_POST["boy_name"];
        $girlName = $_POST["girl_name"];
        $message = $_POST["message"];

        try {
            // Include the database connection
            require_once "dbh.inc.php";

            // Prepare the SQL query with placeholders
            $query = "UPDATE users SET boy_name = :bname, girl_name = :gname, message = :message WHERE id = :id;";
            $stmt = $pdo->prepare($query);

            // Bind the parameters
            $stmt->bindParam(":bname", $boyName);
            $stmt->bindParam(":gname", $girlName);
            $stmt->bindParam(":message", $message);
            $stmt->bindParam(":id", $userid);

            // Execute the statement
            $stmt->execute();

            // Now handle image uploads
            if (isset($_FILES['photos']) && !empty($_FILES['photos']['name'][0])) {
                $imagePaths = []; // Array to store image paths
                $uploadDir = 'uploads/'; // Folder where images will be uploaded

                foreach ($_FILES['photos']['name'] as $key => $imageName) {
                    $imageTmpName = $_FILES['photos']['tmp_name'][$key];
                    $imageSize = $_FILES['photos']['size'][$key];
                    $imageError = $_FILES['photos']['error'][$key];

                    // Validate file type and size
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

                    if (in_array($imageExt, $allowedTypes) && $imageSize <= 5 * 1024 * 1024 && $imageError === 0) {
                        // Generate a unique name for the image to avoid overwriting
                        $uniqueImageName = uniqid('img_') . '_' . time() . '.' . $imageExt;

                        // Move the image to the upload directory
                        $imagePath = $uploadDir . $uniqueImageName;
                        if (move_uploaded_file($imageTmpName, '../'.$imagePath)) {
                            // Save the path to the database
                            $query = "INSERT INTO images (image_url, uid) VALUES (:imagePath,:userid)";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(":userid", $userid);
                            $stmt->bindParam(":imagePath", $imagePath);
                            $stmt->execute();

                            // Add the image path to the array
                            $imagePaths[] = $imagePath;
                        } else {
                            echo "Failed to upload image: $imageName<br>";
                        }
                    } else {
                        echo "Invalid file type or size for image: $imageName<br>";
                    }
                }
            }

            // Close the connection
            $pdo = null;
            $stmt = null;

            // Redirect after successful update
            header("Location: ../profile.php?id=" . $userid);
            die();
        } catch (PDOException $e) {
            die("Failed: " . $e->getMessage());
        }
    } else {
        // Redirect if the request is not a POST request
        header("Location: ../profile.php?id=" . $userid);
        die();
    }
} else {
    // Redirect if the user is not logged in
    header("Location: ./login.php");
    die();
}
