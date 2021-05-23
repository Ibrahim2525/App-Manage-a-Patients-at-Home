<?php
session_start();
if(!$_SESSION['patient']){
    header("Location: PatientLogin.php"); 
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
        include("PatientsHeader.php");
            include("../include/Connection.php");
            //session_start();
        
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px">
                        <?php
                        include("PatientSidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <h2 class="text-center my-2" style="padding-top: 100px;">Request Consultation</h2>
                            <?php
                               // $pat =  $_SESSION['consultationP'];
                               $id_p = $_SESSION['patient_id'];
                               $id_d = $_SESSION['doctor_id'];
                              
                               
                               /// $id_p =  "SELECT  id FROM patientsregister , consultation WHERE id= consultation.id_p ";


                               // $row = mysqli_fetch_array($sel);
                                
                                //$firstname = $row['firstname'];
                                //$surname = $row['surname'];
                                //$gender = $row['gender'];
                                //$phone = $row['phone'];

                                if(isset($_POST['book'])) {

                                        $symp = $_POST['sym'];

                                    
                                            
                                    
                                        $query = "INSERT INTO consult(id_p,id_d,symptoms,date_consult) VALUES('$id_p','$id_d','$symp',NOW())";
                                     
                                        $res = mysqli_query($conn,$query);

                                        if($res) {
                                            echo '<script type="text/javascript">alert("you have booked an appointment");</script>';
                                            //error_log("done");
                                            //$s = $error['signUp'];
                                            //$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
                                            
                                        }else{
                                            //echo "faild";
                                       }
                                }
                            
                            
                            ?>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron">
                                    <form method="POST">
                                        <!--label>Symptoms</label-->
                                        <h3>Symptoms</h3>
                                        <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="enter symptoms" style="font-size: 15px;" required>
                                        <input type="submit" name="book" class="btn btn-info my-4" value="Request Consultation" style="font-size: 15px;">
                                        
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