<?php
session_start();
if(!$_SESSION['doctor']){
    header("Location: DoctorrLogin.php"); 
}else{
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Request Consultation</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        include("Doctorsheader.php");
            include("../include/Connection.php");
            //session_start();
        
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px">
                        <?php
                        include("DoctorsSidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <h2 class="text-center my-2" style="padding-top: 100px;">Send Hospitalization</h2>
                            <?php
                               // $pat =  $_SESSION['consultationP'];
                               $id_p = $_SESSION['patient_id'];
                               $id_d = $_SESSION['doctor_id'];
                               //$id_d='34';
                               // $sel = mysqli_query($conn, "SELECT id FROM patientsregister WHERE id='$id_p'");


                               // $row = mysqli_fetch_array($sel);
                                
                                //$firstname = $row['firstname'];
                                //$surname = $row['surname'];
                                //$gender = $row['gender'];
                                //$phone = $row['phone'];

                                if(isset($_POST['send'])) {

                                        $care = $_POST['care'];

                                    if(empty($sym)) {
                                            
                                    
                                        $query = "INSERT INTO requestcare(id_pat,id_doc,date_care,description_rc) VALUES('$id_p','$id_d',NOW(),'$care')";
                                     
                                        $res = mysqli_query($conn,$query);

                                        if($res) {
                                            echo '<script type="text/javascript">alert("you have booked an appointment");</script>';
                                            //error_log("done");
                                            
                                        }else{
                                            echo "faild";
                                        }
                                    
                                    }
                                }
                            
                            
                            ?>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron">
                                    <form method="POST">
                                        <!--label>Symptoms</label-->
                                        <h3>Request Care</h3>
                                        <input type="text" name="care" class="form-control" autocomplete="off" placeholder="enter description" style="font-size: 15px;" required>
                                        <input type="submit" name="send" class="btn btn-info my-4" value="Send" style="font-size: 15px;">
                                        
                                    </form>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>