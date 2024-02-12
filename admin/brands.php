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
            <h2>Brands</h2>
            <table id="customers">
                <tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                    $sql = "SELECT * FROM brands";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td>
                                <?php echo $row['brand_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['description']; ?>
                            </td>
                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>
                            <td>
                                <?php echo $row['updated_at']; ?>
                            </td>
                            <td>
                                <a href="brands-edit.php?brand_id=<?php echo $row['brand_id']; ?>" class="edit-badge"
                                    title="Edit"><i class="ri-pencil-fill"></i></a>
                                <a href="brands-process.php?brand_id=<?php echo $row['brand_id']; ?>"
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

            <div class="add-form">
                <h2>Add Brands</h2>
            <form action="brands-process.php" method="POST">
                <label for="bName">Brand Name:</label>
                <input type="text" id="bName" name="bName" required placeholder="Enter Brand Name">

                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" cols="30" rows="3" placeholder="Enter Brand Description"></textarea>

                <input type="submit" value="Submit" name="addBrand">
            </form>
            </div>
        </main>

    </div>
</body>

</html>