<?php
include("../include/header.php");
include("../include/Connection.php");
if(isset($_POST['signUp'])) {
    $Name = $_POST['Name'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ConfPassword = $_POST['ConfPassword'];


    $error = array();
     
    if(empty($Name)){
      $error['signUp'] = "Enter Your Name";
    }else if(empty($LastName)) {
      $error['signUp'] = "Enter Your Last Name";
    }else if(empty($Email)) {
        $error['signUp'] = "Enter Your Email";
    }else if(empty($Password)) {
        $error['signUp'] = "Enter Your Password";
    }else if($ConfPassword != $Password) {
        $error['signUp'] = "your confirmation its not correct";
    }

//if(!empty($error)){


    if(count($error) == 0) {
      $query = "INSERT INTO infirmierregister(LastName,Email,password,ConfPassword,Name) VALUES('$LastName','$Email','$Password','$ConfPassword','$Name')";

      $result = mysqli_query($conn,$query);

      if($result) {
        echo "you have register as an infirmier";

        header("Location: infermierLogin.php");
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

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form-div">
            <form action="infermierRegister.php" method="POST">
                <h2 class="text-center">Register</h2>
                <?php

                    if(!empty($show)){
                        echo $show;
                    }
                ?>
                <div class="form-group">
                    <label for="Name" class="h3">Name</label>
                    <input type="name" name="Name" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="LastName" class="h3">Last-Name</label>
                    <input type="Lastname" name="LastName" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="Email" class="h3">email</label>
                    <input type="email" name="Email" class="form-control form-control-lg ">
                </div>

                <div class="form-group">
                    <label for="password" class="h3">password</label>
                    <input type="password" name="Password" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                    <label for="ConfPassword" class="h3"> confirm password</label>
                    <input type="Password" name="ConfPassword" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                 
                    <button type="submit" name="signUp" class="btn btn-primary btn-block btn-lg">sign up</button>
                </div>
                <p class="text-center" class="h3">Already a Acount? <a href="infermierLogin.php" class="h3">Sign In</a></p>
               
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>