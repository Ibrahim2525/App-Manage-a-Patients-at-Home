<?php
                                $doc =  $_SESSION['doctorC'];
                                $sel = mysqli_query($conn, "SELECT * FROM doctors WHERE email='$doc'");

                                $row = mysqli_fetch_array($sel);
                                
                                $Name = $row['Name'];
                                $LastName = $row['LastName'];
                               

                                if(isset($_POST['Orienter'])) {
                                        $Or = $_POST['Orient'];

                                    //if(empty($sym)) {
                                            
                                    //}else{
                                        $query = "INSERT INTO orientation(Name,LastName,Orientation) VALUES('$Name','$LastName','$Or')";

                                        $res = mysqli_query($conn,$query);

                                        if($res) {
                                            echo '<script type="text/javascript">alert("you have Oriented a Patient");</script>';
                                            //error_log("done");
                                            
                                        }else{
                                            echo "faild";
                                        }
                                    
                                    }
                                //}
                            
                            
                            ?>

                            // orientation Total
                            <?php
                        //$pa =  $_SESSION['consultationP'];
                        $query =  "SELECT * FROM orientation" ;
                        
                        $res = mysqli_query($conn,$query);
                        //$row = mysqli_fetch_array($res);

                        $output="";
                        $output .= "

                        <table class='table table-bordered border border-dark' style='font-size: 20px;'>
                            <tr>
                                <td class='border border-dark'>ID</td>
                                <td class='border border-dark'>Doctor Name</td>
                                <td class='border border-dark'>Doctor LastName</td>
                                <td class='border border-dark'>Orientation</td>
                    
                            </tr>
                        </table>
                        ";

                        if(mysqli_num_rows($res) < 1) {

                            $output .="
                            <table class='table table-bordered'>
                                <tr>
                                    <td class='text-center' colspan='9' style='font-size: 20px; color: red;'>No Orientation Yet.</td>
                                </tr>
                            </table>     
                            ";
                        }

                    while($row = mysqli_fetch_array($res)) {
                            $output .="
                            
                        <table class='table table-bordered border border-dark my-4' style='font-size: 20px;'>
                            <tr>
                                <td class='border border-dark'>".$row['id']."</td>
                                <td class='border border-dark'>".$row['Name']."</td>
                                <td class='border border-dark'>".$row['LastName']."</td>
                                <td class='border border-dark'>".$row['Orientation']."</td>       
                            </tr>
                        </table>
                            
                            
                            ";
                    }

                       $output .="</tr></table>";

                        echo $output;
                        
                        ?>

                        // <?php
session_start();
if(!$_SESSION['doctor']){
    header("Location: DoctorLogin.php"); 
}else{
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Send Orientation</title>
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
                        <h2 class="text-center my-2" style="padding-top: 100px;">Orientation</h2>
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

                                if(isset($_POST['Orienter'])) {

                                        $Orient = $_POST['Orient'];

                                    if(empty($sym)) {
                                            
                                    
                                        $query = "INSERT INTO orientation(id_patient,id_doctor,Orientation,date_orientation) VALUES('$id_p','$id_d','$Orient',NOW())";
                                     
                                        $res = mysqli_query($conn,$query);

                                        if($res) {
                                            echo '<script type="text/javascript">alert("you have booked an appointment");</script>';
                                            //error_log("done");
                                            
                                        }else{
                                            //echo "faild";
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
                                        <h3>Description</h3>
                                        <input type="text" name="Orient" class="form-control" autocomplete="off" placeholder="enter Description" style="font-size: 15px;" required>
                                        <input type="submit" name="Orienter" class="btn btn-info my-4" value="Send" style="font-size: 15px;">
                                        
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