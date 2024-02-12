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
      <h2>Add Product</h2>
      <form action="product-process.php" method="POST" enctype="multipart/form-data">
        <label for="pname">Product Name:</label>
        <input type="text" id="pname" name="pname" placeholder="Enter Product Name">

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" placeholder="Enter Product Price">

        <label for="qty">Qty:</label>
        <input type="text" id="qty" name="qty" placeholder="Enter Product Qty">

        <label for="pCode">Product Code:</label>
        <input type="text" id="pCode" name="pCode" placeholder="Enter Product Code">

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
        $sql_brand = "SELECT * FROM category";
        $sql_brand_run = $conn->query($sql_brand);

        // Check if there are any brands
        if ($sql_brand_run->num_rows > 0) {
          ?>
          <select name="category" id="category">
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

        <input type="submit" value="Submit" name="addItem">
      </form>
    </main>

  </div>
</body>

</html>