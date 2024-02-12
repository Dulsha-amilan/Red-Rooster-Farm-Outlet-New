<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'includes/config.php'; // Database Connection
        include 'includes/header.php';
        session_start(); // Start the session
    ?>
</head>
<body>
    <!-- Header Section -->
    <header>
        <?php 
            include 'includes/menu.php'; 
        ?>
    </header>

    <!-- Shop Section -->
    <section class="shop">
        <div class="container">
            <h1>New Arrivals</h1>
            <h3>Coloring book wayfarers food truck air plant affogato gentrify</h3>

            <!-- Product Cards -->
            <div class="grid">

            <?php 
                $sql = "SELECT *
                FROM product
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                ORDER BY created_at DESC";
                
                $result = mysqli_query($conn, $sql);
      
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="product-card">
                            <div class="badge"><?php echo $row['brand']; ?></div>
                            <div class="product-tumb">
                                <img src="assets/images/uploads/<?php echo $row['product_image']; ?>" alt="">
                            </div>
                            <div class="product-details">
                                <span class="product-catagory">
                                    <?php echo $row['category']; ?>
                                </span>
                                <h4>
                                    <?php echo $row['product_name']; ?>
                                </h4>
                                <div class="product-bottom-details">
                                    <div class="product-price">
                                       Rs. <?php echo $row['product_price']; ?>
                                    </div>
                                    <div class="product-links">
                                        <form method="post" action="includes/add_to_cart.php">
                                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                            <input type="submit" class="btn" name="add_to_cart" value="Add to cart">
                                        </form>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }} 
            ?>
            </div>
        </div>
    </section>

   
    
</body>
</html>