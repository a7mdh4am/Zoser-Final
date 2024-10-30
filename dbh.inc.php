<?php

$dsn = "mysql:host=sql100.infinityfree.com;dbname=if0_37484986_zoser";
$dbusername = "if0_37484986";
$dbpassword = "ZIAbJg3e1R";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e    ) {
    echo "Connection Failed: " .$e->getMessage();
}