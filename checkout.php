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
    </header>

    <section>
        <div class="container">
            <img src="assets/images/Ps.png" alt="paymentsuccsesfullogo">
            <h2>Payment Successful</h2>
            <p>Thank you for your payment.<br>
                 We will be in contact with more details shortly</p>
            <a href="index.php" class="btn">Back to home</a>
            
            
        </div>
    </section>

    

</body>

</html>