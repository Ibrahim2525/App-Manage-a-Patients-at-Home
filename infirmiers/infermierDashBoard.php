<?php
session_start();
if($_SESSION['infirmier']==false){
    header("Location: infirmierLogin.php");  
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
            include("infirmierHeader.php");
            include("../include/Connection.php");
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                            include("infirmierSidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                    <div class="col-md-10" style="margin-top: 120px;">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                <div class="col-md-3 my-2 bg-danger mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                <?php
                                                    $id_d =  $_SESSION['doctor_id'];
                                                        $cons = mysqli_query($conn,  "SELECT * FROM requestcare where id_doc='$id_d'");

                                                        $consu = mysqli_num_rows($cons);
                                                    
                                                    ?>
                                                    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $consu;?></h5>
                                                    <h4 class="text-white">Total</h4>
                                                    <h5 class="text-white">Request Care</h5>
                                                </div>
                                                <div class="col-md-4">
                                                   <a href="RequestCareTotal.php"> <i class="fa fa-hospital-user fa-3x my-4" style="color: white;"></i></a>
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
