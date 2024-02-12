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
                    <h2>Signup</h2>
                    <form action="includes/signup-process.php" method="POST" onsubmit="return checkPassword()">
                        <div class="login_box">
                            <label for="fullName">Name:</label>
                            <input type="text" name="fullName" id="fullName" placeholder="Enter Your Name" required/>
                        </div>
                        <div class="login_box">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email Address" required/>
                        </div>
                        <div class="login_box">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" placeholder="Enter username" required/>
                        </div>
                        <div class="login_box">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Enter Password" required/>
                        </div>
                        <div class="login_box">
                            <label for="conPassword">Re-enter Password:</label>
                            <input type="password" name="conPassword" id="conPassword" placeholder="Re-enter Password" required/>
                        </div>
                        <div class="remember-forget">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forget password</a>
                        </div>
                        <button type="submit" class="btn" name="signup">Signup</button>
                        <hr>
                        <div class="register">
                            <p>Already have an account?<a href="signin.php" class="register-link">Signin</a></p>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>


 

    <script>
        // Check Password
        function checkPassword() {
            const password = document.getElementById("password").value;
            const rePassword = document.getElementById("conPassword").value;

            if(password != rePassword) {
                alert("Password Mismatch!");
                return false;
            } else {
                alert("Success!");
                return true;
            }
        }
    </script>
    
</body>
</html>