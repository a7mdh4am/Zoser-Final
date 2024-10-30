<?php

$dsn = "mysql:host=localhost;dbname=zosertest;charset=utf8";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e    ) {
    echo "Connection Failed: " .$e->getMessage();
}