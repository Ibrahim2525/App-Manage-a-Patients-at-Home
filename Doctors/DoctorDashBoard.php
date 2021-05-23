<?php
session_start();
if($_SESSION['doctor']==false){
    header("Location: DoctorLogin.php");  
}else{


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Doctor's Dashboard</title>
        <link rel="stylesheet" href="../fonts/all.min.css">
        <link rel="stylesheet" href="../fonts/fontawesome.min.css">
        <link rel="stylesheet" href="../style.css"></link>
    </head>
    <body>
        <?php
            include("Doctorsheader.php");
            include("../include/Connection.php");
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                            include("DoctorsSidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                    <div class="col-md-10" style="margin-top: 120px;">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4 class="text-white my-4">Send Prescription</h4>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="Prescription.php"> <i class="fas fa-file-medical-alt fa-3x my-4"style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3 my-2 bg-danger mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-2" style="font-size: 30px;"></h5>
                                                    <h4 class="text-white">Send Hospitalisation</h4>
                                                    <h5 class="text-white"></h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="Hospitalization.php"> <i class="fa fa-hospital-user fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <?php
                                                    $id_d =  $_SESSION['doctor_id'];
                                                        $cons = mysqli_query($conn,  "SELECT * FROM consult where id_d='$id_d'");

                                                        $consu = mysqli_num_rows($cons);
                                                    
                                                    ?>
                                                    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $consu;?></h5>
                                                    <h5 class="text-white">Total</h5>
                                                    <h5 class="text-white">Patients</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="ConsultationTotal.php"> <i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-2" style="font-size: 30px;"></h5>
                                                    <h4 class="text-white">Send</h4>
                                                    <h5 class="text-white">Orientation</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="Orientation.php"> <i class="fas fa-street-view fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3 my-2 bg-secondary mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-2" style="font-size: 30px;"></h5>
                                                    <h4 class="text-white">Request</h4>
                                                    <h5 class="text-white">Care</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="RequestCare.php"> <i class="fas fa-hand-holding-medical fa-3x my-4" style="color: white;"></i></a>
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

<?php
}
?>
