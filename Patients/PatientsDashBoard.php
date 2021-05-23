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
        <title>Patients's Dashboard</title>
        <link rel="stylesheet" href="../fonts/all.min.css">
        <link rel="stylesheet" href="../fonts/fontawesome.min.css">
        <link rel="stylesheet" href="../style.css"></link>
    </head>
    <body>
        <?php
            include("PatientsHeader.php");
            include("../include/Connection.php");
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                            include("Patientsidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                    <div class="col-md-10" style="margin-top: 120px;">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    <!--div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Profile</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="http://localhost/memoire/Patients/profile.php"> <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div-->

                                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                        $id_p =  $_SESSION['patient_id'];

                                                        $cons = mysqli_query($conn,"SELECT * FROM prescription WHERE id_patients='$id_p'");

                                                        $consult = mysqli_num_rows($cons);
                                                    
                                                    ?>
                                                    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $consult;?></h5>
                                                    <h5 class="text-white">Total</h5>
                                                    <h5 class="text-white">Prescription</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="PrescriptionTotal.php"> <i class="fas fa-file-medical-alt fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3 my-2 bg-danger mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                        $id_p =  $_SESSION['patient_id'];
                                                        $cons = mysqli_query($conn,"SELECT * FROM hospitalization WHERE id_pat='$id_p'");

                                                        $consult = mysqli_num_rows($cons);
                                                    
                                                    ?>
                                                    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $consult;?></h5>
                                                    <!--h5 class="text-white">Total</h5-->
                                                    <h5 class="text-white">hospitalization</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="HospitalizationTotal.php"> <i class="fa fa-hospital-user fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-3 my-2 bg-secondary mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                        $id_p =  $_SESSION['patient_id'];
                                                        $cons = mysqli_query($conn,"SELECT * FROM orientation WHERE id_patient='$id_p'");

                                                        $consult = mysqli_num_rows($cons);
                                                    
                                                    ?>
                                                    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $consult;?></h5>
                                                    <!--h5 class="text-white">Total</h5-->
                                                    <h5 class="text-white">Orientation</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="OrientationTotal.php"> <i class="fas fa-street-view fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-2" style="font-size: 30px;"></h5>
                                                    <!--h5 class="text-white">Total</h5-->
                                                    <h3 class="text-white">Request Consultation</h3>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="consult.php"><i class="far fa-question-circle fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    

                                    
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



