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
                               

                               
                                
                                
                           
                            
                            ?>

                                                 <!-- formulaire -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron">
                                    <form method="POST">
                                        <!--label>Symptoms</label-->
                                        <h3>Hospitalization</h3>
                                         <select name='patients'  class= 'border border-dark-solid my-2 h3'>
                                           <option name='' class='border border-dark my-4 h3'>Choose Patients</option>
                                         <?php 
                                              $q = "SELECT * FROM patientsregister";
                                              $resultat = mysqli_query($conn,$q);
                                               while($row = mysqli_fetch_array($resultat)) { ?>
                                              <option name="choose" value="<?php echo $row['id'] ?>" class='border border-dark my-4 h3'><?php echo $row['firstname'], $row['surname'] ?></option>
                                               <?php } ?>
                                            </select>


                                        <input type="text" name="hos" class="form-control" autocomplete="off" placeholder="enter description" style="font-size: 15px;" required>
                                        <input type="submit" name="send" class="btn btn-info my-4" value="Send" style="font-size: 15px;">
                                        
                                    </form>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <?php
 

         
    if(isset($_POST['send'])) {
        if(isset($_POST['patients'])) {
           // echo $_POST['patients'];  
            $hospital = $_POST['hos'];

        
               $id_p_hos = $_POST["patients"]; 
        
            $query = "INSERT INTO hospitalization(id_pat,id_doc,hospitalization,date_hospitalization) VALUES(' $id_p_hos','$id_d','$hospital',NOW())";
         
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
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>