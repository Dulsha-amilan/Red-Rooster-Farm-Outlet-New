<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/config.php';
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

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            text-align: left;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    </header>

    <section>
    <div class="form-container">
        <h2>Account Settings</h2>
        <br>
        <form action="includes/account-process.php" method="POST">
            <input type="hidden" id="userID" name="userID" value="<?php echo $_SESSION['userID'] ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $_SESSION['username'] ?>">
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $_SESSION['full_name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" rows="5"><?php echo $_SESSION['address'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="<?php echo $_SESSION['city'] ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone'] ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="update">Save Changes</button>
            </div>
        </form>
    </div>
    </section>

  
   

</body>

</html>