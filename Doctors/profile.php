<?php
    session_start();
    if(!$_SESSION['doctor']){
        header("Location: DoctorLogin.php");  
    }else{
    
    }

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile Doctor's</title>
        <link rel="stylesheet" href="../style.css"></link>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>
        <?php
           include("DoctorsHeader.php");
        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                            include("DoctorsSidenav.php");
                            include("../include/Connection.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                            $doc = $_SESSION['doctor'];
                                            $query = "SELECT * FROM doctors WHERE email='$doc'";
                                            $res = mysqli_query($conn,$query);
                                            
                                            $row = mysqli_fetch_array($res);
                                    
                                        ?>
                                        <div class="my-3">           
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                            if(isset($_POST['ChangeEmail'])) {
                                                $uname = $_POST['uname'];
                                                if(empty($uname)) {

                                                }else{
                                                    $query = "UPDATE doctors SET email='$uname' WHERE email='$doc'";

                                                    $res = mysqli_query($conn,$query);

                                                    if($res) {
                                                        $_SESSION['doctor'] = $uname;
                                                    }
                                                }
                                            
                                            }
                                        ?>
                                        <form action="profile.php" method="POST" style="margin-top: 100px;" style="font-size: 350px;">
                                            <label style="font-size: 30px;">Change Email</label>
                                            <input type="text" name="uname" class="form form-control border border-dark"autocomplete="off" placeholder="enter Email"style="font-size: 15px;">
                                            <br>
                                            <input type="submit" name="ChangeEmail" class="btn btn-success" value="change_email"style="font-size: 15px;">
                                        </form>
                                <br>
                                    <!--h5 class="text-center my-2" style="font-size: 20px;">Change Password</h5--> 
                                    <?php
                                        if(isset($_POST['ChangePassword'])) {
                                            $old = $_POST['OldPassword'];
                                            $new = $_POST['NewPassword'];
                                            $con = $_POST['ConfPassword'];

                                            $ol = "SELECT * FROM doctors WHERE Email='$doc'";
                                            $ols = mysqli_query($conn,$ol);
                                            $row = mysqli_fetch_array($ols);

                                            if(empty($old)) {
                                                echo "invalid";
                                            }else if(empty($new)) {
                                                echo "invalid";
                                            }else if($conn != $new) {
                                                echo "invalid";
                                            }else if($old != $row['Password']){
                                                /*$query = "UPDATE doctors SET Password='$new' WHERE Email='$doc'";
                                                mysqli_query($conn,$query);*/
                                                echo "invlid";
                                            }else{
                                                $query = "UPDATE doctors SET Password='$new' WHERE Email='$doc'";
                                                mysqli_query($conn,$query);
                                            }
                                    }
                                    
                                    ?>
                                    <label for=""style="font-size: 30px;">Change Password</label>
                                    <br><br>
                                <form method="POST" >
                                        <div class="form-group">
                                    
                                            <label style="font-size: 20px;">Old Password</label>
                                            <input type="password" name="OldPassword" class="form-control border border-dark" autocomplete="off" placeholder="enter your old password"style="font-size: 15px;">
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px;">New Password</label>
                                            <input type="password" name="NewPassword" class="form-control border border-dark" autocomplete="off" placeholder="enter your new password"style="font-size: 15px;">
                                        </div>

                                        <div class="form-group">
                                            <label style="font-size: 20px;">Confirm Password</label>
                                            <input type="password" name="ConfPassword" class="form-control border border-dark" autocomplete="off" placeholder=" confirm your password"style="font-size: 15px;">
                                        </div>
                                        <input type="submit" name="ChangePassword" class="btn btn-info"  value="change password"style="font-size: 15px;">
                                </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>