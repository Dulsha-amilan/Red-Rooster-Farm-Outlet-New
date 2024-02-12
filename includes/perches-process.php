<?php
session_start();
include 'config.php'; // Database Connection

// Check if the form is submitted
if (isset($_POST['purches'])) {
    // Retrieve form data and other necessary information
    $fullName = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardName = $_POST['cardname'];
    $cardNumber = $_POST['cardnumber'];
    $expMonth = $_POST['expmonth'];
    $expYear = $_POST['expyear'];
    $cvv = $_POST['cvv'];

    $totalPrice = $_POST['totalPrice'];

    // Perform any necessary validation on the form data

    // Store the billing details in the orders table
    $sql = "INSERT INTO `orders`(`customer_name`, `email`, `address`, `total_price`, `order_date`) 
            VALUES ('$fullName', '$email', '$address', '$totalPrice', NOW())";

    // Execute the SQL query and check for success
    if ($conn->query($sql) === TRUE) {
        // Retrieve the newly inserted order ID
        $orderID = $conn->insert_id;

        // Insert order details into the order_details table
        foreach ($_SESSION['cart'] as $productID => $quantity) {
            // Retrieve product details from the database
            $productSQL = "SELECT * FROM product WHERE product_id = $productID";
            $productResult = $conn->query($productSQL);
            $productRow = $productResult->fetch_assoc();

            $productName = $productRow['product_name'];
            $productPrice = $productRow['product_price'];
            $subtotal = $productPrice * $quantity;

            // Insert the order details into the order_details table
            $orderDetailsSQL = "INSERT INTO `order_details`(`order_id`, `product_id`, `product_name`, `quantity`, `price`, `subtotal`) 
                                VALUES ('$orderID', '$productID', '$productName', '$quantity', '$productPrice', '$subtotal')";

            // Execute the SQL query and check for success
            if ($conn->query($orderDetailsSQL) !== TRUE) {
                echo "Error inserting order details: " . $conn->error;
                // Handle the error accordingly
            }
        }

        // Order and order details stored successfully, redirect to a success page or display a success message
        echo "
                    <script>
                        alert('Order stored successfully');
                        window.location.href = '../index.php'; 
                    </script>
                ";
    } else {
        // Error occurred while inserting the order, handle the error accordingly
        echo "Error inserting order: " . $conn->error;

    }
}
?>