<?php
// Database connection
require_once 'dbh.inc.php'; // Assuming this contains the PDO connection as $pdo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $boy_name = $_POST['boy_name'];
    $girl_name = $_POST['girl_name'];
    $song = $_POST['song'];
    $boy_photo = $_POST['boy_photo'];
    $girl_photo = $_POST['girl_photo'];
    $color = $_POST['selected_color'];

    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $zone = $_POST['zone'];
    $product = $_POST['id'];

    // Insert order data into the database
    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO orders (boy_name, girl_name, song, boy_photo, girl_photo, color, full_name, address, city, phone, zone, product_id) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Bind values to the query
        $stmt->execute([$boy_name, $girl_name, $song, $boy_photo, $girl_photo, $color, $full_name, $address, $city, $phone, $zone, $product]);

        // Get the last inserted ID (the order ID)
        $order_id = $pdo->lastInsertId();

        // Show order ID to the user
        echo "Order completed successfully! Your Order ID is: " . $order_id;
        header('Location: ../successful.php?order_id=' . $order_id);
        // Optionally, redirect after a few seconds
        // header('refresh:5; url=../index.php');
        $stmt = null; // Close the connection
        $pdo = null; // Close the connection
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null; // Close the connection
}
?>
