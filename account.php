<?php
require_once("config.php");

// Redirect to login if not logged in
if (!isset($_SESSION["login_sess"])) {
    header("location:login.php");
    exit;
}

// Fetch logged-in user details
$email = $_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email = '$email'");
if ($res = mysqli_fetch_array($findresult)) {
    $username = $res['username'];
    $fname    = $res['fname'];
    $lname    = $res['lname'];
    $email    = $res['email'];
    $image    = $res['image'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account - Code with Monil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap and Custom CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Main Container -->
<div class="container">
    <div class="row">

        <!-- Empty left column for spacing -->
        <div class="col-sm-3"></div>

        <!-- Center column for account content -->
        <div class="col-sm-6">
            <div class="login_form">

                <!-- Profile Picture -->
                <div class="text-center">
                    <img src="pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" alt="Code With Monil" class="logo img-fluid mb-3">
                </div>

                <!-- Success Messages -->
                <div class="row">
                    <div class="col"></div>
                    <div class="col-6 text-center">
                        <?php if (isset($_GET['profile_updated'])) { ?>
                            <div class="successmsg">Profile saved.</div>
                        <?php } ?>

                        <?php if (isset($_GET['password_updated'])) { ?>
                            <div class="successmsg">Password has been changed.</div>
                        <?php } ?>

                        <!-- User Avatar -->
                        <?php if ($image == NULL): ?>
                            <img class="logo img-fluid" src="1671470389161.jpg">
                        <?php else: ?>
                            <img src="images/<?php echo $image; ?>" style="height:80px;width:auto;border-radius:50%;">
                        <?php endif; ?>

                        <!-- Welcome Message -->
                        <p>Welcome! <span style="color:#33CC00"><?php echo $username; ?></span></p>
                    </div>

                    <!-- Logout Button -->
                    <div class="col text-right">
                        <p><a href="logout.php"><span style="color:red;">Logout</span></a></p>
                    </div>
                </div>

                <!-- User Information Table -->
                <table class="table mt-3">
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $fname; ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $lname; ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $email; ?></td>
                    </tr>
                </table>

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 mb-2">
                        <a href="edit-profile.php">
                            <button type="button" class="btn btn-primary btn-block">Edit Profile</button>
                        </a>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <a href="change-password.php">
                            <button type="button" class="btn btn-warning btn-block">Change Password</button>
                        </a>
                    </div>
                </div>

            </div> <!-- End login_form -->
        </div>

        <!-- Empty right column for spacing -->
        <div class="col-sm-3"></div>

    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
