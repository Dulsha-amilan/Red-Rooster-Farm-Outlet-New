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
            <h2>Products</h2>
            <a href="product-add.php" class="btn">Add Item</a>
            <table id="customers">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Product Code</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                    $sql = "SELECT * FROM product";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td>
                                <?php echo $row['product_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['product_name']; ?>
                            </td>
                            <td><img src="../assets/images/uploads/<?php echo $row['product_image']; ?>" alt="avatar"
                                    style="width: 80px; height: 80px; object-fit: cover;"></td>
                            <td>
                                <?php echo $row['product_price']; ?>
                            </td>
                            <td>
                                <?php echo $row['qty']; ?>
                            </td>
                            <td>
                                <?php echo $row['product_code']; ?>
                            </td>
                            <td>
                                <?php echo $row['brand']; ?>
                            </td>
                            <td>
                                <?php echo $row['category']; ?>
                            </td>
                            <td>
                                <a href="product-edit.php?product_id=<?php echo $row['product_id']; ?>"
                                    title="Edit"><i class="ri-pencil-fill"></i></a>
                                <a href="product-process.php?product_id=<?php echo $row['product_id']; ?>"
                                    class="del-badge" title="Delete"><i class="ri-delete-bin-7-fill"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>
                </tr>

            </table>
        </main>

    </div>
</body>

</html>