<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Code With Monil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap and Custom Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Main Container -->
<div class="container">
    <div class="row">

        <!-- Empty left column for spacing -->
        <div class="col-sm-4"></div>

        <!-- Centered Login Form Column -->
        <div class="col-sm-4">
            <div class="login_form">
                
                <!-- Login Form Starts -->
                <form action="login_process.php" method="POST">

                    <!-- Display Logo -->
                    <div class="form-group text-center">
                        <img src="pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" alt="Profile" class="logo img-fluid"><br>
                    </div>

                    <!-- Login Error Handling -->
                    <?php 
                    if (isset($_GET['loginerror'])) {
                        $loginerror = $_GET['loginerror'];
                    }
                    if (!empty($loginerror)) {
                        echo '<p class="errmsg">Invalid login credentials, Please Try Again.</p>';
                    }
                    ?>

                    <!-- Username or Email Input -->
                    <div class="form-group">
                        <label class="label_txt">Username or Email</label>
                        <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control" required>
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label class="label_txt">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="sublogin" class="btn btn-primary btn-group-lg form_btn">Login</button>
                </form>

                <!-- Extra Links -->
                <p class="text-center mt-3" style="font-size: 12px;">
                    <a href="forgot-password.php" style="color: #00376b;">Forgot Password?</a>
                </p>
                <p class="text-center">Don't have an account? <a href="signup.php">Sign up</a></p>

            </div> <!-- End login_form -->
        </div>

        <!-- Empty right column for spacing -->
        <div class="col-sm-4"></div>

    </div> <!-- End row -->
</div> <!-- End container -->

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
