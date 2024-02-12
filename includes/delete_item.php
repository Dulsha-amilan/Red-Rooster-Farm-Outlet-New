<?php
session_start();

// Check if the product_id is received from the form
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Check if the cart exists in the session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cartItems = $_SESSION['cart'];

        // Remove the selected item from the cart
        unset($cartItems[$productId]);

        // Update the cart in the session
        $_SESSION['cart'] = $cartItems;
    }
}

// Redirect back to the cart page
header('Location: ../cart.php');
exit();
?>
