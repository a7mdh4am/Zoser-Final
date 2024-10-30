<?php
session_start();
session_unset();
session_destroy();

// Check if the HTTP referer exists and redirect back, otherwise use a fallback
if (isset($_SERVER['HTTP_REFERER'])) {
    $redirect_url = $_SERVER['HTTP_REFERER'];
} else {
    $redirect_url = 'index.php'; // fallback if HTTP_REFERER is not available
}

// Redirect to the referer or signin page
header("Location: $redirect_url");
die();

