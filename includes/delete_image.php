<?php
session_start();
require_once 'dbh.inc.php';


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['message' => 'Unauthorized']);
    exit();
}

// Check if the image ID is provided
if (!isset($_POST['image_id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Image ID not provided']);
    
    exit();
}

$imageId = $_POST['image_id'];
$userId = $_SESSION['user_id'];  // Ensure the user can only delete their own images

try {
    // Fetch the image details
    $query = "SELECT image_url FROM images WHERE id = :image_id AND uid = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':image_id', $imageId);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    $imageData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$imageData) {
        http_response_code(404);
        echo json_encode(['message' => 'Image not found']);
        
        exit();
    }

    // Delete the image from the database
    $deleteQuery = "DELETE FROM images WHERE id = :image_id AND uid = :user_id";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->bindParam(':image_id', $imageId);
    $deleteStmt->bindParam(':user_id', $userId);
    $deleteStmt->execute();
    

    // Delete the image from the file system
    $imagePath = "../".$imageData['image_url'];
    if (file_exists($imagePath)) {
        unlink($imagePath);  // Delete the file
    }

    echo json_encode(['message' => 'Image deleted successfully']);
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo json_encode(['message' => 'Server error']);
}
