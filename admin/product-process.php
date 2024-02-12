<?php
include '../includes/config.php'; // Database Connection

if (isset($_POST['addItem'])) {
    // Retrieve form data
    $productName = $_POST["pname"];
    $price = $_POST["price"];
    $quantity = $_POST["qty"];
    $productCode = $_POST["pCode"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];

    $img = $_FILES['img']['name'];
    $imgTmp = $_FILES['img']['tmp_name'];

    // Set the target directory for uploading the brand logo
    $targetDirectory = "../assets/images/uploads/";

    // Generate a unique filename for the brand logo
    $productImgName = uniqid() . '_' . $img;

    // Set the target path for the brand logo
    $targetFilePath = $targetDirectory . $productImgName;

    // Move the uploaded brand logo to the target directory
    if (move_uploaded_file($imgTmp, $targetFilePath)) {

        $sql = "INSERT INTO product (product_name, product_price, product_image, product_code, qty, brand, category,created_at) 
                VALUES ('$productName', '$price', '$productImgName', '$productCode', '$quantity', '$brand', '$category', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                alert('Product Added successfully.');
                window.location.href = 'products.php'; 
            </script>
        ";
        } else {
            echo "
            <script>
                alert('Error Adding Product');
                window.location.href = 'products.php'; 
            </script>
        ";
        }
    }
} elseif (isset($_POST['editItem'])) {
    // Retrieve the form data
    $productID = $_POST["productID"];
    $productName = $_POST["pname"];
    $price = $_POST["price"];
    $quantity = $_POST["qty"];
    $productCode = $_POST["pCode"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];

    $img = $_FILES['img']['name'];
    $imgTmp = $_FILES['img']['tmp_name'];

    // Set the target directory for uploading the brand logo
    $targetDirectory = "../assets/images/uploads/";

    // Generate a unique filename for the brand logo
    $productImgName = uniqid() . '_' . $img;

    // Set the target path for the brand logo
    $targetFilePath = $targetDirectory . $productImgName;

    // Check if a new product image was uploaded
    if ($img != '') {
        if (move_uploaded_file($imgTmp, $targetFilePath)) {

            $sql = "UPDATE `product` 
            SET `product_name`='$productName',
                `product_price`='$price',
                `product_code`='$productCode',
                `product_image`='$productImgName',
                `qty`='$quantity',
                `brand`='$brand',
                `category`='$category',
                `updated_at`=NOW() 
            WHERE `product_id`='$productID'";
     
        }
    } else {
        // Update the product data in the database without changing the image
        $sql = "UPDATE `product` 
        SET `product_name`='$productName',
            `product_price`='$price',
            `product_code`='$productCode',
            `qty`='$quantity',
            `brand`='$brand',
            `category`='$category',
            `updated_at`=NOW() 
        WHERE `product_id`='$productID'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Product updated successfully.');
                window.location.href = 'products.php'; 
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error updating Product');
                window.location.href = 'products.php'; 
            </script>
        ";
    }


} elseif (isset($_GET['product_id'])) { // Delete Brand ================================================================================
    $productid = $_GET['product_id'];

    // Perform the delete operation
    $sql = "DELETE FROM product WHERE product_id = $productid";
    if ($conn->query($sql) === TRUE) {
        echo "
            <script>
                alert('Product deleted successfully.');
                window.location.href = 'products.php'; 
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Error deleting Product');
            window.location.href = 'products.php'; 
        </script>
    ";
    }
}

?>