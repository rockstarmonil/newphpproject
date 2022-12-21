<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp -Code With Monil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
 <div class="row">
    <?php
    if(isset($_POST['signup']))
    {
        extract($_POST);
        if(strlen($fname)<3)
        {
            $error[] = 'Please enter First name using 3 characters atleast';
        }
        if(strlen($fname)>20)
        {
            $error[] = 'FirstName: Max length 20 characters not alowed';
        }
        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname))
        {
            $error[] = 'Invalid Entry First name. Please Enter letters without any Digit or Special Chracters like(1,2,3,!,<,@,<,#,<,$,<,%,<,^,<,&,<,*,<)';
        }
        if(strlen($lname)<3)
        {
            $error[] = 'Please enter Last name using 3 characters atleast';
        }
        if(strlen($lname)>20)
        {
            $error[] = 'LastName: Max length 20 characters not alowed';
        }
        if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname))
        {
            $error[] = 'Invalid Entry Last name. Please Enter letters without any Digit or Special Chracters like(1,2,3,!,<,@,<,#,<,$,<,%,<,^,<,&,<,*,<)';
        }
        if(strlen($username)<3)
        {
            $error[] = 'Please enter username using 3 characters atleast';
        }
        if(strlen($username)>20)
        {
            $error[] = 'UserName: Max length 20 characters not alowed';
        }
        if(!preg_match("/^^[^0-9][a-z0-9 ]+([_-]?[a-z0-9])*$/", $username))
        {
            $error[] = 'Invalid Entry Username. Please Enter Lowercase letters without any space and No Number at the Start
                         Eg- myusername,user45';
        }
        if(strlen($email)>50)
        {
            $error[]= 'Email : Max length 50 Characters Not Allowed';
        }
        if($passwordconfirm=='')
        {
            $error[] = 'Please Confirm The Password';
        }
        if($password != $passwordconfirm)
        {
            $error[] = 'Passwords Do Not Match';
        }
        if(strlen($password)<5)
        {
            $error[]= 'Password Must Be 6 characters long';
        }
        if(strlen($password)>20)
        {
            $error[]= 'Password: Max Length 20 characters Not allowed';
        }

        $sql = "select * from users where (username= '$username' or email='$email');";
        $res = mysqli_query($dbc, $sql);

        if(mysqli_num_rows($res)> 0)
        {
            $row = mysqli_fetch_assoc($res);
            if($username==$row['username'])
            {
                $error[] = 'Username already exists';
            }
            if($email==$row['email'])
            {
                $error[] = 'Email already exists';
            }
        }
       if(!isset($error))
       {
            $date = date('y-m-d');
            $options = array("cost" => 4);
            $password = password_hash($password, PASSWORD_BCRYPT, $options);

            $result = mysqli_query($dbc, "INSERT into users values('','$fname','$lname','$username','$email','$password','$date')");
            if($result)
            {
                $done = 2;
            }
            else
            {
                $error[] = 'Failed : Something went wrong';
            }
        }
     
      
       
    }
    ?>
    <div class="col-sm-4">
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                echo '<p class="errmsg">&#26A0; ' . $error . '</p>';
            }
        }
        ?>
    </div>
    <div class="col-sm-4">
        <?php if(isset($done)){ ?>
            <div class="successmsg">
                <span style="font-size: 100px;">
                 &#9989
                </span>
                <br> You have registered Succesfully . <br> <a href="login.php" style="color: #fff;">Login here...</a>
            </div>
            <?php } else { ?>
        <div class="signup_form">
            <img src="pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" alt="Login" class="logo img-fluid">
         <form action="" method="post">
            <div class="form-group">
              <label class="label_txt">FirstName</label>
              <input type="text" class="form-control" name="fname" value="<?php if (isset($error)) {
                  echo $fname;
              }?>" required="">
            </div>
            <div class="form-group">
              <label class="label_txt">LastName</label>
              <input type="text" class="form-control" name="lname" value="<?php if (isset($error)) {
                  echo $lname;
              }?>" required="">
            </div>
            <div class="form-group">
              <label class="label_txt">Username</label>
              <input type="text" class="form-control" name="username" value="<?php if (isset($error)) {
                  echo $username;
              }?>" required="">
            </div>
            <div class="form-group">
              <label class="label_txt">Email</label>
              <input type="email" class="form-control" name="email" value="<?php if (isset($error)) {
                  echo $email;
              }?>" required="">
            </div>
            <div class="form-group">
              <label  class="label_txt">Password</label>
              <input type="password" class="form-control" name="password" required="" >
            </div>
            <div class="form-group">
              <label  class="label_txt">Confirm Password</label>
              <input type="password" class="form-control" name="passwordconfirm" required="" >
            </div>
<br>
            <button type="submit" class="form_btn btn btn-primary" name="signup">SignUp</button>
            <?php } ?>
          </form>
          
          <br>
          <p>Have an account?<a href="login.php">Login</a></p>
          </div>
    </div>
    <div class="col-sm-4">
    </div>
    
 </div>
 </div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" ></script>
</body>
</html>