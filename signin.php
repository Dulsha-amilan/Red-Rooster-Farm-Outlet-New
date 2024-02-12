<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'includes/header.php'; // Database Connection
    ?>
</head>
<body>

    <!-- Header Section -->
    <header>
        <?php 
            include 'includes/menu.php'; // Database Connection
        ?>
    </header>


    <section class="">
        <div class="container">
            <div class="log-bar">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="includes/signin-process.php" method="POST">
                        <div class="login_box">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email Address" required/>
                        </div>
                        <div class="login_box">
                            <label for="psw">Password:</label>
                            <input type="password" name="psw" id="psw" placeholder="Enter Password" required/>
                        </div>
                        <div class="remember-forget">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forget password</a>
                        </div>
                        <button type="submit" class="btn" name="login">Login</button>
                        <hr>
                        <div class="register">
                            <p>Don't have an account?<a href="signup.php" class="register-link">Signup</a></p>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>


  
    
</body>
</html>