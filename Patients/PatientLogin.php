
<?php

include("../include/Connection.php");

session_start();

if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $error = array();
    $q = "SELECT * FROM patientsregister WHERE email='$email' AND password ='$password'";
    $qq = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($qq);
    
    if(empty($email)) {
      $error['Login'] = "Enter Your Email";
    }else if(empty($password)) {
      $error['Login'] = "Enter Your Password";
    }

    if(count($error) == 0) {
      
          $query = "SELECT * FROM patientsRegister WHERE email='$email' AND password='$password'";
          $res = mysqli_query($conn,$query);
          if(mysqli_num_rows($res)){
            //echo "done";
           // echo $email;
            //echo $_POST['email'];
            $_SESSION['consultationP']= $email;
            $_SESSION['patient_id']= $row['id'];
            //echo $_SESSION['consultationP'];
            $_SESSION['patient']= true;
            header("Location: http://localhost/memoire/Patients/PatientsDashBoard.php");
          }else{
            echo "<h1>Faild</h1>";
            
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
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Login Form Design | CodeLab</title> -->
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
      <div>
        <?php
          echo $show;
          ?>
      </div>
    <form action="PatientLogin.php" method="POST">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" name="email">
          
        </div>
        <div class="field" >
          <label>Password</label>
          <input type="password" name="password">
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
          <input type="submit" name="Login">
        </div>
    <div class="signup-link">
        Not a member? <a href="PatientRegister.php">Signup now</a></div>
</form>
</div>
</body>
</html>
