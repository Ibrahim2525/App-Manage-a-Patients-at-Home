<?php
session_start();
if(!$_SESSION['patientslogin']){
    header("Location: PatientLogin.php"); 
}else{
    
}
include("../include/Connection.php");

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Profile Patients</title>
        <link rel="stylesheet" href="../style.css"></link>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>
        <?php
            //include("../include/Connection.php");
            include('PatientsHeader.php');
            
            
            $patient = $_SESSION['patientlogin'];
            $query = "SELECT * FROM patientsregister WHERE email='$patient'";

            $res = mysqli_query($conn,$query);

            $row = mysqli_fetch_array($res);
            
        
        ?>
    </body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 " style="margin-left: -30px">
                    <?php
                    include("PatientSidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <h5 class="text-center" style="margin-top: 150px;">Change Email</h5>
                                        <?php
                                        if(isset($_POST['update'])){
                                            $Email = $_POST['email'];

                                            if(empty($email)){

                                            }else{
                                                $query = "UPDATE patientsregister SET email='$Email' WHERE email='$patient'";
                                                $res = mysqli_query($conn,$query);
                                                
                                                if($res){
                                                    $_SESSION['patientlogin']=$Email;
                                                }
                                            }
                                        }
                                        
                                        ?>
                                    <form action="" method="POST"style="font-size:30px;">
                                        <label>Enter Email</label>
                                        <input type="text" name="email" class="form form-control">
                                        <input type="submit" name="update" class="btn btn-info my-2" value="update email">
                                    </form>
                                        <?php
                                        if(isset($_POST['change'])) {
                                            $old = $_POST['OldPass'];
                                            $new = $_POST['NewPass'];
                                            $con = $_POST['ConfPass'];

                                            $q = "SELECT * FROM patientsregister WHERE email='$patient'";

                                            $re = mysqli_query($conn,$q);

                                            $row = mysqli_fetch_array($re);

                                            if(empty($old)){


                                            }else if(empty($new)){

                                            }else if($con != $new) {

                                            }else if($old != $row['password']){

                                            }else{
                                                $query = "UPDATE patientsregister SET password='$new' WHERE email='$patient'";
                                                mysqli_query($conn,$query);
                                            }
                                        }
                                        
                                        ?>
                                    <h5 class="my-4 text-center">Change Password</h5>
                                    <form method="POST">
                                        <label>Old Password</label>
                                        <input type="password" name="OldPass" class="form-control" placeholder="enter your old password"style="font-size: 15px;">

                                        <label>New Password</label>
                                        <input type="password" name="NewPass" class="form-control" placeholder="enter your New password"style="font-size: 15px;">

                                        <label>Confirm Password</label>
                                        <input type="password" name="ConfPass" class="form-control" placeholder="Confirm your password"style="font-size: 15px;">
                                        <input type="submit" name="change" class="btn btn-info my-2" value="change password">
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>