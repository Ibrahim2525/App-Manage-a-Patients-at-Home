<?php

include("../include/Connection.php");

session_start();

if(isset($_POST['Login'])){
    $email = $_POST['Email'];
    $password = $_POST['Password'];


    $error = array();
    $q = "SELECT * FROM infirmierregister WHERE Email='$email' AND password ='$password'";
    $qq = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($qq);
    if(empty($email)) {
      $error['Login'] = "Enter Your Email";
    }else if(empty($password)) {
      $error['Login'] = "Enter Your Password";
    }

    if(count($error) == 0) {
          $query = "SELECT * FROM infirmierregister WHERE Email='$email' AND password='$password'";
          $res = mysqli_query($conn,$query);
          if(mysqli_num_rows($res)){
            echo "done";
            $_SESSION['infirmier'] = true;
            
           header("Location: infermierDashBoard.php");
          }else{
            echo "Faild";
            
          }
    }
}
if(isset($error['Login'])) {
  $m = $error['Login'];
  $show = "<h5 class='text-center alert alert-danger'>$m</h5>";
}else{
  
  $show = "";
}
 ?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/Login.css">
    <!--Link Css Complet-->
    <link rel="stylesheet" href="../style.css">
    
  </head>
  <body>
      <?php
        include("../include/header.php");
      ?>
    <div class="wrapper">
      <div class="title">Login Form</div>
        <?php
         echo $show;
          ?>
<form action="infermierLogin.php" method="POST">
        <div class="field">
          <input type="text" name="Email">
          <label>Email Address</label>
        </div>
<div class="field">
          <input type="password" name="Password">
          <label>Password</label>
        </div>
<div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div>
<div class="field">
          <input type="submit" value="Login" name="Login">
        </div>
<div class="signup-link">
Not a member? <a href="infermierRegister.php">Signup now</a></div>
</form>
</div>
</body>
</html>
