<?php
session_start();
$product_id = $_POST['product_id'];

// Check if the cart exists in the session, if not, create an empty cart array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add the product to the cart with quantity 1
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += 1;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

// Redirect back to the previous page or the cart page
header("Location: ../cart.php");
exit;
?>
