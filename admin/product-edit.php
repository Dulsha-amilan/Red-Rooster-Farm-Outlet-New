<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include '../includes/config.php'; // Database Connection
  include '../includes/header.php';
  session_start(); // Start the session
  $username = $_SESSION['username'];
  ?>
  <link rel="stylesheet" href="assets/admin-style.css">
</head>

<body>

  <div class="admin">
    <header class="admin__header">
      <a href="#" class="logo">
        <h1>Red Rooster Farm</h1>
      </a>
      <div class="toolbar">
      <h3> Hello, <?php echo $username; ?></h3>
        <a href="../logout.php" class="logout">
          Log Out
        </a>
      </div>
    </header>
        <nav class="admin__nav">
            <ul class="menu">
                <li class="menu__item">
                    <a class="menu__link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="products.php">Products</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="brands.php">Brands</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="category.php">Category</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="users.php">Users</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="../logout.php">Log out</a>
                </li>
            </ul>
        </nav>
        <main class="admin__main">
            <h2>Edit Product</h2>
            <?php

            if (isset($_GET['product_id'])) {
                $productID = $_GET['product_id'];

                // Retrieve the existing brand data from the database
                $sql = "SELECT * FROM product WHERE product_id = $productID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    // Display the update form with pre-filled values
                    ?>
                    <form action="product-process.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="productID" name="productID" value="<?php echo $row['product_id']; ?>">

                        <label for="pname">Product Name:</label>
                        <input type="text" id="pname" name="pname" value="<?php echo $row['product_name']; ?>">

                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" value="<?php echo $row['product_price']; ?>">

                        <label for="qty">Qty:</label>
                        <input type="text" id="qty" name="qty" value="<?php echo $row['qty']; ?>">

                        <label for="pCode">Product Code:</label>
                        <input type="text" id="pCode" name="pCode" value="<?php echo $row['product_code']; ?>">

                        <label for="img">Product Image:</label>
                        <input type="file" id="img" name="img">

                        <label for="brand">Brand:</label>
                        <?php
                        // Retrieve brands from the database
                        $sql_brand = "SELECT * FROM brands";
                        $sql_brand_run = $conn->query($sql_brand);

                        // Check if there are any brands
                        if ($sql_brand_run->num_rows > 0) {
                            ?>
                            <select name="brand" id="brand">
                                <option selected value="<?php echo $row['brand']; ?>"><?php echo $row['brand']; ?></option>
                                <?php
                                // Loop through each brand
                                while ($row_brand = $sql_brand_run->fetch_assoc()) {
                                    $brandName = $row_brand['name'];
                                    ?>
                                    <option value="<?php echo $brandName; ?>"><?php echo $brandName; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <?php
                        } else {
                            echo "No brands found.";
                        }
                        ?>

                        <label for="category">Category:</label>
                        <?php
                        // Retrieve brands from the database
                        $sql_category = "SELECT * FROM category";
                        $sql_category_run = $conn->query($sql_category);

                        // Check if there are any categories
                        if ($sql_category_run->num_rows > 0) {
                            ?>
                            <select name="category" id="category">
                                <option selected value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                                <?php
                                // Loop through each category
                                while ($row_category = $sql_category_run->fetch_assoc()) {
                                    $categoryName = $row_category['name'];
                                    ?>
                                    <option value="<?php echo $categoryName; ?>"><?php echo $categoryName; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <?php
                        } else {
                            echo "No categories found.";
                        }
                        ?>

                        <input type="submit" value="Submit" name="editItem">
                    </form>

                    <?php
                } else {
                    echo "Product not found.";
                }
            }
            ?>

        </main>

    </div>
</body>

</html>