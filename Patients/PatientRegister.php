<?php

include("../include/Connection.php");
if(isset($_POST['signUp'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];


    $error = array();
     
    if(empty($username)){
      $error['signUp'] = "Enter Your user Name";
    }else if(empty($email)) {
      $error['signUp'] = "Enter Your email";
    }else if(empty($firstname)) {
        $error['signUp'] = "Enter Your Firstname";
    }else if(empty($username)) {
        $error['signUp'] = "Enter Your Surname";
    }else if(empty($gender)) {
        $error['signUp'] = "Enter Your gender";
    }else if(empty($phone)) {
        $error['signUp'] = "Enter Your Gender";
    }else if(empty($password)) {
        $error['signUp'] = "Enter Your password";
    }else if($passwordConf != $password) {
        $error['signUp'] = "your confirmation its not correct";
    }
    

//if(!empty($error)){


    if(count($error) == 0) {
      $query = "INSERT INTO patientsRegister (firstname,surname,username,email,gender,phone,password,passwordConf) VALUES('$firstname','$surname','$username','$email','$gender', '$phone','$password','$passwordConf')";

      $result = mysqli_query($conn,$query);

      if($result) {
       // echo "you have register as an Patient";

        header("Location: PatientLogin.php");
      }else{
        echo "Faild";
      }
     }

   if (isset($error['signUp'])) {
       $s = $error['signUp'];
       $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show = "";
}
}
//}
?>



<!DOCTYPE html>
<html>
<head>
<title>Doctor Register Page</title>
<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

<link rel="stylesheet" href="../style.css">

<link rel="stylesheet" href="../css/styleRegister.css">
<!--Bootstrap-->



</head>
<body>
    <?php
        include('../include/header.php');
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div">
            <form action="PatientRegister.php" method="POST">
                <h2 class="text-center">Register</h2>

                <div>
                <?php

                if(!empty($show)){
                    echo $show;
                }
                ?>
                
                </div>

                <div class="form-group">
                    <label class="h3">username</label>
                    <input type="username" name="username" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label  class="h3">email</label>
                    <input type="email" name="email" class="form-control form-control-lg ">
                </div>

                <div class="form-group">
                    <label  class="h3">firstname</label>
                    <input type="firstname" name="firstname" class="form-control form-control-lg ">
                </div>

                <div class="form-group">
                    <label  class="h3">surname</label>
                    <input type="surname" name="surname" class="form-control form-control-lg ">
                </div>

                <div class="form-group">
                    <label  class="h3">gender</label>
                    <input type="gender" name="gender" class="form-control form-control-lg ">
                </div>

                <div class="form-group">
                    <label  class="h3">phone</label>
                    <input type="phone" name="phone" class="form-control form-control-lg ">
                </div>


                <div class="form-group">
                    <label  class="h3">password</label>
                    <input type="password" name="password" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label class="h3"> confirm password</label>
                    <input type="password" name="passwordConf" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                 
                    <button type="submit" name="signUp" class="btn btn-primary btn-block btn-lg">sign up</button>
                </div>
                <p class="text-center" class="h3">Already a Acount? <a href="PatientLogin.php" class="h3">Sign In</a></p>
               
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>